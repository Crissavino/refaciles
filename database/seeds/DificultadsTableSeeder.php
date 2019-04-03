<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DificultadsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dificultads')->insert([

            ['nombre' => 'Facil'],

            ['nombre' => 'Intermedio'],

            ['nombre' => 'Dificil']
        ]);
    }
}
