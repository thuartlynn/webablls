<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Student_Parameter_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Student_Parameter';
    protected $primaryKey = 'para_id';
}
