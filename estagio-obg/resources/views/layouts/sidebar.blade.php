<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('clientes.index') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-glasses"></i>
    </div>
    <div class="sidebar-brand-text mx-3">OPTICSMART</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  

  
  <!-- Nav Item - Clientes -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('clientes.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Clientes</span>
    </a>
  </li>
  
  <!-- Nav Item - Óculos -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('glasses.index') }}">
      <i class="fas fa-fw fa-glasses"></i>
      <span>Óculos</span>
    </a>
  </li>

  <!-- Nav Item - Vendas -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('sales.index') }}">
      <i class="fas fa-fw fa-shopping-cart"></i>
      <span>Vendas</span>
    </a>
  </li>

  <!-- Nav Item - Pós-Vendas -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('post_sales.index') }}">
      <i class="fas fa-fw fa-check-circle"></i>
      <span>Pós-Vendas</span>
    </a>
  </li>

  <!-- Nav Item - Solicitações de Lentes -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('lensrequests.index') }}">
      <i class="fas fa-fw fa-eye"></i>
      <span>Solicitações de Lentes</span>
    </a>
  </li>
  
  <!-- Nav Item - Perfil -->
  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-user"></i>
      <span>Perfil</span>
    </a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
</ul>
