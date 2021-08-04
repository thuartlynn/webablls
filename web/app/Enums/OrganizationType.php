<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class OrganizationType extends Enum
{
    const School =   0;
    const Clinical_Consultants =   1;
    const Parents = 2;
   
    public static function getDescription($value): string
    {
        switch($value)
        {
         case self:: School:
             return "School / District";
         case self:: Clinical_Consultants:
             return "Clinical Consultants";
         case self:: Parents:
             return "Parents";                
         default:
              return self::getKey($value);
        }   
    }

}
