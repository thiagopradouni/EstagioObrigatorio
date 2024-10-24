@extends('layouts.app')

@section('title', 'Detalhes da Venda')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            @foreach($sale->glasses as $glass)
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Óculos</label>
                        <input type="text" class="form-control" value="{{ $glass->fantasy_code }}" readonly>
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Quantidade</label>
                        <input type="number" class="form-control" value="{{ $glass->pivot->quantity }}" readonly>
                    </div>
                </div>
            @endforeach

            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Nome do Cliente</label>
                    <input type="text" class="form-control" value="{{ $sale->cliente->nome }}" readonly>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Forma de Pagamento</label>
                    <input type="text" class="form-control" value="{{ $sale->payment_method }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col mb-3">
                    <label class="form-label">Valor Bruto</label>
                    <input type="number" class="form-control" value="{{ $sale->gross_value }}" readonly>
                </div>
                <div class="col mb-3">
                    <label class="form-label">Valor Líquido</label>
                    <input type="number" class="form-control" value="{{ $sale->net_value }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Desconto</label>
                    <input type="number" class="form-control" value="{{ $sale->discount }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" readonly>{{ $sale->description }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="form-label">Criado Em</label>
                    <input type="text" class="form-control" value="{{ $sale->created_at }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label">Atualizado Em</label>
                    <input type="text" class="form-control" value="{{ $sale->updated_at }}" readonly>
                </div>
            </div>

            <div class="row">
                <div class="d-grid">
                    <a href="{{ route('sales.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
                </div>
            </div>
        </div>
    </div>
@endsection
