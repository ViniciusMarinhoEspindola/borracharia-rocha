<nav class="sidebar active" id="sidebar">

    <h1 class="title text-center">Borracharia Rocha</h1>

    <ul>
        <a href="">
            <li><span class="sidebar-icon"><i class="fas fa-house-user"></i></span> Home</li>
        </a>

        {{-- Pneus --}}
        <a href="{{ route('admin.pneus.index') }}">
            <li @if(Request::segment(2) == 'pneus') class="active" @endif><span class="sidebar-icon"><i class="fas fa-boxes"></i></span> Pneus</li>
        </a>

        {{-- Clientes --}}
        <a href="{{ route('admin.clientes.index') }}">
            <li @if(Request::segment(2) == 'clientes') class="active" @endif><span class="sidebar-icon"><i class="fas fa-users"></i></span> Clientes</li>
        </a>

        {{-- Contatos --}}
        <a href="{{ route('admin.contatos.index') }}">
            <li @if(Request::segment(2) == 'contatos') class="active" @endif><span class="sidebar-icon"><i class="fas fa-envelope-open-text"></i></span> Contatos</li>
        </a>

        {{-- Usuários --}}
        <a href="{{ route('admin.users.index') }}">
            <li @if(Request::segment(2) == 'users') class="active" @endif><span class="sidebar-icon"><i class="fas fa-users-cog"></i></span> Usuários</li>
        </a>
    </ul>
</nav>
