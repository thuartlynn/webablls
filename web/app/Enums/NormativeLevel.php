<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NormativeLevel extends Enum
{
    const L0   =   0;
    const L1   =   1;
    const L2   =   2;
    const L3   =   3;
    const L4   =   4;
    const L5   =   5;
    const L6   =   6;
    const L7   =   7;
    const L8   =   8;
    const L9   =   9;
    const L10  =  10;
    const L11  =  11;
    const L12  =  12;
    const L13  =  13;

    public static function getDescription($value): string
    {
        switch($value)
        {
         case self::L0:
             return "Under 3 months";
         case self::L1:
             return "3 months";
         case self::L2:
             return "6 months";                
         case self::L3:
             return "6 months";                
         case self::L4:
             return "9 months";                
         case self::L5:
             return "1 Years";                
         case self::L6:
             return "1 Years 3 months";                
         case self::L7:
             return "1 Years 6 months";                
         case self::L8:
             return "1 Years 9 months";                
         case self::L9:
             return "2 Years";                
         case self::L10:
             return "2 Years 3 months";                
         case self::L11:
             return "2 Years 6 months";                
         case self::L12:
             return "2 Years 9 months";                
         case self::L13:
             return "3 Years";                             
             default:
              return self::getKey($value);
        }   
    }
}
