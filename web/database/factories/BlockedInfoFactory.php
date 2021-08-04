<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Blocked_Information_Entity as BlockedInfo;
use Faker\Generator as Faker;
use App\User;

$factory->define(BlockedInfo::class, function (Faker $faker) {
   
    $createDate = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
    return [
        'blocked_id' => 0,
        'user_id' => 0,
        'created_at' => $createDate,
    ];
});
