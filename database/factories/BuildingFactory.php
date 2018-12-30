<?php

use Faker\Generator as Faker;

$factory->define(app\Building::class, function (Faker $faker) {
    return [
        //
        'address'=>$faker->streetName,
        'name'=>$faker->text(5),
    ];
});
