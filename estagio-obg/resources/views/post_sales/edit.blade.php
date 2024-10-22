@extends('layouts.app')

@section('title', 'Editar Pós-Venda')

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
            <form action="{{ route('post_sales.update', $postSale->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Data Realizada e Concluída -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="actual_date" class="form-label">Data Realizada</label>
                        <input type="date" name="actual_date" id="actual_date" class="form-control" value="{{ $postSale->actual_date ? $postSale->actual_date : '' }}">
                    </div>
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="completed" id="completed" value="1" {{ $postSale->completed ? 'checked' : '' }}>
                            <label class="form-check-label ms-2" for="completed">Concluída</label>
                        </div>
                    </div>
                </div>

                <!-- Comentários -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="comments" class="form-label">Comentários</label>
                        <textarea name="comments" id="comments" class="form-control">{{ $postSale->comments }}</textarea>
                    </div>
                </div>

                <!-- Botões -->
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('post_sales.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Voltar</a>
                        <button type="submit" class="btn btn-warning">Atualizar Pós-Venda</button>
                    </div>
            </form>
        </div>
    </div>
@endsection
