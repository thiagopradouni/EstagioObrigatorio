@extends('layouts.app')

@section('title', 'Cadastro de Óculos')

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
    <form action="{{ route('glasses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Código</label>
                <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
            </div>
            <div class="col">
                <label class="form-label">Tipo de Produto</label>
                <select name="product_type" class="form-control" required>
                    <option value="Solar" {{ old('product_type') == 'Solar' ? 'selected' : '' }}>Solar</option>
                    <option value="Receituario" {{ old('product_type') == 'Receituario' ? 'selected' : '' }}>Receituario</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Código Fantasia</label>
                <input type="text" name="fantasy_code" class="form-control" value="{{ old('fantasy_code') }}" required>
            </div>
            <div class="col">
                <label class="form-label">Cor</label>
                <input type="text" name="color" class="form-control" value="{{ old('color') }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Quantidade</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
            </div>
            <div class="col">
                <label class="form-label">Custo Unitário</label>
                <input type="number" step="0.01" name="unit_cost" class="form-control" value="{{ old('unit_cost') }}" required>
            </div>
            <div class="form-group">
                <label for="sale_price">Valor de Venda</label>
                <input type="number" step="0.01"  name="sale_price" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price', $glass->sale_price ?? '') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
            </div>
            <div class="col">
                <label class="form-label">Linha/Material</label>
                <input type="text" name="line_material" class="form-control" value="{{ old('line_material') }}" required>
            </div>
        </div>
        <div class="row mb-3">
        <div class="col">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Criar</button>
            </div>
        </div>
    </form>
@endsection
