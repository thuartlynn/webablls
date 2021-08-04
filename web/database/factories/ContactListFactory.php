<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entites\Contact_List_Entity as ContactList;
use Faker\Generator as Faker;

$factory->define(ContactList::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'org_name' => 'TIS',
        'is_user' => false,
        'member_id' => 0,
        'name' => 'Sample',
        'email'=> 'Sample@gmail.com'
    ];
});
