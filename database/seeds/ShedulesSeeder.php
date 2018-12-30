<?php

use Illuminate\Database\Seeder;

class ShedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(app\Shedule::class, 5)->create();
    }
}
