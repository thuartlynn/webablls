<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Skill_Note_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Skill_Note';
    protected $primaryKey = 'note_id';        
}
