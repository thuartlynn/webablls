<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use App\Entites\Organization_Entity as OrganizationEntity;
use App\Entites\Organization_BillAddress_Entity as OrganizationAddressEntity;

class OrganizationRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $organization_entity;
    protected $organization_address_entity;
    
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->organization_entity = new OrganizationEntity();
        $this->organization_address_entity = new OrganizationAddressEntity();
    }
    
    /*================================== 
    * @brief: Get Organization Address
    * @paeam_in: $Ord_id -> Organization ID
    * @return: $member -> Search result.
    ===================================*/    
    public function OrgAddressInfo($org_id)
    {
      return $this->organization_address_entity->all()->where('org_id','=',$org_id);       
    }
    /*================================== 
    * @brief: Delete Organization Address
    * @paeam_in: $Add_id -> Organization Address ID
    * @return: TRUE/FALSE
    ===================================*/    
    public function DeleteOrgAddress($add_id)
    {
      $address = $this->organization_address_entity->find($add_id);
      if($address != null)
      {
         $address->delete();
         return TRUE;
      }
      else
      {
        return FALSE;
      }
    }
    /*================================== 
    * @brief: Update Organization Address
    * @paeam_in: $Add_id -> Organization Address ID
    * @return: TRUE/FALSE
    ===================================*/    
    public function UpdateOrgAddress($add_id,$add_info)
    {
      $address = $this->organization_address_entity->find($add_id);      
      if($address != null)
      {         
        $address->name = Arr::get($add_info,'Name');
        $address->street = Arr::get($add_info,'Street');
        $address->city = Arr::get($add_info,'City');
        $address->zipcode = Arr::get($add_info,'Zip');
        $address->country = Arr::get($add_info,'Country');
        $address->state = Arr::get($add_info,'State');
        $address->phone = Arr::get($add_info,'PhoneNumber');
        $address->save();
      }
      else
      {
        return FALSE;
      }
    }
    /*================================== 
    * @brief: Add Organization Address
    * @paeam_in: $Address -> Organization Address inform
    * @return: TRUE/FALSE
    ===================================*/    
    public function AddNewOrgAddress($add_info)
    {
      $address = new OrganizationAddressEntity();
      $address->org_id = Arr::get($add_info,'Org_id'); 
      $address->name = Arr::get($add_info,'Name');
      $address->street = Arr::get($add_info,'Street');
      $address->city = Arr::get($add_info,'City');
      $address->zipcode = Arr::get($add_info,'Zip');
      $address->country = Arr::get($add_info,'Country');
      $address->state = Arr::get($add_info,'State');
      $address->phone = Arr::get($add_info,'PhoneNumber');
      $address->save();
    }
    /*================================== 
    * @brief: Add Organization Address
    * @paeam_in: $Address -> Organization Address inform
    * @return: TRUE/FALSE
    ===================================*/    
    public function AddNewOrg($info)
    {
      $org = new OrganizationEntity();            
      $org->org_name = $info->get('name');
      $org->type = $info->get('type');      
      $org->timeout = 0;
      $org->totalseat = $info->get('totalseat');
      $org->usedseat = $info->get('usedseat');
      $org->expiration = $info->get('expiration');            
      $org->save();      
      $address = new OrganizationAddressEntity();
      $address->org_id = $org->org_id; 
      $address->name = $info->get('name');
      $address->street = $info->get('street');
      $address->city = $info->get('city');
      $address->zipcode = $info->get('zipcode');
      $address->country = $info->get('country');
      $address->state = $info->get('state');
      $address->phone = $info->get('phone');
      $address->save();
      return $org;
    }    
}
