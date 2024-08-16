@extends('layouts.app')
  
@section('title', 'Cadastro Cliente')
  
@section('contents')
    <hr />
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('clientes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="nome" class="form-control" placeholder="Nome" value="{{ old('nome') }}" required>
            </div>
            <div class="col">
                <input type="text" name="cpf" class="form-control" placeholder="CPF" value="{{ old('cpf') }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            </div>
            <div class="col">
                <input type="date" name="data_nascimento" class="form-control" placeholder="Data de Nascimento" value="{{ old('data_nascimento') }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="endereco" class="form-control" placeholder="Endereço" value="{{ old('endereco') }}" required>
            </div>
            <div class="col">
                <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="{{ old('telefone') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Criar</button>
            </div>
        </div>
    </form>
@endsection
