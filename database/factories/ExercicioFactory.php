<?php

namespace Database\Factories;

use App\Models\Exercicio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExercicioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Exercicio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'carga' => 20,
            'musculo_afetado' => 'Posterior Coxa',
            'imagem' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'video'=> '92IXUNpkjO0rOQ5byMi',
            
        ];
    }
}
