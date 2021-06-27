
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="padding-top: 5px">

        <!-- Sidebar - Brand -->
        <p class="sidebar-brand d-flex align-items-center justify-content-center" href="" style="padding-left: 0px">
            <span>{{Auth::user()->name}}</span></a>
        </p>

        {{--  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('index')}}" >

        <div class="row">
            <div class="col">
            <div class="sidebar-brand-icon">
                <img src="{{asset('img/logoSoftware/LOGOS_PNG/GEMA_BLANCO.png')}}" alt="" width="120%" id="logo">
            </div>
            </div>
            <div class="col">
            <img src="{{asset('img/logoSoftware/LOGOS_PNG/GEMA_CON_GESTOR_BLANCO.png')}}" alt="" width="120%" id="logo">
            </div>
        </div>
        </a>  --}}
        <!-- Divider -->


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Registro / Edicion
        </div>
        
        @role('administrador')
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Administrador</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('registroVendedor')}}">Registrar Vendedor</a>
                    <a class="collapse-item" href="{{route('administrarVendedores')}}">Administrar Vendedores</a>
                </div>
            </div>
            </li>
            
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#beneficiario" aria-expanded="true" aria-controls="beneficiario">
                <i class="fas fa-dollar-sign"></i>
                <span>Vendedor</span>
            </a>
            <div id="beneficiario" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('registroCliente')}}">Registrar Cliente</a>
                <a class="collapse-item" href="{{route('administrarCliente')}}">Administrar Clientes</a>
                </div>
            </div>
            </li>
        @else
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#beneficiario" aria-expanded="true" aria-controls="beneficiario">
            <i class="fas fa-dollar-sign"></i>
            <span>Vendedor</span>
        </a>
        <div id="beneficiario" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('registroCliente')}}">Registrar Cliente</a>
            <a class="collapse-item" href="{{route('administrarCliente')}}">Administrar Clientes</a>
            </div>
        </div>
        </li>
        @endrole
        <!-- Nav Item - Pages Collapse Menu -->




        <hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
        <a class="nav-link" href="{{route('logoutt')}}">
            <i class="fas fa-power-off"></i>
            <span>Cerrar Sesión</span></a>
        </li>

        <hr class="sidebar-divider d-none d-md-block">
        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
