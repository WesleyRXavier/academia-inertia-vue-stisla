<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class AlunoController extends Controller
{
  public function index()
  {
    $user = auth()->user();
    return Inertia::render('aluno/Home', [
      'user' => $user
    ]);
  }

  public function create()
  {

    return Inertia::render('aluno/Cadastro');
  }

  public function store(Request $request)
  {
    $validacao = Validator::make($request->all(), [
      'name' => ['required', 'string', 'max:255', 'unique:users'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'objetivo' => ['required'],
      'idade' => ['integer', 'required'],
    ]);

    if ($validacao->fails()) {
      $erro = [
        'erro' => $validacao->errors(),
        'status' => 400,
      ];
      
      return response()->json($erro);
    }
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->objetivo = $request->objetivo;
    $user->idade = $request->idade;
    $user->tipo = 'aluno';
    $user->situacao ='Ativo';
    $user->password = Hash::make('aluno@123');
    try { 
      $user->save();
      return  response()->json($user);
      
  } catch (Exception $e) { 
    return  response()->json($e);
   
  }
   

    
    
    
  }
  
}
