<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\Seat_Entity as SeatEntity;

class SeatRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $seat_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->seat_entity = new SeatEntity();
    }    

    /*================================== 
    * @brief: Get student by Organization ID and Archived
    * @paeam_in: $id -> Organization ID
    *            $archived -> Archived status 
    * @return: $ -> Update result.
    ===================================*/    
    public function GetSeatsbyOrg($id,$status)
    {
        return $this->seat_entity->where('org_id',$id)->where('archived',$status)->get();       
    }
    /*================================== 
    * @brief: Change student archive status
    * @paeam_in: $id -> seat ID
    *            $archived -> Archived status 
    * @return: $ -> Update result.
    ===================================*/    
    public function ChangeSeatArchive($SeatID,$status)
    {
        $Seat = $this->seat_entity->find($SeatID);
        $Seat->archived = $status;
        $Seat->save();        
    }
}
