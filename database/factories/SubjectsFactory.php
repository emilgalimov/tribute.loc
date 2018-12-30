<?php

use Faker\Generator as Faker;

$factory->define(app\Subject::class, function (Faker $faker) {
    return [
        //

        'lecturer_id'=>$faker->numberBetween(1,10),
        'lab_id'=>$faker->numberBetween(1,10),
        'practicer_id'=>$faker->numberBetween(1,10),
        'group_id'=>$faker->numberBetween(1,10),
        'pass_type'=>'exam',
        'lesson_id'=>$faker->numberBetween(1,5),


    ];
});
