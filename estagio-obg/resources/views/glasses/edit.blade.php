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
    <form action="{{ route('glasses.update', $glasses->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Código</label>
                <input type="text" name="code" class="form-control" value="{{ old('code', $glasses->code) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Tipo de Produto</label>
                <select name="product_type" class="form-control" required>
                    <option value="Solar" {{ old('product_type', $glasses->product_type) == 'Solar' ? 'selected' : '' }}>Solar</option>
                    <option value="Receituario" {{ old('product_type', $glasses->product_type) == 'Receituario' ? 'selected' : '' }}>Receituario</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Código Fantasia</label>
                <input type="text" name="fantasy_code" class="form-control" value="{{ old('fantasy_code', $glasses->fantasy_code) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Cor</label>
                <input type="text" name="color" class="form-control" value="{{ old('color', $glasses->color) }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Quantidade</label>
                <input type="number" name="quantity" class="form-control" value="{{ old('quantity', $glasses->quantity) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Custo Unitário</label>
                <input type="number" step="0.01" name="unit_cost" class="form-control" value="{{ old('unit_cost', $glasses->unit_cost) }}" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Marca</label>
                <input type="text" name="brand" class="form-control" value="{{ old('brand', $glasses->brand) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Linha/Material</label>
                <input type="text" name="line_material" class="form-control" value="{{ old('line_material', $glasses->line_material) }}" required>
            </div>
        </div>
        <div class="row mb-3">
        <div class="col">
                <label class="form-label">Descrição</label>
                <textarea name="description" class="form-control" required>{{ old('description', $glasses->description) }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Atualizar</button>
            </div>
        </div>
    </form>
@endsection
