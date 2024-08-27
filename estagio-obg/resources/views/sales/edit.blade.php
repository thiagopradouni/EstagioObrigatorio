@extends('layouts.app')

@section('title', 'Editar Venda')

@section('contents')
    <h1 class="mb-0">Editar Venda</h1>
    <hr />
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label for="glasses_id" class="form-label">Selecionar Óculos</label>
                <select name="glasses_id" id="glasses_id" class="form-control" required>
                    @foreach($glasses as $glass)
                        <option value="{{ $glass->id }}" {{ $glass->id == $sale->glasses_id ? 'selected' : '' }}>{{ $glass->fantasy_code }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="cliente_id" class="form-label">Selecionar Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $cliente->id == $sale->cliente_id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="quantity" class="form-label">Quantidade</label>
                <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $sale->quantity }}" required>
            </div>
            <div class="col">
                <label for="payment_method" class="form-label">Forma de Pagamento</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="Dinheiro" {{ $sale->payment_method == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                    <option value="Cartão de Crédito" {{ $sale->payment_method == 'Cartão de Crédito' ? 'selected' : '' }}>Cartão de Crédito</option>
                    <option value="Cartão de Débito" {{ $sale->payment_method == 'Cartão de Débito' ? 'selected' : '' }}>Cartão de Débito</option>
                    <option value="Pix" {{ $sale->payment_method == 'Pix' ? 'selected' : '' }}>Pix</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="discount" class="form-label">Desconto</label>
                <input type="number" name="discount" id="discount" class="form-control" step="0.01" value="{{ $sale->discount ?? 0.00 }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" id="description" class="form-control">{{ $sale->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Atualizar</button>
            </div>
        </div>
    </form>
@endsection
