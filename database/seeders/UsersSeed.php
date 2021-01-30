<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeed extends Seeder
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
                'name' => 'Aluno doido',
                'email' => "professor@hotmail.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'tipo' => 'professor',
                'avatar' => 'dfdfdsfsdfdsfdsfdsfdsfdsf',
                'objetivo' => 'Hipertrofia',
                'idade' => 25,
                'situacao'=> 'Ativo',
            ],
            [
                'name' => 'Wesley Roberto Xavier',
                'email' => "aluno@hotmail.com",
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'tipo' => 'aluno',
                'avatar' => 'dfdfdsfsdfdsfdsfdsfdsfdsf',
                'objetivo' => 'Hipertrofia',
                'idade' => 25,
                'situacao'=> 'Ativo',
            ],

        ];

        User::insert($dados);
    }
}
