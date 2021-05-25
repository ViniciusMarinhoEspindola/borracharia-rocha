<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-scrolled" id="mainNav">
    <div class="container">
        <div>
            <a class="navbar-brand js-scroll-trigger" id="title-menu" href="{{ route('home') }}#page-top">Borracharia Rocha</a>
        </div>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Pesquisar" aria-label="Search"  aria-describedby="search-addon" />

            <span class="input-group-text text-danger border-0" id="search-addon">
              <i class="fas fa-search"></i>
            </span>
        </div>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto my-2 my-lg-0">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('home') }}#about">Sobre</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('home') }}#services">Serviços</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('home') }}#portfolio">Produtos</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('home') }}#funcionamento">Horários</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contato</a></li>

                @if(!Auth::guard('cliente')->check())
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login</a></li>
                @else
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('cliente.index') }}">{{ Auth::guard('cliente')->user()->name }}</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>