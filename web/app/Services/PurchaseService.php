<?php

namespace App\Services;

use App\User;
use Illuminate\Http\Request;
use App\Services\UserService; 
use App\Services\OrderInfoService;
use App\Services\OrganizationService;
use App\Enums\OrganizationType;
use App\Enums\UserRole;
use App\Entites\Student_Parameter_Entity;
use App\Entites\Organization_Entity;



class PurchaseService 
{

    /*
    * ====== Local Parameter ========= 
    */           
    protected $User_Service;
    protected $Orderinfo_Service;
    protected $Organization_Service;   

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->User_Service = new UserService();
        $this->Orderinfo_Service = new OrderInfoService();
        $this->Organization_Service = new OrganizationService(); 

    }

    /*================================== 
    * @brief: Save Organization Bill Information
    * @paeam_in: $request -> Bill Information
    * @return: 
    ===================================*/    
    public function SaveOrgBillInformation(Request $request)
    {
        $OrgInfo = collect([]);
        session()->forget('OrgInfo');
        $Orgs = Organization_Entity::get();
        foreach($Orgs as $Org)
        {
          if($Org->org_name == $request->organization_name)
          {
            return false;
          }
        }
        $OrgInfo->put('name' ,$request->organization_name);
        $OrgInfo->put('type', $request->Type);
        $OrgInfo->put('address',$request->Address_name);      
        $OrgInfo->put('street',$request->Address_street);
        $OrgInfo->put('city',$request->Address_city);
        $OrgInfo->put('zipcode',$request->Address_zipcode);
        $OrgInfo->put('country',$request->Address_country);
        $OrgInfo->put('state',$request->Address_state);
        $OrgInfo->put('phone',$request->phone);        
        session()->put('OrgInfo',$OrgInfo);
        return true;
    }
    /*================================== 
    * @brief: Save Administrator User Information
    * @paeam_in: $request -> Adminstrator Information
    * @return: 
    ===================================*/    
    public function SaveAdminstratorInfo(Request $request)
    {
        $AdminInfo = collect([]);
        session()->forget('AdminInfo');
        $AdminInfo->put('FirstName' ,$request->administrator_first_name);
        $AdminInfo->put('LastName' ,$request->administrator_last_name);
        $AdminInfo->put('Email',$request->administrator_email);        
        session()->put('AdminInfo',$AdminInfo);        

    }
    /*================================== 
    * @brief: Save Order Information
    * @paeam_in: $request -> Order Information
    * @return: 
    ===================================*/    
    public function SaveOrderInfo(Request $request)
    {
        $OrderInfo = collect([]);
        session()->forget('OrderInfo');
        $OrderInfo->put('Quanity' ,$request->seatquantity);
        $OrderInfo->put('Extend' ,$request->extend);
        session()->put('OrderInfo',$OrderInfo);

    }    
    /*================================== 
    * @brief: Check Promotion Code
    * @paeam_in: $request -> Promotion Code
    * @return: Active or Inactive
    ===================================*/    
    public function CheckPromotionCode($Code)
    {
      if(strcmp('Webablls',$Code))
      {
          return FALSE;
      }
      else
      {
          return TRUE;
      }

    }
    /*================================== 
    * @brief: Confirm Account Detail Information
    * @paeam_in: $request -> Adminstrator Inform
    * @return: 
    ===================================*/    
    public function ConfirmAccountInform(Request $request)
    {
      //Check Email not Unique  
      if($this->User_Service->EmailIsUnique($request->administrator_email) == false)
      {
        return collect([
                        "CheckResult" => 'ERROR',
                        'Message' => 'Email already Exist',
                       ]);
      }
      //Check Promotion Code
      if($request->promotion_code != '')
      {
         if($this->CheckPromotionCode($request->promotion_code)==FALSE)
         {
            return collect([
                "CheckResult" => 'ERROR',
                'Message' => 'Promotion code not correct',
               ]);
         }
         else
         {
            session()->put('Promotion',TRUE);
         }
      }
      $this->SaveAdminstratorInfo($request);
      $this->SaveOrderInfo($request);
      return collect([
        "CheckResult" => 'OK',
        'Message' => '',
       ]);

    }
    /*================================== 
    * @brief: Create Payment Information
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function CreatePayment()
    {
        $PaymentInfo = collect([]);
        $Org = session()->get('OrgInfo');        
        $Order = session()->get('OrderInfo');
        $Admin = session()->get('AdminInfo');      

        $PaymentInfo->put('Org_Name',$Org->get('name'));         
        $PaymentInfo->put('Org_Type',OrganizationType::getDescription($Org->get('type')));
        $PaymentInfo->put('Org_Address',$Org->get('address'));
        $PaymentInfo->put('Org_Street',$Org->get('street'));
        $PaymentInfo->put('Org_City',$Org->get('city'));
        $PaymentInfo->put('Org_ZipCode',$Org->get('zipcode'));
        $PaymentInfo->put('Org_Country',$Org->get('country'));
        $PaymentInfo->put('Org_State',$Org->get('state'));
        $PaymentInfo->put('Org_Phone',$Org->get('phone'));
        $PaymentInfo->put('Account_Name',$Admin->get('FirstName').' '.$Admin->get('LastName'));
        $PaymentInfo->put('Account_Email',$Admin->get('Email'));
        $Seat = $Order->get('Quanity');
        $Entend = $Order->get('Extend');
        $PaymentInfo->put('Seats',$Seat);
        $PaymentInfo->put('Extend',$Entend);
        $Price = 100+60*($Entend-1);

        if($Seat >= 30) //30% off
          {
            $Total_Price = $Seat*$Price*0.7;
          }
        else if($Seat >= 20) //20% off
          {
            $Total_Price = $Seat*$Price*0.8;
          }  
        else if($Seat >= 10) //10% off
          {
            $Total_Price = $Seat*$Price*0.9;
          }
        else
          {
            $Total_Price = $Seat*$Price;
          }  
        $PaymentInfo->put('Total',$Total_Price);        
        return $PaymentInfo;
    }
    /*================================== 
    * @brief: Create Organization Information
    * @paeam_in: 
    * @return: 
    ===================================*/    
    public function CreateOrgainzation()
    {
      $Org = session()->get('OrgInfo');        
      $Order = session()->get('OrderInfo');            
      $Org->put('expiration',date('Y-m-d',strtotime(now().'+'.$Order->get('Extend').'years')));
      $Org->put('totalseat',intval($Order->get('Quanity')));
      $Org->put('usedseat',0);
      $newOrg = $this->Organization_Service->AddNewOrganization($Org);     
      for($i=0;$i<3;$i++)
      {
        $SP = new Student_Parameter_Entity();
        $SP->org_id=$newOrg->org_id;
        $SP->is_active=0;
        $SP->is_require=0;
        $SP->para_name = "Location";
        $SP->save();
      }
      $Admin = session()->get('AdminInfo'); 
      $Admin->put('role',UserRole::Administrator);
      $Admin->put('org_id',$newOrg->org_id);
      $Admin->put('org_name',$newOrg->org_name);             
      $this->User_Service->CreateAdminUser($Admin);   
      //Forget Register information
      session()->forget('OrgInfo');
      session()->forget('AdminInfo');
      session()->forget('OrderInfo');
    }    
}