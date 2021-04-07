<nav class="sidebar" id="sidebar">

    <h1 class="title text-center">Borracharia Rocha</h1>

    <ul>
        <a href="">
            <li><span class="sidebar-icon"><i class="fas fa-house-user"></i></span> Home</li>
        </a>

        <a href="">
            <li><span class="sidebar-icon"><i class="fas fa-envelope-open-text"></i></span> Contatos</li>
        </a>

        <a href="{{ route('admin.users.index') }}">
            <li class="active"><span class="sidebar-icon"><i class="fas fa-users"></i></span> Usuários</li>
        </a>
    </ul>
</nav>
