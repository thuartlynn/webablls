<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Assessment_Scores_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Assessment_Scores';
    protected $primaryKey = 'score_id';    
}
