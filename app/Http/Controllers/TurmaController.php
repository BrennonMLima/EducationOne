<?php

namespace App\Http\Controllers;

use App\Models\Turma;
use App\Http\Requests\TurmaRequest;

class TurmaController extends Controller
{
    public function index()
    {
        $turmas = Turma::all();
        return view('index', compact('turmas'));
    }
    
    public function create()
    {
        return view('turmas.create');
    }

    public function store(TurmaRequest $request)
    {
        if ($request->vagas < 0) {
            return redirect()->back()->with('error', 'O número de vagas não pode ser negativo.');
        }
        
        Turma::create($request->validated());
        return redirect()->route('turmas.index')->with('success', 'Turma cadastrada com sucesso!');
    }
}
