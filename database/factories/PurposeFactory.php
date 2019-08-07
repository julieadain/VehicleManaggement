<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Purpose::class, function (Faker $faker) {
    return [
        'title' => $faker->email
    ];
});
