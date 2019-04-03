<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MomentocomidasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('momentocomidas')->insert([

            ['nombre' => 'Desayuno'],

            ['nombre' => 'Almuerzo'],
            
            ['nombre' => 'Cena'],

            ['nombre' => 'Postre'],
            
            ['nombre' => 'Snack']
        ]);
    }
}
