<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\WorkSheet_Record_Entity as WorkSheetRecord;
use Faker\Generator as Faker;

$factory->define(WorkSheetRecord::class, function (Faker $faker) {
    return [
        'seat_id' => 1,
        'user_id' => 1,
        'assessment_id' => 1,
        'color' => "#FFFFFF",
        'total_items' => 1,        
    ];
});
