<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\WorkSheet_Content_Entity as WorkSheetContent;
use Faker\Generator as Faker;

$factory->define(WorkSheetContent::class, function (Faker $faker) {
    
    $objective = $faker->realText($maxNbChars = 50, $indexSize = 2);
    $current_level = $faker->realText($maxNbChars = 50, $indexSize = 2);
    $notes = $faker->realText($maxNbChars = 50, $indexSize = 2);
    
    return [
        'worksheet_id' => 1,
        'skill_id' => 1,  
        'objective' => $objective,
        'current_level' => $current_level,
        'notes' => $notes,      
    ];
});
