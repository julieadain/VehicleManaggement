<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Driver;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Driver::class, function (Faker $faker) {
    return [
        'name'=> $faker->name,
        'email'=> $faker->unique()->safeEmail,
        'phone'=> $faker->phoneNumber,
        'address'=> $faker->address,
        'dl_scan'=> Str::random(50),
        'nid_scan'=> Str::random(50),
        'photo'=> Str::random(50),
        'user_id'=> $faker->numberBetween(1,5),
        'org_id'=>$faker->numberBetween(1,5)
    ];
});
