<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService; 
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use Auth;


class AccountController extends Controller
{
    
    /*
    * ====== Local Parameter ========= 
    */        
    protected $user_service;
    protected $Message; 
    protected $profile;   
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        $this->user_service = new UserService();
    }
    /**
     * Select Display Main view
     *
     * return: View
     */
    public function show(Request $request)
    {                  
      if($request->input() == null)
      {
       return view('Account')->with('Result',collect([
         "ChangeResult" => 'PANDING',
         'Message' => '',]));
      }
      else
      {
        return view('Account')->with('Result',collect([
          "ChangeResult" => 'OK',
          'Message' => 'Changes have beed saved',]));        
      }
    }
    public function showChangeAccount()
    {      
      return view('Account')->with('Result',collect([
        "ChangeResult" => 'OK',
        'Message' => '',]));
    }    
    /**
     * Select Display Change Details view
     *
     * return: View
     */
    public function show_ChangeDetails()
    {
      return view('Account_Change_Details')->with('Result',collect([
        "ChangeResult" => 'PANDING',
        'Message' => '',]));
    }
    /**
     * Select Display Change Email view
     *
     * return: View
     */
    public function show_ChangeEmail()
    {
      return view('Account_Change_Email')->with('Result',collect([
        "ChangeResult" => 'PANDING',
        'Message' => '',]));
    }
    /**
     * Select Display Change Language view
     *
     * return: View
     */
    public function show_ChangeLanguage()
    {
      return view('Account_Change_Language')->with('Result',collect([
        "ChangeResult" => 'PANDING',
        'Message' => '',]));
    }    
    /**
     * Select Display Change Password view
     *
     * return: View
     */
    public function show_ChangePassword()
    {
      return view('Account_Change_Password')->with('Result',collect([
        "ChangeResult" => 'PANDING',
        'Message' => '',
      ]));
    }    
    /*================================== 
    * @brief: Handle Password Change
    * @paeam_in: $request -> Http Request                 
    * @return: $result -> Update result.
    ===================================*/    
    
    public function ChangePassword(Request $request)
    {
      $this->Message = $this->user_service->ChangePassword($request->CurrentPassword,$request->NewPassword);
      return view('Account_Change_Password',['Result' => $this->Message]);
    }
    /*================================== 
    * @brief: Handle User infomation change
    * @paeam_in: $request -> Http Request                 
    * @return: $result -> Update result.
    ===================================*/    
    public function ChangeDetails(Request $request)
    {
      $this->Message = $this->user_service->UpdateUserInfo(Auth::id(),$request);                  
      return redirect(url('Account/?Change=success'));   
    }    
    /*================================== 
    * @brief: Handle User Email change
    * @paeam_in: $request -> Http Request                 
    * @return: redirect to logout .
    ===================================*/        
    public function ChangeEmail(Request $request)
    {
      $this->Message = $this->user_service->ChangeEmail($request);
      if($this->Message->get('ChangeResult') == 'OK')
      {
         return redirect(url('logout'));
      }
      else
      {
        return view('Account_Change_Email',['Result' => $this->Message]);
      }     
    }    
    /*================================== 
    * @brief: Handle User Language change
    * @paeam_in: $request -> Http Request                 
    * @return: redirect to logout .
    ===================================*/ 
    public function ChangeLanguage(Request $request)
    {
      $this->Message = $this->user_service->ChangeLanguage($request);
      return view('Account_Change_Language',['Result' => $this->Message]);
    }               
    
}
