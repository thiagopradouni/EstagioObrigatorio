@extends('layouts.app')

@section('title', 'Solicitações de Lentes')

@section('contents')
    <div class="d-flex align-items-center justify-content-between mb-4">
        <a href="{{ route('lensrequests.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Adicionar Solicitação</a>
    </div>

    <!-- Mensagem de Sucesso -->
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <!-- Tabela de Solicitações de Lentes -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Solicitações de Lentes ({{ $requests->total() }})</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Cliente</th>
                            <th>Tipo de Lente</th>
                            <th>Quantidade</th>
                            <th>Data da Solicitação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($requests->count() > 0)
                            @foreach($requests as $request)
                                <tr>
                                    <td class="align-middle">{{ $loop->iteration + ($requests->currentPage() - 1) * $requests->perPage() }}</td>
                                    <td class="align-middle">{{ $request->customer->nome }}</td>
                                    <td class="align-middle">{{ $request->lens_type }}</td>
                                    <td class="align-middle">{{ $request->quantity }}</td>
                                    <td class="align-middle">{{ $request->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="align-middle text-center">
                                        <a href="{{ route('lensrequests.show', $request->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Detalhes"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('lensrequests.edit', $request->id)}}" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Editar"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('lensrequests.destroy', $request->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Deseja realmente excluir esta solicitação?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" data-toggle="tooltip" title="Excluir"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center" colspan="6">Nenhuma solicitação de lentes encontrada.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Paginação -->
        <div class="card-footer d-flex justify-content-center">
            {{ $requests->links() }}
        </div>
    </div>
@endsection
