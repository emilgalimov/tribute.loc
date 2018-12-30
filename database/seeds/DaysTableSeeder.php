<?php

use Illuminate\Database\Seeder;
use app\Day;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Day::insert([
            [
                
                'name'=>'monday'
            ],
            [
                
                'name'=>'tuesday'
            ],
            [
               
                'name'=>'wednesday'
            ],
            [
               
                'name'=>'thursday'
            ],
            [
               
                'name'=>'friday'
            ],
            [
                
                'name'=>'saturday'
            ],
            [
             
                'name'=>'sunday'
            ],
        ]);
    }
}
