@extends('layouts.app')

@section('title', 'Cadastro de Clientes')

@section('contents')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 text-gray-800 mb-0">Lista de Clientes</h1>
            <a href="{{ route('clientes.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Adicionar Cliente
            </a>
        </div>

        <!-- Mensagem de Sucesso -->
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Tabela de Clientes -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Nome</th>
                                <th>CPF</th>
                                <th>Email</th>
                                <th>Idade</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clientes as $cliente)
                                <tr>
                                    <td class="align-middle">{{ ($clientes->currentPage() - 1) * $clientes->perPage() + $loop->iteration }}</td>
                                    <td class="align-middle">{{ $cliente->nome }}</td>
                                    <td class="align-middle">{{ $cliente->cpf }}</td>
                                    <td class="align-middle">{{ $cliente->email }}</td>
                                    <td class="align-middle">{{ $cliente->idade }}</td>
                                    <td class="align-middle">
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-secondary mx-1" data-toggle="tooltip" title="Detalhes">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning mx-1" data-toggle="tooltip" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Você deseja deletar este cliente?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger mx-1" data-toggle="tooltip" title="Deletar">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">Nenhum cliente encontrado</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Paginação -->
            <div class="card-footer d-flex justify-content-center">
                {{ $clientes->links() }}
            </div>
        </div>

    </div>
    <!-- End of Main Content -->
@endsection

@section('scripts')
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
@endsection
