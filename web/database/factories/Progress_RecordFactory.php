<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Progress_Record_Entity as ProgressRecord;
use Faker\Generator as Faker;

$factory->define(ProgressRecord::class, function (Faker $faker) {
    return [
        'worksheet_id' => 1,
        'seat_id' => 1,
        'user_id' => 1,
        'times' => 1,        
    ];
});
