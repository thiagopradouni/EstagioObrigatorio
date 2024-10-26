@extends('layouts.app')

@section('title', 'Pós-Vendas')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('post_sales.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar</a>
    </div>

    <!-- Mensagem de Sucesso -->
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Tabela de Pós-Vendas -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pós-Vendas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Data Agendada</th>
                            <th>Data Realizada</th>
                            <th>Concluída</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($postSales->count() > 0)
                            @foreach($postSales as $postSale)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration + ($postSales->currentPage() - 1) * $postSales->perPage() }}</td>
                                    <td class="align-middle">{{ $postSale->sale->cliente->nome }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::parse($postSale->scheduled_date)->format('d/m/Y') }}</td>
                                    <td class="align-middle">{{ $postSale->actual_date ? \Carbon\Carbon::parse($postSale->actual_date)->format('d/m/Y') : 'Não realizada' }}</td>
                                    <td class="align-middle">{{ $postSale->completed ? 'Sim' : 'Não' }}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('post_sales.show', $postSale->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Ver"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('post_sales.edit', $postSale->id) }}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></a>
                                        
                                        <!-- Botão de Deletar -->
                                        <form action="{{ route('post_sales.destroy', $postSale->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta pós-venda?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" class="text-center">Nenhuma pós-venda encontrada.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
