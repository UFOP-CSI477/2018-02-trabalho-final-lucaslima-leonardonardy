<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pais')->insert(['populacao'  => 11372470000, 'pais' => 'China']);
        DB::table('pais')->insert(['populacao'  => 1278160000, 'pais' => 'Índia']);
        DB::table('pais')->insert(['populacao'  => 321968000, 'pais' => 'USA']);
        DB::table('pais')->insert(['populacao'  => 255780000, 'pais' => 'Indonésia']);
        DB::table('pais')->insert(['populacao'  => 209156000, 'pais' => 'Paquistão']);
        DB::table('pais')->insert(['populacao'  => 207660929, 'pais' => 'Brasil']);
        DB::table('pais')->insert(['populacao'  => 8279700, 'pais' => 'Suíça']);
        DB::table('pais')->insert(['populacao'  => 60725000, 'pais' => 'Itália']);
        DB::table('pais')->insert(['populacao'  => 839, 'pais' => 'Vaticano']);
        DB::table('pais')->insert(['populacao'  => 562958, 'pais' => 'Luxemburgo']);
    }
}
