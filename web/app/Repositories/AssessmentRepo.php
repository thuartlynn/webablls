<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Entites\Assessment_Record_Entity as AssessmentRecordEntity;
use App\Entites\Assessment_Scores_Entity as AssessmentScoreEntity;

class AssessmentRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $assessment_entity;
    protected $assessment_score_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->assessment_entity = new AssessmentRecordEntity();
        $this->assessment_score_entity = new AssessmentScoreEntity();
    }    
    
    /*================================== 
    * @brief: Get All Assessment 
    * @paeam_in: $filer 
                 $order 
    * @return: Assessment information
    ===================================*/    
    public function GetAssessment($filer,$order)
    {
       return $this->assessment_entity->where($filer)->orderby($order)->get();
    }
    /*================================== 
    * @brief: Get All Scores 
    * @paeam_in: $filer 
                 $order 
    * @return: Assessment Scores
    ===================================*/    
    public function GetAssessmentScores($filer,$order)
    {
       return $this->assessment_score_entity->where($filer)->orderby($order)->get();
    }    
    /*================================== 
    * @brief: Add New Scores 
    * @paeam_in: $Information
    * @return: Assessment Scores
    ===================================*/    
    public function AddNewAssessmentScores($Info)
    {
      $scores = new AssessmentScoreEntity();
      $scores->ass_id = Arr::get($Info,'ass_id'); 
      $scores->skill_id = Arr::get($Info,'skill_id');
      $scores->scores = Arr::get($Info,'scores');
      $scores->created_at = now();      
      $scores->save();
    }
    /*================================== 
    * @brief: Add New Record 
    * @paeam_in: $Information
    * @return: Assessment Record
    ===================================*/    
    public function AddNewAssessmentRecord($Info)
    {
      $record = new AssessmentRecordEntity();
      $record->seat_id = Arr::get($Info,'seat_id'); 
      $record->user_id = Arr::get($Info,'user_id');
      $record->color = Arr::get($Info,'color');
      $record->grade_level = Arr::get($Info,'grade_level');
      $record->initialize = Arr::get($Info,'initialize');
      $record->notes = Arr::get($Info,'notes');
      $record->assigned_date = Arr::get($Info,'assigned_date');
      $record->pl_1 = Arr::get($Info,'pl_1');
      $record->pl_2 = Arr::get($Info,'pl_2');
      $record->pl_3 = Arr::get($Info,'pl_3');
      $record->pl_4 = Arr::get($Info,'pl_4');
      $record->pl_5 = Arr::get($Info,'pl_5');
      $record->o_1 = Arr::get($Info,'o_1');
      $record->o_2 = Arr::get($Info,'o_2');
      $record->o_3 = Arr::get($Info,'o_3');
      $record->o_4 = Arr::get($Info,'o_4');
      $record->o_5 = Arr::get($Info,'o_5');
      $record->avg_h_1 = Arr::get($Info,'avg_h_1');
      $record->avg_h_2 = Arr::get($Info,'avg_h_2');
      $record->avg_h_3 = Arr::get($Info,'avg_h_3');
      $record->avg_h_4 = Arr::get($Info,'avg_h_4');
      $record->avg_h_5 = Arr::get($Info,'avg_h_5');      
      $record->save();
      return $record->ass_id;
    } 
}
