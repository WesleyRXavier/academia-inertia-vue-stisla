<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    
    public function home(){
        
        return redirect()->route(auth()->user()->tipo.'.index');
    }
}
