<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Grade_Level extends Enum
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
    const L14  =  14;
    const L15  =  15;

    public static function getDescription($value): string
    {
        switch($value)
        {
         case self::L0:
             return "N/A";
         case self::L1:
             return "Pre-School";
         case self::L2:
             return "Kindergarten";                
         case self::L3:
             return "1st Grade";                
         case self::L4:
             return "2nd Grade";                
         case self::L5:
             return "3nd Grade";                
         case self::L6:
             return "4th Grade";                
         case self::L7:
             return "5th Grade";                
         case self::L8:
             return "6th Grade";                
         case self::L9:
             return "7th Grade";                
         case self::L10:
             return "8th Grade";                
         case self::L11:
             return "9th Grade";                
         case self::L12:
             return "10th Grade";                
         case self::L13:
             return "11th Grade";
         case self::L14:
             return "12th Grade";
         case self::L15:
             return "Adult Education";                                                       
             default:
              return self::getKey($value);
        }   
    }
}
