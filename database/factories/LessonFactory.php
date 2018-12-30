<?php

use Faker\Generator as Faker;

$factory->define(app\Lesson::class, function (Faker $faker) {
    return [
        //

        'name'=>$faker->jobTitle,
    ];
});
