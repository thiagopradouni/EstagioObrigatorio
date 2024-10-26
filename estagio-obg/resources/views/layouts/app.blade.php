<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>OpticSmart</title>
  
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

  <!-- Custom styles for DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
  
    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->
  
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
  
      <!-- Main Content -->
      <div id="content">
  
        <!-- Topbar -->
        @include('layouts.navbar')
        <!-- End of Topbar -->
  
        <!-- Begin Page Content -->
        <div class="container-fluid">
  
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">@yield('title')</h1>
          </div>
  
          @yield('contents')
  
        </div>
        <!-- /.container-fluid -->
  
      </div>
      <!-- End of Main Content -->
  
      <!-- Footer -->
      @include('layouts.footer')
      <!-- End of Footer -->
  
    </div>
    <!-- End of Content Wrapper -->
  
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  
  <!-- DataTables JavaScript -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>

  <!-- Initialize DataTables -->
  <script>
      $(document).ready(function() {
          $('#dataTable').DataTable({
              "paging": true,
              "lengthChange": true,
              "pageLength": 10,
              "searching": true,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
              "language": {
                  "paginate": {
                      "next": "Próximo",
                      "previous": "Anterior"
                  },
                  "lengthMenu": "Mostrar _MENU_ registros por página",
                  "zeroRecords": "Nenhum registro encontrado",
                  "info": "Mostrando _START_ até _END_ de _TOTAL_ registros",
                  "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                  "infoFiltered": "(filtrado de _MAX_ registros no total)",
                  "search": "Buscar:"
              }
          });
      });
  </script>
</body>
</html>
