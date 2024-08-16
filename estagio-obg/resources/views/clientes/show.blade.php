@extends('layouts.app')
  
@section('title', 'Mostrar Cliente')
  
@section('contents')
    <h1 class="mb-0">Detalhes do Cliente</h1>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ $cliente->nome }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">CPF</label>
            <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ $cliente->cpf }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $cliente->email }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" placeholder="Data de Nascimento" value="{{ $cliente->data_nascimento }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Endereço</label>
            <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{ $cliente->endereco }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="{{ $cliente->telefone }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Criado em</label>
            <input type="text" name="created_at" class="form-control" placeholder="Criado em" value="{{ $cliente->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Atualizado em</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Atualizado em" value="{{ $cliente->updated_at }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>
@endsection
