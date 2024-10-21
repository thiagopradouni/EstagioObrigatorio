@extends('layouts.app')

@section('title', 'Editar Venda')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="mb-0">Editar Venda</h1>
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

            <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div id="glasses-container">
                    @foreach($sale->glasses as $glass)
                        <div class="row mb-3 glasses-item">
                            <div class="col">
                                <label for="glasses_id" class="form-label">Selecionar Óculos</label>
                                <select name="glasses_id[]" class="form-control" required>
                                    @foreach($glasses as $g)
                                        <option value="{{ $g->id }}" {{ $g->id == $glass->id ? 'selected' : '' }}>{{ $g->fantasy_code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="quantity" class="form-label">Quantidade</label>
                                <input type="number" name="quantity[]" class="form-control" value="{{ $glass->pivot->quantity }}" required>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-danger remove-glass mt-4">Remover</button>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <button type="button" id="add-glass" class="btn btn-primary">Adicionar Óculos</button>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_id" class="form-label">Selecionar Cliente</label>
                        <select name="cliente_id" id="cliente_id" class="form-control" required>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}" {{ $cliente->id == $sale->cliente_id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="payment_method" class="form-label">Forma de Pagamento</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="Dinheiro" {{ $sale->payment_method == 'Dinheiro' ? 'selected' : '' }}>Dinheiro</option>
                            <option value="Cartão de Crédito" {{ $sale->payment_method == 'Cartão de Crédito' ? 'selected' : '' }}>Cartão de Crédito</option>
                            <option value="Cartão de Débito" {{ $sale->payment_method == 'Cartão de Débito' ? 'selected' : '' }}>Cartão de Débito</option>
                            <option value="Pix" {{ $sale->payment_method == 'Pix' ? 'selected' : '' }}>Pix</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="discount" class="form-label">Desconto</label>
                        <input type="number" name="discount" id="discount" class="form-control" step="0.01" value="{{ $sale->discount ?? 0.00 }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label for="description" class="form-label">Descrição</label>
                        <textarea name="description" id="description" class="form-control">{{ $sale->description }}</textarea>
                    </div>
                </div>

                <div class="row d-flex justify-content-between">
                    <a href="{{ route('sales.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-warning">Atualizar</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-glass').addEventListener('click', function() {
            let container = document.getElementById('glasses-container');
            let newGlass = container.querySelector('.glasses-item').cloneNode(true);
            newGlass.querySelector('input').value = '';
            container.appendChild(newGlass);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-glass')) {
                let glassesItem = e.target.closest('.glasses-item');
                glassesItem.remove();
            }
        });
    </script>
@endsection
