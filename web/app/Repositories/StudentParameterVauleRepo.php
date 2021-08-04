<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Student_Para_Value_Entity as StudentParaValue;

class StudentParameterVauleRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $spvalue_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->spvalue_entity = new StudentParaValue();
    }
    /*================================== 
    * @brief: Get parameter value information by parameter id
    * @paeam_in: $id -> parameter ID
    * @return: $result -> parameter value information
    ===================================*/
    public function StudentParameterValue($id)
    {
        return $this->spvalue_entity->where('para_id',$id)->get();
    }
 
}
