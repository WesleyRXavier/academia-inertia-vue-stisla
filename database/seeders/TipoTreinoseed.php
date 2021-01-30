<?php

namespace Database\Seeders;

use App\Models\TipoTreino;
use Illuminate\Database\Seeder;

class TipoTreinoseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dados = [
         [
             'nome' => 'AB',
              'qtd_series' => 2,
         ],
          [
               'nome' => 'ABC',
              'qtd_series' => 3,

          ],
           [
             'nome' => 'ABCD',
             'qtd_series' => 4,

          ],
          [
           'nome' => 'ABCDE',
           'qtd_series' => 5,

          ]
        ];

        TipoTreino::insert($dados);
    }
    
}
