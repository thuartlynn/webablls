<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Assessment_Scores_Entity as AssessmentScores;
use Faker\Generator as Faker;

$factory->define(AssessmentScores::class, function (Faker $faker) {
    
    return [
           'ass_id' => 0,
           'skill_id' => 1,
           'scores' => json_encode(['0'=>'123']), 
    ];
});
