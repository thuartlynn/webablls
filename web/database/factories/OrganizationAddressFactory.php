<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Organization_BillAddress_Entity as Organization_Address;
use Faker\Generator as Faker;
use App\Entites\Organization_Entity as Organization;
use App\Enums\Countries;

$factory->define(Organization_Address::class, function (Faker $faker) {
        
    $country = $faker->randomElement(Countries::getKeys());
    return [
           'org_id' => 0,
           'name' => '',
           'street' => $faker->address,
           'city' => $faker->city,     
           'zipcode' => $faker->postcode,
           'country' => $country,
           'state' => $faker->state,
           'phone' => $faker->phoneNumber,
    ];
});
