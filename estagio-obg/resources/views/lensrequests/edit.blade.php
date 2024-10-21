@extends('layouts.app')

@section('title', 'Editar Solicitação de Lentes')

@section('contents')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar Solicitação de Lentes</h6>
    </div>
    <div class="card-body">
        <form action="{{ route('lensrequests.update', $request->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="customer_id">Cliente</label>
                <select name="customer_id" id="customer_id" class="form-control" required>
                    <option value="">Selecione um cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $cliente->id == $request->customer_id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="lens_type">Tipo de Lente</label>
                <input type="text" name="lens_type" id="lens_type" class="form-control" value="{{ $request->lens_type }}" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantidade</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="{{ $request->quantity }}" required>
            </div>

            <div class="form-group">
                <label for="prescription_details">Detalhes da Receita</label>
                <textarea name="prescription_details" id="prescription_details" class="form-control">{{ $request->prescription_details }}</textarea>
            </div>

            <div class="form-group">
                <label for="additional_notes">Notas Adicionais</label>
                <textarea name="additional_notes" id="additional_notes" class="form-control">{{ $request->additional_notes }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar Solicitação</button>
        </form>
    </div>
</div>

@endsection
