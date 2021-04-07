<div class="topbar">
    <button id="btn-toggle-menu" class="btn btn-toggle-menu"><i class="fas fa-bars"></i></button>

    <div class="user-menu dropdown">
        <div class="dropdown-toggle d-flex justify-content-center align-items-center" type="button" id="dropdown-topbar-menu" data-bs-toggle="dropdown" aria-expanded="false">
            <div class="user-icon"><i class="fas fa-user"></i></div> <div>{{ Auth::user()->name }}</div>
        </div>

        <ul class="dropdown-menu" aria-labelledby="dropdown-topbar-menu">
            <li><a class="dropdown-item" href="{{ route('admin.users.edit', Auth::id()) }}">Meus Dados</a></li>
            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Sair</a></li>
        </ul>
    </div>
</div>
