@extends('layouts.app')

@section('title', 'Cadastro de Óculos')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
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
                <div class="form-group mb-3">
                    <label for="code" class="form-label">Código</label>
                    <input type="text" name="code" class="form-control" value="{{ old('code') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="product_type" class="form-label">Tipo de Produto</label>
                    <select name="product_type" id="product_type" class="form-control" required>
                        <option value="Solar" {{ old('product_type') == 'Solar' ? 'selected' : '' }}>Solar</option>
                        <option value="Receituario" {{ old('product_type') == 'Receituario' ? 'selected' : '' }}>Receituário</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="fantasy_code" class="form-label">Código Fantasia</label>
                    <input type="text" name="fantasy_code" class="form-control" value="{{ old('fantasy_code') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="color" class="form-label">Cor</label>
                    <input type="text" name="color" class="form-control" value="{{ old('color') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Quantidade</label>
                    <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="unit_cost" class="form-label">Custo Unitário</label>
                    <input type="number" step="0.01" name="unit_cost" class="form-control" value="{{ old('unit_cost') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="sale_price" class="form-label">Valor de Venda</label>
                    <input type="number" step="0.01" name="sale_price" class="form-control" value="{{ old('sale_price') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="brand" class="form-label">Marca</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="line_material" class="form-label">Linha/Material</label>
                    <input type="text" name="line_material" class="form-control" value="{{ old('line_material') }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('glasses.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary">Criar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
