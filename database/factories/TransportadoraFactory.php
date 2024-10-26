<?php

namespace Database\Factories;

use App\Models\Transportadora;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\pt_BR\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transportadora>
 */
class TransportadoraFactory extends Factory
{
    protected $model = Transportadora::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new Company($this->faker));

        return [
            'nome' => $this->faker->company(),
            'cnpj' => $this->faker->cnpj(false),
            'status' => 1,
        ];
    }
}
