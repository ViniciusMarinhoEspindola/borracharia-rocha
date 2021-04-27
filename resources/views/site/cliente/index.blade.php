Logado com o usuário {{ Auth::guard('cliente')->user()->name }}

<a href="{{ route('logout') }}">Sair</a>