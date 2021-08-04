<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Repositories\SeatRepo;
use App\Repositories\StudentParameterRepo as StudentParameter;
use App\Repositories\StudentParameterVauleRepo as StudentParaValue;
use App\Entites\Seat_Entity as SeatEntity;
use App\Entites\Student_History_Entity as SeatHistoryEntity;
use App\Entites\Files_Entity as SeatFile;
use App\Entites\Skill_Class_Entity;
use App\Entites\Skill_Scores_Entity;
use App\Entites\Skill_Note_Entity as SkillNoteEntity;
use App\Services\UserService;
use App\Services\SeatService as Seat; 
use App\Services\ProfilePermissionService as Permission; 
use App\Services\ContactListService as ContactList; 
use App\Services\AssessmentService as Assessment; 
use App\Services\ReportService as Report; 
use App\Services\UtilsService as Utils;
use App\Services\OrganizationService as Organization; 
use Auth;
use App\User;
use App\Enums\Gender;
use App\Enums\SeatStatus;
use App\Enums\UserStatus;
use App\Enums\UserRole;
use Illuminate\Support\Arr;
use App\Enums\Analysis_Category;


class StudentService
{
    /*
    * ====== Local Parameter ========= 
    */    
    protected $Seat_Service;   
    protected $Permission_Service; 
    protected $User_Service;
    protected $Contact_Service;
    protected $Assessment_Service;
    protected $Report_Service;
    protected $student_para_repo;
    protected $student_paravalue_repo;
    protected $Utils;


    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->Seat_Service = new Seat();
        $this->Permission_Service = new Permission();
        $this->User_Service = new UserService();
        $this->Contace_Service = new ContactList(); 
        $this->Assessment_Service = new Assessment();   
        $this->Report_Service = new Report();    
        $this->student_paravalue_repo = new StudentParaValue();
        $this->student_para_repo = new StudentParameter(); 
        $this->Utils = new Utils();
    }

    /*================================== 
    * @brief: Get Student Profile 
    * @paeam_in: $id --> $seat id
    * @return: Student Profile information
    ===================================*/    
    public function GetStuedntInformation($id)
    {
        $Seat = SeatEntity::find($id);        
        $StudentInfo = collect([]);
        $StudentInfo->put('ID',$Seat->seat_id);
        $StudentInfo->put('Org',$Seat->org_id);
        $StudentInfo->put('FirstName',$Seat->first_name);
        $StudentInfo->put('LastName',$Seat->last_name);
        $StudentInfo->put('Birthday',$this->Utils->GetDateByFormat($Seat->birthday));
        $StudentInfo->put('Ethnicity',$Seat->ethnicity);
        $StudentInfo->put('Gender',$Seat->gender);
        $StudentInfo->put('City',$Seat->city);
        $StudentInfo->put('ZipCode',$Seat->zipcode);
        $StudentInfo->put('Country',$Seat->country);
        $StudentInfo->put('SingLanguage',$Seat->sign_language);
        $StudentInfo->put('Dignostic',$Seat->dignostic);
        $StudentInfo->put('Notes',$Seat->note);
        $StudentInfo->put('Parameter1',$Seat->parameter_1);
        $StudentInfo->put('Parameter2',$Seat->parameter_2);
        $StudentInfo->put('Parameter3',$Seat->parameter_3);
        $StudentInfo->put('PC',$Seat->coordinator);    
        if(!$this->Assessment_Service->GetAssessmentInformation(['seat_id' => $id],'created_at')->isEmpty())
        { 
          $StudentInfo->put('HasAssessment',1);    
        }
        else
        {
          $StudentInfo->put('HasAssessment',0);     
        }
        $Permission = $this->Permission_Service->GetPermissionInfo(Auth::user()->user_id,$id);
        $StudentInfo->put('Permission',$Permission);        
        // $SP_List = $this->student_para_repo->StudentParameterInfo($Seat->org_id);         
        // $ParameterIndex = 1;
        // foreach($SP_List as $SP)
        // {
        //   $SPV_Info = collect([]);
        //   $SPV_List = $this->student_paravalue_repo->StudentParameterValue($SP->para_id);        
        //   foreach($SPV_List as $SPV)
        //   {                        
        //    $SPV_Info->push(['ID'=>$SPV->value_id,'Value'=>$SPV->value]);           
        //   }                  
        //   $StudentInfo->put('Parameter'.$ParameterIndex,['Name' => $SP->para_name,'Active' => $SP->is_active,'Rrquire' => $SP->is_require,'Value' => $SPV_Info]);                  
        //   $ParameterIndex += 1;
        // }            
        return $StudentInfo;

    }
    /*================================== 
    * @brief: Get All Student List By User
    * @paeam_in: $id --> $User id
    * @return: Student Permission and Information
    ===================================*/    
    public function GetAllStudentList($id) 
    {
        $User = User::find($id);
        $Permission_List = $this->Permission_Service->GetPermission(['user_id' => $id]);
        $StudentInfo = collect([]);           
        foreach($Permission_List as $Permission)
        {
          $SeatInfo = collect([]);
          $Seat = SeatEntity::find($Permission->seat_id);                   
          if($Seat->archived != SeatStatus::ARCHIVED()->value)
           {
            $SeatInfo->put('ID' , $Seat->seat_id);
            $SeatInfo->put('Name' ,$this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name));          
            if($Seat->gender == Gender::male()->value)
            {
              $SeatInfo->put('Gender' , 'M');     
            }
            else
            {
              $SeatInfo->put('Gender' , 'F');           
            }
            $SeatInfo->put('DOB' , $this->Utils->GetDateByFormat($Seat->birthday));
            $SeatInfo->put('CreateDate',$this->Utils->GetDateByFormat($Seat->created_at));
            $SeatInfo->put('Location' , $Seat->city);
            if($Seat->org_id == $User->org_id)
            {
              $SeatInfo->put('SameOrg' , 1);
            }
            else
            {
              $SeatInfo->put('SameOrg' , 0);
            }
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
               if(!$this->Assessment_Service->GetAssessmentInformation(['seat_id' => $Seat->seat_id],'created_at')->isEmpty())
               { 
                 $SeatInfo->put('HasAssessment',1);    
               }
               else
               {
                 $SeatInfo->put('HasAssessment',0);     
               }               
               $StudentInfo->push($SeatInfo);   
           }         
        }
       return $StudentInfo;        
    }
    /*================================== 
    * @brief: Generate Assessment Information for Student page 
    * @paeam_in: $Info -> Assessment infomation
    * @return: Assessment Data
    ===================================*/    
    public function GenAssessmentInfo($id,$Info_collect)   
    {
        $Permission_Right = $this->Permission_Service->GetPermission(['seat_id' => $id , 'user_id' => Auth::user()->user_id])->first();           
        if($Permission_Right->owner == 1 || $Permission_Right->coordinator == 1 || $Permission_Right->full_access !=0 || $Permission_Right->assessment_reprot == 2)
        {
            $Modified = TRUE;
        }
        else  
        {
           $Modified = FALSE;
        }
        foreach($Info_collect as $Info)
        {            
            $Assignee = User::find($Info->get('User'));
            $Info->put('Modified',$Modified);
            $Info->put('User_Name',$this->Utils->GetNameByFormat($Assignee->first_name,$Assignee->last_name));
        }           
        return $Info_collect;
    }
    /*================================== 
    * @brief: Generate Assessment Information for Student page 
    * @paeam_in: $Info -> Assessment infomation
    * @return: Assessment Data
    ===================================*/    
    public function AddNewAssessment($id)   
    {
      $Seat = SeatEntity::find($id);
      $AssList = $this->Assessment_Service->GetAssessmentInformation(['seat_id' => $id],'created_at');
      $NewAssInfo = collect([]);
      $NewAssInfo->put("ID",$Seat->seat_id);
      $NewAssInfo->put("Name",$this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name));
      $NewAssInfo->put("Age",(int)round((strtotime(now())-strtotime($Seat->birthday))/(24*60*60)/365.25,0));
      $Permission = $this->Permission_Service->GetPermissionInfo(Auth::user()->user_id,$id);
      $NewAssInfo->put('Permission',$Permission);
      $UsedColor=collect([]);
      foreach($AssList as $Ass)
      {        
        $UsedColor->push($Ass['Color']);
      }
      $NewAssInfo->put("UsedColor",$UsedColor);      
      return $NewAssInfo;
    }    
    /*================================== 
    * @brief: Generate Summary Information 
    * @paeam_in: $id 
    * @return: Summary Information
    ===================================*/    
    public function GenSummaryInformation($id)
    {
       $SummaryInfo = collect([]);
       $SeatInfo = $this->Seat_Service->GetSeatInfo($id);
       $Coordinator = $this->User_Service->UserProfile($this->Permission_Service->GetPermission(['seat_id' => $id,'coordinator' =>1])->first()->user_id);
       $OwnerList = $this->Permission_Service->GetPermission(['seat_id' => $id,'owner' =>1]);
       $Owners = collect([]);
       foreach($OwnerList as $O)
       {
        $Info = $this->User_Service->UserProfile($O->user_id); 
        $Owners->push($this->Utils->GetNameByFormat($Info->get('FirstName'),$Info->get('LastName')));        
       }
       $AssessmentInfo = $this->Assessment_Service->GetAssessmentInformation(['seat_id' => $id],'created_at');       
       foreach($AssessmentInfo as $AssInfo)
       {         
         $ReportInfo = collect([]);
         $StatusReport_List = $this->Report_Service->GetStatusRecord(['assessment_id' => $AssInfo['ID']],'created_at');
         foreach($StatusReport_List as $STR)
         {          
          $User = $this->User_Service->UserProfile($STR['User']);
          $STR->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'),$User->get('LastName')));        
          $ReportInfo->push($STR);
         }
         $WorkSheet_List = $this->Report_Service->GetWorkSheetRecord(['assessment_id' => $AssInfo['ID']],'created_at');
         foreach($WorkSheet_List as $WorkSheet)
         {           
           $Progress_List = $this->Report_Service->GetProgressRecord(['worksheet_id' => $WorkSheet['ID']],'created_at');                      
           if($Progress_List->count() != 0)
             {
              foreach($Progress_List as $Progress)
              {
                $User = $this->User_Service->UserProfile($Progress['User']);
                $Progress->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'),$User->get('LastName')));   
              }
              $WorkSheet->put('ProgressReport',$Progress_List);
             }
            else
            {
              $WorkSheet->put('ProgressReport',collect([]));
            } 
            $User = $this->User_Service->UserProfile($WorkSheet['User']);
            $WorkSheet->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'),$User->get('LastName')));           
           $ReportInfo->push($WorkSheet);           
         }
         $BaseLine_List = $this->Report_Service->GetBaseLineRecord(['assessment_id' => $AssInfo['ID']],'created_at');
         foreach($BaseLine_List as $BaseLine)
         {
           $User = $this->User_Service->UserProfile($BaseLine['User']);
           $BaseLine->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'),$User->get('LastName')));           
           $ReportInfo->push($BaseLine);
         }
         $AssInfo->put('Report',$ReportInfo->sortByDesc('Created_Date'));
       }
       //dd($AssessmentInfo->sortByDesc('Create_Date'));
       $SummaryInfo->put('Student',$SeatInfo);
       $SummaryInfo->put('Assessment',$AssessmentInfo->sortByDesc('Create_Date'));
       $SummaryInfo->put('Coordinator',$this->Utils->GetNameByFormat($Coordinator->get('FirstName'),$Coordinator->get('LastName')));
       $SummaryInfo->put('Owners',$Owners);
       $Permission = $this->Permission_Service->GetPermissionInfo(Auth::user()->user_id,$id);
       $SummaryInfo->put('Permission',$Permission);
       return $SummaryInfo;
    }
    /*================================== 
    * @brief: Generate Report List Information 
    * @paeam_in: $id 
    * @return: Report List
    ===================================*/        
    public function GenReportInformation($id)
    {
      $ReportInfo = collect([]);
      $AssessmentInfo = $this->Assessment_Service->GetAssessmentInformation(['seat_id' => $id],'created_at');       
      foreach($AssessmentInfo as $AssInfo)
      {                 
        $StatusReport_List = $this->Report_Service->GetStatusRecord(['assessment_id' => $AssInfo['ID']],'created_at');
        foreach($StatusReport_List as $STR)
        {          
         $User = $this->User_Service->UserProfile($STR['User']);
         $STR->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'),$User->get('LastName')));        
         $ReportInfo->push($STR);
        }
        $WorkSheet_List = $this->Report_Service->GetWorkSheetRecord(['assessment_id' => $AssInfo['ID']],'created_at');
        foreach($WorkSheet_List as $WorkSheet)
        {           
          $Progress_List = $this->Report_Service->GetProgressRecord(['worksheet_id' => $WorkSheet['ID']],'created_at');                      
          if($Progress_List->count() != 0)
            {
             foreach($Progress_List as $Progress)
             {
               $User = $this->User_Service->UserProfile($Progress['User']);
               $Progress->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'), $User->get('LastName')));   
             }
             $WorkSheet->put('ProgressReport',$Progress_List);
            }
            else
            {
              $WorkSheet->put('ProgressReport',collect([]));
            }  
           $User = $this->User_Service->UserProfile($WorkSheet['User']);
           $WorkSheet->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'), $User->get('LastName')));           
          $ReportInfo->push($WorkSheet);           
        }
        $BaseLine_List = $this->Report_Service->GetBaseLineRecord(['assessment_id' => $AssInfo['ID']],'created_at');
        foreach($BaseLine_List as $BaseLine)
        {
          $User = $this->User_Service->UserProfile($BaseLine['User']);
          $BaseLine->put('Creator',$this->Utils->GetNameByFormat($User->get('FirstName'), $User->get('LastName')));           
          $ReportInfo->push($BaseLine);
        }
      }      
      return $ReportInfo->sortByDesc('Created_Date');
    }
    /*================================== 
    * @brief: Update Student profile
    * @paeam_in: $id 
    *            $request
    * @return: Update Result
    ===================================*/
    public function UpdateProfilefromOrg($ID,$Info)
    {
      // dd($Info->all());         
      $Seat = SeatEntity::find($ID); 
      if($Seat != NULL)
      {
        $Seat->first_name = $Info->FirstName;
        $Seat->last_name = $Info->LastNameOrStudentID;
        if(Auth::user()->date_format == 0)
        {          
          $Seat->birthday = date('Y-m-d', strtotime($Info->BirthDate));
        }
        else
        {
          $Seat->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $Info->BirthDate)));
        }
        
        $Seat->gender = $Info->Gender;
        $Seat->ethnicity = $Info->Ethnicity;
        $Seat->city = $Info->City;
        $Seat->zipcode = $Info->ZipCode;
        $Seat->country = $Info->Country;
        $Seat->sign_language = $Info->SignLang;        
        $Seat->dignostic = $Info->DiagnosticInfo;
        $Seat->note = $Info->Notes;    
        if(array_key_exists("ProfileCoordinator",$Info->all()))
        {  
           if($Seat->coordinator != $Info->ProfileCoordinator)
           {          
             $this->Permission_Service->Change_Coordinator($Seat->coordinator,$ID,$Info->ProfileCoordinator);
             $Seat->coordinator = $Info->ProfileCoordinator;
           }
        }
        if(array_key_exists("Parameter1",$Info->all()))
        {
          $Seat->parameter_1 = $Info->Parameter1;
        }
        if(array_key_exists("Parameter2",$Info->all()))
        {
          $Seat->parameter_2 = $Info->Parameter2;
        }
        if(array_key_exists("Parameter3",$Info->all()))
        {
          $Seat->parameter_3 = $Info->Parameter3; 
        }
        $Seat->save();
      }
    }
    /*================================== 
    * @brief: Update Student profile
    * @paeam_in: $id 
    *            $request
    * @return: Update Result
    ===================================*/
    public function UpdateProfilefromStudent($ID,$Info)
    {
      // dd($Info->all());         
      $Seat = SeatEntity::find($ID); 
      if($Seat != NULL)
      {
        $Seat->first_name = $Info->FirstName;
        $Seat->last_name = $Info->LastName;
        if(Auth::user()->date_format == 0)
        {          
          $Seat->birthday = date('Y-m-d', strtotime($Info->Birthday));
        }
        else
        {
          $Seat->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $Info->Birthday)));
        }
        
        $Seat->gender = $Info->Gender;
        $Seat->ethnicity = $Info->Ethnicity;
        $Seat->city = $Info->City;
        $Seat->zipcode = $Info->zipCode;
        $Seat->country = $Info->Country;
        $Seat->sign_language = $Info->SingLanguage;        
        $Seat->dignostic = $Info->Dignostic;
        $Seat->note = $Info->Notes;              
        if(array_key_exists("fileCoordinator",$Info->all()))
        {
          if($Seat->coordinator != $Info->fileCoordinator)
          {          
            $this->Permission_Service->Change_Coordinator($Seat->coordinator,$ID,$Info->fileCoordinator);
            $Seat->coordinator = $Info->fileCoordinator;
          }
        }
        if(array_key_exists("Parameter1",$Info->all()))
        {
          $Seat->parameter_1 = $Info->Parameter1;
        }
        if(array_key_exists("Parameter2",$Info->all()))
        {
          $Seat->parameter_2 = $Info->Parameter2;
        }
        if(array_key_exists("Parameter3",$Info->all()))
        {
          $Seat->parameter_3 = $Info->Parameter3; 
        }
        $Seat->save();
      }
    }    
    /*================================== 
    * @brief: Update Student profile
    * @paeam_in: $id 
    *            $request
    * @return: Update Result
    ===================================*/
    public function AddProfile($Info)
    {
      $User = Auth::User();
      $Seat = new SeatEntity();      
      $Seat->first_name = $Info->studentFirstname;
      $Seat->last_name = $Info->studentLastname;
      if(Auth::user()->date_format == 0)
        {          
          $Seat->birthday = date('Y-m-d', strtotime($Info->birthDate));
        }
        else
        {
          $Seat->birthday = date('Y-m-d', strtotime(str_replace('/', '-', $Info->birthDate)));
        }      
      $Seat->gender = $Info->Gender;
      $Seat->ethnicity = $Info->Ethnicity;
      $Seat->city = $Info->City;
      $Seat->zipcode = $Info->zipCode;
      $Seat->country = $Info->Country;
      if($Info->signLang == "YES")
      {
       $Seat->sign_language = 1;        
      }
      else
      {
        $Seat->sign_language = 0;        
      }
      $Seat->dignostic = $Info->diagnosticInfo;
      $Seat->note = $Info->Notes;

      if(array_key_exists("Parameter1",$Info->all()))
        {
          $Seat->parameter_1 = $Info->Parameter1;
        }
        if(array_key_exists("Parameter2",$Info->all()))
        {
          $Seat->parameter_2 = $Info->Parameter2;
        }
        if(array_key_exists("Parameter3",$Info->all()))
        {
          $Seat->parameter_3 = $Info->Parameter3; 
        }
        $Seat->coordinator = $Info->fileCoordinator;
        $Seat->org_id=$User->org_id;
        $Seat->archived = 0;
        $Seat->save();
        $this->Permission_Service->Add_PC_Permission($Seat->coordinator,$Seat->seat_id);  
        $OrgService = new Organization();
        $OrgService->UpdateSeatInfo(SeatStatus::UNARCHIVED());
      return $Seat;   
    }    
    /*================================== 
    * @brief: Record Student History 
    * @paeam_in: $user_id 
    *            $Sear_id
    * @return: Update Result
    ===================================*/
    public function AddSeatHistoryRecord($uid,$sid)
    {
        $Record = new SeatHistoryEntity();
        $Record->seat_id = $sid;
        $Record->user_id = $uid;
        $Record->description = "View summary";
        $Record->save();
    }
    /*================================== 
    * @brief: Get Student History 
    * @paeam_in: $user_id 
    *            $Sear_id
    * @return: Update Result
    ===================================*/
    public function GetSeatHistoryRecords($sid)
    {
        $History = SeatHistoryEntity::where(['seat_id' => $sid])->orderby('created_at','desc')->get();
        $Records = collect([]);
        $ShortHistory= collect([]);
        foreach($History as $info)
        {
          $Record = collect([]);
          $User = User::find($info->user_id);
          $Record->put("Date",$this->Utils->GetDateByFormat($info->created_at));
          $Short= $info->created_at->format("Y F");          
          if($ShortHistory->contains('Text',$Short)==false)
          {
            $ShotInfo=collect([]);
            $ShotInfo->put('Text',$Short);
            $ShotInfo->put('Tag',$info->created_at->format("Y/m"));            
            $ShortHistory->push($ShotInfo);
          }          
          $Record->put("FirstName",$User->first_name);
          $Record->put("LastName",$User->last_name);
          $Record->put("Description",$info->description);
          $Records->push($Record);
        }                      
        return ['FullHistory'=>$Records,'ShortHistory'=>$ShortHistory];
    }
    /*================================== 
    * @brief: Get Student History 
    * @paeam_in: $user_id 
    *            $Sear_id
    * @return: Update Result
    ===================================*/
    public function GetFileList($id)
    {
       $Files = SeatFile::where(['seat_id'=>$id])->get();
       $FileInfo = collect([]);
       foreach($Files as $Info)
       {
         $temp=collect([]);            
         $temp->put("FileName",$Info->name);
         $temp->put("UploadDate",$this->Utils->GetDateByFormat($Info->created_at));
         $temp->put("Description",$Info->description);
         $FileInfo->put($Info->file_id,$temp);
       }
       return $FileInfo;
    }
    /*================================== 
    * @brief: Upload File for Student
    * @paeam_in: $seat_id
    *            $request
    * @return: Update Result
    ===================================*/    
    public function UploadFile($id,Request $request)
    {
      if($request->hasFile('file'))
      {
        $file = new SeatFile(); 
        $file->seat_id = $id;
        $file->upload_id = Auth::user()->user_id;
        $file->name = $request->file('file')->getClientOriginalName();
        $file->description="";
        $file->path=$request->file('file')->hashName();
        Storage::put($id,$request->file('file'));
        $file->save();
      }
    }
    /*================================== 
    * @brief: Download File for Student
    * @paeam_in: $seat_id
    *            $fid
    * @return: Update Result
    ===================================*/    
    public function DownloadFile($id,$fid)
    {
      $file = SeatFile::find($fid);  
      return $file;
    }
    /*================================== 
    * @brief: Remove File for Student
    * @paeam_in: $seat_id
    *            $fid
    * @return: Update Result
    ===================================*/    
    public function RmoveFile($id,$fid)
    {
      $file = SeatFile::find($fid);  
      if($file!=null)
      {
        Storage::delete($id.'/'.$file->path); 
        $file->delete();
      }
    }
    /*================================== 
    * @brief: Remove File for Student
    * @paeam_in: $seat_id
    *            $fid
    * @return: Update Result
    ===================================*/    
    public function RmoveAllFile($id)
    {
      $files = SeatFile::where(['seat_id' => $id])->get();  
      foreach($files as $file)
      {
         Storage::delete($id.'/'.$file->path); 
         $file->delete();
      }
    }    
    /*================================== 
    * @brief: Update File Script
    * @paeam_in: $seat_id
    *            $request
    * @return: Update Result
    ===================================*/        
    public function UpdateFileScript($id,Request $request)
    {
      $file = SeatFile::find($request->File_ID);  
      if($file!=null)
      {
         $file->description=$request->Description;
         $file->save();
      }
    }
    /*================================== 
    * @brief: Get Student Note 
    * @paeam_in: $Seat_id 
    * @return: Update Result
    ===================================*/
    public function GetStudentNotes($id)
    {
       $Class = new Skill_Class_Entity();
       $ScoreInfo = new Skill_Scores_Entity();
       $SkillList = $Class->get();
       $Skills = $ScoreInfo->get();
       $Assessment = $this->Assessment_Service->GetAssessmentInformation(['seat_id' => $id],'created_at')->last();
       $Scores = $this->Assessment_Service->GetAssessmentScore($Assessment->get("ID"));
       $SkillNotes = SkillNoteEntity::where(['seat_id' => $id],'created_at')->get();       
       $Notes = collect([]);
       foreach($Scores as $Index=>$Category)
          {
            $Note = collect([]);
            foreach($Category as $ID=>$Score)
            {
              $DetailInfo=collect([]);
              $ID = $SkillList[$Index]->minimum+$ID;
              $FilterNotes=$SkillNotes->filter(function ($value, $key) use ($ID) {                    
                if($value['skill_id']==$ID)                    
                return $value;
               });                              
              if($FilterNotes->count()!=0)
              {                                   
                $Info = $ScoreInfo->where("skill_id",$FilterNotes->first()->skill_id)->first();                   
                $DetailInfo->put("Index",$Info->tag); 
                $DetailInfo->put("Edit-Color" ,$Score->get("Edit")); 
                $DetailInfo->put("Color" ,$Score->get("Score"));                                  
                $NoteDetail=collect([]);
                foreach($FilterNotes as $Detail)
                {
                  $temp=collect([]);
                  $User = User::find($Detail->create_id);
                  $temp->put("Name",$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
                  $temp->put("Time",$this->Utils->GetDateByFormat($Detail->created_at));
                  $temp->put("Notes",$Detail->notes);
                  $temp->put("Open/Private",$Detail->open);   
                  $NoteDetail->push($temp);               
                }                
                $DetailInfo->put("Notes",$NoteDetail);  
                $Note->push($DetailInfo);              
              }               
            }
            $Notes->put(Analysis_Category::getKey($Index+1),$Note);
          }
          return $Notes;

    }
}