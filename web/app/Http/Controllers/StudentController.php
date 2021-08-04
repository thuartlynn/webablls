<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use App\Services\UserService as User; 
use App\Services\SeatService as Seat; 
use App\Services\ProfilePermissionService as Permission; 
use App\Services\StudentService as Student; 
use App\Services\AssessmentService as Assessment; 
use App\Services\ContactListService as ContactList; 
use App\Services\OrganizationService as Organization; 
use Auth;
use App\Enums\SeatStatus;
use App\Enums\UserStatus;
use App\Enums\UserRole;
use App\Enums\Diagonstic;

class StudentController extends Controller
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $Seat_service;
    protected $Permission_service;
    protected $User_service;
    protected $Student_service;
    protected $Assessment_service;
    protected $Contact_service;
    protected $Org_service; 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        $this->User_service = new User();
        $this->Seat_service = new Seat();
        $this->Permission_service = new Permission();    
        $this->Student_service = new Student();    
        $this->Assessment_service = new Assessment();
        $this->Contact_service = new ContactList();
        $this->Org_service = new Organization();
    }    
    /*================================== 
    * @brief: Display Studnet Main Screen
    * @paeam_in: 
    * @return: All Studnt list
    ===================================*/    
    public function showList()
    {
       $Students = $this->Student_service->GetAllStudentList(Auth::user()->user_id);
       //dd($Students);
       return view('Student_list')->with('Students',$Students);
    }
    /*================================== 
    * @brief: Display Add Student Screen
    * @paeam_in: 
    * @return: Add student view
    ===================================*/    
    public function showAddStudent()
    {
        $UserInfo = $this->User_service->OrgMemberInfo(Auth::user()->org_id,UserRole::WithoutRestricted()->value);     
        $SPData = $this->Org_service->GetStudnetParameterInformation(Auth::user()->org_id);    
        return view('Student_addStudent')->with(['Coordinator'=>$UserInfo,'SPData' => $SPData]);
    }
    /*================================== 
    * @brief: Display View Summary Screen
    * @paeam_in: 
    * @return: Summary Screen 
    ===================================*/ 
    public function showViewSummary($id)
    {         
        $Summary = $this->Student_service->GenSummaryInformation($id);
        $this->Student_service->AddSeatHistoryRecord(Auth::user()->user_id,$id);
        // dd($Summary);
        return view('Student_summary')->with(['Student' => $Summary->get('Student'),'Assessment' => $Summary->get('Assessment'),
                    'Coordinator' => $Summary->get('Coordinator'),'Owners' => $Summary->get('Owners')]);
    }
    /*================================== 
    * @brief: Display View Student Profile Screen
    * @paeam_in: 
    * @return: Student Profile Screen 
    ===================================*/ 
    public function showSeatProfile($id)
    {
       $Profile = $this->Student_service->GetStuedntInformation($id);       
       $PC_List = $this->User_service->GetPCList($Profile->get('PC'),Auth::user()->user_id); 
       $SPData = $this->Org_service->GetStudnetParameterInformation($Profile->get('Org'));   
    //    dd($Profile);   
       return view('Student_profile')->with(['Profile'=> $Profile,'PC_List' => $PC_List,'SPData' => $SPData]);
    }

    /*================================== 
    * @brief: Display View Total Grid Screen
    * @paeam_in: 
    * @return: Total Grid Screen
    ===================================*/ 
    public function showTotalGride($id)
    {
        return view('Student_list');
    }
    /*================================== 
    * @brief: Display View Assessment Screen
    * @paeam_in: 
    * @return: Student Assessment Screen
    ===================================*/ 
    public function showAssessment($id)
    {          
        $SeatInfo = $this->Seat_service->GetSeatInfo($id);
        $Assessment_Data = $this->Student_service->GenAssessmentInfo($id,$this->Assessment_service->GetAssessmentInformation(['seat_id' => $id],'created_at'));
        //dd($Assessment_Data);
        return view('Student_assessments')->with(['Student' => $SeatInfo,'Assessment'=>$Assessment_Data]);
    }    
    /*================================== 
    * @brief: Display View Student report Screen
    * @paeam_in: 
    * @return: Student Report Screen
    ===================================*/ 
    public function showReportList($id)
    {
        $SeatInfo = $this->Seat_service->GetSeatInfo($id);
        $Report_Info = $this->Student_service->GenReportInformation($id);
        return view('Student_reports')->with(['Student' => $SeatInfo,'Report'=>$Report_Info]);
    }    
    /*================================== 
    * @brief: Display View Student history Screen
    * @paeam_in: 
    * @return: Student history Screen
    ===================================*/ 
    public function showHistoryList($id,Request $request)
    {
        if(array_key_exists('filter',$request->all()))
        {
         $filter=$request->filter;   
         $Info = $this->Student_service->GetSeatHistoryRecords($id);
         $Info['FullHistory'] = $Info['FullHistory']->filter(function ($value, $key) use ($filter) {                    
            list($c_year,$c_month) = explode('/',$filter);
            if(Auth::user()->date_format == 0)
               list($o_month,$o_day, $o_year) = explode('/',$value['Date']);
            else   
               list($o_day,$o_month, $o_year) = explode('/', $value['Date']);
            if($c_year==$o_year && $c_month == $o_month)
              {
                  return $value;
              }
          });                              
        }
        else
        {
          $Info = $this->Student_service->GetSeatHistoryRecords($id);
        }              
        $SeatInfo = $this->Seat_service->GetSeatInfo($id);
        // dd($Info);
        return view('Student_sHistory')->with(['Student' => $SeatInfo,'Records'=>$Info['FullHistory'],'History'=>$Info['ShortHistory']]);
    }        
    /*================================== 
    * @brief: Display View Student history Screen
    * @paeam_in: 
    * @return: Student history Screen
    ===================================*/ 
    public function showFileList($id)
    {
        $SeatInfo = $this->Seat_service->GetSeatInfo($id);
        $List = $this->Student_service->GetFileList($id);
        return view('Student_files')->with(['Student' => $SeatInfo,'FileList'=>$List]);
    }
    /*================================== 
    * @brief: Display View Share Student Permission Screen
    * @paeam_in: 
    * @return: Share Student Permission Screen
    ===================================*/ 
    public function showSharePermission($id)
    {
        $student = $this->Seat_service->GetSeatInfo($id);
        $UserInfo = $this->User_service->OrgMemberInfo(Auth::user()->org_id,UserRole::WithoutRestricted()->value);
        $Author = $this->Permission_service->GetPermissionBySeat($id); 
        $ContactMember = $this->Contact_service->GetUserContactList(Auth::user()->user_id); 
        $Contact=collect([]);
        foreach($ContactMember as $Member)
        {
            $Permission = $this->Permission_service->GetPermissionBySeatandUser($id,$Member,0);
            $Contact->push($Permission);
        }
        $OrgMember = collect([]);
        $SupportMember = collect([]);
        foreach($UserInfo as $temp)
        {            
            if($temp['ID'] != Auth::user()->user_id)
            {                
                $Permission = $this->Permission_service->GetPermissionBySeatandUser($id,$temp['ID'],0);
                $OrgMember->push($Permission);
            }
            if($temp['Role'] == UserRole::getDescription(UserRole::Administrator()->value))
            {                
                $Permission = $this->Permission_service->GetPermissionBySeatandUser($id,$temp['ID'],0);
                $SupportMember->push($Permission);
            }
        }        
        // dd(['Author' => $Author,'Contact' => $Contact,'OrgMember' => $OrgMember,'Supporter' => $SupportMember]);        
        return view('Student_shareStudent')->with(['Student'=>$student,'Author' => $Author,'Contact' => $Contact,'OrgMember' => $OrgMember,'Supporter' => $SupportMember]);       ;
    }
    /*================================== 
    * @brief: Display View Student Notes List Screen
    * @paeam_in: 
    * @return: Student Note List Screen
    ===================================*/ 
    public function showNotesList($id)
    {
        $Student = $this->Seat_service->GetSeatInfo($id);         
        $Notes = $this->Student_service->GetStudentNotes($id);
        
        return view('Student_notes')->with(['Students'=>$Student,"Notes"=>$Notes]); 
    }
    /*================================== 
    * @brief: Display View AnalyStics List Screen
    * @paeam_in: 
    * @return: AnalyStics List Screen
    ===================================*/ 
    public function showAnalyticsList($id)
    {
        $Students = $this->Student_service->GetAllStudentList(Auth::user()->user_id);
        return view('Student_list')->with('Students',$Students); 
    }    
    /*================================== 
    * @brief: Display View AddAnalysis Screen
    * @paeam_in: 
    *           $id -> Seat ID
    * @return: Add Analysis  Screen
    ===================================*/ 
    public function showAddAnalysis($id)
    {
        $SeatInfo = $this->Seat_service->GetSeatInfo($id);
        return view('Student_addAnalysis')->with('Student',$SeatInfo);
    }                 
    /*================================== 
    * @brief: Display View AddAnalysis Screen
    * @paeam_in: 
    *           $id -> Seat ID
    * @return: Add Analysis  Screen
    ===================================*/ 
    public function showAddAssessment($id)
    {        
        $Info = $this->Student_service->AddNewAssessment($id);
        return view('Student_addAssess')->with('NewAssInfo',$Info); 
    }
    /*================================== 
    * @brief: Add Analysis to DB
    * @paeam_in: 
    *           $id -> Seat ID  
    * @return: Add Analysis  
    ===================================*/ 
    public function AddAnalysis($id,Request $request)
    {

    }
    /*================================== 
    * @brief: Add New Student
    * @paeam_in: $request -> student info           
    * @return: Add Analysis  
    ===================================*/ 
    public function AddStudent(Request $request)
    {
        $Seat = $this->Student_service->AddProfile($request);        
        if($request->saveStudent == 1)
        {
            return redirect(url('Student/List')); 
        }
        else if($request->saveStudent == 2)
        {
            return redirect(url('Student/AddAssess/'.$Seat->seat_id));
        }
        else
        {
            return redirect(url('Student/AddStudent'));
        }        
    }
    /*================================== 
    * @brief: Update Studend Profile
    * @paeam_in: $request -> student info           
    * @return: Add Analysis  
    ===================================*/
    public function UpdateProfile($ID,Request $request)
    {      
      $this->Student_service->UpdateProfilefromStudent($ID,$request);
      return redirect(url('Student/List')); 
    } 
    /*================================== 
    * @brief: File Download
    * @paeam_in: $request 
    * @return: 
    ===================================*/        
    public function FileDownload($sid,$fid)
    {       
       $file = $this->Student_service->DownloadFile($sid,$fid);       
       return response()->download(storage_path('app/'.$sid.'/'.$file->path),$file->name);
    }
    
    /*================================== 
    * @brief: File Process
    * @paeam_in: $request 
    * @return: 
    ===================================*/    
    public function FileProcess($id,Request $request)
    {        
                                
       switch($request->Action)
       {
           case 'Upload':              
                         $this->Student_service->UploadFile($id,$request);            
                         break;
           case 'Download':
                         $this->Student_service->DownloadFile($id,$request->File_ID);
                         return;
           case 'Remove':
                         $this->Student_service->RmoveFile($id,$request->File_ID);
                         break;
           case 'SetDescription':
                         $this->Student_service->UpdateFileScript($id,$request);
                         break; 
           default:
           return response('Wrong Action',400);  
       }
       return response($request->Action."Student File Success",200);
    }
    /*================================== 
    * @brief: File Process
    * @paeam_in: $request 
    * @return: 
    ===================================*/    
    public function AddAssessment($seat_id,Request $request)
    {       
       $AssessmetRecord = $this->Assessment_service->AddRecord($seat_id,$request->all());
       switch($request->method)
       {
          case "text":
               return redirect(url('/Assessment/TgvTextEdit/'.$AssessmetRecord));               
          case "grid":
               return redirect(url('/Assessment/TgvGridEdit/'.$AssessmetRecord));                              
          case "cat":
               return redirect(url('/Assessment/TgvCatEdit/'.$AssessmetRecord));               
          default:
               return abort(404);;                    
       }
    }    
}
