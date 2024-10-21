@extends('layouts.app')

@section('title', 'Detalhes da Solicitação de Lentes')

@section('contents')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Detalhes da Solicitação de Lentes</h1>
    <a href="{{ route('lensrequests.index') }}" class="btn btn-secondary">Voltar para Lista</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informações da Solicitação</h6>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-6">
                <h5>Cliente:</h5>
                <p>{{ $request->customer->nome }}</p>
            </div>
            <div class="col-md-6">
                <h5>Data da Solicitação:</h5>
                <p>{{ $request->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-6">
                <h5>Tipo de Lente:</h5>
                <p>{{ $request->lens_type }}</p>
            </div>
            <div class="col-md-6">
                <h5>Quantidade:</h5>
                <p>{{ $request->quantity }}</p>
            </div>
        </div>

        @if($request->prescription_details)
        <div class="row mb-3">
            <div class="col-md-12">
                <h5>Detalhes da Receita:</h5>
                <p>{{ $request->prescription_details }}</p>
            </div>
        </div>
        @endif

        @if($request->additional_notes)
        <div class="row mb-3">
            <div class="col-md-12">
                <h5>Notas Adicionais:</h5>
                <p>{{ $request->additional_notes }}</p>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
