<?php

namespace App\Services;

use App\Repositories\ProfilePermissionRepo;
use Illuminate\Support\Arr;
use App\User;
use App\Entites\Seat_Entity;
use App\Entites\Profile_Permission_Entity;

class ProfilePermissionService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $profile_permission_repo;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->profile_permission_repo = new ProfilePermissionRepo();
    }

    /*================================== 
    * @brief: Check User Can delete or not
    * @paeam_in: user_id
    * @return: Ture / False
    ===================================*/
    public function CheckUserCanDelete($uid)
    {
        $User_Permission = $this->profile_permission_repo->GetPermissionInfo(['user_id' => $uid]);
        foreach($User_Permission as $Permission)
        {                    
          if($Permission->coordinator == '1')
            {              
              return FALSE;   
            }
        }
        return TRUE;
    }
    /*================================== 
    * @brief: Get Permission
    * @paeam_in: $Filter
    * @return: Permission information
    ===================================*/
    public function GetPermission($Filter)
    {
        return $this->profile_permission_repo->GetPermissionInfo($Filter); 
    }
    /*================================== 
    * @brief: Get Permission by User 
    * @paeam_in: $id -> user Id
    * @return: Permission Information
    ===================================*/      
    public function GetPermissionInfo($uid,$sid)
    {
        $Permission=$this->GetPermission(['seat_id' => $sid,'user_id'=>$uid])->first();  
        if($Permission==null)
        {
          return collect([]);
        }      
        $PermissionInfo = collect([]);
            //Owner
            if($Permission->owner == 1 )
            {
              $PermissionInfo->push('O');
            }
            //coordinator
            if($Permission->coordinator == 1)
            {
              $PermissionInfo->push('CO');
            }
            if($Permission->owner == 0 && $Permission->coordinator == 0)
            {
               //Full Access
               if($Permission->full_access == 1)
               {
                 $PermissionInfo->push('FA');
               }
               else if($Permission->full_access == 2)
               {
                 $PermissionInfo->push('FAs'); 
               }
               //Basic Info
               if($Permission->basic_info == 1)
               {
                 $PermissionInfo->push('Iv');
               }
               else if($Permission->basic_info == 2)
               {
                 $PermissionInfo->push('Im');
               }
               //Assessment and report
               if($Permission->assessments_report == 1)
               {
                 $PermissionInfo->push('Av');
               }
               else if($Permission->assessments_report == 2)
               {
                 $PermissionInfo->push('Am');
               }          
               //File
               if($Permission->files == 1)
               {
                 $PermissionInfo->push('Fv'); 
               }
               else if($Permission->files == 2)
               {
                 $PermissionInfo->push('Fm'); 
               }
               //Analytics
               if($Permission->analytics == 1)
               {
                 $PermissionInfo->push('DAv');
               }
               else if($Permission->analytics == 2)
               {
                 $PermissionInfo->push('DAm');
               }   
             }                
        return $PermissionInfo;
    }    
    /*================================== 
    * @brief: Remove Permission by Seat ID
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function RemovePermissionBySeat($SeatID)
    {
        $Permission_List = $this->GetPermission(['seat_id' => $SeatID]);
        foreach($Permission_List as $Info)
        {
           $Info->delete();
        }
    }
    /*================================== 
    * @brief: Remove Permission by Seat ID
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function RemovePermissionByUser($UserID)
    {
        $Permission_List = $this->GetPermission(['user_id' => $UserID]);
        foreach($Permission_List as $Info)
        {
           $Info->delete();
        } 
    }   
    /*================================== 
    * @brief: Transfer All Studnets Permission to new user
    * @paeam_in: $Owner -> Original Owner
    *            $Transferer -> New Owner
    * @return: 
    ===================================*/    
    public function TransferAllStudents($Owner,$Transferer)
    {
        $Permission_List = $this->GetPermission(['user_id' => $Owner]);
        foreach($Permission_List as $Info)
        {
           $Info->user_id = $Transferer;
           $Info->save();
        } 
    }
    /*================================== 
    * @brief: Transfer Student Permission to new user
    * @paeam_in: $Owner -> Original Owner
    *            $Transferer -> New Owner
    *            $Seat -> Special Student       
    * @return: 
    ===================================*/    
    public function TransferStudent($Owner,$SeatID,$Transferer)
    {
        $Permission = $this->GetPermission(['user_id' => $Owner,'seat_id' => $SeatID])->first();        
        if($Permission!=NULL)
        {
            $Permission->user_id = $Transferer;
            $Permission->save();
        }

    }
    /*================================== 
    * @brief: Get Permission by User 
    * @paeam_in: $id -> user Id
    * @return: Permission Information
    ===================================*/      
    public function GetPermissionByUser($id)
    {
      $Permission_Info = $this->GetPermission(['user_id' => $id]);
      $data =  collect([]);
      foreach($Permission_Info as $Permission)
      {
        $SeatInfo = collect([]);
        $SeatEnrty = new Seat_Entity();
        $Seat = $SeatEnrty->find($Permission->seat_id);         
        $SeatInfo->put('ID',$Seat->seat_id);
        $SeatInfo->put('FirstName' ,$Seat->first_name);
        $SeatInfo->put('LastName' ,$Seat->last_name);     
        $SeatInfo->put('OwnerRights' ,$Permission->owner);
        $SeatInfo->put('Coordinator' ,$Permission->coordinator);
        $SeatInfo->put('FullAccess' ,$Permission->full_access);
        $SeatInfo->put('BasicInfo' ,$Permission->basic_info);
        $SeatInfo->put('AssessmentsAndReports' ,$Permission->assessments_report);
        $SeatInfo->put('Files' ,$Permission->files);
        $SeatInfo->put('Analytics' ,$Permission->analytics);
        $data->push($SeatInfo); 
      }
      return $data;
    }
    /*================================== 
    * @brief: Get Permission by Seat 
    * @paeam_in: $id -> seat Id
    * @return: Permission Information
    ===================================*/
    public function GetPermissionBySeat($id)
    {
      $Permission_Info = $this->GetPermission(['seat_id' => $id]);
      $data =  collect([]);
      foreach($Permission_Info as $Permission)
      {
        $UserInfo = collect([]);
        $User = User::find($Permission->user_id);
        $UserInfo->put('ID' , $User->user_id);
        $UserInfo->put('FirstName' ,$User->first_name);
        $UserInfo->put('LastName' ,$User->last_name);
        $UserInfo->put('OrgName' ,$User->org_name);
        $UserInfo->put('OwnerRights' ,$Permission->owner);
        $UserInfo->put('Coordinator' ,$Permission->coordinator);
        $UserInfo->put('FullAccess' ,$Permission->full_access);
        $UserInfo->put('BasicInfo' ,$Permission->basic_info);
        $UserInfo->put('AssessmentsAndReports' ,$Permission->assessments_report);
        $UserInfo->put('Files' ,$Permission->files);
        $UserInfo->put('Analytics' ,$Permission->analytics);
        $data->push($UserInfo); 
      }
      return $data;
    }
    /*================================== 
    * @brief: Update Permission by User ID and Seat ID
    * @paeam_in: $Owner -> Original Owner    
    *            $Seat -> Special Student       
    * @return: 
    ===================================*/    
    public function UpdatePermission($Owner,$SeatID,$UpdateInfo)
    {
      $Remove = array("FullAccess" => "0",
                 "BasicInfo" => "0",
                 "AssessmentsAndReports" => "0",
                 "Files" => "0",
                 "Analytics" => "0") ;
      $Permission = $this->GetPermission(['user_id' => $Owner,'seat_id' => $SeatID])->first();              
      if($Permission!=null)
       {    
           if(empty(array_diff($UpdateInfo,$Remove))==true && $Permission->coordinator==0) 
           {
              $Permission->delete();
           }   
           else
           { 
            if(array_key_exists('OwnerRights',$UpdateInfo) == false)
              {
                 $Permission->owner = 0;
              }     
            else
              {
                 $Permission->owner = 1; 
              }  
            foreach(array_keys($UpdateInfo) as $Info)
               {            
                 switch($Info)
                 {
                    case 'FullAccess':
                         $Permission->full_access= $UpdateInfo[$Info];
                         break;
                    case 'BasicInfo':
                         $Permission->basic_info= $UpdateInfo[$Info];
                         break;          
                    case 'AssessmentsAndReports':
                         $Permission->assessments_report= $UpdateInfo[$Info];
                         break;
                    case 'Files':
                         $Permission->files= $UpdateInfo[$Info];
                         break;
                    case 'Analytics':
                         $Permission->analytics= $UpdateInfo[$Info];
                         break;                          
                 }  
               } 
               $Permission->save(); 
             }                             
       }
      else
      {                        
        if(empty(array_diff($UpdateInfo,$Remove))==false)
        {
          $Permission = new Profile_Permission_Entity();
          $Permission->seat_id = $SeatID;
          $Permission->user_id = $Owner;
          $Permission->owner = 0 ;
          $Permission->coordinator = 0 ;
          $Permission->full_access = 0 ;
          $Permission->basic_info = 0 ;
          $Permission->assessments_report = 0 ;
          $Permission->files = 0 ;
          $Permission->analytics = 0 ;          
          if(array_key_exists('OwnerRights',$UpdateInfo) == false)
          {
             $Permission->owner = 0;
          }     
          else
          {
             $Permission->owner = 1; 
          }            
          foreach(array_keys($UpdateInfo) as $Info)
           {                        
            switch($Info)
             {
                case 'FullAccess':
                     $Permission->full_access= $UpdateInfo[$Info];
                     break;
                case 'BasicInfo':
                     $Permission->basic_info= $UpdateInfo[$Info];
                     break;          
                case 'AssessmentsAndReports':
                     $Permission->assessments_report= $UpdateInfo[$Info];
                     break;
                case 'Files':
                     $Permission->files= $UpdateInfo[$Info];
                     break;
                case 'Analytics':
                     $Permission->analytics= $UpdateInfo[$Info];
                     break;                          
             }  
           } 
           $Permission->save(); 
         }             
      } 
    }    
    /*================================== 
    * @brief: Get Permission by Seat and User
    * @paeam_in: $id   -> seat Id
                 $user -> user Id
                 $Type -> 0 : display user name
                          1 : display Seat name 
    * @return: Permission Information
    ===================================*/
    public function GetPermissionBySeatandUser($id,$user,$mode)
    {
      $Permission_Info = $this->GetPermission(['seat_id' => $id,'user_id' => $user]);      
      if($Permission_Info->count()!=0)
      {
         foreach($Permission_Info as $Permission)
         {
           $UserInfo = collect([]);
           $User = User::find($Permission->user_id);
           $SeatEnrty = new Seat_Entity();
           $Seat = $SeatEnrty->find($Permission->seat_id);
           if($mode == 0 )
           {            
            $UserInfo->put('ID' , $User->user_id);
            $UserInfo->put('FirstName' ,$User->first_name);
            $UserInfo->put('LastName' ,$User->last_name);
           }
           else
           {
             $UserInfo->put('ID' , $Seat->seat_id);
             $UserInfo->put('FirstName' ,$Seat->first_name);
             $UserInfo->put('LastName' ,$Seat->last_name);             
           }
           $UserInfo->put('OrgName' ,$User->org_name);
           $UserInfo->put('OwnerRights' ,$Permission->owner);
           $UserInfo->put('Coordinator' ,$Permission->coordinator);
           $UserInfo->put('FullAccess' ,$Permission->full_access);
           $UserInfo->put('BasicInfo' ,$Permission->basic_info);
           $UserInfo->put('AssessmentsAndReports' ,$Permission->assessments_report);
           $UserInfo->put('Files' ,$Permission->files);
           $UserInfo->put('Analytics' ,$Permission->analytics);
           return $UserInfo;
         }
       }
       else
       {
        $UserInfo = collect([]);
        $User = User::find($user);        
        $SeatEnrty = new Seat_Entity();
        $Seat = $SeatEnrty->find($id);
        if($mode == 0 )
        {            
         $UserInfo->put('ID' , $User->user_id);
         $UserInfo->put('FirstName' ,$User->first_name);
         $UserInfo->put('LastName' ,$User->last_name);
        }
        else
        {
          $UserInfo->put('ID' , $Seat->seat_id);
          $UserInfo->put('FirstName' ,$Seat->first_name);
          $UserInfo->put('LastName' ,$Seat->last_name);             
        }
        $UserInfo->put('OrgName' ,$User->org_name);
        $UserInfo->put('OwnerRights' ,0);
        $UserInfo->put('Coordinator' ,0);
        $UserInfo->put('FullAccess' ,0);
        $UserInfo->put('BasicInfo' ,0);
        $UserInfo->put('AssessmentsAndReports' ,0);
        $UserInfo->put('Files' ,0);
        $UserInfo->put('Analytics' ,0);
        return $UserInfo;
       }
    }      
    /*================================== 
    * @brief: Add Profile Coordinator Permission
    * @paeam_in: $User,$Seat
    * @return: Permission information
    ===================================*/
    public function Add_PC_Permission($User,$SeatID)
    {
      $Permission = new Profile_Permission_Entity();
      $Permission->seat_id = $SeatID;
      $Permission->user_id = $User;
      $Permission->owner = 0 ;
      $Permission->coordinator = 1 ;
      $Permission->full_access = 0 ;
      $Permission->basic_info = 0 ;
      $Permission->assessments_report = 0 ;
      $Permission->files = 0 ;
      $Permission->analytics = 0 ;  
      $Permission->save();         
    }
    /*================================== 
    * @brief: Change Coordinator Permission
    * @paeam_in: $Original,$Seat,$Newer
    * @return: 
    ===================================*/
    public function Change_Coordinator($Original,$Seat,$Newer)
    {
      //  dd([$Original,$Seat,$Newer]);
       $CurrentCoordinator = $this->GetPermission(['seat_id' => $Seat,'user_id' => $Original,'coordinator'=>1])->first();       
       $NewCoordinator = $this->GetPermission(['seat_id' => $Seat,'user_id' => $Newer])->first();
       $CurrentCoordinator->coordinator = 0;
       $CurrentCoordinator->save();   
       $this->Review_Permission($CurrentCoordinator->permission_id);                  
       if($NewCoordinator != NULL) // No Record for New
       {
          $NewCoordinator->coordinator = 1;
          $NewCoordinator->save();
       }
       else
       {        
         $Permission = new Profile_Permission_Entity();
         $Permission->seat_id = $Seat;
         $Permission->user_id = $Newer;
         $Permission->owner=0;
         $Permission->coordinator=1;
         $Permission->full_access=0;
         $Permission->basic_info=0;
         $Permission->assessments_report=0;
         $Permission->files=0;
         $Permission->analytics=0;
         $Permission->save();
       }
    }
    /*================================== 
    * @brief: Review  Permission
    * @paeam_in: $id
    * @return: 
    ===================================*/    
    public function Review_Permission($id) 
    {
       $Permission = $this->GetPermission(['permission_id' => $id])->first();
       if($Permission->owner == 0 && 
          $Permission->coordinator == 0 &&
          $Permission->full_access == 0 && 
          $Permission->basic_info == 0 && 
          $Permission->assessments_report ==0 &&
          $Permission->files ==0 &&
          $Permission->analytics ==0 )
          {
             $Permission->delete();
          }
    }
}
