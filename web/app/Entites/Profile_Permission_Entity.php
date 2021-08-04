<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Profile_Permission_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Profile_Permission';
    protected $primaryKey = 'permission_id';    
}
