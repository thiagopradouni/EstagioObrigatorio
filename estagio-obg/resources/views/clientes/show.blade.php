@extends('layouts.app')

@section('title', 'Mostrar Cliente')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="mb-0">Detalhes do Cliente</h1>
            <hr />
            
            <!-- Nome e CPF -->
            <div class="row mb-3">
                <div class="col">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" value="{{ $cliente->nome }}" readonly>
                </div>
                <div class="col">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" class="form-control" value="{{ $cliente->cpf }}" readonly>
                </div>
            </div>

            <!-- Email e Data de Nascimento -->
            <div class="row mb-3">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $cliente->email }}" readonly>
                </div>
                <div class="col">
                    <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                    <input type="date" class="form-control" value="{{ $cliente->data_nascimento }}" readonly>
                </div>
            </div>

            <!-- Endereço e Telefone -->
            <div class="row mb-3">
                <div class="col">
                    <label for="endereco" class="form-label">Endereço</label>
                    <input type="text" class="form-control" value="{{ $cliente->endereco }}" readonly>
                </div>
                <div class="col">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" class="form-control" value="{{ $cliente->telefone }}" readonly>
                </div>
            </div>

            <!-- Criado em e Atualizado em -->
            <div class="row mb-3">
                <div class="col">
                    <label for="created_at" class="form-label">Criado em</label>
                    <input type="text" class="form-control" value="{{ $cliente->created_at->format('d/m/Y H:i') }}" readonly>
                </div>
                <div class="col">
                    <label for="updated_at" class="form-label">Atualizado em</label>
                    <input type="text" class="form-control" value="{{ $cliente->updated_at->format('d/m/Y H:i') }}" readonly>
                </div>
            </div>

            <!-- Botões -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
    </div>
@endsection
