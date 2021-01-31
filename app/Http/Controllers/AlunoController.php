<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class AlunoController extends Controller
{
    public function index(){
      $user = auth()->user();
      return Inertia::render('aluno/Home',[
        'user'=> $user
      ]);
    }

    public function create()
    {
      
        return Inertia::render('aluno/Cadastro');
    }

    public function store(Request $request){
      $validacao = Validator::make($request->all(), [
        'name' => [ 'required','string', 'max:255', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'objetivo' => ['required', ],
        'idade' => [ 'required'],
    ]);

    if ($validacao->fails()) {
      $erro =[ 
        'erro' =>$validacao->errors(),
        'status' => 400,      
      ];

      return response()->json($erro);
  }
    }
}
