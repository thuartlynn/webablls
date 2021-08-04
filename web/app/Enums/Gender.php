<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static male()
 * @method static static female()
 */
final class Gender extends Enum
{
    const male  =   0;
    const female =   1;
    

    public static function getDescription($value): string
    {
        switch($value)
        {
         case self:: male:
             return "male";
         case self:: female:
             return "female";
         default:
              return self::getKey($value);
        }   
    }

}
