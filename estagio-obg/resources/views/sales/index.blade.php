@extends('layouts.app')

@section('title', 'Lista de Vendas')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('sales.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Venda</a>
    </div>

    <!-- Mensagem de Sucesso -->
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Tabela de Vendas -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Vendas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Forma de Pagamento</th>
                                <th>Valor Bruto</th>
                                <th>Valor Líquido</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($sales->count() > 0)
                            @foreach($sales as $sale)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration + ($sales->currentPage() - 1) * $sales->perPage() }}</td>
                                    <td class="align-middle">{{ $sale->cliente->nome }}</td>
                                    <td class="align-middle">{{ $sale->payment_method }}</td>
                                    <td class="align-middle">{{ number_format($sale->gross_value, 2, ',', '.') }}</td>
                                    <td class="align-middle">{{ number_format($sale->net_value, 2, ',', '.') }}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('sales.show', $sale->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Detalhes"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('sales.edit', $sale->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('sales.destroy', $sale->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja excluir?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Nenhuma venda encontrada</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
@endsection
