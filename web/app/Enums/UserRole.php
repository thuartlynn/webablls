<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Restricted()
 * @method static static Standard()
 * @method static static Administrator()
 */
final class UserRole extends Enum
{
    const Deleted = -1;
    const Restricted =   0;
    const Standard =   1;
    const Administrator = 2;    
    const WithoutRestricted = 3;
    const AllMember = 4;

   public static function getDescription($value): string
   {
       switch($value)
       {
        case self:: Restricted:
            return "Restricted User";
        case self:: Standard:
            return "Standard User";
        case self:: Administrator:
            return "Organization Administrator";                
        default:
             return self::getKey($value);
       }   
   }
}
