@extends('layouts.app')

@section('title', 'Adicionar Aluno')

@section('content')
<div class="container">
    <div class="form">
        <h1>Adicionar Aluno</h1>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('alunos.store') }}" method="POST">
            @csrf
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required placeholder="Digite o nome do aluno">
            
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" name="data_nascimento" required>
            
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" required placeholder="Digite o CPF">
            
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
@endsection
