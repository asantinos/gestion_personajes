<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RazaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Add Elfo, Enano, Humano, Orco, Tiflin
        DB::table('razas')->insert([
            ['nombre' => 'Elfo'],
            ['nombre' => 'Enano'],
            ['nombre' => 'Humano'],
            ['nombre' => 'Orco'],
            ['nombre' => 'Tiflin'],
        ]);
    }
}
