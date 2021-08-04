<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Services\DashBoardService;
use App\Services\OrganizationService;
use Auth;


class DashboardController extends Controller
{
    /*
    * ====== Local Parameter ========= 
    */        
    protected $dashboard_service;
    protected $org_service;      
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        $this->dashboard_service = new DashBoardService();
        $this->org_service = new OrganizationService();  


    }
    /*================================== 
    * @brief: Display Dashboard Main Screen
    * @paeam_in: 
    * @return: Organization detail information
    ===================================*/     
    public function show()
    {
        $LoginHistory = $this->dashboard_service->GetUserHistory(Auth::user()->user_id);
        $ToDoList =$this->dashboard_service->GetTodoList(Auth::user()->user_id);
        $OrgInfo = $this->org_service->GetInfo();        
        $OrgBulletin=$this->org_service->GetActiveBulletinInfo();        
        return view('Dashboard')->with(['To_Do_List'=>$ToDoList,'Login_History'=>$LoginHistory,'Info'=>$OrgInfo,'Bulletin'=>$OrgBulletin]);
    }
    /*================================== 
    * @brief: Add ToDo List Information
    * @paeam_in: 
    * @return: Organization detail information
    ===================================*/     
    public function AddToDo(Request $request)
    {
        $this->dashboard_service->AddTodoList($request->get('User'),$request->get('Title'),$request->get('Details'));  
        return response('ADD Todo List Success',200);      
    }    

    /*================================== 
    * @brief: Remove ToDo List
    * @paeam_in: 
    * @return: Organization detail information
    ===================================*/     
    public function RemoveToDo(Request $request)
    {
        $this->dashboard_service->RemoveTodoList($request->get('ID')); 
        return response('Remove Todo List Success',200);

    }    
    /*================================== 
    * @brief: Download Bulletin File
    * @paeam_in: 
    * @return: File Data
    ===================================*/         
    public function DownloadBulletinFile($id)
    {   
      $file = $this->org_service->DownloadBulletin($id);  
      return response()->download(storage_path('app/BulletinBoard/'.$file->file_path),$file->file_name);
     
    }
}
