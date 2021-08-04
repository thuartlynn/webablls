<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    /*
    * ====== Local Parameter ========= 
    */        
    protected $user_service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
        // $this->user_service = new UserService();
    }
    /**
     * Select Display Main view
     *
     * return: View
     */
    public function show()
    {
        return view('Reports_list');
    }
    /**
     * Select Display Edit view
     *
     * return: View
     */
    public function showDetail()
    {
        return view('Reports_view_Worksheet');
    }


}
