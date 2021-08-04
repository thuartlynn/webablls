<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Entites\Profile_Permission_Entity as Permission;
use App\User;
use App\Entites\Seat_Entity as Seat;

$factory->define(Permission::class, function (Faker $faker) {
    
    $seat_id = $faker->numberBetween($min = 1, $max = count(Seat::all()));
    $user_id = $faker->numberBetween($min = 1, $max = count(User::all()));
    $owner = $faker->numberBetween($min = 0, $max = 1);
    if($owner == 1)
    {
        $full_access = 0; 
        $files=0;
        $basic=0;
        $ass_report=0;
        $analytics=0;   
    }
    else
    {
           $full_access = $faker->numberBetween($min = 0, $max = 2);
           if($full_access !=0)
           {
               $files=0;
               $basic=0;
               $ass_report=0;
               $analytics=0;  
           }
           else
           {
               $files = $faker->numberBetween($min = 1, $max = 2);
               $basic = $faker->numberBetween($min = 0, $max = 2);
               $ass_report = $faker->numberBetween($min = 0, $max = 2);
               $analytics = $faker->numberBetween($min = 0, $max = 2);        
           }          
    }
    return [
        'seat_id' => $seat_id,
        'user_id' => $user_id,
        'owner' => $owner,
        'coordinator' => 0,
        'full_access' => $full_access,
        'basic_info' => $basic, 
        'assessments_report' => $ass_report,
        'files' => $files,
        'analytics' => $analytics,
    ];
});
