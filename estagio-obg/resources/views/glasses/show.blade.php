@extends('layouts.app')

@section('title', 'Detalhes dos Óculos')

@section('contents')
    <h1 class="mb-0">Detalhes dos Óculos</h1>
    <hr />
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
    <div class="row mb-3">
    <div class="col">
            <label class="form-label">Descrição</label>
            <textarea class="form-control" readonly>{{ $glass->description }}</textarea>
        </div>
    </div>
@endsection
