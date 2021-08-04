<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Analysis_Setting_Entity as AnalysisSetting;
use Faker\Generator as Faker;

$factory->define(AnalysisSetting::class, function (Faker $faker) {
    
    return [
        'seat_id' => 1,
        'user_id' => 1,
        'assessment_list' => json_encode(['1'=>'0']),
        'output' => $faker->numberBetween($min = 0, $max = 1),
        'section_op' => json_encode(['1'=>'0']),
        'category_op' => json_encode(['1'=>'0']),
        'normative_active' => $faker->numberBetween($min = 0, $max = 1),
        'normative_age' => 12,
        'items_scale' => $faker->numberBetween($min = 0, $max = 3),
        'scores_scale' => $faker->numberBetween($min = 0, $max = 3),
        'percentage_scale' => $faker->numberBetween($min = 0, $max = 3),
    ];
});
