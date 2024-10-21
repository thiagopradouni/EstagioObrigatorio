@extends('layouts.app')

@section('title', 'Detalhes dos Óculos')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">

            <!-- Código e Tipo de Produto -->
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Código</label>
                    <input type="text" class="form-control" value="{{ $glass->code }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label">Tipo de Produto</label>
                    <input type="text" class="form-control" value="{{ $glass->product_type }}" readonly>
                </div>
            </div>

            <!-- Código Fantasia e Cor -->
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Código Fantasia</label>
                    <input type="text" class="form-control" value="{{ $glass->fantasy_code }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label">Cor</label>
                    <input type="text" class="form-control" value="{{ $glass->color }}" readonly>
                </div>
            </div>

            <!-- Quantidade e Custo Unitário -->
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Quantidade</label>
                    <input type="number" class="form-control" value="{{ $glass->quantity }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label">Custo Unitário</label>
                    <input type="number" step="0.01" class="form-control" value="{{ $glass->unit_cost }}" readonly>
                </div>
            </div>

            <!-- Marca e Linha/Material -->
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Marca</label>
                    <input type="text" class="form-control" value="{{ $glass->brand }}" readonly>
                </div>
                <div class="col">
                    <label class="form-label">Linha/Material</label>
                    <input type="text" class="form-control" value="{{ $glass->line_material }}" readonly>
                </div>
            </div>

            <!-- Descrição -->
            <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Descrição</label>
                    <textarea class="form-control" readonly>{{ $glass->description }}</textarea>
                </div>
            </div>

            <!-- Botão de Voltar -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('glasses.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
            </div>
        </div>
    </div>
@endsection
