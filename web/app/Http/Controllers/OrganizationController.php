<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Http\File;
use App\Services\OrganizationService as Organization; 
use App\Services\UserService as User; 
use App\Services\SeatService as Seat; 
use App\Services\ProfilePermissionService as Permission; 
use App\Services\ContactListService as ContactList; 
use App\Services\StudentService as Student; 
use Auth;
use App\Enums\SeatStatus;
use App\Enums\UserStatus;
use App\Enums\UserRole;


class OrganizationController extends Controller
{
    /*
    * ====== Local Parameter ========= 
    */        
    protected $Org_service;    
    protected $User_service;
    protected $Seat_service;
    protected $Permission_service;
    protected $Contact_service;
    protected $Student_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        $this->Org_service = new Organization();
        $this->User_service = new User();
        $this->Seat_service = new Seat();
        $this->Permission_service = new Permission();
        $this->Contact_service = new ContactList();
        $this->Student_service = new Student();    
        

    }
    /*================================== 
    * @brief: Display Organaztion Main Screen
    * @paeam_in: 
    * @return: Organization detail information
    ===================================*/     
    public function showDeatail()
    {
        $Info = $this->Org_service->GetInfo();
        // dd($Info);        
        return view('Organization_View')->with('Info',$Info);
    }

    /*================================== 
    * @brief: Display Organaztion Setting Screen
    * @paeam_in: 
    * @return: Organization Setting information
    ===================================*/     
    public function showSetting()
    {
        $Info = $this->Org_service->GetInfo();
        // dd($Info->get('Timeout'));
        return view('Organization_Settings')->with('Setting',$Info->get('Timeout'));
    }
    
    /*================================== 
    * @brief: Display Organaztion all user Screen
    * @paeam_in: 
    * @return: Organization User information
    ===================================*/     
    public function showUsers()
    {
        $UserInfo = $this->User_service->OrgMemberInfo(Auth::user()->org_id,UserRole::AllMember()->value);
        //dd($UserInfo);
        return view('Organization_User_List')->with('Member',$UserInfo);
    }
    /*================================== 
    * @brief: Display Organaztion address Screen
    * @paeam_in: 
    * @return: 
    ===================================*/     
    public function showAddress()
    {
        $AddressInfo = $this->Org_service->GetAddress(Auth::user()->org_id);
        //dd($AddressInfo);
        return view('Organization_Addresses')->with('Address',$AddressInfo);
    }
    /*================================== 
    * @brief: Display Archived Students Screen
    * @paeam_in: 
    * @return: 
    ===================================*/     
    public function showArchivedStudnet()
    {
        $ArchivedData = $this->Seat_service->ArchivedInfo(Auth::user()->org_id);        
        //dd($ArchivedData);
        return view('Organization_Archived_Students')->with(['ArchivedData'=> $ArchivedData,'Unarchive'=>$this->Org_service->CanAddSeats()]);
    }    
    /*================================== 
    * @brief: Display AddUser Screen
    * @paeam_in: 
    * @return: 
    ===================================*/     
    public function showAddUsers()
    {
        return view('Organization_AddUser')->with('Result',collect([
            "AddResult" => 'PANDING',
            'Message' => '',]));
    }    
    /*================================== 
    * @brief: Display All Students Screen
    * @paeam_in: 
    * @return: 
    ===================================*/     
    public function showStudent()
    {
        $SeatData = $this->Seat_service->OrgSeatInfo(Auth::user()->org_id);
        //dd($SeatData);
        return view('Organization_Student_Roster')->with('SeatData',$SeatData);
    }     
    /*================================== 
    * @brief: Display Student Parameter Screen
    * @paeam_in: 
    * @return: 
    ===================================*/     
    public function showStudentPara()
    {
        $SPData = $this->Org_service->GetStudnetParameterInformation(Auth::user()->org_id);
        //dd($SPData);
        return view('Organization_Student_Parameters')->with('SPData',$SPData);
    }         
    /*================================== 
    * @brief: Display User Profile Screen
    * @paeam_in: 
    * @return: 
    ===================================*/     
    public function ShowUserProfile($UserID)
    {
        $Profile = $this->User_service->UserProfile($UserID);
        //dd($Profile);
        if($Profile != null) 
        {          
          return view('Organization_Manage')->with('User',$Profile);
        }
        else
        {
            return redirect(url('Organization/Users'));
        }
    }         
    /*================================== 
    * @brief: Display Set User Password Screen
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function ShowSetUserPassword($UserID)
    {
      
        $Profile = $this->User_service->UserProfile($UserID);
        //dd($Profile);
        if($Profile != null) 
        {          
          return view('Organization_Manage_Set_User_Password')->with('User',$Profile); 
        }
        else
        {
            return redirect(url('Organization/Users'));
        }        
      
    }
    /*================================== 
    * @brief: Display All Student by User Screen
    * @paeam_in: $id -> User id
    * @return: view and all student information
    ===================================*/    
    public function ShowUserAllStudent($UserID)
    {        
        $StudentData =$this->Org_service->GetAllSeatByUser($UserID);
        //dd($StudentData);                 
        $Profile = $this->User_service->UserProfile($UserID);
        //dd($Profile);                 
        return view('Organization_Manage_Students')->with(['User' => $Profile,'AS'=> $StudentData['AS'], 'SS' => $StudentData['SS'] , 'OS' => $StudentData['OS'] ]);
    }
    /*================================== 
    * @brief: Display User Role Screen
    * @paeam_in: $id -> User id
    * @return: view and user information
    ===================================*/    
    public function ShowUserRole($UserID)
    {
        $Profile = $this->User_service->UserProfile($UserID);
        //dd($Profile);                 
        return view('Organization_Manage_Change_Role')->with(['User' => $Profile]);
    }
    /*================================== 
    * @brief: Display Replace All Screen
    * @paeam_in: $id -> User id
    * @return: view and userformation
    ===================================*/
    public function ShowReplaceAll($UserID)
    {
        $Profile = $this->User_service->UserProfile($UserID);
        //dd($Profile);                 
        $members = $this->User_service->OrgMemberInfo($Profile->get('Org'),UserRole::WithoutRestricted()->value);
        //dd($members);                 
        $student = collect([]);        
        $student->push([                     
            'ID' => '',
            'Name' => 'All Student',
            'Gender' => '',
            'DOB' => '',
            'Location'=>''
           ]);
        return view('Organization_Manage_ReplaceAll')->with(['User' => $Profile,'Member'=>$members,'Student'=>$student]);       
    }    
    /*================================== 
    * @brief: Display Replace All Screen
    * @paeam_in: $id -> User id
    * @return: view and userformation
    ===================================*/
    public function ShowReplace($UserID,$SeatID)
    {
        $Profile = $this->User_service->UserProfile($UserID);
        //dd($Profile);                 
        $members = $this->User_service->OrgMemberInfo($Profile->get('Org'),UserRole::WithoutRestricted()->value);
        //dd($members);                 
        $student = $this->Seat_service->GetSeatInfo($SeatID);
        //dd($student);
        return view('Organization_Manage_ReplaceAll')->with(['User' => $Profile,'Member'=>$members,'Student'=>$student]);         
    }
    /*================================== 
    * @brief: Display OpenOrder Screen
    * @paeam_in: 
    * @return: 
    ===================================*/    
    
    public function showOpenOrder()
    {
      
        return view('Organization_OpenOrder');
    }
    
    /*================================== 
    * @brief: Display Orders Screen
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function ShowOrders()
    {
      
        return view('Organization_Orders');
    }    
    /*================================== 
    * @brief: Display Student Share Permission Screen
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function showStudentPermission($SeatID)
    {     
        $student = $this->Seat_service->GetSeatInfo($SeatID);
        $UserInfo = $this->User_service->OrgMemberInfo(Auth::user()->org_id,UserRole::AllMember()->value);
        $Author = $this->Permission_service->GetPermissionBySeat($SeatID); 
        $ContactMember = $this->Contact_service->GetUserContactList(Auth::user()->user_id); 
        $Contact=collect([]);
        foreach($ContactMember as $Member)
        {
            $Permission = $this->Permission_service->GetPermissionBySeatandUser($SeatID,$Member,0);
            $Contact->push($Permission);
        }
        $OrgMember = collect([]);
        $SupportMember = collect([]);
        foreach($UserInfo as $temp)
        {            
            // if($temp['ID'] != Auth::user()->user_id)
            // {                
                $Permission = $this->Permission_service->GetPermissionBySeatandUser($SeatID,$temp['ID'],0);                
                if($temp['Role']==UserRole::getDescription(UserRole::Administrator()->value))
                  {
                      $Permission->put("Role",UserRole::Administrator()->value);
                  }
                else if($temp['Role']==UserRole::getDescription(UserRole::Standard()->value))
                  {
                    $Permission->put("Role",UserRole::Standard()->value);
                  }
                else
                  {
                    $Permission->put("Role",UserRole::Restricted()->value);   
                  }                
                $OrgMember->push($Permission);
            // }
            if($temp['Role'] == UserRole::getDescription(UserRole::Administrator()->value))
            {                
                $Permission = $this->Permission_service->GetPermissionBySeatandUser($SeatID,$temp['ID'],0);
                $SupportMember->push($Permission);
            }
        }        
        //dd(['Author' => $Author,'Contact' => $Contact,'OrgMember' => $OrgMember,'Supporter' => $SupportMember]);
        return view('Organization_Student_Roster_Share_Permissions')->with(['Student'=>$student,'Author' => $Author,'Contact' => $Contact,'OrgMember' => $OrgMember,'Supporter' => $SupportMember]);;
    }
    /*================================== 
    * @brief: Display User Share Permission Screen
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function ShowUserPermission($UserID)
    {
        $Profile = $this->User_service->UserProfile($UserID);
        //dd($Profile);
        $Seats = collect([]);
        $SeatData = $this->Seat_service->OrgSeatInfo($Profile->get('Org'));
        foreach($SeatData as $S)
        {
           $Info = $this->Permission_service->GetPermissionBySeatandUser($S['ID'],$UserID,1);
           $Seats->push($Info);
        }        
        //dd($Seats);
        return view('Organization_Manage_Share_Permissions')->with(['User' => $Profile, 'Seat' => $Seats]);
    }
    /*================================== 
    * @brief: Display Student Profile Screen
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function ShowStudentProfile($SeatID)
    {
        $student = $this->Seat_service->GetSeatInfo($SeatID);
        $Profile = $this->Student_service->GetStuedntInformation($SeatID);       
        $PC_List = $this->User_service->GetPCList($Profile->get('PC'),Auth::user()->user_id);
        $SPData = $this->Org_service->GetStudnetParameterInformation(Auth::user()->org_id);
        return view('Organization_Student_Roster_Edit_Profile')->with(['Student' => $student,'Profile' => $Profile,'Coordinator' => $PC_List,'SPData'=> $SPData]);
    }
    /*================================== 
    * @brief: Display Student Profile Screen
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function ShowStudentHistory($SeatID,Request $request)
    {        
        $student = $this->Seat_service->GetSeatInfo($SeatID);        
        if(array_key_exists('filter',$request->all()))
        {
         $filter=$request->filter;   
         $Info = $this->Student_service->GetSeatHistoryRecords($SeatID);
         $Info['FullHistory'] = $Info['FullHistory']->filter(function ($value, $key) use ($filter) {                    
            list($c_year,$c_month) = explode('/',$filter);
            if(Auth::user()->date_format == 0)
               list($o_month,$o_day, $o_year) = explode('/',$value['Date']);
            else   
               list($o_day,$o_month, $o_year) = explode('/', $value['Date']);
            if($c_year==$o_year && $c_month == $o_month)
              {
                  return $value;
              }
          });                              
        }
        else
        {
          $Info = $this->Student_service->GetSeatHistoryRecords($SeatID);
        }
        return view('Organization_Student_Roster_View_History')->with(['Student' => $student,'Records'=>$Info['FullHistory'],'History'=>$Info['ShortHistory']]);
    }
    /*================================== 
    * @brief: Display Student Profile Screen
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function ShowBulletinBoard()
    {
        $Data = $this->Org_service->GetBulletinBoardInfo();        
        return view('Organization_Bulletin_Board')->with(['Bulletin'=>$Data]);
    }        
    /*================================== 
    * @brief: Update Organization Timeout Setting
    * @paeam_in: 
    * @return: 
    ===================================*/     
    public function UpdateTimeout(Request $request)
    {
        $this->Org_service->UpdateTimeoutSetting($request->Timeout);
        return redirect(url('Organization/View'));
    }            
    /*================================== 
    * @brief: Add New User 
    * @paeam_in: $request -> user information
    * @return: $result -> add user result
    ===================================*/     
    public function AddNewUser(Request $request)
    {        
      $message = $this->User_service->AddNewUser($request);
      //dd($message);
      if($message->get('AddResult') == 'ERROR')
      {
        return view('Organization_AddUser')->with('Result',$message);
      }
      else
      {
       if(empty($request->only("Add_User_Account")))
        {
          return redirect(url('Organization/Manage/UserLinks/'.$message->get('Message')));
        }
       else
        {
         return redirect(url('Organization/Users'));
        }
      }
    }   
    /*================================== 
    * @brief: Delete User   
    * @paeam_in: $id -> UnBlocked User ID
    * @return: $result -> Change User Block Status
    ===================================*/    
    public function DeleteUser($id)
    {      
       $this->Org_service->RemoveUser($id);       
       return response('Delete User Success',200);
    }    
    /*================================== 
    * @brief: Set User Password
    * @paeam_in: $id -> User id
    * @return: Redirect to User List
    ===================================*/    
    public function SetUserPassword(Request $request, $UserID)
    {
       if($this->User_service->UserIsAdmin(Auth::id()))
       {
           $this->User_service->SetUserPassword($UserID,$request->NewPassword);
       }
       return redirect(url('Organization/Users')); 
    }
    /*================================== 
    * @brief: Update Special User information
    * @paeam_in: $id -> User id
    *            $request -> Update information
    * @return: Redirect to Manage Account screen
    ===================================*/
    public function UpdateUserProfile(Request $request, $User)
    {
        $this->User_service->UpdateUserInfo($User,$request);        
        return redirect(url('Organization/Manage/'.$User));
    }
    /*================================== 
    * @brief: Update Special User Role
    * @paeam_in: $id -> User id
    *            $request -> Update information
    * @return: Redirect to Manage Account screen
    ===================================*/
    public function UpdateUserRole(Request $request, $User)
    {
        //dd($request->select_new_role);
        $this->User_service->UpdateUserRole($User,$request->select_new_role);        
        return redirect(url('Organization/Manage/Type/'.$User));
    }    

    /*================================== 
    * @brief: Unarchive Seat 
    * @paeam_in: $id -> Seat ID
    * @return: Refreash Archive Students
    ===================================*/
    public function UnarchiveStudents($SeatID)
    {       
       if($this->Org_service->SetSeatArchiveStatus($SeatID,SeatStatus::UNARCHIVED()))
         {
            return response('Unarchive Seat Success',200);
         }
        else
         {
            return response('Unarchive Seat Fail',400);
         }
    }
    /*================================== 
    * @brief: Archive Seat 
    * @paeam_in: $id -> Seat ID
    * @return: Refreash Archive Students
    ===================================*/
    public function ArchiveStudents($SeatID)
    {
       if($this->Org_service->SetSeatArchiveStatus($SeatID,SeatStatus::ARCHIVED()))
         {
            return response('Unarchive Seat Success',200);
         }
        else
         {
            return response('Unarchive Seat Fail',400);
         }

    }    
    /*================================== 
    * @brief: Delete Seat 
    * @paeam_in: $id -> Seat ID
    * @return: Refreash Archive Seat
    ===================================*/ 
    public function DeleteArchivedStudents($SeatID)
    {
        if($this->Org_service->RemoveArchivedSeat($SeatID))
        {
           return response('Delete Seat Success',200);
        }
       else
        {
           return response('Delete Seat Fail',400);
        }
    }  
    /*================================== 
    * @brief: Setting Block User   
    * @paeam_in: $id -> Blocked User ID
    * @return: $result -> Change User Block Status
    ===================================*/    
    public function BlockUser($UserID)
    {
        if($this->User_service->UpdateUserBlockStauts($UserID,UserStatus::Blocked()))
        {
             return response('Block Success',200);
                    
        }
        else
        {
            return response('Block Fail',400);
        }
    }
    /*================================== 
    * @brief: Setting UnBlock User   
    * @paeam_in: $id -> UnBlocked User ID
    * @return: $result -> Change User Block Status
    ===================================*/    
    public function UnBlockUser($UserID)
    {
        if($this->User_service->UpdateUserBlockStauts($UserID,UserStatus::UnBlocked()))
        {
             return response('UnBlock Success',200);
                    
        }
        else
        {
            return response('UnBlock Fail',400);
        }
    } 
    /*================================== 
    * @brief: Delete Organization Bill Address
    * @paeam_in: $id -> Bill Address ID
    * @return: $result -> Delete Success or not.
    ===================================*/    
    public function DeleteAddress($Address_ID)
    {
        if($this->Org_service->DeleteOrganizationAddress($Address_ID))
        {
             return response('Delete Organization Address Success',200);
                    
        }
        else
        {
            return response('Delete Organization Address  Fail',400);
        }
    }
    /*================================== 
    * @brief: Update Organization Bill Address
    * @paeam_in: $id -> Bill Address ID
    *            $request -> Address information 
    * @return: $result -> Delete Success or not.
    ===================================*/    
    public function UpdateAddress($Address_ID,Request $request)
    {
        $this->Org_service->UpdateOrganizationAddress($Address_ID,$request->all());
        return redirect(url('Organization/Addresses'));
    }
    /*================================== 
    * @brief: Add Organization Bill Address
    * @paeam_in: $request -> Address information 
    * @return: $result -> Delete Success or not.
    ===================================*/    
    public function AddNewAddress(Request $request)
    {
        $Info = $request->all();
        $Info = Arr::add($Info,'Org_id',Auth::User()->org_id);        
        $this->Org_service->AddNewOrganizationAddress($Info);
        return redirect(url('Organization/Addresses'));
    }    
    /*================================== 
    * @brief: Update User Permission information
    * @paeam_in: $ID -> User ID
    *            $request -> student permission update information
    * @return: TURE/FALSE
    ===================================*/    
    public function UpdateUserPermission($ID, Request $request)
    {                
        foreach(array_keys($request->SP) as $SeatID)
        {                        
            $this->Permission_service->UpdatePermission($ID,$SeatID,$request->SP[$SeatID]) ;
        }        
        return redirect(url('Organization/Manage/UserLinks/'.$ID));          
    }
    /*================================== 
    * @brief: Transfer User Permission information
    * @paeam_in: $ID -> User ID
    *            $request -> Transfer ID
    * @return: TURE/FALSE
    ===================================*/
    public function TransferUserPermission($UserID,Request $request)
    {
        $this->Permission_service->TransferAllStudents($UserID,$request->rights_transfer);  
        return redirect(url('Organization/Manage/ReplaceAll/'.$UserID)); 
    }
    /*================================== 
    * @brief: Transfer User Permission information
    * @paeam_in: $ID -> User ID
    *            $request -> Transfer ID
    * @return: TURE/FALSE
    ===================================*/
    public function TransferSeatPermission($UserID,$SeatID,Request $request)
    {
        $this->Permission_service->TransferStudent($UserID,$SeatID,$request->rights_transfer);  
        return redirect(url('Organization/Manage/Students/'.$UserID)); 
    }
    /*================================== 
    * @brief: Update Student Parameter Value
    * @paeam_in: 
    *            $request -> Transfer ID
    * @return: TURE/FALSE
    ===================================*/    
    public function UpdateStudentPara(Request $request)
    {
        $this->Org_service->UpdateStudnetParameter(Auth::user()->org_id,$request->SP);
        return redirect(url('Organization/StudentParameter'));
    }
    /*================================== 
    * @brief: Update Student Permission by Seat
    * @paeam_in: $Seat_id ->
    *            $request -> Transfer ID
    * @return: TURE/FALSE
    ===================================*/    
    public function UpdateStudentPermission($id,Request $request)
    {       
      foreach($request->get($request->target) as $ID=>$Info)
      {                
        $this->Permission_service->UpdatePermission($ID,$id,$Info) ;
      }    
      return redirect($request->url());
    }
    /*================================== 
    * @brief: Update Student Permission by Seat
    * @paeam_in: $Seat_id ->
    *            $request -> Transfer ID
    * @return: TURE/FALSE
    ===================================*/    
    public function UpdateStudentProfile($id,Request $request)
    {
      $this->Student_service->UpdateProfilefromOrg($id,$request);
      return redirect(url('Organization/Students/EditProfile/'.$id));       
    }
    /*================================== 
    * @brief: Upload File for Bulletin Board
    * @paeam_in: $request
    *            
    * @return: TURE/FALSE
    ===================================*/    
    public function UpdateBulletinBoard(Request $request)
    {   
        $this->Org_service->UploadFileToServer($request);              
        return response('Update BulletinBoard Success',200);;       
    }
    /*================================== 
    * @brief: Upload File for Bulletin Board
    * @paeam_in: $request
    *            
    * @return: TURE/FALSE
    ===================================*/    
    public function DeleteBulletin(Request $request)
    {   
        $this->Org_service->DeleteBulletin($request->ID);              
        return response('Update BulletinBoard Success',200);;       
    }    
    /*================================== 
    * @brief: Upload File for Bulletin Board
    * @paeam_in: $request
    *            
    * @return: TURE/FALSE
    ===================================*/    
    public function DownloadBulletin($ID)
    {   
        $file = $this->Org_service->DownloadBulletin($ID);              
        return response()->download(storage_path('app/BulletinBoard/'.$file->file_path),$file->file_name);       
    }        
    /*================================== 
    * @brief: Reset User Password and Send Email
    * @paeam_in: $request
    *            
    * @return: TURE/FALSE
    ===================================*/
    public function  ResetUserPassword($id)
    {
        $this->User_service->ResetPassword($id);
    }
}
