<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Archived_Information_Entity as ArchivedInfo;
use App\Entites\Seat_Entity as Seat;
use App\User;
use Faker\Generator as Faker;

$factory->define(ArchivedInfo::class, function (Faker $faker) {
    
    $uid = $faker->numberBetween($min = 1, $max = count(User::all()));
    $createDate = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
    return [
        'seat_id' => 0,
        'archived_id' => $uid,
        'created_at' => $createDate,
    ];
});
