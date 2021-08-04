<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use App\Services\ContactListService as ContactService; 
use Auth;

class ContactController extends Controller
{
    /*
    * ====== Local Parameter ========= 
    */        
    protected $Contact_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        $this->Contact_service = new ContactService();
    }
    /*================================== 
    * @brief: Get Contact List by filter
    * @paeam_in: $filter 
    * @return: Contact Information
    ===================================*/    
    public function show()
    {
       return view("Contact_List");
    }
    /*================================== 
    * @brief: Get Contact List by filter
    * @paeam_in: $filter 
    * @return: Contact Information
    ===================================*/    
    public function showAdd()
    {
       return view("Contact_Add");
    }    
    /*================================== 
    * @brief: Get Contact List by filter
    * @paeam_in: $filter 
    * @return: Contact Information
    ===================================*/    
    public function AddContact(Request $request)
    {
        if($this->Contact_service->AddNewContactbyemail(Auth::user()->user_id,$request->Contact) == FALSE)
        {
            return response('Email already exist',400);  
        }
        else
        {
            return response('ADD Success',200);    
        }
    }
}
