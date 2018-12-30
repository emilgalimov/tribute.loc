<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(app\User::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Рустам Рафкатович',
            'Роберт Рамазанович',
            'Эмина Романовна',
            'Игорь Александрович',
            'Сергей Васильевич',
            'Александр Анатольевич',
            'Артем Ильдарович',
            'Вадим Абрамович',
            'Вячеслав Михайлович',
            'Ахметзянов Булат',
            'Байбеков Санжар',
            'Зайнуллин Раиль',
            'Измайлов Тагир',
            'Кузнецов Виктор',
            'Муллаянов Булат',
            'Ожегов Аким',
            'Садриев Фидан'
        ]),
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});