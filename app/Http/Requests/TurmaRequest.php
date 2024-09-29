<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TurmaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'descricao' => 'required|string|max:255',
            'ano' => 'required|integer|digits:4',
            'vagas' => 'required|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'ano.digits' => 'O ano deve ter exatamente 4 dígitos.',
            'vagas.min' => 'O número de vagas não pode ser negativo.',
        ];
    }
}
