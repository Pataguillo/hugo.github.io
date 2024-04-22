<ul  style="background: #6d7fcc;" class="navbar-nav sidebar  sidebar-dark accordion" id="accordionSidebar" > 

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin')}}">
      
      <div class="sidebar-brand-text mx-3">Administrador</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item active">
      <a class="nav-link" href="{{route('admin')}}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Centro de Control</span></a>
    </li>

    <hr class="sidebar-divider">
       
        <div class="sidebar-heading">
        Comercio
        </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('category.index')}}"  aria-expanded="true" aria-controls="categoryCollapse">
          <i class="fas fa-sitemap"></i>
          <span>Categoria</span>
        </a>
    </li>
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('product.index')}}" aria-expanded="true" aria-controls="categoryCollapse">
        <i class="fas fa-cubes"></i>
          <span>Productos</span>
        </a>
    </li>

    {{-- Brands --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('brand.index')}}" aria-expanded="true" aria-controls="categoryCollapse">
        <i class="fas fa-table"></i>
          <span>Marcas</span>
        </a>
    </li>

    {{-- Shipping --}}

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('shipping.index')}}" aria-expanded="true" aria-controls="categoryCollapse">
        <i class="fas fa-truck"></i>
          <span>Envios</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('order.index')}}">
            <i class="fas fa-hammer fa-chart-area"></i>
            <span>Pedidos</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
 
    <div class="sidebar-heading">
    Configuración general
    </div>

     <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">
            <i class="fas fa-users"></i>
            <span>Usuarios</span></a>
    </li>


</ul>