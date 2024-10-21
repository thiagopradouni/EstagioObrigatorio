@extends('layouts.app')

@section('title', 'Editar Cliente')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nome e CPF -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control" value="{{ $cliente->nome }}" required>
                    </div>
                    <div class="col">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" name="cpf" class="form-control" value="{{ $cliente->cpf }}" required>
                    </div>
                </div>

                <!-- Email e Data de Nascimento -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $cliente->email }}" required>
                    </div>
                    <div class="col">
                        <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control" value="{{ $cliente->data_nascimento }}" required>
                    </div>
                </div>

                <!-- Endereço e Telefone -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" name="endereco" class="form-control" value="{{ $cliente->endereco }}" required>
                    </div>
                    <div class="col">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" name="telefone" class="form-control" value="{{ $cliente->telefone }}" required>
                    </div>
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-warning">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
