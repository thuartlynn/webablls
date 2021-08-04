<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use App\Services\AnalysisService as AnalysisService; 
use Auth;


class AnalysisController extends Controller
{

    /*
    * ====== Local Parameter ========= 
    */        
      protected $Analysis_service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        $this->Analysis_service = new AnalysisService();

    }

    /*================================== 
    * @brief: Display Analysis main screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function show()
    {
         $Analysis_List = $this->Analysis_service->GetAllAnalysisList(Auth::user()->user_id);
         $counted = $Analysis_List->countBy(function ($Info) {        
              if($Info->get("Permission") == "V")
              {
                return "V";
              }
              else
              {
                return "M";
              }          
           });           
         if($counted->get('V') != NULL)
         {
            $Visible = $counted->get('V');
         }  
         else
         {
             $Visible = 0;
         }
        return view('Anaytics')->with(["AnalysisList" => $Analysis_List,'All' => $Analysis_List->count(),'Visible' => $Visible]);
    }
    /*================================== 
    * @brief: Display Analysis main screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function showview(Request $request)
    {                
        return view('Anaytics_View');
    }
    /*================================== 
    * @brief: Display Analysis Detail screen 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function showDetail($id,Request $request)
    {                
       $Info = $this->Analysis_service->GetAnalysisDetail($id); 
      //  dd($Info);
       return view('Anaytics_Change_Details')->with(["DetailInfo" => $Info]);
    }    
    /*================================== 
    * @brief: Remove Analysis List 
    * @paeam_in: 
    * @return: 
    ===================================*/        
    public function RemoveAnalysis(Request $request)
    {        
        $this->Analysis_service->DeleteAnalysis($request->Select);
        return response('Remove Analysis:'.$request->Select.'Success',200);            
    }
    /*================================== 
    * @brief: Update Analysis Detail Setting
    * @paeam_in: 
    * @return: 
    ===================================*/      
    public function UpdateDetail($id,Request $request) 
    {
      // $this->Analysis_service->UpdateAnalysisDetail($id,$request->all());  
      dd($request->all());
    } 
}
