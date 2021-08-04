<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * Category List 
 */
final class Analysis_Category extends Enum
{
    const A = 1;
    const B = 2;
    const C = 3;
    const D = 4;
    const E = 5;
    const F = 6;
    const G = 7;
    const H = 8;
    const I = 9;
    const J = 10;
    const K = 11;
    const L = 12;
    const M = 13;
    const N = 14;
    const P = 15;
    const Q = 16;
    const R = 17;
    const S = 18;
    const T = 19;
    const U = 20;
    const V = 21;
    const W = 22;
    const X = 23;
    const Y = 24;
    const Z = 25;

    public static function getDescription($value): string
    {
        switch($value)
        {
         case self:: A:
             return "Cooperation and Reinfocer Effectiveness";
         case self:: B:
             return "Visual Performance";
         case self:: C:
             return "Receptive Language";
         case self:: D:
             return "Motor lmitation";
         case self:: E:
             return "Vocal lmitation";
         case self:: F:
             return "Request";
         case self:: G:
             return "Labeling";                                                                 
         case self:: H:
             return "Intravebals";             
         case self:: I:
             return "Spontaneous Vocalizations";
         case self:: J:
             return "Syntax and Grammar";
         case self:: K:
             return "Play and Leisure Skills";
         case self:: L:
             return "Social Interactions";
         case self:: M:
             return "Group Instruction";
         case self:: N:
             return "Follow Classroom Routines";
         case self:: P:
             return "Generalizaed Responding";
         case self:: Q:
             return "Reading Skills";
         case self:: R:
             return "Math Skills";             
         case self:: S:
             return "Writing Skills";
         case self:: T:
             return "Spelling";
         case self:: U:
             return "Dressing Skills";
         case self:: V:
             return "Eating Skills";
         case self:: W:
             return "Grooming Skills";
         case self:: X:
             return "Tolieting Skills";
         case self:: Y:
             return "Gross Motor Skills";
         case self:: Z:
             return "Fine Motor Skills";                                                                                                                                                                                                                            
         default:
              return self::getKey($value);
        }   
    }
}
