<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use App\Repositories\AnalysisRepo;
use App\Services\ProfilePermissionService as Permission; 
use App\Services\UserService; 
use App\Services\SeatService as Seat; 
use App\Services\AssessmentService as Assessment;
use App\Services\UtilsService as Utils; 
use App\Enums\NormativeLevel as Normatve;
use App\Enums\Analysis_Category as Category;
use App\Enums\Analysis_Section as Section;

class AnalysisService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $analysis_repo;
    protected $User_service;
    protected $Permission_service;
    protected $Seat_service;
    protected $Assessment_service;
    protected $Utils;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->analysis_repo = new AnalysisRepo();
        $this->User_service = new UserService();
        $this->Seat_service = new Seat();
        $this->Permission_service = new Permission();
        $this->Assessment_service = new Assessment();
        $this->Utils = new Utils();
    }
    /*================================== 
    * @brief: Get All Analysis Info
    * @paeam_in:  $id -> user_id
    * @return: 
    ===================================*/        
    public function  GetAllAnalysisList($id)
    {
       
       $PermissionInfo = $this->Permission_service->GetPermission(['user_id' => $id])->filter(function($Permission){           
           if($Permission->analytics!=0 || $Permission->owner == 1 || $Permission->coordinator ==1 || $Permission->full_access !=0) 
             {                
                return $Permission;
             }
       });
       $AnalysisInfo = collect([]);             
       
       foreach($PermissionInfo as $Permission)
       {       
         $Analysis_List = $this->analysis_repo->GetAllAnalysis(['seat_id' => $Permission->seat_id],'created_at');                    
         foreach($Analysis_List as $Analysis)
         {
           $Assessment = $this->Assessment_service->GetAssessmentInformation(['ass_id' => key(json_decode($Analysis->assessment_list,true))],'created_at')->first();
           $User = $this->User_service->UserProfile($Assessment->get('User'));
           $Seat = $this->Seat_service->GetSeatInfo($Permission->seat_id);          
           $Info = collect([]);
           if($Permission->analytics == 1)
           {
             $Info->put("Permission","V");
           }
           else
           {
            $Info->put("Permission","M");
           }
           $Info->put("ID",$Permission->seat_id);
           $Info->put('Student',$Seat->get('Name'));
           $Info->put("Color",$Assessment->get("Color"));
           $Info->put("Assessment_Dates",$Assessment->get("Create_Date"));
           $Info->put("Assigned_Date",$this->Utils->GetDateByFormat($Analysis->assigned_date));
           $Info->put("Create_Date",$this->Utils->GetDateByFormat($Analysis->created_at));
           $Info->put("Created_By",$User->get('FirstName').' '.$User->get('LastName'));
           $Info->put("Analysis_ID",$Analysis->id);  
           if($Analysis->id != $Analysis_List->last()->id)
           {   
             $Info->put("Last_analyses","0");             
           }
           else
           {
            $Info->put("Last_analyses","1");             
           }        
           $AnalysisInfo->push($Info);        
         }
       }
        return $AnalysisInfo;
    }
    /*================================== 
    * @brief: Delete Analysis 
    * @paeam_in:  $id -> Analysis id
    * @return: 
    ===================================*/
    public function DeleteAnalysis($id)
    {
      $this->analysis_repo->DeleteAnalysisInfo($id);
    }
    /*================================== 
    * @brief: Get Analysis Detail
    * @paeam_in:  $id -> user_id
    * @return: 
    ===================================*/    
    public function GetAnalysisDetail($id)
    {
      $AnalysisDetail = collect([]);
      $Analysis = $this->analysis_repo->GetAllAnalysis(['id' => $id],'created_at')->first();
      // dd($Analysis);
      $Assessment = $this->Assessment_service->GetAssessmentInformation(['seat_id' => $id],'created_at');
      //dd($Assessment->first()["Assigned_Date"]);
      $SeatInfo = $this->Seat_service->GetSeatInfo($id);
      //Insert Information
      $AnalysisDetail->put("Name",$SeatInfo["Name"]);
      $AnalysisDetail->put("Student_ID",$SeatInfo["ID"]);
      $AnalysisDetail->put("Analysis_ID",$Analysis->id);
      $AssessmentList = collect([]);
      foreach(json_decode($Analysis->assessment_list,true) as $key => $value)
      {                
        $Info = collect([]);
        $AsInfo = $this->Assessment_service->GetAssessmentInformation(['ass_id' => $key],'created_at')->first();
        $Info->put("ID",$AsInfo["ID"]);
        $Info->put("Color",$AsInfo["Color"]);
        $Info->put("Select",$value);
        $Age = (int) round((strtotime($AsInfo["Assigned_Date"])-strtotime($SeatInfo["DOB"]))/(24*60*60)/365.25*12,0);        
        if($Age < 12)
          {
            $Info->put("Text","Assessment ".$AsInfo["Assigned_Date"]." (age ".$Age." months)");
          }
        else if($Age > 12)
          {
            $Info->put("Text","Assessment ".$AsInfo["Assigned_Date"]." (age ".(int)round($Age/12,0)." years ".($Age%12)." months)");
          }
        else
          {
            $Info->put("Text","Assessment ".$AsInfo["Assigned_Date"]." (age 1 years)");
          }              
        $AssessmentList->push($Info);
      }
      $AnalysisDetail->put("Assessments",$AssessmentList);
      
      if($Analysis->output == 1)
      {
        $AnalysisDetail->put("Output_Options",collect([0,1]));
      }
      else
      {
        $AnalysisDetail->put("Output_Options",collect([1,0]));
      }
      $Section = collect([0=>0,1=>0,2=>0,3=>0,4=>0,5=>0]);
      foreach(json_decode($Analysis->section_op) as $op)
      {
        $Section->put($op,1);
      }
      $AnalysisDetail->put("Section_Analysis",$Section);
      $Category = collect([]);
      foreach(Category::getKeys() as $Key)
      {
        $Category->put($Key,0);
      }
      foreach(json_decode($Analysis->category_op) as $op)
      {
        $Category->put(Category::getKey($op),1);
      }      
      $AnalysisDetail->put("Category_Analysis",$Section);
      $AnalysisDetail->put("Include_Normative_Data",$Analysis->normative_active);
      $AnalysisDetail->put("Select_Age",$Analysis->normative_age);
      $Item_Scale = collect([0=>0,1=>0]);
      $Score_Scale = collect([0=>0,1=>0]);
      $Percentage_Scale = collect([0=>0,1=>0]);
      if($Analysis->items_scale & 1)
         $Item_Scale->put(0,1);
      if($Analysis->items_scale & 2)
         $Item_Scale->put(1,1);
      if($Analysis->scores_scale & 1)
         $Score_Scale->put(0,1);
      if($Analysis->scores_scale & 2)
         $Score_Scale->put(1,1);
      if($Analysis->percentage_scale & 1)
         $Percentage_Scale->put(0,1);
      if($Analysis->percentage_scale & 2)
         $Percentage_Scale->put(1,1);
      $AnalysisDetail->put("Graphs_with_Total_Items_Scale",$Item_Scale);
      $AnalysisDetail->put("Graphs_with_Total_Scores_Scale",$Score_Scale);
      $AnalysisDetail->put("Graphs_with_Percentage_Scale",$Percentage_Scale);
      return $AnalysisDetail;
    }
    /*================================== 
    * @brief: Update Analysis Detail
    * @paeam_in:  $id -> user_id
    * @return: 
    ===================================*/        
    public function UpdateAnalysisDetail($id,$Info)
    {      
      $Analysis = $this->analysis_repo->GetAllAnalysis(['id' => $id],'created_at')->first();      
      //Check OutPut
      if(Arr::has($Info,'Output_Options_Multiple'))
      {
        $Analysis->output = 1;         
      }
      if(Arr::has($Info,'Output_Options_Single'))
      {
        $Analysis->output = 0;         
      }
      //Assessment
      $Ass_List = json_decode($Analysis->assessment_list);
      foreach($Info['Assessments'] as $key => $value)
      {
        
      }
      foreach($Info['Assessments'] as $key => $value)
      {
         
      }
    }
}
