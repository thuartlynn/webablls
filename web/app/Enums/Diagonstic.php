<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * 
 * 
 */
final class Diagonstic extends Enum
{
    const Case_1 =   1;
    const Case_2 =   2;
    const Case_3 =   3;
    const Case_4 =   4;
    const Case_5 =   5;
    const Case_6 =   6;
    const Case_7 =   7;
    const Case_8 =   8;
    const Case_9 =   9;
    const Case_10 = 10;   

    public static function getDescription($value): string
    {
       switch($value) 
       {
         case self:: Case_1:
            return "Autistic Spectrun Disorder";
         case self:: Case_2:
            return "PDD_NOS";
         case self:: Case_3:
            return "Non-specific speech and language delay";
         case self:: Case_4:
            return "Williams Syndrome";
         case self:: Case_5:
            return "Rett Syndrome";
         case self:: Case_6:
            return "Down Syndrome";
         case self:: Case_7:
            return "Fraglie X";
         case self:: Case_8:
            return "Receptive and expressive language disorder";
         case self:: Case_9:
            return "Asperger's Syndrome";
         default:
            return "Others";
       }
    }
}
