<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Inertia\Inertia;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function create(){
        return Inertia::render('Users/register');

    }

    public function store(userRequest $request){
       $request->validate([
           'name'=>'required|min:3',
           'email'=>'required',
           'password'=>'required'
       ]);



       User::create([
           'name'=>$request->name,
           'email'=>$request->email,
           'password'=>bcrypt($request->password)

       ]);

       return Redirect::route('home')->with('success', 'Cadastrado com sucesso!');

    }
}
