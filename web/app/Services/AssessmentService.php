<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Repositories\AssessmentRepo;
use App\Repositories\SkillNoteRepo;
use App\Repositories\ReportRepo;
use App\Services\UtilsService as Utils;
use App\Services\ProfilePermissionService as Permission; 
use App\Entites\Seat_Entity as SeatEntity;
use App\Entites\Skill_Note_Entity as SkillNoteEntity;
use App\Entites\Skill_Class_Entity;
use App\Entites\Skill_Scores_Entity;
use App\User;
use App\Enums\Gender;
use App\Enums\SeatStatus;
use App\Enums\Grade_Level;
use App\Enums\Analysis_Category;
use Auth;



class AssessmentService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $assessment_repo;
    protected $seat_repo;   
    protected $skillnote_repo;
    protected $reprot_repo;   
    protected $Permission_service;
    protected $Utils;    
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->assessment_repo = new AssessmentRepo();
        $this->skillnote_repo = new SkillNoteRepo();
        $this->Permission_service = new Permission();
        $this->Utils = new Utils();
        $this->seat_entity = new SeatEntity();
        $this->reprot_repo = new ReportRepo();
    }
    
    /*================================== 
    * @brief: Get All Assessment Information
    * @paeam_in: $filer 
                 $order 
    * @return: Assessment information
    ===================================*/
    public function GetAssessmentInformation($filter,$order)
    {
        $Assessment_List = $this->assessment_repo->GetAssessment($filter,$order);
        $AssessmentInfo = collect([]);
        foreach($Assessment_List as $Assessment)
        {
            $Info = collect([]);
            $Info->put('ID',$Assessment->ass_id);
            $Info->put('Color',$Assessment->color);
            $Info->put('Assigned_Date',$this->Utils->GetDateByFormat($Assessment->assigned_date));
            $Info->put('Create_Date',$this->Utils->GetDateByFormat($Assessment->created_at));
            $Info->put('User',$Assessment->user_id);
            $AssessmentInfo->push($Info);
        }        
        return $AssessmentInfo;        
    }
    /*================================== 
    * @brief: Get Assessment List By User
    * @paeam_in: $ID                  
    * @return: Assessment information
    ===================================*/
    public function GetAssessmentList($id)
    {
        $Permission_List = $this->Permission_service->GetPermissionByUser($id);            
        $AssList = collect([]);        
        foreach($Permission_List as $Permission)
        {
            //User has permission can view or modified Assessment
            if($Permission->get('OwnerRights')==1 || $Permission->get('Coordinator')==1 || $Permission->get('FullAccess')!=0 || $Permission->get('AssessmentsAndReports')!=0 )
            {                
                $Assessment_List = $this->assessment_repo->GetAssessment(['seat_id' => $Permission->get('ID')],'created_at');
                // $this->GetAssessmentInformation(['seat_id' => $Permission->get('ID')],'created_at');
                $Seat = $this->seat_entity->find($Permission->get('ID'));  
                $Record = 1;              
                foreach($Assessment_List as $Assessment)
                {                    
                    $Info = collect([]);
                    $Info->put('Color',$Assessment->color);
                    if($Permission->get('OwnerRights')==0 && $Permission->get('Coordinator')==0 && $Permission->get('FullAccess')==0 && $Permission->get('AssessmentsAndReports')<2)
                    {
                        $Info->put('Authority','V');
                    }
                    else
                    {
                        $Info->put('Authority','M');
                    }
                    $Info->put('ID',$Assessment->ass_id);
                    $Info->put('Seat_ID',$Seat->seat_id);
                    $Info->put('Student',$this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name));
                    $Info->put('Assigned_Date',$this->Utils->GetDateByFormat($Assessment->assigned_date));
                    $Info->put('Create_Date',$this->Utils->GetDateByFormat($Assessment->created_at));                    
                    $User = User::find($Assessment->user_id);
                    $Info->put('User',$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
                    $Info->put('Location',' ');   
                    if($Record == 1)
                    {
                        $Info->put('Assessment_Filter_Last_or_First','First');   
                    }
                    else if($Record == $Assessment_List->count())
                    {
                        $Info->put('Assessment_Filter_Last_or_First','Last');
                    }
                    else
                    {
                        $Info->put('Assessment_Filter_Last_or_First',' ');   
                    }                                        
                    $Info->put('Assesement_Filter_Range',round((strtotime(now()->toDateTimeString())-strtotime($Assessment->assigned_date))/(24*60*60),0));                       
                    $Permission->forget(["ID","FirstName","LastName"]);
                    $PermissionInfo=$this->Permission_service->GetPermissionInfo(Auth::User()->user_id,$Assessment->seat_id);
                    $Info->put('Permission',$PermissionInfo);
                    $AssList->push($Info);
                    $Record++;
                }
                
    
            }        
        }                
        return $AssList->sortBy(function($value,$key){

            if(Auth::user()->date_format == 0)
            {
              return strtotime($value->get('Assigned_Date'));
            }
            else
            {
              return strtotime(str_replace('/', '-', $value->get('Assigned_Date')));
            }
        });
    }
    /*================================== 
    * @brief: Get Assessment Detail Information
    * @paeam_in: $Assessment ID                  
    * @return: Assessment Detail Information
    ===================================*/
    public function GetAssessmentDetail($id)
    {
        $Assessment= $this->assessment_repo->GetAssessment(['ass_id' => $id],'created_at')->first();
        $Seat = $this->seat_entity->find($Assessment->seat_id); 
        $User = User::find($Assessment->user_id);
        $Permission = $this->Permission_service->GetPermissionInfo(Auth::User()->user_id,$Assessment->seat_id);                
        $All_Assessment=$this->assessment_repo->GetAssessment(['seat_id' => $Assessment->seat_id],'created_at');
        $Detail= collect([]);
        $Detail->put('AssID',$id);        
        $Detail->put('Name',$this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name));
        $Detail->put('ID',$Seat->seat_id);
        $Age = (int) round((strtotime(now()->toDateTimeString())-strtotime($Seat->birthday))/(24*60*60)/365.25,0);        
        $Detail->put('Student_Age',$Age);
        $Detail->put('Signlanguage',$Seat->sign_language);
        $Detail->put('Assessment_Date',$this->Utils->GetDateByFormat($Assessment->assigned_date));
        $Detail->put('Grade_Level',$Assessment->grade_level);
        $Detail->put('Color',$Assessment->color);
        $Detail->put('Initial',$Assessment->initialize);
        $Detail->put('User',$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
        $Used = collect([]);
        foreach($All_Assessment as $Ass)
        {
            if($Ass->ass_id != $Assessment->ass_id)
            {
                $Used->push($Ass->color);   
            }
        }
        $Detail->put('Used_Color',$Used);
        $Detail->put('Note',$Assessment->notes);
        $Parameter=collect([]);
        $temp = collect([]);
        $temp->put("ProgramLevel",$Assessment->pl_1);
        $temp->put("Others",$Assessment->o_1);
        $temp->put("AvgTime",$Assessment->avg_h_1);
        $Parameter->push($temp);        
        $temp = collect([]);
        $temp->put("ProgramLevel",$Assessment->pl_2);
        $temp->put("Others",$Assessment->o_2);
        $temp->put("AvgTime",$Assessment->avg_h_2);
        $Parameter->push($temp);        
        $temp = collect([]);
        $temp->put("ProgramLevel",$Assessment->pl_3);
        $temp->put("Others",$Assessment->o_3);
        $temp->put("AvgTime",$Assessment->avg_h_3);
        $Parameter->push($temp);                
        $temp = collect([]);
        $temp->put("ProgramLevel",$Assessment->pl_4);
        $temp->put("Others",$Assessment->o_4);
        $temp->put("AvgTime",$Assessment->avg_h_4);
        $Parameter->push($temp);
        $temp = collect([]);                
        $temp->put("ProgramLevel",$Assessment->pl_5);
        $temp->put("Others",$Assessment->o_5);
        $temp->put("AvgTime",$Assessment->avg_h_5);
        $Parameter->push($temp);                
        $Detail->put("Paramter",$Parameter);
        $Detail->put("Permission",$Permission);              
        return $Detail;
    }
    /*================================== 
    * @brief: Get Assessment List Short Information
    * @paeam_in: $Assessment ID                
    * @return: Assessment List Information
    ===================================*/
    public function GetShortAssessment($id)
    {        
        $All_Assessment=$this->assessment_repo->GetAssessment(['seat_id' => $id],'created_at');
        $Short_Detail= collect([]);
        foreach($All_Assessment as $Ass)
        {
          $Info=collect([]);
          $User = User::find($Ass->user_id);
          $Info->put('Name',$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
          $Info->put('Date',$this->Utils->GetDateByFormat($Ass->created_at));
          if($Ass->ass_id!=$id)
            {
              $Info->put('Icon','1');
            }
          else
            {
                $Info->put('Icon','0');
            }  
          $Info->put('Color',$Ass->color);
          $Info->put('ID',$Ass->ass_id);
          $Short_Detail->push($Info);
        }
        return $Short_Detail;
    }
    /*================================== 
    * @brief: Get Assessment Score
    * @paeam_in: $Assessment ID                
    * @return: Assessment Score
    ===================================*/
    public function GetAssessmentScore($id)
    {
        $SkillClass = new Skill_Class_Entity();
        $SkillScores = new Skill_Scores_Entity();
        $Current_Assessment = $this->assessment_repo->GetAssessment(['ass_id'=> $id],'created_at')->first();
        $All_Assessment = $this->assessment_repo->GetAssessment(['seat_id'=> $Current_Assessment->seat_id,],'created_at');                       
        if($Current_Assessment->initialize == 0) 
        {            
            $Initial_Color = $All_Assessment->first()->color;   

        }        
        else
        {
            $Initial_Color= $Current_Assessment->color;
        }        
        $Ass_Scores=collect([]);                     
        foreach($All_Assessment as $Info)
        {
            if($Info->ass_id<=$id)
            {
             $temp =($this->assessment_repo->GetAssessmentScores(['ass_id' => $Info->ass_id],'skill_id')->toArray());                         
             foreach($temp as $i)
             {
                $i=Arr::add($i,'color',$Info->color);                
                $Ass_Scores->push($i);
             }
            }
        }           
        $Class = $SkillClass->get();
        $SampleScore = $SkillScores->get();
        $SkillNotes = $this->skillnote_repo->GetNotes(['ass_id' => $id],'skill_id');
        $NoteNum=collect([]);
        foreach($SkillNotes as $Note)
        {           
          if($NoteNum->contains($Note->skill_id)==false)
          {
              $NoteNum->push($Note->skill_id-1);
          }
        }                
        $Scores_Info=collect([]);        
        foreach($Class as $Item)
        {
            $Categories = collect([]);
            for($i=$Item->minimum-1;$i<$Item->max;$i++)
            {                
                
                $ScoreRecord=$Ass_Scores->filter(function ($value, $key) use ($i) {                    
                    if($value['skill_id']==$i+1)
                       return $value;
                });
                $Scores=collect([]);
                for($j=0;$j<$SampleScore[$i]->scores;$j++)
                {
                    $Scores->put($j,'#0');
                }    
                foreach($ScoreRecord as $S)
                {
                    for($j=0;$j<$SampleScore[$i]->scores;$j++)
                       {
                        if($Scores[$j]=='#0' && $j< $S['scores']) 
                           $Scores[$j]=$S['color'];
                       } 
                }                            
                $Skill = collect([]);
                if($NoteNum->contains($i))
                {                    
                    $Skill->put('Notes',1);  
                }
                else
                {
                    $Skill->put('Notes',0);  
                }
                if(Arr::first($Scores)=='#0')
                {
                    $Skill->put('Edit',$Initial_Color);  
                }                
                else if(Arr::first($Scores)!=$Initial_Color)
                {
                       $Skill->put('Edit',$Initial_Color);  
                }
                else
                {
                    $Skill->put('Edit','#0'); 
                }
                $Skill->put('Select',"0");
                $Skill->put('Score',$Scores->toArray()); 
                $Categories->push($Skill);
            }            
            $Scores_Info->push($Categories);
        }               
        return $Scores_Info;
    }
    /*================================== 
    * @brief: Save Assessment Score
    * @paeam_in: $ID
                 $Scores
    * @return: Assessment Score
    ===================================*/    
    public function AssessmentSaving($id,$Scores)
    {        
        $SkillClass = new Skill_Class_Entity();
        $Class = $SkillClass->get();
        $Current_Assessment = $this->assessment_repo->GetAssessment(['ass_id' => $id],'created_at')->first();  
        $All_Assessment = $this->assessment_repo->GetAssessment(['seat_id'=> $Current_Assessment->seat_id,],'ass_id');                               
        $Ass_Scores=collect([]);                     
        foreach($All_Assessment as $Info)
        {
            if($Info->ass_id>=$id)
            {
             $temp =($this->assessment_repo->GetAssessmentScores(['ass_id' => $Info->ass_id],'skill_id'));                         
             foreach($temp as $i)
             {                               
                // $i=Arr::add($i,'color',$Info->color);                
                $Ass_Scores->push($i);
             }
            }
        }            
        $ModifiedResult=collect([]);        
        foreach($Scores as $Score)
        {                        
            $Info = explode('-', substr($Score,0,-1));                        
            $SkillClass = substr(Arr::first($Info), 0,1);
            $ModifiedSkill = intval(substr(Arr::first($Info), 1));            
            $SkillNum = $Class[Analysis_Category::getValue($SkillClass)-1]->minimum-1+$ModifiedSkill;                        
            if($ModifiedSkill!=0)
            {
              $ModifiedResult->put($SkillNum,intval(Arr::last($Info)));
            }
        } 
        // print_r($ModifiedResult); 
        foreach($ModifiedResult as $MKey=>$Mvalue)
        {            
            $ScoreRecord=$Ass_Scores->filter(function ($value, $key) use ($MKey,$id) {                    
                if($value['skill_id']==$MKey && $value['ass_id'] == $id)
                   return $value;
            });                       
            if($ScoreRecord->isEmpty())
            {
                if($Mvalue!=0)
                {
                 $Info = collect([]);
                 $Info->put('ass_id',$id);
                 $Info->put('skill_id',$MKey);
                 $Info->put('scores',$Mvalue); 
                 //print_r($id.': '.$MKey." ADD ".$Mvalue."\r\n");
                 $this->assessment_repo->AddNewAssessmentScores($Info);                
                }
            }
            else
            {
                foreach($ScoreRecord as $AS_Score)
                {                        
                    if($ModifiedResult->has($AS_Score->skill_id))
                    {
                        // print_r($AS_Score->ass_id.': '.$AS_Score->skill_id." IN\r\n");
                        if($AS_Score->ass_id == $id)
                        {
                            if($ModifiedResult->get($AS_Score->skill_id)!=0 && $ModifiedResult->get($AS_Score->skill_id)!=$AS_Score->scores)
                            {
                             $AS_Score->scores=$ModifiedResult->get($AS_Score->skill_id);                     
                            //  print_r($AS_Score->ass_id.': '.$AS_Score->skill_id." Change\r\n");
                             $AS_Score->save();
                            }
                            else if($ModifiedResult->get($AS_Score->skill_id)==0)
                            {
                                // print_r($AS_Score->ass_id.': '.$AS_Score->skill_id." Delete\r\n");
                                $AS_Score->delete();  
                            }
                            // else
                            // {                        
                            //     print_r($AS_Score->ass_id.': '.$AS_Score->skill_id." Same\r\n");                      
                            // }
                        }
                    }
                }   
            }            
        }                 
    }
    /*================================== 
    * @brief: Get Assessment Already Complete
    * @paeam_in: $ID                 
    * @return: Assessment Score
    ===================================*/        
    public function GetCompleteAssessment($id)
    {        
        $CompleteScore = $this->GetAssessmentScore($id)->filter(function($value,$key){            
                foreach($value as $index=>$Score)
                {                
                    $ScoreCunter = array_count_values($Score->get('Score'));
                    if(array_key_exists('#0',$ScoreCunter))
                      {                                                          
                        $value->forget($index);
                      }                
                }  
                return $value;
        });                    
        $CompleteInfo=collect([]);
        foreach($CompleteScore as $Class=>$Skill)
        {   
            if($Skill->isNotEmpty())
            {         
               $ClassInfo=collect([]);
               foreach($Skill as $ID=>$Score)
               {
                   $Info=collect([]);
                   $Info->put('Index',Analysis_Category::getKey($Class+1).($ID+1));
                   $Info->put('Edit-Color',$Score->get('Edit'));   
                   $Info->put('Color',$Score->get('Score'));             
                   $ClassInfo->push($Info);
               }     
               $CompleteInfo->put(Analysis_Category::getKey($Class+1),$ClassInfo);    
            }
        }        
        return $CompleteInfo;
    }
    /*================================== 
    * @brief: Get Assessment Already Complete
    * @paeam_in: $ID                 
    * @return: Assessment Score
    ===================================*/        
    public function GetInCompleteAssessment($id)
    {        
        $CompleteScore = $this->GetAssessmentScore($id)->filter(function($value,$key){                       
                foreach($value as $index=>$Score)
                {                
                    $ScoreCunter = array_count_values($Score->get('Score'));
                    if(!array_key_exists('#0',$ScoreCunter))
                      {                                                          
                        $value->forget($index);
                      }                
                }  
                return $value;
        });                    
        $CompleteInfo=collect([]);
        foreach($CompleteScore as $Class=>$Skill)
        {            
            if($Skill->isNotEmpty())
            {
              $ClassInfo=collect([]);
              foreach($Skill as $ID=>$Score)
              {
                  $Info=collect([]);
                  $Info->put('Index',Analysis_Category::getKey($Class+1).($ID+1));
                  $Info->put('Edit-Color',$Score->get('Edit'));   
                  $Info->put('Color',$Score->get('Score'));             
                  $ClassInfo->push($Info);
              }     
              $CompleteInfo->put(Analysis_Category::getKey($Class+1),$ClassInfo);    
            }
        }        
        return $CompleteInfo;
    } 
    /*================================== 
    * @brief: Delete Assessment Score
    * @paeam_in: $ID                 
    * @return: Delete Success or not
    ===================================*/    
    public function DeleteRecord($id)      
    {
      $Assessment = $this->assessment_repo->GetAssessment(['ass_id' => $id],'created_at')->first();       
      $Permission = $this->Permission_service->GetPermission(['user_id' => Auth::user()->user_id, 'seat_id' => $Assessment->seat_id])->first();       
      if($Assessment != null && $Permission!=null && ($Permission->owner!=0 || $Permission->coordinator!=0 || $Permission->full_access!=0 || $Permission->assessments_report==2))  
      {
        $WorkSheetList = $this->reprot_repo->GetWorkSheetReportRecord(['assessment_id' => $id],'created_at');   
        $ProgressList = $this->reprot_repo->GetProgressReportRecord(['worksheet_id' => $id],'created_at');        
        $BaseLineList = $this->reprot_repo->GetBaseLineReport(['assessment_id' => $id],'created_at');        
        $StatusList = $this->reprot_repo->GetStatusReportRecord(['assessment_id' => $id],'created_at');
        $ScoreList = $this->assessment_repo->GetAssessmentScores(['ass_id' => $id],'created_at');
        $SkillNote = SkillNoteEntity::where(['ass_id' => $id],'created_at')->get();        
        //Clear WorkSheet
        foreach ($WorkSheetList as $Worksheet)
        {
           $ContentList = $this->reprot_repo->GetWorkSheetContent(['worksheet_id' => $id],'created_at'); 
           foreach($ContentList as $Content)
           {
               $Content->delete();
           }           
           $Worksheet->delete();
        }
        //Clear Progress
        foreach ($ProgressList as $Progress)
        {
           $ContentList = $this->reprot_repo->GetProgressContent(['progress_id' => $id],'created_at'); 
           foreach($ContentList as $Content)
           {
               $Content->delete();
           }           
           $Progress->delete();
        }   
        //Clear BaseLine
        foreach ($BaseLineList as $BaseLine)
        {
           $BaseLine->delete();
        }                
        //Clear BaseLine
        foreach ($StatusList as $Status)
        {
           $Status->delete();
        }    
        //Clear Skill Note
        foreach ($SkillNote as $Note)
        {
           $Note->delete();
        }    
        //Clear Skill Note
        foreach ($ScoreList as $Score)
        {
           $Score->delete();
        }    

        $Assessment->delete();
        return true;
      }
      else
      {
          return false;
      }
    }
    /*================================== 
    * @brief: Add Skill Note
    * @paeam_in: $Assess_ID, $Skill_id                 
    * @return: Task Info
    ===================================*/     
    public function AddSkillNote(Request $request)
    {
        $SkillClass = new Skill_Class_Entity(); 
        $SkillScores = new Skill_Scores_Entity();
        $User= Auth::user();
        $AssID = intval($request->ass_id); 
        $Assessment = $this->assessment_repo->GetAssessment(['ass_id' => $AssID],'created_at')->first();  
        $SkillNo = $SkillClass->find(Analysis_Category::getValue(substr($request->Index,0,1)))->minimum+intval(substr($request->Index,1))-1;       
        $Note = new SkillNoteEntity();
        $Note->create_id= $User->user_id;
        $Note->seat_id= $Assessment->seat_id;
        $Note->ass_id= $AssID;
        $Note->skill_id= $SkillNo;
        $Note->notes= $request->note;
        if($request->isopen == 'false')
           {
               $Note->open= 0;
           }
        else
           {
                $Note->open= 1;
           }   
        $Note->save();  
        $temp = collect([]);
        $temp->put("Created_by",$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
        $temp->put("Created_time",$this->Utils->GetDateByFormat($Note->created_at));
        $temp->put("IsOpen",$Note->open);
        $temp->put("Note_index",$Note->note_id);
        $temp->put("Note",$Note->notes);
        return $temp; 
    }
    /*================================== 
    * @brief: Add Skill Note
    * @paeam_in: $Assess_ID, $Skill_id                 
    * @return: Task Info
    ===================================*/     
    public function UpdateSkillNote(Request $request)
    {
        $Note = SkillNoteEntity::find($request->note_id);
        $Note->notes= $request->note;        
        $Note->save();        
    }    
    /*================================== 
    * @brief: Add Skill Note
    * @paeam_in: $Assess_ID, $Skill_id                 
    * @return: Task Info
    ===================================*/     
    public function DeleteSkillNote(Request $request)
    {
        $Note = SkillNoteEntity::find($request->note_id);        
        $Note->delete();        
    }        
    /*================================== 
    * @brief: Get Task Info Detail
    * @paeam_in: $Assess_ID, $Skill_id                 
    * @return: Task Info
    ===================================*/        
    public function GetTaskInfoDetail($AssID,$SkillID)
    {
       $SkillClass = new Skill_Class_Entity(); 
       $SkillScores = new Skill_Scores_Entity();
       $AssID = intval($AssID);       
       $SkillNo = $SkillClass->find(Analysis_Category::getValue(substr($SkillID,0,1)))->minimum+intval(substr($SkillID,1))-1;       
       $TotalScores = $SkillScores->find($SkillNo)->scores;
       $Assessment = $this->assessment_repo->GetAssessment(['ass_id' => $AssID],'created_at')->first();         
       $User=User::find($Assessment->user_id); 
       $All_Assessment=$this->assessment_repo->GetAssessment(['seat_id' => $Assessment->seat_id],'created_at');
       $TaskInfo = collect([]);
       $TaskInfo->put("Index",$SkillID);
       $TaskInfo->put("ass_id",$AssID);
       $TaskInfo->put("Files",collect([]));
       $TaskInfo->put("Video",collect([]));
       if($Assessment->initialize == 0) 
        {            
            $Initial_Color = $All_Assessment->first()->color;   

        }        
        else
        {
            $Initial_Color= $Assessment->color;
        } 
       $ScoreInfo=collect([]);
       $Scores=collect([]);
       for($j=0;$j<$TotalScores;$j++)
          {
            $Scores->put($j,'#0');
          }    
       //Put Score
       foreach($All_Assessment as $Ass)
       {          
          if($Ass->ass_id<=$AssID)
          {
            $User=User::find($Ass->user_id);  
            $i = Arr::first($this->assessment_repo->GetAssessmentScores(['ass_id' => $Ass->ass_id,'skill_id' => $SkillNo],'skill_id')->toArray());                                                             
            $temp=collect([]); 
            $tempScore=collect([]);                                                      
            if(empty($i)==true)
            {
                $temp->put('Created_by',$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
                $temp->put('Scored_by',$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
                $temp->put('Created_time',$this->Utils->GetDateByFormat($Ass->created_at));
                $temp->put('Scored_time',$this->Utils->GetDateByFormat($Ass->updated_at));
                $temp->put('Color',$Ass->color);
                for($j=0;$j<$TotalScores;$j++)
                {
                  $tempScore->put($j,$Scores[$j]);
                }    
                $temp->put('Score',$tempScore);
                if(Arr::first($Scores)=='#0')
                {                     
                    $temp->put('EditColor',$Initial_Color);  
                }                
                else if(Arr::first($Scores)!=$Initial_Color)
                {                           
                    $temp->put('EditColor',$Initial_Color);  
                }
                else
                {                   
                   $temp->put('EditColor','#0'); 
                }
 
            }            
            else
            {                
               $temp->put('Created_by',$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
               $temp->put('Scored_by',$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
               $temp->put('Created_time',$this->Utils->GetDateByFormat($Ass->created_at));
               $temp->put('Scored_time',$this->Utils->GetDateByFormat($i['updated_at']));
               $temp->put('Color',$Ass->color);
               for($j=0;$j<$i['scores'];$j++)
               {
                  if($Scores[$j]=="#0")
                  {
                    $Scores[$j]=$Ass->color;                    
                  } 
               }               
               for($j=0;$j<$TotalScores;$j++)
               {
                 $tempScore->put($j,$Scores[$j]);
               }    
               $temp->put('Score',$tempScore);
               if(Arr::first($Scores)=='#0')
               {                  
                   $temp->put('EditColor',$Initial_Color);  
               }                
               else if(Arr::first($Scores)!=$Initial_Color)
               {                         
                   $temp->put('EditColor',$Initial_Color);  
               }
               else
               {                    
                  $temp->put('EditColor','#0'); 
               }               
            } 
            $ScoreInfo->push($temp); 
          }
       }       
       $TaskInfo->put("Scores",$ScoreInfo);
       $NotesList = $this->skillnote_repo->GetNotes(['ass_id' => $AssID,'skill_id'=>$SkillNo],'skill_id');            
       if($NotesList->count()==0)
       {
        $TaskInfo->put("Notes",collect([]));
       }
       else
       {
          $NoteInfo=collect([]);
          foreach($NotesList as $Note)
          {
              $temp = collect([]);
              $User= User::find($Note->create_id);
              $temp->put("Created_by",$this->Utils->GetNameByFormat($User->first_name,$User->last_name));
              $temp->put("Created_time",$this->Utils->GetDateByFormat($Note->created_at));
              $temp->put("IsOpen",$Note->open);
              $temp->put("Note_index",$Note->note_id);
              $temp->put("Note",$Note->notes);
              $NoteInfo->push($temp);              
          }
          $TaskInfo->put("Notes",$NoteInfo); 
       }       
       $Permission = $this->Permission_service->GetPermissionInfo(Auth::user()->user_id,$Assessment->seat_id);
       $TaskInfo->put("Permission",$Permission);
       return $TaskInfo;
    }
    /*================================== 
    * @brief: Add Assessment Record
    * @paeam_in: $seat_id , $request
    * @return: $Assessment ID
    ===================================*/
    public function AddRecord($seat_id,$Info)
    {
      $OldRecord = $this->assessment_repo->GetAssessment(['seat_id' => $seat_id],'created_at');      
      $Record = collect([]); 
      $Record->put('seat_id',intval($seat_id));
      $Record->put('user_id',Auth::user()->user_id);
      $Record->put('color',Arr::get($Info,'color'));
      $Record->put('grade_level',intval(Arr::get($Info,'GradeLevel')));      
      if($OldRecord->isEmpty())
         {
           $Record->put('initialize',1);
         }
      else
         {
            $Record->put('initialize',0);
         }        
      $Record->put('notes',Arr::get($Info,'Notes'));
      $Record->put('pl_1',Arr::get($Info,'program_level_1'));
      $Record->put('pl_2',Arr::get($Info,'program_level_2'));
      $Record->put('pl_3',Arr::get($Info,'program_level_3'));
      $Record->put('pl_4',Arr::get($Info,'program_level_4'));
      $Record->put('pl_5',Arr::get($Info,'program_level_5'));
      $Record->put('o_1',Arr::get($Info,'other_1'));
      $Record->put('o_2',Arr::get($Info,'other_2'));
      $Record->put('o_3',Arr::get($Info,'other_3'));
      $Record->put('o_4',Arr::get($Info,'other_4'));
      $Record->put('o_5',Arr::get($Info,'other_5'));
      $Record->put('avg_h_1',Arr::get($Info,'average_hours_1'));
      $Record->put('avg_h_2',Arr::get($Info,'average_hours_2'));
      $Record->put('avg_h_3',Arr::get($Info,'average_hours_3'));
      $Record->put('avg_h_4',Arr::get($Info,'average_hours_4'));
      $Record->put('avg_h_5',Arr::get($Info,'average_hours_5'));
      if(Auth::user()->date_format == 0)
      {
        $Record->put('assigned_date',date("Y/m/d",strtotime(Arr::get($Info,'assessDate'))));
      }
      else
      {
        $Record->put('assigned_date',date("Y/m/d",strtotime(str_replace('/', '-', Arr::get($Info,'assessDate')))));          
      }            
      $AssID = $this->assessment_repo->AddNewAssessmentRecord($Record);  
      return $AssID;
    }
    /*================================== 
    * @brief: Add Assessment Record
    * @paeam_in: $seat_id , $request
    * @return: $Assessment ID
    ===================================*/
    public function UpdateAssessmentRecord($id,$Info)
    {        
        $Record = $this->assessment_repo->GetAssessment(['ass_id' => $id],'created_at')->first();
        $Record->color = Arr::get($Info,'color');
        $Record->grade_level = intval(Arr::get($Info,'GradeLevel')); 
        $Record->notes =  Arr::get($Info,'Notes');
        $Record->pl_1 = Arr::get($Info,'program_level_1');
        $Record->pl_2 = Arr::get($Info,'program_level_2');
        $Record->pl_3 = Arr::get($Info,'program_level_3');
        $Record->pl_4 = Arr::get($Info,'program_level_4');
        $Record->pl_5 = Arr::get($Info,'program_level_5');
        $Record->o_1  = Arr::get($Info,'other_1');
        $Record->o_2  = Arr::get($Info,'other_2');
        $Record->o_3  = Arr::get($Info,'other_3');
        $Record->o_4  = Arr::get($Info,'other_4');
        $Record->o_5  = Arr::get($Info,'other_5');
        $Record->avg_h_1 = Arr::get($Info,'average_hours_1');
        $Record->avg_h_2 = Arr::get($Info,'average_hours_2');
        $Record->avg_h_3  = Arr::get($Info,'average_hours_3');
        $Record->avg_h_4  = Arr::get($Info,'average_hours_4');
        $Record->avg_h_5 = Arr::get($Info,'average_hours_5');
        if(Auth::user()->date_format == 0)
        {
          $Record->assigned_date= date("Y/m/d",strtotime(Arr::get($Info,'assessDate')));
        }
        else
        {
          $Record->assigned_date = date("Y/m/d",strtotime(str_replace('/', '-', Arr::get($Info,'assessDate'))));          
        }    
        $Record->save();     
        return $Record->seat_id;       
    }    
}