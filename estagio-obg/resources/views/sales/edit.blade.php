@extends('layouts.app')

@section('title', 'Editar Venda')

@section('contents')
    <h1 class="mb-0">Editar Venda</h1>
    <hr />
    <form action="{{ route('sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label for="glasses_id" class="form-label">Selecionar Óculos</label>
                <select name="glasses_id" id="glasses_id" class="form-control" required>
                    @foreach($glasses as $glass)
                        <option value="{{ $glass->id }}" {{ $glass->id == $sale->glasses_id ? 'selected' : '' }}>{{ $glass->description }}</option>
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
                    <option value="Cash" {{ $sale->payment_method == 'Cash' ? 'selected' : '' }}>Dinheiro</option
