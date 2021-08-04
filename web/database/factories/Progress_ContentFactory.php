<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Progress_Content_Entity as ProgressContent;
use Faker\Generator as Faker;

$factory->define(ProgressContent::class, function (Faker $faker) {
    
    $previous = $faker->realText($maxNbChars = 50, $indexSize = 2);
    $current_level = $faker->realText($maxNbChars = 50, $indexSize = 2);
    $notes = $faker->realText($maxNbChars = 50, $indexSize = 2);

    return [
          'progress_id' => 1,
          'skill_id' => 1,
          'previous' => $previous,
          'current_level' => $current_level,
          'notes' => $notes,
    ];
});
