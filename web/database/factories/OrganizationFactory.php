<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Organization_Entity as Organization;
use Faker\Generator as Faker;

$factory->define(Organization::class, function (Faker $faker) {
    
    $Org_Type = $faker->numberBetween($min = 0, $max = 2);
    $OrgName = $faker->company;
    $Timeout = $faker->numberBetween($min = 0, $max = 6);
    $createDate = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
    $verifiedDate = $faker->dateTimeBetween($startDate = $createDate, $endDate = 'now', $timezone = null);
    $totalseat = $faker->numberBetween($min = 4 , $max = 15);
    $usedseat = $faker->numberBetween($min = 4 , $max = $totalseat);
    return [
       'org_name' => $OrgName,
       'type' => $Org_Type,
       'expiration' => $faker->dateTimeInInterval($startDate = $verifiedDate, $endDate = ' + 2 years', $timezone = null),
       'totalseat' => $totalseat,
       'usedseat' => $usedseat,
       'timeout' => $Timeout,
       'created_at' => $createDate,
       'updated_at' => now(),
       'verified_at' => $verifiedDate,
    ];
});
