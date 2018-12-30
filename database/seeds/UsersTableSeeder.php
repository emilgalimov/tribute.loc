<?php

use Illuminate\Database\Seeder;
use app\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(app\User::class, 17)->create();

    }
}
