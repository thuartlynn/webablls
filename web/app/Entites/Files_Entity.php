<?php

namespace App\Entites;

use Illuminate\Database\Eloquent\Model;

class Files_Entity extends Model
{
    /**
    *  Define the table name and primary key
    */
    protected $table = 'Files';
    protected $primaryKey = 'file_id';        
}
