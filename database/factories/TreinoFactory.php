<?php

namespace Database\Factories;


use App\Models\Model;
use App\Models\Treino;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TreinoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Treino::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'treino_tipo'=> '3x15',
            'qtd_semanas'=> rand(1, 5),
            'data_inicio'=> '01/01/2020',
            'descanso' => 40,
            'user_id'=> User::all()->random()->id,
        ];
    }
}
