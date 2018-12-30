<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
       /* $this->call(BuildingsSeeder::class);
        $this->call(DaysTableSeeder::class);
        $this->call(GroupsSeeder::class);
        $this->call(LessonsSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(ShedulesSeeder::class);
      //  $this->call(GroupTableSeeder::class);
       $this->call(SubjectTableSeeder::class);*/

    }
}
