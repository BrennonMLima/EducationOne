@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="container">
    <h1>Lista de Turmas</h1>

    @if($turmas->isEmpty())
        <p>Nenhuma turma cadastrada.</p>
    @else
        <div class="turmas-list">
            @foreach($turmas as $turma)
                <div class="turma-container">
                    <h2>{{ $turma->descricao }}</h2>
                    <p>Total de Vagas: {{ $turma->vagas }}</p>
                    <p>Vagas Disponíveis: {{ $turma->vagas - \App\Models\Matricula::where('id_turma', $turma->id)->count() }}</p>
                    <a class="turma-link" href="{{ route('chamada.relatorio', $turma->id) }}">
                        Ver Relatório de Chamadas
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
