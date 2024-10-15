@extends('layouts.app')

@section('title', 'Adicionar Pós-Venda')

@section('contents')
    <h1 class="mb-0">Adicionar Nova Pós-Venda</h1>
    <hr />
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
        <div class="row mb-3">
            <div class="col">
                <label for="sale_id" class="form-label">Selecionar Venda</label>
                <select name="sale_id" id="sale_id" class="form-control" required>
                    @foreach($sales as $sale)
                        <option value="{{ $sale->id }}">{{ $sale->cliente->nome }} - {{ $sale->created_at->format('d/m/Y') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="scheduled_date" class="form-label">Data Programada</label>
                <input type="date" name="scheduled_date" id="scheduled_date" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="comments" class="form-label">Comentários</label>
                <textarea name="comments" id="comments" class="form-control" placeholder="Comentários opcionais"></textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Adicionar Pós-Venda</button>
            </div>
        </div>
    </form>
@endsection
