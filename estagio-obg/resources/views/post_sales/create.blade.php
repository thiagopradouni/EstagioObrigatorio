@extends('layouts.app')

@section('title', 'Adicionar Pós-Venda')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('post_sales.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="sale_id" class="form-label">Selecionar Venda</label>
                    <select name="sale_id" id="sale_id" class="form-control" required>
                        <option value="">Selecione a venda</option>
                        @foreach($sales as $sale)
                            <option value="{{ $sale->id }}">{{ $sale->cliente->nome }} - {{ $sale->created_at->format('d/m/Y') }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="scheduled_date" class="form-label">Data Programada</label>
                    <input type="date" name="scheduled_date" id="scheduled_date" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="comments" class="form-label">Comentários (opcional)</label>
                    <textarea name="comments" id="comments" class="form-control" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('post_sales.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary">Adicionar Pós-Venda</button>
                </div>
            </form>
        </div>
    </div>
@endsection
