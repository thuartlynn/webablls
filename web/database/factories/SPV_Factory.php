<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Student_Para_Value_Entity as StudentParaValue;
use Faker\Generator as Faker;

$factory->define(StudentParaValue::class, function (Faker $faker) {
    
    $para = $faker->words(4,true);

    return [
           'para_id' => 1,
           'value' => $para,   
         
    ];
});
