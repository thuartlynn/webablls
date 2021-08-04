<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PurchaseService;

use Illuminate\Support\Collection;

class PurchaseController extends Controller
{
    /*
    * ====== Local Parameter ========= 
    */        
    protected $Purchase_Service; 
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');;
        $this->Purchase_Service = new PurchaseService();            
        
    }
    /*================================== 
    * @brief: Display Purchase Main Screen
    * @paeam_in: 
    * @return: return Purchase view
    ===================================*/     
    public function show()
    {      
      return view('purchase')->with('OrgNameCheck',collect([
        "CheckResult" => 'PANDING',
        'Message' => '',
      ]));
    }
    /*================================== 
    * @brief: Display Account Detail Screen
    * @paeam_in: 
    * @return: return Account Detail
    ===================================*/     
    public function showDetail()
    {
      
      return view('details')->with('AccountCheck',collect([
         "CheckResult" => 'PANDING',
         'Message' => '',
       ]));
    }
    /*================================== 
    * @brief: Display Payment Information
    * @paeam_in: 
    * @return: Payment information
    ===================================*/  
    public function showPayment()
    {            
      if(session()->has('OrgInfo') && session()->has('OrderInfo') && session()->has('AdminInfo'))
      {
         $PaymentInfo = $this->Purchase_Service->CreatePayment();
         //dd($PaymentInfo);
         return view('payment')->with('PaymentInfo',$PaymentInfo);
      }
      else
      {
        return redirect(url('purchase'));       
      }
    }
    /*================================== 
    * @brief: Display Done Screen
    * @paeam_in: 
    * @return: Payment information
    ===================================*/  
    public function showDone()
    {
       return view("payment_done");
    }        
    /*================================== 
    * @brief: Save Bill Information
    * @paeam_in: 
    * @return: Redirect to details page.
    ===================================*/  
    public function CreateDetail(Request $request)    
    {
      $Check = $this->Purchase_Service->SaveOrgBillInformation($request);
      if($Check == true)
      {
        return redirect(url('purchase/details'));       
      }
      else
      {
        return view('purchase')->with('OrgNameCheck',collect([
          "CheckResult" => 'Error',
          'Message' => 'Organization or Registered name has already exist',
        ]));   
      }
    }       
    /*================================== 
    * @brief: Check Account Information
    * @paeam_in: 
    * @return: Redirect to details page or payment screen.
    ===================================*/  
    public function CreatePayment(Request $request)
    {
      $CreateResult = $this->Purchase_Service->ConfirmAccountInform($request);
      if($CreateResult->get('CheckResult') == 'ERROR')
      {
        return view('details')->with('AccountCheck',$CreateResult);
      }
      else
      {
       return redirect(url('purchase/payment'));       
      }
    }       
    /*================================== 
    * @brief: Check Payment Information
    * @paeam_in: 
    * @return: Confirm Payment Success or not.
    ===================================*/  
    public function CheckPayment(Request $request)
    {
      return redirect(url('purchase'));
    }
    /*================================== 
    * @brief: Check Payment Information
    * @paeam_in: 
    * @return: Confirm Payment Success or not.
    ===================================*/  
    public function PaymentDone(Request $request)
    {
      $this->Purchase_Service->CreateOrgainzation();
      return view("payment_done");
    }    
    
}
