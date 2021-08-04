<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Assessment_Record_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Assessment_Record';
    protected $primaryKey = 'ass_id';    
}
