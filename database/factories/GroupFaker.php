<?php

use Faker\Generator as Faker;

$factory->define(app\Group::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->word(),
        'begining_year'=>$faker->date('Y'),
    ];
});
