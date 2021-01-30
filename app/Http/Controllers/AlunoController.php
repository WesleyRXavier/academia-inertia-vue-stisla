<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AlunoController extends Controller
{
    public function index(){
      $user = auth()->user();
      return Inertia::render('aluno/Home',[
        'user'=> $user
      ]);
    }
}
