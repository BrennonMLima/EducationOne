@extends('layouts.app')

@section('content')
@section('title', 'Relatório de Chamadas')

<div class="container">
    <h1>Relatório de Chamadas - Turma: {{ $turma->descricao }} ({{ \Carbon\Carbon::now()->format('d/m/Y') }})</h1>

    <div style="margin-top: 20px;" class="btn-container">
        <a href="{{ route('chamada.historico', $turma->id) }}" class="btn">Ver Histórico de Chamadas</a>
    </div>

    <form action="{{ route('chamada.store') }}" method="POST">
        @csrf
        <input type="hidden" name="turma_id" value="{{ $turma->id }}">

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Data de Nascimento</th>
                    <th>Presença</th>
                </tr>
            </thead>
            <tbody>
                @foreach($matriculas as $matricula)
                    <tr>
                        <td>{{ $matricula->aluno->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($matricula->aluno->data_nascimento)->format('d/m/Y') }}</td>
                        <td>
                            <input type="hidden" name="presenca[{{ $matricula->aluno->id }}]" value="0">
                            <input type="checkbox" name="presenca[{{ $matricula->aluno->id }}]" value="1"
                                   {{ isset($chamadas[$matricula->aluno->id]) && $chamadas[$matricula->aluno->id]->presenca ? 'checked' : '' }}>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="btn-container">
            <button type="submit" class="btn" style="width: 50%;">Salvar Chamada</button>
        </div>
    </form>
</div>
@endsection
