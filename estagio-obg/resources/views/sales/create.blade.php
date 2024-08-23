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
                <select name="glasses_id" id="glasses_id" class="form-control">
                    @foreach($glasses as $glass)
                        <option value="{{ $glass->id }}">{{ $glass->description }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="quantity" class="form-label">Quantidade</label>
                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="Informe a Quantidade">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="customer_name" class="form-label">Nome do Cliente</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="Informe o Nome do Cliente">
            </div>
            <div class="col">
                <label for="payment_method" class="form-label">Forma de Pagamento</label>
                <select name="payment_method" id="payment_method" class="form-control">
                    <option value="Cash">Dinheiro</option>
                    <option value="Credit Card">Cartão de Crédito</option>
                    <option value="Debit Card">Cartão de Débito</option>
                    <option value="Bank Transfer">Transferência Bancária</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="gross_value" class="form-label">Valor Bruto</label>
                <input type="number" name="gross_value" id="gross_value" class="form-control" step="0.01" placeholder="Informe o Valor Bruto">
            </div>
            <div class="col">
                <label for="net_value" class="form-label">Valor Líquido</label>
                <input type="number" name="net_value" id="net_value" class="form-control" step="0.01" placeholder="Informe o Valor Líquido">
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
