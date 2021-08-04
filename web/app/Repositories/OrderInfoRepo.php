<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Entites\OrderInfo_Entity as OrderInfoEntity;

class OrderInfoRepo extends Model
{
    /*
    * ====== Local Parameter ========= 
    */
    protected $order_info_entity;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->order_info_entity = new OrderInfoEntity();
    }

}
