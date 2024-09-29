<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Requests\AlunoRequest;

class AlunoController extends Controller
{
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    public function create()
    {
        return view('alunos.create');
    }

    public function store(AlunoRequest $request)
    {
        Aluno::create($request->validated());
        return redirect()->route('alunos.create')->with('success', 'Aluno cadastrado com sucesso!');
    }
}
