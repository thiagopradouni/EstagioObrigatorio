@extends('layouts.app')

@section('title', 'Criar Venda')

@section('contents')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h1 class="mb-0">Adicionar Nova Venda</h1>
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

            <form action="{{ route('sales.store') }}" method="POST">    
                @csrf

                <!-- Campo para selecionar o cliente -->
                <div class="form-group mb-3">
                    <label for="cliente_id" class="form-label">Selecionar Cliente</label>
                    <select name="cliente_id" id="cliente_id" class="form-control" required>
                        <option value="">Selecione o cliente</option>
                        @foreach($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Campos para selecionar óculos e quantidade -->
                <div id="glasses-container">
                    <div class="row mb-3 glasses-item">
                        <div class="col-md-5">
                            <label for="glasses_id" class="form-label">Selecionar Óculos</label>
                            <select name="glasses_id[]" class="form-control" required>
                                @foreach($glasses as $glass)
                                    <option value="{{ $glass->id }}">{{ $glass->fantasy_code }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="quantity" class="form-label">Quantidade</label>
                            <input type="number" name="quantity[]" class="form-control" placeholder="Informe a Quantidade" required>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger remove-glass">Remover</button>
                        </div>
                    </div>
                </div>

                <!-- Botão para adicionar mais óculos -->
                <div class="mb-3">
                    <button type="button" id="add-glass" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Óculos</button>
                </div>

                <!-- Campo de desconto e forma de pagamento -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="discount" class="form-label">Desconto</label>
                        <input type="number" name="discount" id="discount" class="form-control" step="0.01" placeholder="Informe o Desconto (se houver)">
                    </div>
                    <div class="col-md-6">
                        <label for="payment_method" class="form-label">Forma de Pagamento</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                            <option value="Pix">Pix</option>
                        </select>
                    </div>
                </div>

                <!-- Campo de descrição -->
                <div class="mb-3">
                    <label for="description" class="form-label">Descrição</label>
                    <textarea name="description" id="description" class="form-control" placeholder="Informe uma Descrição (opcional)"></textarea>
                </div>

                <!-- Botões -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('sales.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para adicionar/remover campos de óculos -->
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
