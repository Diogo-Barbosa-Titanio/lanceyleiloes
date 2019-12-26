<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}/home">
        <div class="sidebar-brand-icon mr-1">
            <i class="fas fa-gavel" style="font-size: 40px;"></i>
        </div>
        <div class="sidebar-brand-text">Lancey Leilões</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{url('/')}}/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-users"></i>
            <span>Cadastros</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Formulários:</h6>
                <a class="collapse-item {{ Request()->is('admin/administradores') ? 'active':'' }}" href="{{url('/admin/administradores')}}">Administradores</a>
                <a class="collapse-item {{ Request()->is('admin/pessoa_fisica') ? 'active':'' }}" href="{{url('/admin/pessoa_fisica')}}">Pessoa Física</a>
                <a class="collapse-item {{ Request()->is('admin/pessoa_juridica') ? 'active':'' }}" href="{{url('/admin/pessoa_juridica')}}">Pessoa Jurídica</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
            <i class="fas fa-fw fa-folder"></i>
            <span>Geral</span>
        </a>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Leilão:</h6>
                <a class="collapse-item {{ Request()->is('admin/leiloes') ? 'active':'' }}" href="{{url('/admin/leiloes')}}">Leilões</a>
                <a class="collapse-item" href="{{url('/')}}/admin/lotes">Lotes</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Outros:</h6>
                <a class="collapse-item" href="#">Banners</a>
                <a class="collapse-item {{ Request()->is('admin/lotes_categorias') ? 'active':'' }}" href="{{url('/admin/lotes_categorias')}}">Categorias</a>
                <a class="collapse-item" href="{{url('/admin/comitentes')}}">Comitentes</a>
                <a class="collapse-item" href="#">Frases</a>
                <a class="collapse-item" href="#">Faq</a>
                <a class="collapse-item" href="#">Newslleter</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
            <i class="fas fa-fw fa-folder"></i>
            <span>Páginas e Textos</span>
        </a>
        <div id="collapseFour" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Páginas</a>
                <a class="collapse-item" href="#">Serviços</a>
                <a class="collapse-item" href="#">Termos de Uso</a>
                <a class="collapse-item" href="#">Quem Somos</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mensagens por email</span>
        </a>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Cadastro</a>
                <a class="collapse-item" href="#">Login</a>
                <a class="collapse-item" href="#">Leilão Arrematado</a>
                <a class="collapse-item" href="#">Leilão Condicionado</a>
                <a class="collapse-item" href="#">Leilão Não Arrematado</a>
                <a class="collapse-item" href="#">Enviar Termo de Arr. e Nota</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
            <i class="fas fa-fw fa-folder"></i>
            <span>Logs</span>
        </a>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Log (Administradores)</a>
                <a class="collapse-item" href="#">Log de Ações</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
            <i class="fas fa-fw fa-folder"></i>
            <span>Configurações</span>
        </a>
        <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="#">Informações Termos e Notas</a>
                <a class="collapse-item" href="#">Favicon</a>
                <a class="collapse-item" href="#">Busca no Google</a>
                <a class="collapse-item" href="#">Google Analytics</a>
                <a class="collapse-item" href="#">Emails</a>
                <a class="collapse-item" href="#">Informações</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Logout -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin/logout')}}">
            <span>Logout</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
