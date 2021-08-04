<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Status_Report_Entity as StatusReport;
use Faker\Generator as Faker;

$factory->define(StatusReport::class, function (Faker $faker) {
    return [
        'seat_id' => 1,
        'user_id' => 1,
        'assessment_id' => 1,        
    ];
});
