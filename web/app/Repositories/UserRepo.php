<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\User as UserEntity; 
use App\Enums\UserRole;

class UserRepo extends Model
{
    
    /*
    * ====== Local Parameter ========= 
    */
    protected $user_entity;
    
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->user_entity = new UserEntity();
    }
    
    /*================================== 
    * @brief: Get User Information by Organization and Role
    * @paeam_in: $id -> Organization ID
    *            $role -> Role Type  
    * @return: $result -> Update result.
    ===================================*/    
    public function GetUser_With_Org_Role($id,$role)
    {      
      switch($role)
      {
         case UserRole::AllMember:          
              return $this->user_entity->all()->where('org_id',$id)->where('role','<=',UserRole::Administrator)->where('role','>=',UserRole::Restricted);
         case UserRole::WithoutRestricted:
              return $this->user_entity->all()->where('org_id',$id)->where('role','>=',UserRole::Standard);            
         default:
              return $this->user_entity->all()->where('org_id',$id)->where('role',$role);                      
      }  
      
    }


}
