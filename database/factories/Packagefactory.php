<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Package;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Package::class, function (Faker $faker) {
    return [
        'title' =>$faker->name,
        'remark' =>Str::random(30),
        'cost' =>$faker->numberBetween(10000,1500)
    ];
});
