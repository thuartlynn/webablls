<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Contact_List_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Contact_List';
    protected $primaryKey = 'contact_id';    
}
