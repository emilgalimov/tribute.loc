<?php

use Faker\Generator as Faker;

$factory->define(app\Shedule::class, function (Faker $faker) {
    return [
        //
        'time'=>$faker->time('H:i'),
        'room'=>$faker->numberBetween(1,20),
        'work_type'=>'lecture',
        'teacher_id'=>$faker->numberBetween(1,10),
        'building_id'=>$faker->numberBetween(1,3),
        'group_id'=>$faker->numberBetween(1,3),
        'day_id'=>$faker->numberBetween(1,7),
        'lesson_id'=>$faker->numberBetween(1,5),


    ];
});
