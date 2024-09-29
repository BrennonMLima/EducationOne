@extends('layouts.app')

@section('content')
@section('title', 'Histórico')

<div class="container">
    <h1>Histórico de Chamadas - Turma: {{ $turma->descricao }}</h1>
    
    <div style="margin: 20px;" class="btn-container">
        <a href="{{ route('chamada.relatorio', $turma->id) }}" class="btn">Voltar para Relatório</a>
    </div>

    @foreach($chamadas as $data => $chamadasPorData)
        <h3>Data: {{ \Carbon\Carbon::parse($data)->format('d/m/Y') }}</h3>
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Presença</th>
                </tr>
            </thead>
            <tbody>
                @foreach($chamadasPorData as $chamada)
                    <tr>
                        <td>{{ $chamada->aluno->nome }}</td>
                        <td>{{ $chamada->presenca ? 'Presente' : 'Faltou' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</div>
@endsection
