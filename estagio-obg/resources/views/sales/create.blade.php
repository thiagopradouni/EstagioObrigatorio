@extends('layouts.app')

@section('title', 'Criar Venda')

@section('contents')
    <h1 class="mb-0">Adicionar Nova Venda</h1>
    <hr />
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="glasses_id" class="form-label">Selecionar Óculos</label>
                <select name="glasses_id" id="glasses_id" class="form-control" required>
                    @foreach($glasses as $glass)
                        <option value="{{ $glass->id }}">{{ $glass->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="cliente_id" class="form-label">Selecionar Cliente</label>
                <select name="cliente_id" id="cliente_id" class="form-control" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="quantity" class="form-label">Quantidade</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Informe a Quantidade" required>
            </div>
            <div class="col">
                <label for="payment_method" class="form-label">Forma de Pagamento</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="Cash">Dinheiro</option>
                    <option value="Credit Card">Cartão de Crédito</option>
                    <option value="Debit Card">Cartão de Débito</option>
                    <option value="Bank Transfer">Pix</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="discount" class="form-label">Desconto</label>
                <input type="number" name="discount" id="discount" class="form-control" step="0.01" placeholder="Informe o Desconto (se houver)">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="description" class="form-label">Descrição</label>
                <textarea name="description" id="description" class="form-control" placeholder="Informe uma Descrição (opcional)"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
@endsection
