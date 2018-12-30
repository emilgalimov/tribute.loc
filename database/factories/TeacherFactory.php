<?php

use Faker\Generator as Faker;

$factory->define(app\Teacher::class, function (Faker $faker) {
    return [
        //
        'firstname'=>$faker->firstNameFemale,
        'middlename'=>$faker->firstNameMale,
        'lastname'=>$faker->firstNameMale,
        'user_id'=>$faker->unique()->numberBetween(1,10),

    ];
});
