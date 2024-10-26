<?php

namespace Database\Seeders;

use App\Models\Motorista;
use App\Models\Transportadora;
use Illuminate\Database\Seeder;

class MotoristaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transportadoras = Transportadora::all();

        Motorista::factory(10)->create()->each(function (Motorista $motorista) use ($transportadoras) {
            $motorista->transportadoras()->attach(
                $transportadoras->random(rand(1, 5))->pluck('id')->toArray()
            );
        });
    }
}
