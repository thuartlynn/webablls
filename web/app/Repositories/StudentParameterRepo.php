<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Student_Parameter_Entity as StudentParaEntity;

class StudentParameterRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $studentpara_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->studentpara_entity = new StudentParaEntity();
    }
    /*================================== 
    * @brief: Get parameter information by Organization 
    * @paeam_in: $id -> Organization ID
    * @return: $result -> parameter information
    ===================================*/
   public function StudentParameterInfo($id)
   {
       return $this->studentpara_entity->where('org_id',$id)->get();
   }
}
