<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Base_Line_Report_Entity as BaseLineReportEntity;
use App\Entites\Status_Report_Entity as StatusReportEntity;
use App\Entites\Progress_Record_Entity as ProgressRecordEntity;
use App\Entites\Progress_Content_Entity as ProgressContentEntity;
use App\Entites\WorkSheet_Content_Entity as WorkSheetContentEntity;
use App\Entites\WorkSheet_Record_Entity as WorkSheetRecordEntity;


class ReportRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $BaseLineReport_Entity;
    protected $StatusReport_Entity;
    protected $ProgressRecord_Entity;
    protected $ProgressContent_Entity;
    protected $WorkSheetRecord_Entity;
    protected $WorkSheetContent_Entity;
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->BaseLineReport_Entity = new BaseLineReportEntity();
        $this->StatusReport_Entity = new StatusReportEntity();
        $this->ProgressRecord_Entity = new ProgressRecordEntity();
        $this->ProgressContent_Entity = new ProgressContentEntity();
        $this->WorkSheetRecord_Entity = new WorkSheetRecordEntity();
        $this->WorkSheetContent_Entity = new WorkSheetContentEntity();
    } 
    /*================================== 
    * @brief: Get All WorkSheet Report record
    * @paeam_in: $filer 
                 $order 
    * @return: WorkSheet report information
    ===================================*/    
    public function GetWorkSheetReportRecord($filer,$order)
    {
        return $this->WorkSheetRecord_Entity->where($filer)->orderby($order)->get();
    }
    /*================================== 
    * @brief: Get All Progress Report record
    * @paeam_in: $filer 
                 $order 
    * @return: Progress report information
    ===================================*/    
    public function GetProgressReportRecord($filer,$order)
    {
        return $this->ProgressRecord_Entity->where($filer)->orderby($order)->get();
    }    
    /*================================== 
    * @brief: Get All Base Line Report
    * @paeam_in: $filer 
                 $order 
    * @return: Base Line Report information
    ===================================*/    
    public function GetBaseLineReport($filer,$order)
    {
        return $this->BaseLineReport_Entity->where($filer)->orderby($order)->get();
    }    
    /*================================== 
    * @brief: Get All Status Report record
    * @paeam_in: $filer 
                 $order 
    * @return: Status report information
    ===================================*/    
    public function GetStatusReportRecord($filer,$order)
    {
        return $this->StatusReport_Entity->where($filer)->orderby($order)->get();
    }
    /*================================== 
    * @brief: Get All Status Report record
    * @paeam_in: $filer 
                 $order 
    * @return: Status report information
    ===================================*/    
    public function GetWorkSheetContent($filer,$order)
    {
        return $this->WorkSheetContent_Entity->where($filer)->orderby($order)->get();
    }
    /*================================== 
    * @brief: Get All Status Report record
    * @paeam_in: $filer 
                 $order 
    * @return: Status report information
    ===================================*/    
    public function GetProgressContent($filer,$order)
    {
        return $this->ProgressContent_Entity->where($filer)->orderby($order)->get();
    }                
}
