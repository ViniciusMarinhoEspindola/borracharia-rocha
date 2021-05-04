<nav class="sidebar active" id="sidebar">

    <h1 class="title text-center">Borracharia Rocha</h1>

    <ul>
        <a href="">
            <li><span class="sidebar-icon"><i class="fas fa-house-user"></i></span> Home</li>
        </a>

        {{-- Pneus --}}
        <a href="{{ route('admin.pneus.index') }}">
            <li @if(Request::segment(2) == 'pneus') class="active" @endif title="Pneus"><span class="sidebar-icon"><i class="fas fa-boxes"></i></span> Pneus</li>
        </a>

        {{-- Serviços --}}
        <a href="{{ route('admin.servicos.index') }}">
            <li @if(Request::segment(2) == 'servicos') class="active" @endif title="Serviços"><span class="sidebar-icon"><i class="fas fa-cogs"></i></span> Serviços</li>
        </a>

        {{-- Clientes --}}
        <a href="{{ route('admin.clientes.index') }}">
            <li @if(Request::segment(2) == 'clientes') class="active" @endif title="Clientes"><span class="sidebar-icon"><i class="fas fa-users"></i></span> Clientes</li>
        </a>
        <div class="dropdown-area">
            <a>
                <li class="dropdown-toggle" type="button" aria-labelledby="agendamentos-menu" title="Agenda">
                    <span class="sidebar-icon"><i class="fas fa-calendar-alt"></i></span> <span>Agenda</span>
                </li>
            </a>
            <ul class="menu-dropdown" id="agendamentos-menu">
                <a href="#">
                    <li title="Serviços Agendados">Serviços Agendados</li>
                </a>
                <a href="{{ route('admin.disponibilidade.index') }}">
                    <li title="Configurar Disponibilidade">Configurar Disponibilidade</li>
                </a>
            </ul>
        </div>

        {{-- Contatos --}}
        <a href="{{ route('admin.contatos.index') }}">
            <li @if(Request::segment(2) == 'contatos') class="active" @endif title="Contatos"><span class="sidebar-icon"><i class="fas fa-envelope-open-text"></i></span> Contatos</li>
        </a>

        {{-- Usuários --}}
        <a href="{{ route('admin.users.index') }}">
            <li @if(Request::segment(2) == 'users') class="active" @endif title="Usuários"><span class="sidebar-icon"><i class="fas fa-users-cog"></i></span> Usuários</li>
        </a>
    </ul>
</nav>
