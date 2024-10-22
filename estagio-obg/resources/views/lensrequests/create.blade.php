@extends('layouts.app')

@section('title', 'Criar Solicitação de Lentes')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('lensrequests.store') }}" method="POST">
                @csrf
                
                <!-- Cliente -->
                <div class="form-group mb-3">
                    <label for="cliente_id" class="form-label">Selecionar Cliente</label>
                    <select name="customer_id" id="cliente_id" class="form-control" required>
                        <option value="">Selecione o Cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Nome da Lente -->
                <div class="form-group mb-3">
                    <label for="lens_type" class="form-label">Tipo da Lente</label>
                    <input type="text" name="lens_type" id="lens_type" class="form-control" placeholder="Ex: Lente XYZ" required>
                </div>

                <!-- Prescrição para Longe -->
                <h5>Prescrição para Longe</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sphere_od_longe" class="form-label">O.D. Esférico (Longe)</label>
                        <input type="number" step="0.01" name="sphere_od_longe" id="sphere_od_longe" class="form-control">
                    </div>
                    <div class="col">
                        <label for="cylinder_od_longe" class="form-label">O.D. Cilíndrico (Longe)</label>
                        <input type="number" step="0.01" name="cylinder_od_longe" id="cylinder_od_longe" class="form-control">
                    </div>
                    <div class="col">
                        <label for="axis_od_longe" class="form-label">O.D. Eixo (Longe)</label>
                        <input type="number" name="axis_od_longe" id="axis_od_longe" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="sphere_os_longe" class="form-label">O.E. Esférico (Longe)</label>
                        <input type="number" step="0.01" name="sphere_os_longe" id="sphere_os_longe" class="form-control">
                    </div>
                    <div class="col">
                        <label for="cylinder_os_longe" class="form-label">O.E. Cilíndrico (Longe)</label>
                        <input type="number" step="0.01" name="cylinder_os_longe" id="cylinder_os_longe" class="form-control">
                    </div>
                    <div class="col">
                        <label for="axis_os_longe" class="form-label">O.E. Eixo (Longe)</label>
                        <input type="number" name="axis_os_longe" id="axis_os_longe" class="form-control">
                    </div>
                </div>

                <!-- Prescrição para Perto -->
                <h5>Prescrição para Perto</h5>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sphere_od_perto" class="form-label">O.D. Esférico (Perto)</label>
                        <input type="number" step="0.01" name="sphere_od_perto" id="sphere_od_perto" class="form-control">
                    </div>
                    <div class="col">
                        <label for="cylinder_od_perto" class="form-label">O.D. Cilíndrico (Perto)</label>
                        <input type="number" step="0.01" name="cylinder_od_perto" id="cylinder_od_perto" class="form-control">
                    </div>
                    <div class="col">
                        <label for="axis_od_perto" class="form-label">O.D. Eixo (Perto)</label>
                        <input type="number" name="axis_od_perto" id="axis_od_perto" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="sphere_os_perto" class="form-label">O.E. Esférico (Perto)</label>
                        <input type="number" step="0.01" name="sphere_os_perto" id="sphere_os_perto" class="form-control">
                    </div>
                    <div class="col">
                        <label for="cylinder_os_perto" class="form-label">O.E. Cilíndrico (Perto)</label>
                        <input type="number" step="0.01" name="cylinder_os_perto" id="cylinder_os_perto" class="form-control">
                    </div>
                    <div class="col">
                        <label for="axis_os_perto" class="form-label">O.E. Eixo (Perto)</label>
                        <input type="number" name="axis_os_perto" id="axis_os_perto" class="form-control">
                    </div>
                </div>

                <!-- Material e Tratamento -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="lens_material" class="form-label">Material da Lente</label>
                        <input type="text" name="lens_material" id="lens_material" class="form-control" placeholder="Ex: Policarbonato, Vidro">
                    </div>
                    <div class="col">
                        <label for="treatment" class="form-label">Tratamento Adicional</label>
                        <input type="text" name="treatment" id="treatment" class="form-control" placeholder="Ex: Antirreflexo, Fotossensível">
                    </div>
                </div>

                <!-- Notas -->
                <div class="form-group mb-3">
                    <label for="notes" class="form-label">Notas (opcional)</label>
                    <textarea name="notes" id="notes" class="form-control" rows="3" placeholder="Notas adicionais"></textarea>
                </div>

                <!-- Botão de Enviar -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('lensrequests.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary">Enviar Solicitação</button>
                </div>
            </form>
        </div>
    </div>
@endsection
