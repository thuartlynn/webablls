<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Organization_Entity extends Model
{
     /**
     *  Define the table name and primary key
     */
     protected $table = 'Organization';
     protected $primaryKey = 'org_id';     
}
