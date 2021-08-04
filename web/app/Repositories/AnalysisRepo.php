<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Analysis_Setting_Entity as AnalysisSetting;

class AnalysisRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $analysis_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->analysis_entity = new AnalysisSetting();
    }
    /*================================== 
    * @brief: Get All Analysis 
    * @paeam_in: $filer 
                 $order 
    * @return: Assessment information
    ===================================*/    
    public function GetAllAnalysis($filer,$order)
    {
       return $this->analysis_entity->where($filer)->orderby($order)->get();
    }    
    /*================================== 
    * @brief: Delete All Analysis 
    * @paeam_in: $id                  
    * @return: Assessment information
    ===================================*/    
    public function DeleteAnalysisInfo($id)
    {
        $Analysis = $this->analysis_entity->find($id);        
        $Analysis->delete();
    }
}
