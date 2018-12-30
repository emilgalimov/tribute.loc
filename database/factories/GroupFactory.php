<?php

use Faker\Generator as Faker;

$factory->define(app\Group::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->unique()->randomDigit,
        'begining_year'=>date('Y'),
    ];
});
