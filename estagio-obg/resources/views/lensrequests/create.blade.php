@extends('layouts.app')

@section('title', 'Solicitação de Lentes')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('lensrequests.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="customer_id" class="form-label">Selecione o Cliente</label>
                    <select name="customer_id" id="customer_id" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="lens_type" class="form-label">Tipo de Lente</label>
                    <input type="text" name="lens_type" id="lens_type" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="quantity" class="form-label">Quantidade</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="prescription_details" class="form-label">Detalhes da Receita (opcional)</label>
                    <textarea name="prescription_details" id="prescription_details" class="form-control" rows="3"></textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="additional_notes" class="form-label">Notas Adicionais (opcional)</label>
                    <textarea name="additional_notes" id="additional_notes" class="form-control" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('lensrequests.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary">Enviar Solicitação</button>
                </div>
            </form>
        </div>
    </div>
@endsection
