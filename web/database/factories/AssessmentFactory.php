<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Assessment_Record_Entity as AssessmentRecord;
use Faker\Generator as Faker;
use App\Entites\Seat_Entity as Seat;


$factory->define(AssessmentRecord::class, function (Faker $faker) {
    
    $color = $faker->hexcolor();   
    $assigned_date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
    return [
        'seat_id' => 0,
        'user_id' => 1,
        'assigned_date' =>$assigned_date,
        'color' => $color,
        'grade_level' => $faker->numberBetween($min=0,$max=15),
        'initialize' => 0,
    ];
});
