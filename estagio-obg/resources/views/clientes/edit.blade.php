@extends('layouts.app')
  
@section('title', 'Editar Cliente')
  
@section('contents')
    <hr />
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $cliente->nome }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ $cliente->cpf }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $cliente->email }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" placeholder="Data de Nascimento" value="{{ $cliente->data_nascimento }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{ $cliente->endereco }}" required>
            </div>
            <div class="col mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="{{ $cliente->telefone }}" required>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-warning">Atualizar</button>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </form>
@endsection
