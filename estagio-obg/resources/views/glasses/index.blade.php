@extends('layouts.app')

@section('title', 'Óculos')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 text-gray-800 mb-0">Lista de Óculos</h1>
        <a href="{{ route('glasses.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Adicionar Produto
        </a>
    </div>

    <!-- Mensagem de Sucesso -->
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Tabela de Óculos -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Óculos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Código</th>
                            <th>Tipo</th>
                            <th>Código Fantasia</th>
                            <th>Descrição</th>
                            <th>Quantidade</th>
                            <th>Custo Unitário</th>
                            <th>Valor de Venda</th> <!-- Novo campo -->
                            <th>Marca</th>
                            <th>Linha/Material</th>
                            <th>Cor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($glasses as $glass)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $glass->code }}</td>
                                <td class="align-middle">{{ $glass->product_type }}</td>
                                <td class="align-middle">{{ $glass->fantasy_code }}</td>
                                <td class="align-middle">{{ $glass->description }}</td>
                                <td class="align-middle">{{ $glass->quantity }}</td>
                                <td class="align-middle">{{ number_format($glass->unit_cost, 2, ',', '.') }}</td>
                                <td class="align-middle">{{ number_format($glass->sale_price, 2, ',', '.') }}</td> <!-- Novo campo -->
                                <td class="align-middle">{{ $glass->brand }}</td>
                                <td class="align-middle">{{ $glass->line_material }}</td>
                                <td class="align-middle">{{ $glass->color }}</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('glasses.show', $glass->id) }}" class="btn btn-sm btn-secondary mx-1" data-toggle="tooltip" title="Detalhes">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('glasses.edit', $glass->id) }}" class="btn btn-sm btn-warning mx-1" data-toggle="tooltip" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('glasses.destroy', $glass->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger mx-1" data-toggle="tooltip" title="Excluir">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="12">Nenhum produto encontrado</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
