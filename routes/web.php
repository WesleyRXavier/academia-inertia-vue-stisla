<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controller\Auth\RegisterController;
use App\Http\Controller\HomeController;
use App\Http\Controller\VoluntarioController;
use App\Http\Middleware\Voluntario;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    //return Inertia::render('Home');
    return view('auth.login');
});

Auth::routes();


