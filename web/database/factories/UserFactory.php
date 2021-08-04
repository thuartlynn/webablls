<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Entites\Organization_Entity as Organization;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    
    $role = $faker->numberBetween($min = 0, $max = 1);
    $org_id = $faker->numberBetween($min = 1, $max = count(Organization::all()));
    $org_name = Organization::find($org_id)->org_name;
    $userCounter = count(User::all())+1;    
    $password = 'Tecoimage'.$userCounter;
    $email = 'Test'.$userCounter.'@tecoimage.com.tw';
    $dateformat = $faker->numberBetween($min = 0, $max = 1);
    $nameformat = $faker->numberBetween($min = 0, $max = 1);
    $assMode = $faker->numberBetween($min = 0, $max = 2);
    $layout = $faker->numberBetween($min = 0, $max = 1);
    $timeout = $faker->numberBetween($min = 0, $max = 6); 
    $language = $faker->numberBetween($min = 0, $max = 1); 
    $zone = $faker->timezone;
    $createDate = $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null);
    return [
        'role' => $role,
        'org_name' => $org_name,
        'org_id' => $org_id,        
        'first_name' => $faker->firstname,
        'last_name' => $faker->lastname,
        'phone_number' => $faker->phoneNumber,
        'password' => Hash::make($password), // password
        'email' => $email,
        'date_format' => $dateformat,
        'name_format' => $nameformat,
        'show_help' => 1,
        'timeout' => $timeout,
        'assessment_editmode' => $assMode,
        'time_zone' => $zone,
        'layout_format' => $layout,
        'language' => $language,
        'email_verified_at' => $faker->dateTimeBetween($startDate = $createDate, $endDate = 'now', $timezone = null),
        'created_at' => $createDate,
        'updated_at' => now(),
        'remember_token' => '',
    ];
});