@extends('layouts.app')

@section('title', 'Detalhes da Pós-Venda')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Mensagem de Sucesso (opcional) -->
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            <!-- Detalhes da Venda Selecionada -->
            <div class="form-group mb-3">
                <label for="sale_id" class="form-label"><strong>Venda:</strong></label>
                <p>{{ $postSale->sale->cliente->nome }} - {{ $postSale->sale->created_at->format('d/m/Y') }}</p>
            </div>

            <!-- Data Programada -->
            <div class="form-group mb-3">
                <label for="scheduled_date" class="form-label"><strong>Data Programada:</strong></label>
                <p>{{ \Carbon\Carbon::parse($postSale->scheduled_date)->format('d/m/Y') }}</p>
            </div>

            <!-- Data Realizada -->
            @if ($postSale->actual_date)
                <div class="form-group mb-3">
                    <label for="actual_date" class="form-label"><strong>Data Realizada:</strong></label>
                    <p>{{ \Carbon\Carbon::parse($postSale->actual_date)->format('d/m/Y') }}</p>
                </div>
            @else
                <div class="form-group mb-3">
                    <label for="actual_date" class="form-label"><strong>Data Realizada:</strong></label>
                    <p>Não realizada</p>
                </div>
            @endif

            <!-- Status Concluído -->
            <div class="form-group mb-3">
                <label for="completed" class="form-label"><strong>Status:</strong></label>
                <p>{{ $postSale->completed ? 'Concluída' : 'Não Concluída' }}</p>
            </div>

            <!-- Comentários -->
            @if($postSale->comments)
                <div class="form-group mb-3">
                    <label for="comments" class="form-label"><strong>Comentários:</strong></label>
                    <p>{{ $postSale->comments }}</p>
                </div>
            @endif

            <!-- Botão Voltar -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('post_sales.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
            </div>
        </div>
    </div>
@endsection
