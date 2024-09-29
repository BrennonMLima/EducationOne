@extends('layouts.app')

@section('title', 'Adicionar Matrícula')

@section('content')
<div class="container">
    <div class="form">
        <h1>Adicionar Matrícula</h1>
        
        <!-- Exibir mensagens de erro ou sucesso -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('matriculas.store') }}" method="POST">
            @csrf
            <label for="id_aluno">Selecionar Aluno:</label>
            <select name="id_aluno" required>
                @foreach($alunos as $aluno)
                    <option value="{{ $aluno->id }}">{{ $aluno->nome }}</option>
                @endforeach
            </select>

            <label for="id_turma">Selecionar Turma:</label>
            <select name="id_turma" required>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->descricao }}</option>
                @endforeach
            </select>

            <label for="data_matricula">Data da Matrícula:</label>
            <input type="date" name="data_matricula" required>

            <button type="submit">Cadastrar Matrícula</button>
        </form>
    </div>
</div>
@endsection
