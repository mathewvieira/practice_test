<?php

namespace Database\Factories;

use App\Models\Motorista;
use App\Models\Transportadora;
use Faker\Provider\pt_BR\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Motorista>
 */
class MotoristaFactory extends Factory
{
    protected $model = Motorista::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new Person($this->faker));

        return [
            'nome' => $this->faker->name(),
            'cpf' => $this->faker->cpf(false),
            'data_nascimento' => $this->faker->dateTimeBetween('-70 years', '-18 years'),
            'email' => $this->faker->safeEmail(),
            // 'transportadora_id' => Transportadora::factory()
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Motorista $motorista) {
            // Associando a uma ou mais transportadoras na pivot table
            $transportadoras = Transportadora::factory(2)->create();
            $motorista->transportadoras()->attach($transportadoras);
        });
    }
}
