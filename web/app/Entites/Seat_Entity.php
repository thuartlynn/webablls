<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Seat_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Seat';
    protected $primaryKey = 'seat_id';
}
