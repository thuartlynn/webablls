<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Skill_Scores_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Skill_Scores';
    protected $primaryKey = 'skill_id';
}
