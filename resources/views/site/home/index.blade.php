@extends('site.layouts.master')

@section('content')



    <!-- Masthead-->
    <header class="masthead">
        <section class="page-section" id="about">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Precisando de nossos serviços?</h1>
                        <hr class="divider my-4" />
                    </div>

                    @if(!Auth::guard('cliente')->check())
                        <div class="col-lg-8 align-self-baseline">
                            <p class="text-white-75 font-weight-light mb-5">Cadastre-se para conferir tudo o que oferecemos!</p>

                            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('cadastro') }}">Cadastrar</a>
                        </div>
                    @else
                        <div class="col-lg-8 align-self-baseline">
                            <p class="text-white-75 font-weight-light mb-5">Confira nosso catálogo completo!</p>

                            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('produtos') }}">Catálogo</a>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </header>

    <!-- Services-->
    <section class="page-section" id="services">
        <div class="container">
            <h2 class="text-center mt-0">Nossos serviços</h2>
            <hr class="divider2 my-4" />
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="far fa-4x fa-dot-circle text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Troca de pneus</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-arrows-alt-h text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Alinhamento</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-car text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Cambagem</h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="mt-5">
                        <i class="fas fa-4x fa-water text-primary mb-4"></i>
                        <h3 class="h4 mb-2">Vulcanização</h3>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio-->

    <section id="portfolio">
        <h2 class="text-center mt-0">Nossos produtos</h2>
        <hr class="divider my-4" />
        <br>

        <div class="container text-center">
            <a class="btn btn-primary btn-xl" href="{{ route('produtos') }}">Catálogo completo</a>
            <p></p>
        </div>

        <div id="portfolio-images">
            <div class="container-fluid p-0">
                <div class="row no-gutters justify-content-center align-items-center" style="overflow-x: auto; overflow-y: hidden;">
                    @foreach($produtos as $produto)
                        <div class="col-lg-4 col-sm-6" style="max-height: 250px; min-height:100px; min-width:100px;">
                            @if($produto->imagens->first())
                                <a class="portfolio-box" href="{{ asset("storage/pneus/{$produto->imagens->first()->img}") }}">
                                    <img class="img-fluid mh-100" src="{{ asset("storage/pneus/{$produto->imagens->first()->img}") }}" alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">{{ $produto->modelo }}</div>
                                        <div class="project-name desc-container small"><small>{{ $produto->descricao }}</small></div>
                                    </div>
                                </a>
                            @else
                                <a class="portfolio-box" href="css\index\portfolio/images.jpg">
                                    <img class="img-fluid mh-100" src="css\index\portfolio/images.jpg" alt="..." />
                                    <div class="portfolio-box-caption">
                                        <div class="project-category text-white-50">{{ $produto->modelo }}</div>
                                        <div class="project-name">{{ $produto->descricao }}</div>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Call to action-->
    <section class="page-section" id="funcionamento">

        <div class="container text-center">
            <h2 class="mb-4">Horários de funcionamento</h2>
            <hr class="divider2 my-4" />
        <div>

        <div class="d-flex align-items-center">
            @foreach($dias_semana as $dia_semana)
                <div class="card w-75">
                    <div class="card-body">
                        <h5 class="card-title">{{ $dia_semana->nm_dia_semana }}</h5>

                        <p class="card-text">Horario de funcionamento</p>

                        @forelse($dia_semana->horarios_funcionamento as $horario_funcionamento)
                            <p class="card-text">De: {{ $horario_funcionamento->hr_inicio->format('H:i') }} Até: {{ $horario_funcionamento->hr_termino->format('H:i') }}</p>
                        @empty
                            <p class="card-text">De: 09:00 Até: 18:00</p>
                        @endforelse
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    @include('site.includes.contact')
@endsection

@section('js')
    <!-- Core theme JS-->
    <script src="js/index/scripts.js"></script>

    <script>
        // Collapse Navbar
        var navbarCollapse = function () {
            if ($("#mainNav").offset().top > 100) {
                $("#mainNav").addClass("navbar-scrolled");
                $("#title-menu").removeClass("text-white");
            } else {
                $("#mainNav").removeClass("navbar-scrolled");
                $("#title-menu").addClass("text-white");
            }
        };

        // Collapse now if page is not at top
        navbarCollapse();

        // Collapse the navbar when page is scrolled
        $(window).scroll(navbarCollapse);
    </script>
@endsection