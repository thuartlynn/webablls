<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use App\Services\AssessmentService as Assessment;
use App\Enums\Analysis_Category;
use Auth;
use PDF;

class AssessmentController extends Controller
{
    /*
    * ====== Local Parameter ========= 
    */        
     protected $Assessment_Service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        $this->Assessment_Service = new Assessment(); 
    }

    /*================================== 
    * @brief: Display Analysis main screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function show()
    {         
        $Assessment_List = $this->Assessment_Service->GetAssessmentList(Auth::user()->user_id);
        return view('Assessment_List')->with(['Assessments'=>$Assessment_List]);
    }    
    /*================================== 
    * @brief: Display Analysis Detail information screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function showDetail($id)
    {         
        $Assessment_Detail = $this->Assessment_Service->GetAssessmentDetail($id);
        // dd($Assessment_Detail);
        return view('Assessment_Details')->with(['Ass_Detail'=>$Assessment_Detail]);
    }
    /*================================== 
    * @brief: Display Analysis Detail information screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function showDetailEdit($id)
    {         
        $Assessment_Detail = $this->Assessment_Service->GetAssessmentDetail($id);
        // dd($Assessment_Detail);
        return view('Student_assessment_detail')->with(['Ass_Detail'=>$Assessment_Detail]);
    }
    /*================================== 
    * @brief: Display Total Gride Mode Edit screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function TgvGridEdit($id)
    {
        $Detail = $this->Assessment_Service->GetAssessmentDetail($id);        
        $Ass_List = $this->Assessment_Service->GetShortAssessment($Detail->get('ID'));
        $Ass_Score = $this->Assessment_Service->GetAssessmentScore($id);                              
        return view('Assessment_Grid_Edit')->with(['AssInfo'=>$Detail,'Ass_List'=>$Ass_List,'Scores'=>$Ass_Score]);
    }
    /*================================== 
    * @brief: Display Total Gride Mode Edit screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function TgvTextEdit($id,Request $request)
    {
        $data = $request->input();
        $CheckFilter = Validator::make($data, ['filter' => ['regex:[A-Z]', 'string']]);        
        if($CheckFilter->fails() == false) 
        {            
            $data = ['filter'=>'A'];
            
        }        
        $Detail = $this->Assessment_Service->GetAssessmentDetail($id);        
        $Ass_List = $this->Assessment_Service->GetShortAssessment($Detail->get('ID'));
        $Ass_Score = $this->Assessment_Service->GetAssessmentScore($id);                      
        return view('Assessment_Text_Edit')->with(['AssInfo'=>$Detail,'Ass_List'=>$Ass_List,'Scores'=>$Ass_Score[Analysis_Category::getValue(Arr::get($data,'filter'))-1]]);
    }    
    /*================================== 
    * @brief: Display Total Gride Mode Edit screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function TgvCatEdit($id,Request $request)
    {                        
        $data = $request->input();
        $CheckFilter = Validator::make($data, ['filter' => ['regex:[A-Z]', 'string']]);        
        if($CheckFilter->fails() == false) 
        {            
            $data = ['filter'=>'A'];
            
        }        
        $Detail = $this->Assessment_Service->GetAssessmentDetail($id);        
        $Ass_List = $this->Assessment_Service->GetShortAssessment($Detail->get('ID'));
        $Ass_Score = $this->Assessment_Service->GetAssessmentScore($id);                 
        return view('Assessment_Cat_Edit')->with(['AssInfo'=>$Detail,'Ass_List'=>$Ass_List,'Scores'=>$Ass_Score[Analysis_Category::getValue(Arr::get($data,'filter'))-1]]);
    }        
    /*================================== 
    * @brief: Display Total Gride Mode Edit screen 
    * @paeam_in: $id -->student ID;
    * @return: 
    ===================================*/        
    public function TgvGridView($id)
    {        
        
        $Ass_List = $this->Assessment_Service->GetShortAssessment($id);        
        $Detail = $this->Assessment_Service->GetAssessmentDetail($Ass_List->last()->get('ID'));        
        $Ass_Score = $this->Assessment_Service->GetAssessmentScore($Ass_List->last()->get('ID'));        
        return view('Assessment_Total_Grid_View')->with(['AssInfo'=>$Detail,'Ass_List'=>$Ass_List,'Scores'=>$Ass_Score]);
    }        
    /*================================== 
    * @brief: Saving Total Grid Edit Data
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function TgvGridEditSaving(Request $request)
    {                        
        $this->Assessment_Service->AssessmentSaving($request->assessmentId,$request->values);
        return response('Saving Success',200);
    }    
    /*================================== 
    * @brief: Show Complete Items
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function showCompleted($id,Request $request)
    {        
        $source = $request->only('from');        
        if($source['from'] == 'total')
        {
         $Ass_List = $this->Assessment_Service->GetShortAssessment($id);         
         $Detail = $this->Assessment_Service->GetAssessmentDetail($Ass_List->last()->get('ID'));
         $Complete = $this->Assessment_Service->GetCompleteAssessment($Ass_List->last()->get('ID'));
        }
        else
        {
            $Detail = $this->Assessment_Service->GetAssessmentDetail($id);
            $Complete = $this->Assessment_Service->GetCompleteAssessment($id);   
        }
        return view('Assessment_Completed_Incompleted_Items')->with(['AssInfo'=>$Detail,'CompleteItems'=>$Complete]);
    }
    /*================================== 
    * @brief: Show InComplete Items
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function showInCompleted($id,Request $request)
    {        
        $source = $request->only('from');
        if($source['from'] == 'total')
        {
            $Ass_List = $this->Assessment_Service->GetShortAssessment($id);
            $Detail = $this->Assessment_Service->GetAssessmentDetail($Ass_List->last()->get('ID'));
            $Complete = $this->Assessment_Service->GetInCompleteAssessment($Ass_List->last()->get('ID'));
        }        
        else
        {
            $Detail = $this->Assessment_Service->GetAssessmentDetail($id);
            $Complete = $this->Assessment_Service->GetInCompleteAssessment($id);    
        }
        return view('Assessment_Completed_Incompleted_Items')->with(['AssInfo'=>$Detail,'CompleteItems'=>$Complete]);;
    }
    /*================================== 
    * @brief: Show Task Info Box
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function showTaskInfoBox($id,$skill)
    {        
        $Detail = $this->Assessment_Service->GetTaskInfoDetail($id,$skill);
        return response(view('/contents/app_webablls_assessment_task_infobox')->with(['TaskInfo'=>$Detail]),200);                
    }
    /*================================== 
    * @brief: Download Total gride View report.
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function DownloadTgvReport($id)
    {        
        $Ass_List = $this->Assessment_Service->GetShortAssessment($id);                
        $Detail = $this->Assessment_Service->GetAssessmentDetail($Ass_List->last()->get('ID')); 
        $FileName = str_replace(',', '', $Detail['Name'])."_Grid Report_".str_replace('/', '-', $Detail['Assessment_Date']).'.pdf';               
        $Ass_Score = $this->Assessment_Service->GetAssessmentScore($Ass_List->last()->get('ID'));        
        $pdf = PDF::loadView("Assessment_Total_Grid_View_Report",['AssInfo'=>$Detail,'Ass_List'=>$Ass_List,'Scores'=>$Ass_Score])->setPaper('a3')->setOrientation('landscape');        
        return $pdf->download($FileName);        
    }    
    /*================================== 
    * @brief: Download Complete or Incompleted report.
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function DownloadCompletedReport($id,Request $request)
    {
        $source = $request->from; 
        $categories = $request->filter;     
        $Type=$request->page;                  
        if($source == 'total')
        {
         $Ass_List = $this->Assessment_Service->GetShortAssessment($id);         
         $Detail = $this->Assessment_Service->GetAssessmentDetail($Ass_List->last()->get('ID'));
         if($categories =='all')
         {
           if($Type=='1')
           {
             $Complete = $this->Assessment_Service->GetCompleteAssessment($Ass_List->last()->get('ID'));            
           }
           else
           {
             $Complete = $this->Assessment_Service->GetInCompleteAssessment($Ass_List->last()->get('ID'));              
           }
         }
         else
         {
            if($Type=='1')
            {
              $Complete = $this->Assessment_Service->GetCompleteAssessment($Ass_List->last()->get('ID'))->filter(function($value,$key) use ($categories)
              {             
               if($categories==$key)                  
                   return $value;
              });              
            }
            else
            {
              $Complete = $this->Assessment_Service->GetInCompleteAssessment($Ass_List->last()->get('ID'))->filter(function($value,$key) use ($categories)
              {             
               if($categories==$key)                  
                   return $value;
              });  
            }             
          }
        }
        else
        {
            $Detail = $this->Assessment_Service->GetAssessmentDetail($id);
            if($categories == 'all')
            {               
              if($Type=='1')
              {
                $Complete = $this->Assessment_Service->GetCompleteAssessment($id);            
              }
              else
              {
                $Complete = $this->Assessment_Service->GetInCompleteAssessment($id);              
              }              
              
            }
            else
            {
                if($Type=='1')
                {
                  $Complete = $this->Assessment_Service->GetCompleteAssessment($id)->filter(function($value,$key) use ($categories)
                  {             
                   if($categories==$key)                  
                       return $value;
                  });              
                }
                else
                {
                  $Complete = $this->Assessment_Service->GetInCompleteAssessment($id)->filter(function($value,$key) use ($categories)
                  {             
                   if($categories==$key)                  
                       return $value;
                  });  
                }                 
            }
        }
        if($categories=='all')
        {
          if($Type==1)
            {
             $FileName = str_replace(',', '', $Detail['Name'])."_Complete_All_Report_".str_replace('/', '-', $Detail['Assessment_Date']).'.pdf';               
            }
          else
            {
                $FileName = str_replace(',', '', $Detail['Name'])."_Incomplete_All_Report_".str_replace('/', '-', $Detail['Assessment_Date']).'.pdf';                  
            }  
        }
        else
        {
          if($Type==1)
            {
             $FileName = str_replace(',', '', $Detail['Name'])."_Complete_Current_Category_Report_".str_replace('/', '-', $Detail['Assessment_Date']).'.pdf';                 
            }
          else
            {
                $FileName = str_replace(',', '', $Detail['Name'])."_Incomplete_Current_Category_Report_".str_replace('/', '-', $Detail['Assessment_Date']).'.pdf';                    
            }  
        }
        $pdf = PDF::loadView("Assessment_Completed_Incompleted_Items_Report",['AssInfo'=>$Detail,'CompleteItems'=>$Complete])->setPaper('a4');        
        return $pdf->download($FileName);
        // return view('Assessment_Completed_Incompleted_Items_Report')->with(['AssInfo'=>$Detail,'CompleteItems'=>$Complete]);                
    }

    /*================================== 
    * @brief: Download Complete or Incompleted report.
    * @paeam_in: 
    * @return: 
    ===================================*/
    public function DeleteAssessment($id)
    {
       $result = $this->Assessment_Service->DeleteRecord($id);
       if($result == true)
       {
        return response('Delete Assessment Success',200);
       }
       else
       {
        return response('Delete Assessment Faile',400);
       }
       
    }        
    /*================================== 
    * @brief: Add Task info Note.
    * @paeam_in: $request
    * @return: 
    ===================================*/
    public function AddTaskInfoNote(Request $request)
    {
      $Note = $this->Assessment_Service->AddSkillNote($request);
      return response($Note,200);
    }
    /*================================== 
    * @brief: Add Task info Note.
    * @paeam_in: $request
    * @return: 
    ===================================*/
    public function UpdateTaskInfoNote(Request $request)
    {
      $this->Assessment_Service->UpdateSkillNote($request);
      return response('Update Task Note Success',200);
    }
    /*================================== 
    * @brief: Add Task info Note.
    * @paeam_in: $request
    * @return: 
    ===================================*/
    public function DeleteTaskInfoNote(Request $request)
    {
      $this->Assessment_Service->DeleteSkillNote($request);
      return response('Delete Task Note Success',200);
    }        
    /*================================== 
    * @brief: Update Assessment Detail Information
    * @paeam_in: $request
    * @return: 
    ===================================*/
    public function UpdateDetailEdit($id,Request $request)
    {
      $Seat = $this->Assessment_Service->UpdateAssessmentRecord($id,$request->all());
      return redirect(url("Student/ViewSummary/".$Seat));
    }
}
