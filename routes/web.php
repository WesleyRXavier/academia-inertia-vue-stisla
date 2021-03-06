<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    HomeController,UserController,
    ProfessorController,AlunoController
};



Route::get('/', function () {
    return view('index');
});
Route::get('/home', [HomeController::class, 'home'])->name('home');

Auth::routes();

//ROTAS PROFESSOR

Route::get('/professor', [ProfessorController::class, 'index'])->name('professor.index');
Route::post('/professor/alunos/{pesquisa}', [ProfessorController::class, 'alunos'])->name('professor.alunos');
Route::get('/aluno/cadastro', [AlunoController::class, 'create'])->name('aluno.cadastro');
Route::post('/aluno/store', [AlunoController::class, 'store'])->name('aluno.store');


//ROTAS ALUNO

Route::get('/aluno', [AlunoController::class, 'alunosNome'])->name('aluno.alunosNome');