<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'ano',
        'vagas',
    ];

    public function chamadas()
    {
        return $this->hasMany(Chamada::class, 'id_turma');
    }

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'matriculas', 'id_turma', 'id_aluno');
    }

    public function matriculas()
    {
        return $this->hasMany(Matricula::class, 'id_turma');
    }
    
}
