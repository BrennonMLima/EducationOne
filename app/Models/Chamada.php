<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chamada extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_turma',
        'id_aluno',
        'presenca',
        'data',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'id_aluno');
    }

    public $timestamps = false;
}
