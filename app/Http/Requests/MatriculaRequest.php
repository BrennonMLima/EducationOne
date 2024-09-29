<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id_aluno' => 'required|exists:alunos,id',
            'id_turma' => 'required|exists:turmas,id',
            'data_matricula' => 'required|date',
        ];
    }
}
