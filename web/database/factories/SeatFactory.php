<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Entites\Seat_Entity as Seat;
use App\Entites\Organization_Entity as Organization;
use App\Enums\Countries;

$factory->define(Seat::class, function (Faker $faker) {
    
    $oid = $faker->numberBetween($min = 1, $max = count(Organization::all()));
    $birthday = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);
    $gender = $faker->numberBetween($min = 0, $max = 1);
    $ethnicity = $faker->numberBetween($min = 1, $max = 6);
    $sign_language = $faker->numberBetween($min = 0, $max = 1);
    $dignostic = $faker->numberBetween($min = 1, $max = 10); 
    $createDate = $faker->dateTimeBetween($startDate = '-2 years', $endDate = 'now', $timezone = null);   
    $country = $faker->randomElement(Countries::getKeys());
    return [
        'org_id' => $oid,
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'birthday' => $birthday,
        'gender' => $gender,
        'ethnicity' => $ethnicity,
        'city' => $faker->city,
        'zipcode' => $faker->postcode,
        'country' => $country,
        'sign_language' => $sign_language,
        'dignostic' => $dignostic,
        'archived' => 0,
        'created_at' => $createDate,
        'updated_at' => now(),
        'coordinator' => 1,
     ];
});

$factory->state(Seat::class,'Archived', function (Faker $faker) {
    
    return [
        'archived' => 1,
    ];
});