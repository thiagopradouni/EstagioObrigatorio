@extends('layouts.app')

@section('title', 'Editar Pós-Venda')

@section('contents')
    <h1 class="mb-0">Editar Pós-Venda</h1>
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
    <form action="{{ route('post_sales.update', $postSale->id) }}" method="POST">
        @csrf
        @method('PUT')
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

        <div class="row mb-3">
            <div class="col">
                <label for="comments" class="form-label">Comentários</label>
                <textarea name="comments" id="comments" class="form-control">{{ $postSale->comments }}</textarea>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-warning">Atualizar Pós-Venda</button>
            </div>
        </div>
    </form>
@endsection
