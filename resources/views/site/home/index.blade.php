@extends('site.layouts.master')


@section('content')
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Borracharia Rocha</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('index\favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/index/styles.css') }}">
        <link href="js\index/scripts.js" rel="script">
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <div>
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Borracharia Rocha</a>
                </div>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                      aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                      <i class="fas fa-search"></i>
                    </span>
                  </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">Sobre</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Serviços</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Produtos</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contato</a></li>
                        @if(!Auth::guard('cliente')->check())
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login">Login</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('cliente.index') }}">{{ Auth::guard('cliente')->user()->name }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h1 class="text-uppercase text-white font-weight-bold">Borracharia</h1>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                        <p class="text-white-75 font-weight-light mb-5">desc</p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">btn</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="page-section bg-primary" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">TODO</h2>
                        <hr class="divider light my-4" />
                        <p class="text-white-50 mb-4">TODO</p>
                        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">BTN</a>
                    </div>
                </div>
            </div>
        </section>
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
        <div id="portfolio">
            <div class="container-fluid p-0">
            <h2 class="text-center mt-0">Nossos produtos</h2>
            <hr class="divider my-4" />
            <br>
            <div class="container text-center">
            <a class="btn btn-primary btn-xl js-scroll-trigger" href="#about">Catálogo completo</a>
            <p></p>
            </div>
                <div class="row no-gutters">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="css\index\portfolio/images.jpg">
                            <img class="img-fluid" src="css\index\portfolio/images.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pneu</div>
                                <div class="project-name">Desc</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="css\index\portfolio/images.jpg">
                            <img class="img-fluid" src="css\index\portfolio/images.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pneu</div>
                                <div class="project-name">Desc</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="css\index\portfolio/images.jpg">
                            <img class="img-fluid" src="css\index\portfolio/images.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pneu</div>
                                <div class="project-name">Desc</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="css\index\portfolio/images.jpg">
                            <img class="img-fluid" src="css\index\portfolio/images.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pneu</div>
                                <div class="project-name">Desc</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="css\index\portfolio/images.jpg">
                            <img class="img-fluid" src="css\index\portfolio/images.jpg" alt="..." />
                            <div class="portfolio-box-caption">
                                <div class="project-category text-white-50">Pneu</div>
                                <div class="project-name">Desc</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="css\index\portfolio/images.jpg">
                            <img class="img-fluid" src="css\index\portfolio/images.jpg" alt="..." />
                            <div class="portfolio-box-caption p-3">
                                <div class="project-category text-white-50">Pneu</div>
                                <div class="project-name">Desc</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Call to action-->
        <section class="page-section bg-dark text-white">
            <div class="container text-center">
                <h2 class="mb-4">TODO</h2>
                <a class="btn btn-light btn-xl" href="#">TODO</a>
            </div>
        </section>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0">Entre em contato!</h2>
                        <hr class="divider my-4" />
                        <p class="text-muted mb-5">Abaixo disponibilizamos nossas formas de contato para atende-lo da melhor forma</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fab fa-whatsapp fa-3x mb-3 text-muted"></i>
                        <div>(13)999999999</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-map-marker-alt fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="https://www.google.com.br/maps/place/Av.+Hermenegildo+Pereira+de+Fran%C3%A7a,+149+-+Balne%C3%A1rio+Esmeralda,+Praia+Grande+-+SP,+11713-290/@-24.0343214,-46.5153389,20.39z/data=!4m5!3m4!1s0x94ce1f7de9b63239:0xc9af64242b97efbb!8m2!3d-24.034334!4d-46.5151349" target="_blank">Av. Hermenegildo Pereira de França, 149   Balneário Esmeralda</a>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="mailto:contact@yourwebsite.com">contact@borracharia.com.br</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="bg-light py-5">
            <div class="container">
                <div class="small text-center text-muted">
                    Borracharia Rocha
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js\index/scripts.js"></script>
    </body>
</html>

@endsection
