<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_aluno',
        'id_turma',
        'data_matricula',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'id_turma');
    }
}

