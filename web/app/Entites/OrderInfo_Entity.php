<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class OrderInfo_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'OrderInfo';
    protected $primaryKey = 'order_num';        
}
