<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Profile_Permission_Entity as ProfilePermissionEntity;

class ProfilePermissionRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $profile_permission_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->profile_permission_entity = new ProfilePermissionEntity();
    }
    /*================================== 
    * @brief: get Permission Status form database by column 
    * @paeam_in: user_id
    * @return: Permission information
    ===================================*/
    public function GetPermissionInfo($Filter)
    {
       return $this->profile_permission_entity->where($Filter)->orderby('seat_id')->get(); 

    }
}
