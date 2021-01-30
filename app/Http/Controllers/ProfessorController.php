<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;


class ProfessorController extends Controller
{
    public function index(){
        $alunos = User::where('tipo','aluno')->orderBy('name', 'ASC')->get();
        return Inertia::render('professor/Home',
        ['alunos' => $alunos] );
   
    }
}
