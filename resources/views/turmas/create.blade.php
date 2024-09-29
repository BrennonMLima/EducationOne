@extends('layouts.app')

@section('title', 'Adicionar Turma')

@section('content')
<div class="container">
    <div class="form">
        <h1>Adicionar Turma</h1>
        
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('turmas.store') }}" method="POST">
            @csrf
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" required>
            @error('descricao')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="ano">Ano (AAAA):</label>
            <input type="text" name="ano" required>
            @error('ano')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label for="vagas">Vagas:</label>
            <input type="number" name="vagas" required min="0">
            @error('vagas')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
