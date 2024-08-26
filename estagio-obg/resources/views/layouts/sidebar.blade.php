<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-glasses"></i>
    </div>
    <div class="sidebar-brand-text mx-3">OPTICSMART</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  
  <!-- Nav Item - Clientes -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('clientes.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Clientes</span></a>
  </li>
  
  <!-- Nav Item - Óculos -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('glasses.index') }}">
      <i class="fas fa-fw fa-glasses"></i>
      <span>Óculos</span></a>
  </li>

  <!-- Nav Item - Sales -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('sales.index') }}">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Vendas</span></a>
  </li>
  
  <!-- Nav Item - Perfil -->
  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-user"></i>
      <span>Perfil</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
</ul>
