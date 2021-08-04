<?php

namespace App\Services;

use App\Repositories\OrderInfoRepo;

class OrderInfoService
{

    /*
    * ====== Local Parameter ========= 
    */    
    protected $orderinfo_repo;

    /*
    * ====== Construct Initial ========= 
    */
    public function __construct()
    {
        $this->orderinfo_repo = new OrderInfoRepo();
    }

}