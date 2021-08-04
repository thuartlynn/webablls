<?php

namespace App\Services;

use App\Repositories\ContactListRepo;
use App\Entites\Contact_List_Entity as ContactListEntity;
use App\User;

class ContactListService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $contactlist_repo;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->contactlist_repo = new ContactListRepo();
    }
    
    /*================================== 
    * @brief: Get Contact List with User right
    * @paeam_in: $id
    * @return: Contact Information
    ===================================*/    
    public function GetUserContactList($id)
    {        
        $ContactList = $this->contactlist_repo->GetAllContactInfo(['user_id' => $id,'is_user' => 1]);
        if($ContactList != NULL)
        {
           $Contact = collect([]); 
           foreach($ContactList as $User)
           {
               $Contact->push($User->member_id);
           }                          
           return $Contact;           
        }
        else
        {
            return collect([]);
        }
    }
    /*================================== 
    * @brief: Add New Contact List
    * @paeam_in: $id
    *            $Email -> User Email 
    * @return: Ture / False
    ===================================*/        
    public function AddNewContactbyemail($id,$email)
    {
      //Check Email already exist
      if($this->contactlist_repo->GetAllContactInfo(['user_id' => $id,'email' => $email])->count()!=0)
      {
         return FALSE;
      }
      else
      {
       $IsUser = User::where('email',$email)->first();
       if($IsUser == null) 
       {
         $NewContact = new ContactListEntity();
         $NewContact->user_id = $id;
         $NewContact->org_name = 'n/a';
         $NewContact->is_user = 0;
         $NewContact->name = 'NewContact';
         $NewContact->email = $email;
         $NewContact->save();
       }
       else
       {
        $NewContact = new ContactListEntity();
        $NewContact->user_id = $id;
        $NewContact->org_name = $IsUser->org_name;
        $NewContact->is_user = 1;
        $NewContact->name = $IsUser->first_name.' '.$IsUser->last_name;
        $NewContact->email = $email;
        $NewContact->member_id = $IsUser->user_id;
        $NewContact->save();         
       }
       return TRUE;
      }
    }
}