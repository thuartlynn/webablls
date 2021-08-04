<?php

namespace App\Services;

use App\Repositories\ReportRepo;
use App\Repositories\AssessmentRepo;
use App\User;

class ReportService
{
    /*
    * ====== Local Parameter ========= 
    */    
    protected $Report_Repo;
    protected $Assessment_Repo; 
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->Report_Repo = new ReportRepo();
        $this->Assessment_Repo = new AssessmentRepo();
    }

    /*================================== 
    * @brief: Get All WorkSheet Report record
    * @paeam_in: $filer 
                 $order 
    * @return: WorkSheet report information
    ===================================*/    
    public function GetWorkSheetRecord($filer,$order)
    {
        $AllWorkSheets = $this->Report_Repo->GetWorkSheetReportRecord($filer,$order);
        $WorkSheetInfo = collect([]);
        foreach($AllWorkSheets as $WorkSheet)
        {                      
           $Info = collect([]);
           $Info->put('Type','WorkSheet');
           $Info->put('ID',$WorkSheet->id);
           $Info->put('Color',$WorkSheet->color);
           $Info->put('Total_Items',$WorkSheet->total_items);
           $Info->put('User',$WorkSheet->user_id);
           $Info->put('Assigned_Date',date('m/d/Y', strtotime($WorkSheet->assigned_date)));
           $Info->put('Created_Date',date('m/d/Y', strtotime($WorkSheet->created_at)));  
           $WorkSheetInfo->push($Info);
        }
        return $WorkSheetInfo;
    }
    /*================================== 
    * @brief: Get All Status Report
    * @paeam_in: $filer 
                 $order 
    * @return: Status report information
    ===================================*/    
    public function GetStatusRecord($filer,$order)
    {
       $AllStatueReport =  $this->Report_Repo->GetStatusReportRecord($filer,$order);
       $StatusInfo = collect([]);
       foreach($AllStatueReport as $StatusReport)
       {
          $Info = collect([]);
          $Info->put('Type','Status');
          $Info->put('ID',$StatusReport->id);
          $Info->put('User',$StatusReport->user_id);
          $Info->put('Assigned_Date',date('m/d/Y', strtotime($StatusReport->assigned_date)));
          $Info->put('Created_Date',date('m/d/Y', strtotime($StatusReport->created_at))); 
          $StatusReport->push($Info);
       }
       return $StatusInfo;
    }    
    /*================================== 
    * @brief: Get All Base Line Report
    * @paeam_in: $filer 
                 $order 
    * @return: Base Line report information
    ===================================*/    
    public function GetBaseLineRecord($filer,$order)
    {
      $AllBaseListReport =  $this->Report_Repo->GetBaseLineReport($filer,$order);
      $BaseLineInfo = collect([]);
      foreach ($AllBaseListReport as $BaseLine) 
      {
         $Info = collect([]);
         $Info->put('Type','BaseLine');
         $Info->put('ID',$BaseLine->id);
         $Info->put('User',$BaseLine->user_id);
         $Info->put('Assigned_Date',date('m/d/Y', strtotime($BaseLine->assigned_date)));
         $Info->put('Created_Date',date('m/d/Y', strtotime($BaseLine->created_at)));
         $BaseLineInfo->push($Info);  
      }
      return $BaseLineInfo;
    }
    /*================================== 
    * @brief: Get All Progress Report
    * @paeam_in: $filer 
                 $order 
    * @return: Base Progress report information
    ===================================*/    
    public function GetProgressRecord($filer,$order)
    {
      $AllProgressReport =  $this->Report_Repo->GetProgressReportRecord($filer,$order);
      $ProgressInfo = collect([]);
      foreach($AllProgressReport as $ProgressReport)
      {
          $Info = collect([]);
          $Info->put('Type','Progress');
          $Info->put('ID',$ProgressReport->id);
          $Info->put('User',$ProgressReport->user_id);
          $Info->put('Times',$ProgressReport->times);
          $Info->put('Assigned_Date',date('m/d/Y', strtotime($ProgressReport->assigned_date)));
          $Info->put('Created_Date',date('m/d/Y', strtotime($ProgressReport->created_at)));
          $ProgressInfo->push($Info);
      }      
      return $ProgressInfo->sortBy('Times');
    }            

}