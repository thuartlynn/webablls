<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Base_Line_Report_Entity as BaseLineReport;
use Faker\Generator as Faker;

$factory->define(BaseLineReport::class, function (Faker $faker) {
    
    return [
        'seat_id' => 1,
        'user_id' => 1,
        'assessment_id' => 1,
    ];
});
