<?php

namespace App\Services;

use App\Repositories\UserRepo;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Services\ProfilePermissionService as Permission; 
use App\Services\UtilsService as Utils; 
use App\Services\MailService;
use Auth;
use App\User;
use App\Entites\Verified_Information_Entity as VI;
use App\Enums\UserRole;
use App\Enums\Verified_Information as VI_Enum;

class UserService 
{
    
    /*
    * ====== Local Parameter ========= 
    */    
    protected $user_repo;
    protected $Permission_service;
    protected $Utils;    
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->user_repo = new UserRepo();
        $this->Permission_service = new Permission(); 
        $this->Utils = new Utils();       
    }
    
    /*================================== 
    * @brief: get user information form database
    * @paeam_in: user_id
    * @return: data -> user information collect array 
    ===================================*/
    public function UserProfile($id)
    {
       $user_profile = User::find($id);
       if($user_profile!= null && $user_profile->role != -1)
       {
        $data = collect([
               "ID" => $user_profile->user_id,
               "Org" => $user_profile->org_id,
               "Role" => $user_profile->role,
               "Organization" => $user_profile->org_name,
               'CreateDate' => $this->Utils->GetDateByFormat($user_profile->created_at),
               'FirstName' => $user_profile->first_name,
               'LastName'  => $user_profile->last_name,
               'Phone'  => $user_profile->phone_number,
               'Email'  => $user_profile->email,
               'Language' => $user_profile->language,
               'DateFormat' =>$user_profile->date_format,
               'NameFormat' =>$user_profile->name_format,
               'ShowHelp' =>$user_profile->show_help,
               'TimeOut' =>$user_profile->timeout,
               'AssessmentEdit' => $user_profile->assessment_editmode,
               'TimeZone' => $user_profile->time_zone,
               'Layout' => $user_profile->layout_format,
               'Blocked' => $user_profile->blocked,
               'Note' => $user_profile->note,
           ]);
        $Permission = $this->Permission_service->CheckUserCanDelete($id);           
        $data ->put('CanDelete',$Permission);
        return $data;
       }
       else
       {
          return null; 
       }
    }
    /*================================== 
    * @brief: Change user password
    * @paeam_in: $check_password -> current password
                 $new_password -> replace password
    * @return: $result -> change password result
    ===================================*/    
    public function ChangePassword($check_password,$new_password)
    {
       $current_password = Auth::user()->password;
       if(Hash::check($check_password,$current_password))
      {           
        Auth::user()->password = Hash::make($new_password);
        Auth::user()->save();
        $result = collect([
            "ChangeResult" => 'OK',
            'Message' => 'Your password has been updated',
        ]);
        return $result;

      }
      else
      {           
        $result = collect([
            "ChangeResult" => 'ERROR',
            'Message' => 'Entered current password is invalid',
        ]);
        return $result;   
      }
    }
    /*================================== 
    * @brief: Set user password
    * @paeam_in: $new_password -> replace password
    * @return: $result -> change password result
    ===================================*/    
    public function SetUserPassword($id,$password)
    {
       $UserInfo = User::find($id);
       $UserInfo->password = Hash::make($password);
       $UserInfo->save();

    }
    /*================================== 
    * @brief: Update user inform
    * @paeam_in: $request -> update information
    * @return: $result -> Update result.
    ===================================*/    
    public function UpdateUserInfo($id,Request $request)
    {
      $User = User::find($id);
      $User->first_name = $request->FirstName;
      $User->last_name = $request->LastName;
      $User->phone_number = $request->PhoneNumber;
      $User->date_format = $request->Date_Format;
      $User->name_format = $request->Name_Format;
      if($request->Hideshorthelp)
         {
          $User->show_help = 1;
         }
      else
        {
          $User->show_help = 0;
        }
        $User->timeout = $request->Timeout;
        $User->assessment_editmode = $request->EditMode;
        $User->layout_format = $request->Layout;
        $User->time_zone = $request->TimeZone;
        $User->note = $request->Notes;      
        $User->save();
      $result = collect([
        "ChangeResult" => 'OK',
        'Message' => 'Changes have beed saved',
      ]);
       return $result;
    }    
    /*================================== 
    * @brief: Update user eamil
    * @paeam_in: $request -> update information                 
    * @return: $result -> Update result.
    ===================================*/    
    public function ChangeEmail(Request $request)
    {

      $ValidatorEmail = User::where('email','=',$request->New_email)->first();
       if($ValidatorEmail != NULL)
      {
        $result = collect([
          "ChangeResult" => 'ERROR',
          'Message' => 'Email already exist',
        ]);                  

      }
      else
      {
        Auth::user()->email = $request->New_email;
        Auth::user()->save();
        $result = collect([
          "ChangeResult" => 'OK',
          'Message' => '',
        ]);                  
      }
      return $result;
    }
    /*================================== 
    * @brief: Update user Language
    * @paeam_in: $request -> update information                 
    * @return: $result -> Update result.
    ===================================*/    
    public function ChangeLanguage(Request $request)
    {
      if(Auth::user()->language != $request->Language)
      {
        Auth::user()->language = $request->Language; 
        Auth::user()->save();
        $result = collect([
          "ChangeResult" => 'OK',
          'Message' => 'You Language has been changed.',
        ]);
      }
      else
      {
        $result = collect([
          "ChangeResult" => 'ERROR',
          'Message' => '',
        ]);
      }
      return $result;
    }
    /*================================== 
    * @brief: Get Organization Member with Role
    * @paeam_in: $Ord_id -> Organization ID
    *            $Role -> User Role type  
    * @return: $member -> Search result.
    ===================================*/    
    public function OrgMemberInfo($Org_id,$Role)
    {
       
      $memberList = $this->user_repo->GetUser_With_Org_Role($Org_id,$Role);
      $Info = collect([]);
      foreach($memberList as $member)
      {                
        $Info->push(['ID' => $member->user_id,'FirstName'=>$member->first_name,'LastName'=>$member->last_name,
                    'Email'=>$member->email,'Role'=>UserRole::getDescription($member->role)]);
      }
       return $Info;
    }
    /*================================== 
    * @brief: Create New Admin User
    * @paeam_in: $UserInfo -> new Admin  information
    * @return: 
    ===================================*/  
    public function CreateAdminUser($UserInfo)
    {
      $password = substr(md5(uniqid(rand(), true)),0,12);
      $user = new User();
      $user->org_id = $UserInfo->get('org_id');
      $user->org_name = $UserInfo->get('org_name');
      $user->first_name = $UserInfo->get('FirstName');
      $user->last_name = $UserInfo->get('LastName');
      $user->phone_number='';
      $user->email = $UserInfo->get('Email');
      $user->role = $UserInfo->get('role');       
      $user->language = 0;
      $user->date_format = 0;
      $user->name_format = 0;
      $user->show_help = 0;
      $user->timeout = 0;
      $user->assessment_editmode = 0;
      $user->layout_format = 0;
      $user->time_zone = '';
      $user->blocked = 0;        
      $user->password = Hash::make($password);
      $user->save();
      //Send Email Vilified 
      $Wait_Vilified_User =  User::where('email',$UserInfo->get('Email'))->first();      
      $Vified_Info = new VI();
      $Vified_Info->user_id = $Wait_Vilified_User->user_id;
      $Vified_Info->mode = VI_Enum::EmailVilified();
      $word = 'abcdefghijkmnpqrstuvwxyz-=ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
      $len = strlen($word);
      $uuid="";
      for ($i = 0; $i < 26; $i++) 
      {
       $uuid .= $word[rand() % $len];
      }
      $Vified_Info->uuid = $uuid;
      $Vified_Info->password = $password;
      $Vified_Info->save();
      
      $Info = collect([]);
      $Info->put('email',$user->email);
      $Info->put('password', $Vified_Info->password);
      $Info->put('name',$user->first_name.' '.$user->last_name);      
      $Sender = new MailService();        
      $Sender->SendRegisterMail($Info); 


    }
    /*================================== 
    * @brief: Add New User profile
    * @paeam_in: $request -> new user  information
    * @return: $result -> add new user result.
    ===================================*/  
    public function AddNewUser(Request $request)
    {
      
      $ValidatorEmail = User::where('email','=',$request->New_email)->first();
       if($ValidatorEmail != NULL)
      {
        $result = collect([
          "AddResult" => 'ERROR',
          'Message' => 'Email already exist',
        ]);                  

      }
      else
      {
        
        $password = substr(md5(uniqid(rand(), true)),0,12);
        $user = new User();
        $user->org_id = Auth::user()->org_id;
        $user->org_name = Auth::user()->org_name;
        $user->first_name = $request->FirstName;
        $user->last_name = $request->LastName;
        $user->phone_number='';
        $user->email = $request->New_email;
        $user->role = $request->Account_Role;        
        $user->language = $request->Preferred_Language;
        $user->date_format = 0;
        $user->name_format = 0;
        $user->show_help = 0;
        $user->timeout = 0;
        $user->assessment_editmode = 0;
        $user->layout_format = 0;
        $user->time_zone = '';
        $user->blocked = 0;        
        $user->password = Hash::make($password);
        $user->save();
        $result = collect([
          "AddResult" => 'OK',
          'Message' => $user->user_id,
        ]);
      //Send Email Vilified 
      $Wait_Vilified_User =  User::where('email',$request->New_email)->first();      
      $Vified_Info = new VI();
      $Vified_Info->user_id = $Wait_Vilified_User->user_id;
      $Vified_Info->mode = VI_Enum::EmailVilified();
      $Vified_Info->uuid = Hash::make(md5(uniqid(rand(), true)));
      $Vified_Info->password = $password;
      $Vified_Info->save();
      
      $Info = collect([]);
      $Info->put('email',$user->email);
      $Info->put('password', $Vified_Info->password);
      $Info->put('name',$request->FirstName.' '.$request->LastName);      
      $Sender = new MailService();        
      $Sender->SendRegisterMail($Info); 

      }       
      return $result;
    }  
    /*================================== 
    * @brief: Check Email is Unique
    * @paeam_in: $Email -> Confirm Email address
    * @return: $result -> True or False.
    ===================================*/  
    public function EmailIsUnique($Email)
    {
      $ValidatorEmail = User::where('email','=',$Email)->first();
      if($ValidatorEmail!=NULL)
      {
        return false;        
      }
      else
      {
        return true;
      }
    }
    /*================================== 
    * @brief: Check User is Admin
    * @paeam_in: $id -> Confirm User Is Admin or not
    * @return: $result -> True or False.
    ===================================*/  
    public function UserIsAdmin($id)
    {
      $UserInfo = User::find($id);
      if($UserInfo->role!=2)
      {
        return false;        
      }
      else
      {
        return true;
      }
    }    
    /*================================== 
    * @brief: Update User Bolck Status
    * @paeam_in: $id -> user id
    *            $status -> User Block Status
    * @return: $result -> add user result
    ===================================*/    
    public function UpdateUserBlockStauts($id,$status)
    {
      $BlockedUser = User::find($id);
      if($BlockedUser != null)
      {
        $BlockedUser->blocked = $status;
        $BlockedUser->save();
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    /*================================== 
    * @brief: Update User Role
    * @paeam_in: $id -> user id
    *            $role -> role
    * @return: $result -> change result
    ===================================*/    
    public function UpdateUserRole($id,$role)
    {
      $User = User::find($id);
      if($User != null)
      {
        $User->role = $role;
        $User->save();
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    /*================================== 
    * @brief: Conver Role Display
    * @paeam_in: $Role -> $Role Type
    * @return: $Role Text -> Conver Result.
    ===================================*/  
    public function TransferRoleType($Role)
    {
       switch($Role)
       {
         case 1:
              return "Standard User";
         case 2:
              return "Organization Administrator";
         default:
              return "Restricted User";
       }
    }
    /*================================== 
    * @brief: Get Profile Coordinator List 
    * @paeam_in: $Role -> $Role Type
    * @return: $Role Text -> Conver Result.
    ===================================*/      
    public function GetPCList($PC,$CurrentUser)
    {
      $PC_List = collect([]);
      $PC_User = $this->UserProfile($PC);      
      $AuthUser = $this->UserProfile($CurrentUser);      
      if($PC == $CurrentUser)
      {
        $Member = $this->OrgMemberInfo($PC_User->get('Org'),UserRole::WithoutRestricted()->value)->filter(function ($Info) use ($PC){            
            if($Info['ID'] != $PC)
              {
                return $Info;
              }

        });
        $PC_List->push(collect(['ID' => $PC,'Name' => 'ME']));                       
        foreach($Member as $m)
        {          
          $tmp = collect([]);
          $tmp->put("ID",$m['ID']);
          $tmp->put("Name",$this->Utils->GetNameByFormat($m['FirstName'], $m['LastName']));             
          $PC_List->push($tmp);               
        }
      }
      else if($AuthUser['Role']== UserRole::Administrator()->value && $AuthUser['Org'] == $PC_User['Org'])
      {
        $Member = $this->OrgMemberInfo($PC_User->get('Org'),UserRole::WithoutRestricted()->value)->filter(function ($Info) use ($PC){            
          if($Info['ID'] != $PC)
            {
              return $Info;
            }

         });
         $PC_List->push(collect(['ID' => $PC,'Name' => $this->Utils->GetNameByFormat($PC_User->get('FirstName'), $PC_User->get('LastName'))]));                       
         foreach($Member as $m)
         {          
           $tmp = collect([]);
           $tmp->put("ID",$m['ID']);
           if($CurrentUser != $m['ID'])
           {        
             $tmp->put("Name",$this->Utils->GetNameByFormat($m['FirstName'], $m['LastName']));   
           }
           else
           {
            $tmp->put("Name",'ME');   
           }
           $PC_List->push($tmp);               
         }
      }
      else
      {        
        $tmp = collect([]);
        $tmp->put("ID",$PC_User->get('ID'));
        $tmp->put("Name",$this->Utils->GetNameByFormat($PC_User->get('FirstName'), $PC_User->get('LastName')));     
        $PC_List->push($tmp);   
      }            
      return $PC_List;
    }
    /*================================== 
    * @brief: Reset Password 
    * @paeam_in: $id
    * @return: 
    ===================================*/   
    public function ResetPassword($id)
    {
      $User = User::where('user_id','=',$id)->first();
      if($User != null && $User->role != -1)
      {
        $password = substr(md5(uniqid(rand(), true)),0,12);
        $User->password = Hash::make($password); 
        $User->save();       
        $Vified_Info = new VI();
        $Vified_Info->user_id = $User->user_id;
        $Vified_Info->mode = VI_Enum::EmailVilified();
        $Vified_Info->uuid = Hash::make(md5(uniqid(rand(), true)));
        $Vified_Info->password = $password;
        $Vified_Info->save();
        $Info = collect([]);
        $Info->put('email',$User->email);        
        $Info->put('name',$User->first_name.' '.$User->last_name);   
        $Info->put('link',url('password/reset/'.$Vified_Info->uuid));   
        $Sender = new MailService();        
        $Sender->SendRestPasswordMail($Info); 
      }
    }   
}
