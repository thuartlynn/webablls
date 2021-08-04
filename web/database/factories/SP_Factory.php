<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Student_Parameter_Entity as StudentPara;
use Faker\Generator as Faker;

$factory->define(StudentPara::class, function (Faker $faker) {
    
    $active = $faker->numberBetween($min = 0, $max = 1);
    $require = $faker->numberBetween($min = 0, $max = 1);
    $paraname = $faker->words(2,true);

    return [
        'org_id' => 1,
        'is_active' => $active,
        'is_require' => $require,
        'para_name' => $paraname,
    ];
});
