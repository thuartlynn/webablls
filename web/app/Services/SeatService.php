<?php

namespace App\Services;

use App\Repositories\SeatRepo;
use App\Entites\Archived_Information_Entity as ArchivedEntity;
use App\Entites\Seat_Entity as SeatEntity;
use App\Services\AssessmentService as Assessment; 
use App\Services\ProfilePermissionService as Permission; 
use App\User;
use App\Enums\Gender;
use App\Enums\SeatStatus;
use App\Services\UtilsService as Utils; 
use Auth;
class SeatService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $seat_repo;   
    protected $Utils; 
    protected $Assessment_Service;
    protected $Permission_Service; 
    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->seat_repo = new SeatRepo();        
        $this->Utils = new Utils();
        $this->Assessment_Service = new Assessment(); 
        $this->Permission_Service = new Permission(); 
    }
    /*================================== 
    * @brief: Get Archived Student Information
    * @paeam_in: $id -> Organization ID
    * @return: $result -> Archived Stundent Information
    ===================================*/    
    public function ArchivedInfo($id)
    {
       $Archived_Seat = $this->seat_repo->GetSeatsbyOrg($id,SeatStatus::ARCHIVED());
       $Archived_Info = collect([]);
       foreach ($Archived_Seat as $Seat)
       {
        $Info =  ArchivedEntity::where('seat_id',$Seat->seat_id)->first();            
        $Archiver = User::find($Info->archived_id);        
        $Archived_Info->push([
                     
         'ID' => $Seat->seat_id,
         'Name' => $this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name),
         'Archived_Date' => $this->Utils->GetDateByFormat($Info->created_at),
         'Archived_by' => $this->Utils->GetNameByFormat($Archiver->first_name,$Archiver->last_name),
        ]);
       }
       return $Archived_Info;
    }
    /*================================== 
    * @brief: Get Archived Student Information
    * @paeam_in: $id -> Organization ID
    * @return: $result -> Archived Stundent Information
    ===================================*/    
    public function OrgSeatInfo($id)
    {
       $Seat_List = $this->seat_repo->GetSeatsbyOrg($id,SeatStatus::UNARCHIVED());
       $Seat_Info = collect([]);
       foreach ($Seat_List as $Seat)
       {        
        $Seat_Info->push([                     
         'ID' => $Seat->seat_id,
         'Name' => $this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name),
         'Gender' => Gender::getDescription($Seat->gender),
         'DOB' => $this->Utils->GetDateByFormat($Seat->birthday),
         'Location'=>''
        ]);
       }
       return $Seat_Info;
    }  
    /*================================== 
    * @brief: Delete Seat Info
    * @paeam_in: $id -> Seat ID
    * @return: 
    ===================================*/
    public function DeleteSeatInfo($SeatID)
    {
       //Delete Archived information 
       $Info =  ArchivedEntity::where('seat_id',$SeatID)->first();            
       $Info->delete();
       SeatEntity::find($SeatID)->delete();
    }
    /*================================== 
    * @brief: Get Seat Info
    * @paeam_in: $id -> Seat ID
    * @return: 
    ===================================*/
    public function GetSeatInfo($id)
    {
      $Seat = SeatEntity::find($id);
      $Seat_Info = collect([]);
      $Seat_Info->put('ID',$Seat->seat_id);
      $Seat_Info->put('Name',$this->Utils->GetNameByFormat($Seat->first_name,$Seat->last_name));
      $Seat_Info->put('Gender',Gender::getDescription($Seat->gender));
      $Seat_Info->put('DOB', $this->Utils->GetDateByFormat($Seat->birthday));
      $Seat_Info->put('Create_Date',$this->Utils->GetDateByFormat($Seat->created_at));
      $Seat_Info->put('Location','');
      if(!$this->Assessment_Service->GetAssessmentInformation(['seat_id' => $id],'created_at')->isEmpty())
      { 
        $Seat_Info->put('HasAssessment',1);    
      }
      else
      {
        $Seat_Info->put('HasAssessment',0);     
      }
      $Permission = $this->Permission_Service->GetPermissionInfo(Auth::user()->user_id,$id);
      $Seat_Info->put('Permission',$Permission);
      return $Seat_Info;      
    }    
}