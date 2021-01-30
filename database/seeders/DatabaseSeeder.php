<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\{UsersSeed, TipoTreinoseed};
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersSeed::class,
            TipoTreinoseed::class,

            ]);  
        \App\Models\User::factory(10)->create();
        \App\Models\Exercicio::factory(10)->create();
        \App\Models\Treino::factory(10)->create();
        \App\Models\Serie::factory(10)->create();
        \App\Models\Exercicio_Serie::factory(10)->create();
        \App\Models\Semana::factory(10)->create();
        
    }
}
