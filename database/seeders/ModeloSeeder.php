<?php

namespace Database\Seeders;

use App\Models\Modelo;
use Illuminate\Database\Seeder;

class ModeloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modelo::factory(5)->create();
    }
}
