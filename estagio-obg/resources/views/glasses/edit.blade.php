@extends('layouts.app')

@section('title', 'Editar Óculos')

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
    <form action="{{ route('glasses.update', $glass->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Código</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', $glass->code) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Tipo de Produto</label>
                <select name="product_type" class="form-control" required>
                    <option value="Solar" {{ old('product_type', $glass->product_type) == 'Solar' ? 'selected' : '' }}>Solar</option>
                    <option value="Receituario" {{ old('product_type', $glass->product_type) == 'Receituario' ? 'selected' : '' }}>Receituário</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Código Fantasia</label>
                <input type="text" name="fantasy_code" class="form-control" value="{{ old('fantasy_code', $glass->fantasy_code) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Cor</label>
                <input type="text" name="color" class="form-control" value="{{ old('color', $glass->color) }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Quantidade</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $glass->quantity) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Custo Unitário</label>
                <input type="number" step="0.01" name="unit_cost" class="form-control" value="{{ old('unit_cost', $glass->unit_cost) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Valor de Venda</label>
                <input type="number" step="0.01" name="sale_price" class="form-control" value="{{ old('sale_price', $glass->sale_price) }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" value="{{ old('brand', $glass->brand) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Linha/Material</label>
                <input type="text" name="line_material" class="form-control" value="{{ old('line_material', $glass->line_material) }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control" required>{{ old('description', $glass->description) }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Atualizar</button>
            </div>
        </div>
    </form>
@endsection
