<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chamada;
use App\Models\Turma;
use App\Models\Aluno;
use Carbon\Carbon;

class ChamadaController extends Controller
{
    public function index(Request $request, $id_turma)
    {
        $data = $request->input('data', Carbon::now()->toDateString());
        $turma = Turma::findOrFail($id_turma);
        $matriculas = $turma->matriculas()->with('aluno')->get();
    
        $chamadas = Chamada::where('id_turma', $id_turma)
                            ->whereDate('data', $data)
                            ->get()
                            ->keyBy('id_aluno');
    
        return view('chamada.relatorio', compact('turma', 'matriculas', 'chamadas', 'data'));
    }

    public function store(Request $request)
    {
        $turmaId = $request->input('turma_id');
        $presencas = $request->input('presenca');
    
        if (!$presencas) {
            return redirect()->back()->withErrors('Nenhuma presença foi registrada.');
        }
    
        foreach ($presencas as $alunoId => $presente) {
            Chamada::updateOrCreate(
                [
                    'id_turma' => $turmaId,
                    'id_aluno' => $alunoId,
                    'data' => now()->toDateString(),
                ],
                [
                    'presenca' => $presente == 1 ? true : false,
                ]
            );
        }
    
        return redirect()->route('turmas.index')->with('success', 'Chamada salva com sucesso!');
    }

    public function historico($id_turma)
    {
        $turma = Turma::findOrFail($id_turma);

        $chamadas = Chamada::where('id_turma', $turma->id)
                        ->orderBy('data', 'desc')
                        ->get()
                        ->groupBy('data');

        return view('chamada.historico', compact('turma', 'chamadas'));
    }
    
}