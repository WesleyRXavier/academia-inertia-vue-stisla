<?php

namespace Database\Factories;

use App\Models\Semana;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemanaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Semana::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome'=> $this->faker->name,
            'repeticoes'=> '3x15',
        ];
    }
}
