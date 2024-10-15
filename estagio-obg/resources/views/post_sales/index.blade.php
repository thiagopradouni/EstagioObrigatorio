@extends('layouts.app')

@section('title', 'Pós-Vendas')

@section('contents')
    <h1 class="mb-0">Pós-Vendas</h1>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
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
                @foreach($postSales as $postSale)
                    <tr>
                        <td>{{ $loop->iteration + ($postSales->currentPage() - 1) * $postSales->perPage() }}</td>
                        <td>{{ $postSale->sale->cliente->nome }}</td>
                        <td>{{ \Carbon\Carbon::parse($postSale->scheduled_date)->format('d/m/Y') }}</td>
                        <td>{{ $postSale->actual_date ? \Carbon\Carbon::parse($postSale->actual_date)->format('d/m/Y') : 'Não realizada' }}</td>
                        <td>{{ $postSale->completed ? 'Sim' : 'Não' }}</td>
                        <td class="text-center">
                            <a href="{{ route('post_sales.edit', $postSale->id) }}" class="btn btn-sm btn-warning" title="Editar"><i class="fas fa-edit"></i></a>
                            
                            <!-- Botão de Deletar -->
                            <form action="{{ route('post_sales.destroy', $postSale->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir esta pós-venda?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <div class="d-flex justify-content-center">
        {{ $postSales->links() }}
    </div>
@endsection
