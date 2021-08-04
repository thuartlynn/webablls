<?php

namespace App\Services;

use App\Repositories\SkillNoteRepo;

class ItemNoteService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $skillnote_repo;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->skillnote_repo = new SkillNoteRepo();
    }

}