<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static UNARCHIVED()
 * @method static static ARCHIVED()
 */
final class SeatStatus extends Enum
{
    const UNARCHIVED =   0;
    const ARCHIVED =   1;    
}
