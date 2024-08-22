@extends('layouts.app')

@section('title', 'Cadastro de Clientes')

@section('contents')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <form class="form-inline">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
            </form>

            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Pesquisar..." aria-label="Pesquisar" aria-describedby="basic-addon2" name="search" value="{{ request()->query('search') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Nav Item - Alerts -->
                <!-- Nav Item - Messages -->
                <!-- User Information -->
                <!-- Add your existing Topbar Navbar items here -->
            </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-2 text-gray-800">Lista de Clientes</h1>
                <a href="{{ route('clientes.create') }}" class="btn btn-primary">Adicionar</a>
            </div>
            <hr />
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            @endif

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Idade</th>
                                    <th>Opções</th>
                                </tr>
                            </thead>
                            <tfoot class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Idade</th>
                                    <th>Opções</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if($clientes->count() > 0)
                                    @foreach($clientes as $cliente)
                                        <tr>
                                            <td class="align-middle">{{ ($clientes->currentPage() - 1) * $clientes->perPage() + $loop->iteration }}</td>
                                            <td class="align-middle">{{ $cliente->nome }}</td>
                                            <td class="align-middle">{{ $cliente->cpf }}</td>
                                            <td class="align-middle">{{ $cliente->email }}</td>
                                            <td class="align-middle">{{ $cliente->idade }}</td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-around">
                                                    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-secondary btn-sm mx-1">Detalhes</a>
                                                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm mx-1">Editar</a>
                                                    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Você deseja deletar este cliente?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger btn-sm mx-1">Deletar</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="6">Nenhum cliente encontrado</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- Paginação -->

                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

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

<!-- Page level custom scripts -->

@endsection
