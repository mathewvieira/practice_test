<?php

namespace Database\Seeders;

use App\Models\Caminhao;
use App\Models\Modelo;
use App\Models\Motorista;
use Illuminate\Database\Seeder;

class CaminhaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelos = Modelo::all();
        $motoristas = Motorista::all();

        Caminhao::factory(15)->create()->each(function (Caminhao $caminhao) use ($modelos, $motoristas) {
            $caminhao->modelo()->associate($modelos->random());
            $caminhao->motorista()->associate($motoristas->random());
            $caminhao->save();
        });
    }
}
