<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AlunoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'cpf' => [
                'required',
                'string',
                'size:11',
                'unique:alunos,cpf',
                'regex:/^\d{11}$/'
            ],
            'data_nascimento' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.size' => 'O CPF deve ter exatamente 11 dígitos.',
            'cpf.regex' => 'O CPF deve conter apenas números.',
        ];
    }
}
