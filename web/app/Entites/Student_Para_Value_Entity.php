<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Student_Para_Value_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Student_Para_Value';
    protected $primaryKey = 'value_id';    
}
