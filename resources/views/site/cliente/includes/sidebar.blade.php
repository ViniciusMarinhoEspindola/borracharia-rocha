<div class="dashboard-nav">
    <header>
        <a href="{{ route('cliente.index') }}" class="menu-toggle"><i class="fas fa-bars"></i></a>
        <a href="{{ route('cliente.index') }}" class="brand-logo">
            <i class="fas fa-user"></i> <span class="ml-2"> {{ Auth::guard('cliente')->user()->name }}</span>
        </a>
    </header>
    <nav class="dashboard-nav-list">
        <a href="/" class="dashboard-nav-item">
            <span><i class="fas fa-home"></i> Home</span>
        </a>

        <a href="{{ route('cliente.edit') }}" class="dashboard-nav-item">
            <span><i class="fas fa-user-cog"></i> Meus Dados</span>
        </a>

        <a href="{{ route('logout') }}" class="dashboard-nav-item">
            <span><i class="fas fa-sign-out-alt"></i> Logout</span>
        </a>
    </nav>
</div>
