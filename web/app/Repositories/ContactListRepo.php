<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Contact_List_Entity as ContactListEntity;


class ContactListRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $contact_list_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->contact_list_entity = new ContactListEntity();
    }
    /*================================== 
    * @brief: Get Contact List by filter
    * @paeam_in: $filter 
    * @return: Contact Information
    ===================================*/    
    public function GetAllContactInfo($filter)
    {
        $Contact_List = $this->contact_list_entity->where($filter)->get();
        return $Contact_List;
    }

}
