@extends('layouts.app')

@section('title', 'Óculos')

@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Lista de Óculos</h1>
        <a href="{{ route('glasses.create') }}" class="btn btn-primary">Adicionar Produto</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Barra de pesquisa -->
    <form action="{{ route('glasses.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control mx-1" placeholder="Pesquisar ..." value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary mx-1">Pesquisar</button>
        </div>
    </form>

    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
                        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Código Fantasia</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Custo Unitário</th>
                            <th>Marca</th>
                            <th>Linha/Material</th>
                            <th>Cor</th>
                            <th>Opções</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($glasses->count() > 0)
                            @foreach($glasses as $glass)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $glass->code }}</td>
                                    <td class="align-middle">{{ $glass->product_type }}</td>
                                    <td class="align-middle">{{ $glass->fantasy_code }}</td>
                                    <td class="align-middle">{{ $glass->description }}</td>
                                    <td class="align-middle">{{ $glass->quantity }}</td>
                                    <td class="align-middle">{{ $glass->unit_cost }}</td>
                                    <td class="align-middle">{{ $glass->brand }}</td>
                                    <td class="align-middle">{{ $glass->line_material }}</td>
                                    <td class="align-middle">{{ $glass->color }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-around">
                                            <a href="{{ route('glasses.show', $glass->id) }}" class="btn btn-secondary mx-1">Detalhes</a>
                                            <a href="{{ route('glasses.edit', $glass->id) }}" class="btn btn-warning mx-1">Editar</a>
                                            <form action="{{ route('glasses.destroy', $glass->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Excluir?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger mx-1">Excluir</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="11">Nenhum produto encontrado</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
