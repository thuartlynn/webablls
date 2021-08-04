<?php

namespace App\Services;

use Auth;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Entites\Organization_Entity;
use App\Entites\Seat_Entity as SeatEntity;
use App\Entites\Student_Para_Value_Entity as SPValueEntity;
use App\Entites\Archived_Information_Entity as ArchivedEntity;
use App\Entites\BulletinBoard_Entity as BulletinBoard;
use App\Repositories\OrganizationRepo;
use App\Repositories\StudentParameterRepo as StudentParameter;
use App\Repositories\StudentParameterVauleRepo as StudentParaValue;
use App\Repositories\SeatRepo as SeatRepo;
use App\Entites\TodoList_Entity as TodoList; 
use App\Services\ProfilePermissionService as Permission; 
use App\Services\SeatService as Seat;
use App\Services\UtilsService as Utils; 
use App\Services\StudentService as Student;
use App\Services\AssessmentService as Assessment;
use App\Enums\Gender;
use App\Enums\SeatStatus;
use App\Enums\UserRole;
use App\User;

class OrganizationService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $organization_repo;    
    protected $student_para_repo;
    protected $student_paravalue_repo;
    protected $seat_repo;
    protected $user_service;
    protected $Seat_service;
    protected $Student_service;
    protected $Permission_service;
    protected $Utils;
    protected $Assessment_Service;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->organization_repo = new OrganizationRepo();        
        $this->student_paravalue_repo = new StudentParaValue();
        $this->student_para_repo = new StudentParameter(); 
        $this->Permission_service = new Permission();   
        $this->seat_repo = new SeatRepo();
        $this->Seat_service = new Seat();   
        $this->Student_service = new Student();   
        $this->Utils = new Utils(); 
        $this->Assessment_Service = new Assessment(); 
    }

    /*================================== 
    * @brief: Get Orgznization information 
    * @paeam_in: 
    * @return: Organization detail information
    ===================================*/     
    public function GetInfo()
    {
        $Org = Organization_Entity::find(Auth::user()->org_id);
        $Info = collect([
            "Name" => $Org->org_name,
            'Expriation' => $this->Utils->GetDateByFormat($Org->expiration),
            'TotalSeats' => $Org->totalseat,
            'Timeout' => $Org->timeout,
            'UsedSeats'  => $Org->usedseat,
        ]);
     return $Info;
    } 
    /*================================== 
    * @brief: Get Orgznization information 
    * @paeam_in: 
    * @return: Organization detail information
    ===================================*/     
    public function GetAddress($id)
    {
        $Org = $this->organization_repo->OrgAddressInfo($id);
        $Address = collect([]);
        foreach($Org as $Info)
        {
          $Address->push([  
            'ID' => $Info->id, 
            'Name' => $Info->name,
            'Street' => $Info->street,
            'City' => $Info->city,
            'Zip' => $Info->zipcode,
            'Country'  => $Info->country,
            'State' => $Info->state,
            'Phone' =>  $Info->phone, 
            ]);     
        }
     return $Address;
    }     
    /*================================== 
    * @brief: Get Orgznization Student Parameter 
    * @paeam_in: $id -> Organization ID
    * @return: Student Parameter information
    ===================================*/     
   public function GetStudnetParameterInformation($id)
   {
       $SP_List = $this->student_para_repo->StudentParameterInfo($id); 
       $SP_Info = collect([]);      
       
       foreach($SP_List as $SP)
       {
         $SPV_Info = collect([]);
         $SPV_List = $this->student_paravalue_repo->StudentParameterValue($SP->para_id);        
         foreach($SPV_List as $SPV)
         {                        
          $SPV_Info->put($SPV->value_id,$SPV->value);           
         }                  
         $SP_Info->push(['Name' => $SP->para_name,'Active' => $SP->is_active,'Rrquire' => $SP->is_require,'Value' => $SPV_Info]);                  
       }       
       return $SP_Info;
   }
    /*================================== 
    * @brief: Update Orgznization Student Parameter 
    * @paeam_in: $ParaInfo -> All detail student parameter 
    * @return: none
    ===================================*/     
   public function UpdateStudnetParameter($id,$ParaInfo)
   {
      $SP_List = $this->student_para_repo->StudentParameterInfo($id);       
      foreach($SP_List as $SP)
      {
        $NewSP=current($ParaInfo);                 
        $SP->para_name = $NewSP['Name'];
        if(array_key_exists('IsRequired',$NewSP))
        {
          $SP->is_require = 1;
        }
        else
        {
          $SP->is_require = 0;
        }
        if(array_key_exists('IsActive',$NewSP))
        {
          $SP->is_active = 1;
        }
        else
        {
          $SP->is_active = 0;
        }
        $SP->save();
        if(array_key_exists('Values',$NewSP))
        {
         $SPV_List = $this->student_paravalue_repo->StudentParameterValue($SP->para_id);
         foreach($SPV_List as $SPV)
         {
           $SPV->delete();
         }        
         foreach($NewSP['Values'] as $Info)
         {
           $NewSPV = new SPValueEntity();
           $NewSPV->para_id = $SP->para_id;
           $NewSPV->value = $Info;
           $NewSPV->save();  
         }
        }
        else
        {
          $SPV_List = $this->student_paravalue_repo->StudentParameterValue($SP->para_id);
          foreach($SPV_List as $SPV)
          {
            $SPV->delete();
          }         
        }
        $NewSP=next($ParaInfo);         
      }
   }
    /*================================== 
    * @brief: Update Orgznization Timeout Setting 
    * @paeam_in: $id -> Organization ID
    *            $setting -> Timeout value  
    * @return: 
    ===================================*/     
   public function UpdateTimeoutSetting($setting)
   {
      $Org = Organization_Entity::find(Auth::user()->org_id);
      $Org->timeout = $setting;
      $Org->save();    
   }
    /*================================== 
    * @brief: Get User All Student by User 
    * @paeam_in: $id -> user Id
    * @return: Student Information
    ===================================*/  
    public function GetAllSeatByUser($id)
    {
        $Permission_Info = $this->Permission_service->GetPermission(['user_id'=> $id]);      
        $data = collect([]); 
        $Assigned = collect([]); 
        $ShardWithinOrg =collect([]);
        $Others = collect([]);       
                 
        foreach($Permission_Info as $Permission)
        {
          $SeatInfo = collect([]);
          $Seat = SeatEntity::find($Permission->seat_id);
          if($Seat->archived != SeatStatus::ARCHIVED()->value)
          {
             $SeatInfo->put('ID' , $Seat->seat_id);
             $SeatInfo->put('Name' ,$this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name));          
             $SeatInfo->put('Gender' , Gender::getDescription($Seat->gender));     
             $SeatInfo->put('DOB' , $Seat->birthday);
             $SeatInfo->put('Location' , '');
             $Class = collect([]);
             //Owner
             if($Permission->owner == 1 )
             {
               $Class->push('O');
             }
             //coordinator
             if($Permission->coordinator == 1)
             {
               $Class->push('CO');
             }
             if($Permission->owner == 0 && $Permission->coordinator == 0)
             {
                //Full Access
                if($Permission->full_access == 1)
                {
                  $Class->push('FA');
                }
                else if($Permission->full_access == 2)
                {
                  $Class->push('FAs'); 
                }
                //Basic Info
                if($Permission->basic_info == 1)
                {
                  $Class->push('Iv');
                }
                else if($Permission->basic_info == 2)
                {
                  $Class->push('Im');
                }
                //Assessment and report
                if($Permission->assessments_report == 1)
                {
                  $Class->push('Av');
                }
                else if($Permission->assessments_report == 2)
                {
                  $Class->push('Am');
                }          
                //File
                if($Permission->files == 1)
                {
                  $Class->push('Fv'); 
                }
                else if($Permission->files == 2)
                {
                  $Class->push('Fm'); 
                }
                //Analytics
                if($Permission->analytics == 1)
                {
                  $Class->push('DAv');
                }
                else if($Permission->analytics == 2)
                {
                  $Class->push('DAm');
                }
              }        
                $SeatInfo->put('Permission',$Class);
                if($Permission->coordinator == 1)
                 {
                  $Assigned->push($SeatInfo);     
                 } 
                 else if($Seat->org_id == Auth::User()->org_id)
                 {
                  $ShardWithinOrg->push($SeatInfo);
                 } 
                else
                 {
                   $Others->push($SeatInfo);  
                }   
          }
        }
        $data->put('AS',$Assigned);
        $data->put('SS',$ShardWithinOrg);
        $data->put('OS',$Others);
        return $data;
    }    
    /*================================== 
    * @brief: Confirm Can Used Seats
    * @paeam_in: 
    * @return: True/False
    ===================================*/    
    public function CanAddSeats()
    {
       $org = $this->GetInfo();       
       if($org->get('TotalSeats') > $org->get('UsedSeats'))
       {
         return TRUE;
       }
       else
       {
         return FALSE;
       }
    }
    /*================================== 
    * @brief: Confirm Can Used Seats
    * @paeam_in: 
    * @return: True/False
    ===================================*/    
    public function UpdateSeatInfo($mode)
    {
      $org = Organization_Entity::find(Auth::user()->org_id);
      if($mode == SeatStatus::UNARCHIVED()) 
      {
        $org->usedseat=$org->usedseat+1;
      }
      else 
      {
        if($org->usedseat > 0 )
           $org->usedseat=$org->usedseat-1;
      }
      $org->save();

    }    
    /*================================== 
    * @brief: Set Seat Archived Status
    * @paeam_in: $id -> seat_id
    *            $status -> Archived Status
    * @return: True/False
    ===================================*/        
    public function SetSeatArchiveStatus($seat_id,$status)
    {
      if($status == SeatStatus::UNARCHIVED()) //Unarchive
      { 
         if($this->CanAddSeats())
            {
               $this->seat_repo->ChangeSeatArchive($seat_id,$status);               
               $this->UpdateSeatInfo(SeatStatus::UNARCHIVED());
               return TRUE;
            }
           else
            {
               return FALSE;
            }  
      }
      else //Archive
      {
        $this->seat_repo->ChangeSeatArchive($seat_id,$status);
        $ArchivedInfo = new ArchivedEntity();
        $ArchivedInfo->seat_id = $seat_id;
        $ArchivedInfo->archived_id = Auth::id();
        $ArchivedInfo->save();
        $this->UpdateSeatInfo(SeatStatus::ARCHIVED());
        return TRUE;
      }
    }
    /*================================== 
    * @brief: Remove Archived Seat Information
    * @paeam_in: $id -> seat_id    
    * @return: True/False
    ===================================*/        
    public function RemoveArchivedSeat($seat_id)
    {
       $Seat = SeatEntity::find($seat_id);
       if($Seat->archived == SeatStatus::ARCHIVED)
       {
          $this->Permission_service->RemovePermissionBySeat($seat_id);
          $this->Seat_service->DeleteSeatInfo($seat_id);  
          $this->Student_service->RmoveAllFile($seat_id); 
          $this->Assessment_Service->DeleteRecord($seat_id);           
          return TRUE;
       }
       else
       {
         return FALSE;
       }
    }
    /*================================== 
    * @brief: Delete Organization Address
    * @paeam_in: $id -> add_id 
    * @return: True/False
    ===================================*/
    public function DeleteOrganizationAddress($add_id)
    {        
      return $this->organization_repo->DeleteOrgAddress($add_id);
    }    

    /*================================== 
    * @brief: Update Organization Address
    * @paeam_in: $id -> add_id 
    * @return: True/False
    ===================================*/
    public function UpdateOrganizationAddress($add_id,$Add_Info)
    {        
      return $this->organization_repo->UpdateOrgAddress($add_id,$Add_Info);
    }        
    /*================================== 
    * @brief: Add new Organization Address
    * @paeam_in: $id -> add_id 
    * @return: True/False
    ===================================*/
    public function AddNewOrganizationAddress($Add_Info)
    {        
      return $this->organization_repo->AddNewOrgAddress($Add_Info);
    }                
    /*================================== 
    * @brief: Add new Organization 
    * @paeam_in: $id -> add_id 
    * @return: True/False
    ===================================*/
    public function AddNewOrganization($Org)
    {              
      return $this->organization_repo->AddNewOrg($Org);
    }  
    /*================================== 
    * @brief: Delete BulletinBoard information
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function DeleteBulletin($id)
    {
      $Bulletin = BulletinBoard::find($id);
      if($Bulletin!=null)
      {
       if($Bulletin->file_path!="")
        {          
          Storage::delete('BulletinBoard/'.$Bulletin->file_path);
        }
        $Bulletin->delete();
      }
    }                      
    /*================================== 
    * @brief: Download BulletinBoard file
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function DownloadBulletin($id)
    {
      $file = BulletinBoard::find($id);       
      return $file;        
    }
    /*================================== 
    * @brief: get BulletinBoard information
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function GetBulletinBoardInfo()
    {
      $Bulletin = BulletinBoard::get();
      $Bulletin_Info=collect([]);
      $User =  Auth::user();
      foreach($Bulletin as $Info)
      {        
        $Org = User::find($Info->user_id)->org_id;
        if($Org == $User->org_id)
        {
         $temp=collect([]);
         $temp->put("ID",$Info->id);
         $temp->put("Title",$Info->title);        
         $temp->put("Content",$Info->content);
         $temp->put("FileName",$Info->file_name);
         if($Info->invisible & 0x01)
           {
             $temp->put("Standard_Invisible",1);
           }
         else
          {
            $temp->put("Standard_Invisible",0);
           }   
         if($Info->invisible & 0x02)
            {
              $temp->put("Restricted_Invisible",1);
            }
         else
           {
             $temp->put("Restricted_Invisible",0);
           }          
          $temp->put("Announcement",$this->Utils->GetDateByFormat($Info->start_date));
          $temp->put("Period",$this->Utils->GetDateByFormat($Info->end_date));        
          $Bulletin_Info->push($temp);
        }
      }    
      return $Bulletin_Info;  
    }
    /*================================== 
    * @brief: get BulletinBoard information
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function GetActiveBulletinInfo()
    {
      $Bulletin = BulletinBoard::get();
      $Bulletin_Info=collect([]);
      $ActiveDate = date('Y-m-d 00:00:00');             
      $User =  Auth::user();
      foreach($Bulletin as $Info)
      {                  
        $Org = User::find($Info->user_id)->org_id;        
        if($Info->start_date <= $ActiveDate && $ActiveDate <= $Info->end_date && $Org == $User->org_id)
        {
            $temp=collect([]);
            $temp->put("ID",$Info->id);
            $temp->put("Title",$Info->title);        
            $temp->put("Content",$Info->content);
            $temp->put("FileName",$Info->file_name);
            if($Info->invisible & 0x01)
               {
                 $temp->put("Standard_Invisible",1);    
                 if($User->role == UserRole::Standard)
                   continue;             
               }
            else
              {
                $temp->put("Standard_Invisible",0);
              }   
            if($Info->invisible & 0x02)
              {
                $temp->put("Restricted_Invisible",1);
                if($User->role == UserRole::Restricted)
                   continue;   
 
              }
            else
             {
               $temp->put("Restricted_Invisible",0);
             }          
            $temp->put("Announcement",$this->Utils->GetDateByFormat($Info->start_date));
            $temp->put("Period",$this->Utils->GetDateByFormat($Info->end_date));        
            $Bulletin_Info->push($temp);
        }
      }                
      return $Bulletin_Info;  
    }    
    /*================================== 
    * @brief: Upload File to Storge
    * @paeam_in: $request
    * @return: 
    ===================================*/
    public function UploadFileToServer(Request $request)
    {        
      //檔案已存在
      if($request->exists('ID'))
      {
        $file = BulletinBoard::find($request->ID);
        if($request->exists('file_name'))
        {
          if($request->hasFile('file'))
            {
              if($file->file_path!="")
                {
                 Storage::delete('BulletinBoard/'.$file->file_path);
                }
              Storage::putfile('BulletinBoard',$request->file('file'));
              $file->file_path = $request->file('file')->hashname(); 
            }
          $file->file_name = $request->file_name;          
        } 
        else
        {
          if($file->file_path!="")
          {
           Storage::delete('BulletinBoard/'.$file->file_path);
          }
          $file->file_name="";
          $file->file_path="";
        }
        $file->user_id = Auth::user()->user_id;
        $file->title = $request->Title;
        $file->content = $request->Content;
        $file->invisible = 0;
        if($request->Standard_Invisible == 'true') 
        {
          $file->invisible=$file->invisible+1;
        }
        if($request->Restricted_Invisible == 'true') 
        {
          $file->invisible=$file->invisible+2;
        }        
        if(Auth::user()->date_format == 0)
        {
          $file->start_date=date("Y/m/d",strtotime($request->Announcement_date));
          $file->end_date =date("Y/m/d",strtotime($request->Period));
        }
        else
        {
          $file->start_date=date("Y/m/d",strtotime(str_replace('/', '-', $request->Announcement_date)));
          $file->end_date =date("Y/m/d",strtotime(str_replace('/', '-', $request->Period)));          
        }
        $file->save();        
      }
      else //新增檔案
      {                
        $file = new BulletinBoard();
        if($request->exists('file_name'))
        {
          if($request->hasFile('file'))
            {
              Storage::putfile('BulletinBoard',$request->file('file'));
              $file->file_path = $request->file('file')->hashname(); 
            }
          else
            {
              $file->file_path = "";   
            }
          $file->file_name = $request->file_name;          
        } 
        else
        {
          $file->file_name="";
          $file->file_path="";
        }
        $file->user_id = Auth::user()->user_id;
        $file->title = $request->Title;
        $file->content = $request->Content;
        $file->invisible = 0;
        if($request->Standard_Invisible == 'true') 
        {
          $file->invisible+=1;
        }
        if($request->Restricted_Invisible == 'true') 
        {
          $file->invisible+=2;
        }        
        if(Auth::user()->date_format == 0)
        {
          $file->start_date=date("Y/m/d",strtotime($request->Announcement_date));
          $file->end_date =date("Y/m/d",strtotime($request->Period));
        }
        else
        {
          $file->start_date=date("Y/m/d",strtotime(str_replace('/', '-', $request->Announcement_date)));
          $file->end_date =date("Y/m/d",strtotime(str_replace('/', '-', $request->Period)));          
        }
        $file->save();
      }
    }    
    /*================================== 
    * @brief: Delete User 
    * @paeam_in: $User ID
    * @return: 
    ===================================*/
    public function RemoveUser($id)
    {
       $User = User::find($id);
       $User->role = -1;
       $User->email = Str::uuid();
       $PermissionInfos=$this->Permission_service->GetPermission(['user_id'=>$id]);      
       foreach($PermissionInfos as $Info)
       {
         $Info->delete();
       }
       $Bulletin_Info = BulletinBoard::where(["user_id" => $id])->get();
       foreach($Bulletin_Info as $Info)
       {
         $Info->delete();
       }
       $TodoList = TodoList::where(["user_id" => $id])->get();
       foreach($TodoList as $Info)
       {
         $Info->delete();
       }       
       $User->save();

    }
}
