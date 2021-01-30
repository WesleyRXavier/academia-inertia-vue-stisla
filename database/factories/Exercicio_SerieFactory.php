<?php

namespace Database\Factories;

use App\Models\Exercicio;
use App\Models\Exercicio_Serie;
use App\Models\Model;
use App\Models\Serie;
use Illuminate\Database\Eloquent\Factories\Factory;

class Exercicio_SerieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercicio_Serie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exercicio_id'=> Exercicio::all()->random()->id,
            'serie_id'=> Serie::all()->random()->id,
        ];
    }
}
