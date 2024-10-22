@extends('layouts.app')

@section('title', 'Detalhes da Solicitação de Lentes')

@section('contents')
<div class="card shadow mb-4">
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

        <!-- Prescrição para Longe -->
        <h5>Prescrição para Longe</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <h6>O.D. Esférico (Longe)</h6>
                <p>{{ $request->sphere_od_longe }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.D. Cilíndrico (Longe)</h6>
                <p>{{ $request->cylinder_od_longe }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.D. Eixo (Longe)</h6>
                <p>{{ $request->axis_od_longe }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <h6>O.E. Esférico (Longe)</h6>
                <p>{{ $request->sphere_os_longe }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.E. Cilíndrico (Longe)</h6>
                <p>{{ $request->cylinder_os_longe }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.E. Eixo (Longe)</h6>
                <p>{{ $request->axis_os_longe }}</p>
            </div>
        </div>

        <!-- Prescrição para Perto -->
        <h5>Prescrição para Perto</h5>
        <div class="row mb-3">
            <div class="col-md-4">
                <h6>O.D. Esférico (Perto)</h6>
                <p>{{ $request->sphere_od_perto }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.D. Cilíndrico (Perto)</h6>
                <p>{{ $request->cylinder_od_perto }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.D. Eixo (Perto)</h6>
                <p>{{ $request->axis_od_perto }}</p>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <h6>O.E. Esférico (Perto)</h6>
                <p>{{ $request->sphere_os_perto }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.E. Cilíndrico (Perto)</h6>
                <p>{{ $request->cylinder_os_perto }}</p>
            </div>
            <div class="col-md-4">
                <h6>O.E. Eixo (Perto)</h6>
                <p>{{ $request->axis_os_perto }}</p>
            </div>
        </div>

        <!-- Material da Lente e Tratamento -->
        <div class="row mb-3">
            <div class="col-md-6">
                <h5>Material da Lente:</h5>
                <p>{{ $request->lens_material }}</p>
            </div>
            <div class="col-md-6">
                <h5>Tratamento Adicional:</h5>
                <p>{{ $request->treatment }}</p>
            </div>
        </div>

        <!-- Exibindo os detalhes da receita, se houver -->
        @if($request->prescription_details)
        <div class="row mb-3">
            <div class="col-md-12">
                <h5>Detalhes da Receita:</h5>
                <p>{{ $request->prescription_details }}</p>
            </div>
        </div>
        @endif

        <!-- Exibindo notas adicionais, se houver -->
        @if($request->additional_notes)
        <div class="row mb-3">
            <div class="col-md-12">
                <h5>Notas Adicionais:</h5>
                <p>{{ $request->additional_notes }}</p>
            </div>
        </div>
        @endif

        <!-- Botão de voltar -->
        <div class="d-flex justify-content-between">
            <a href="{{ route('lensrequests.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
        </div>
    </div>
</div>

@endsection
