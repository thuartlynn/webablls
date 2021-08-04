<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Ethnicity extends Enum
{
    const Race_1 =   1;
    const Race_2 =   2;
    const Race_3 =   3;
    const Race_4 =   4;
    const Race_5 =   5;
    const Race_6 =   6;
    
    public static function getDescription($value): string
    {
       switch($value) 
       {
         case self:: Race_1:
            return "Hispanic/Latino";
         case self:: Race_2:
            return "Asian/Pacific Islander";
         case self:: Race_3:
            return "Native American Indian";
         case self:: Race_4:
            return "Caucasuian";
         case self:: Race_5:
            return "African American";
         default:
            return "Others";
       }
    }

}
