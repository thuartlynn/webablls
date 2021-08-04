<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static Blocked()
 * @method static static UnBlock() 
 */
final class UserStatus extends Enum
{
    const UnBlocked =   0;
    const Blocked =   1;
}
