<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\{
    User,
};


class ProfessorController extends Controller
{

    public function index()
    {
        return Inertia::render('professor/Home');
    }

    public function alunos($pesquisa)
    {

        if ($pesquisa != 'todos') {
            $alunos = (new User())->alunos()
                ->where('name', 'like', '%' . $pesquisa . '%')
                ->orderBy('name', 'ASC')->paginate(1);
            return response()->json($alunos);
        } else {
            $alunos = (new User())->alunos()->orderBy('name', 'ASC')->paginate(1);
            return response()->json($alunos);
        }
    }
}
