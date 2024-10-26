<?php

namespace Database\Seeders;

use App\Models\Transportadora;
use Illuminate\Database\Seeder;

class TransportadoraSeeder extends Seeder
{
    public function run(): void
    {
        Transportadora::factory(5)->create();
    }
}
