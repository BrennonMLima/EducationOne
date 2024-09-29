<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Aluno; 
use App\Models\Turma; 
use App\Http\Requests\MatriculaRequest;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::all();
        return view('matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $turmas = Turma::all();

        return view('matriculas.create', compact('alunos', 'turmas'));
    }

    public function store(MatriculaRequest $request)
    {
        $turma = Turma::find($request->id_turma);
        
        if (!$turma) {
            return redirect()->back()->with('error', 'Turma não encontrada.');
        }
    
        $matriculasCount = Matricula::where('id_turma', $turma->id)->count();
        
        if ($matriculasCount >= $turma->vagas) {
            return redirect()->back()->with('error', 'Não há vagas disponíveis nesta turma.');
        }
    
        Matricula::create($request->validated());
    
        return redirect()->route('matriculas.create')->with('success', 'Matrícula cadastrada com sucesso!');
    }

    public function relatorioChamadas($id_turma)
{
    $turma = Turma::findOrFail($id_turma);
    
    $matriculas = Matricula::where('id_turma', $turma->id)->with('aluno')->get();

    return view('chamada.relatorio', compact('turma', 'matriculas'));
}
}

