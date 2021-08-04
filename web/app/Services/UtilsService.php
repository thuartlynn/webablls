<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Auth;


class UtilsService
{
    
    /*================================== 
    * @brief: Get Date
    * @paeam_in: $Date -> Srting
                 
    * @return: Curren Date format by Auth Setting
    ===================================*/    
    public function GetDateByFormat($Date)
    {
        if(Auth::user()->date_format == 0)
        {
            return date('m/d/Y', strtotime($Date));
        }
        else
        {
            return date('d/m/Y', strtotime($Date));
        }
    }
    /*================================== 
    * @brief: Get Name
    * @paeam_in: $Name -> Srting
                 
    * @return: Curren Name format by Auth Setting
    ===================================*/    
    public function GetNameByFormat($First,$Last)
    {
        if(Auth::user()->name_format == 0)
        {
            return $Last.','.$First;
        }
        else
        {
            return $First.' '.$Last;
        }
    }
}