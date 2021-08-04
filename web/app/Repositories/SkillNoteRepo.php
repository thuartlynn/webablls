<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Skill_Note_Entity as SkillNoteEntity;

class SkillNoteRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $skill_note_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->skill_note_entity = new SkillNoteEntity();
    }

    /*================================== 
    * @brief: Get All Notes
    * @paeam_in: $filer 
                 $order 
    * @return: Notes information
    ===================================*/    
    public function GetNotes($filer,$order)
    {
       return $this->skill_note_entity->where($filer)->orderby($order)->get();
    }
}
