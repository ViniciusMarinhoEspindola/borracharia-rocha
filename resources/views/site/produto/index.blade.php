@extends('site.layouts.master')

@section('content')
    <div style="height: 50px"></div>

    <!-- Page Content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <h1 class="my-4">Pneus</h1>
                {{-- <div class="list-group">
                    <a class="list-group-item" href="#!">Category 1</a>
                    <a class="list-group-item" href="#!">Category 2</a>
                    <a class="list-group-item" href="#!">Category 3</a>
                </div> --}}
            </div>

            <div class="col-lg-9">

                <div class="row">
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="#!">Item One</a></h4>
                                <h5>$24.99</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                            </div>
                            <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="#!">Item Two</a></h4>
                                <h5>$24.99</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="#!">Item Three</a></h4>
                                <h5>$24.99</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                            </div>
                            <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="#!">Item Four</a></h4>
                                <h5>$24.99</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                            </div>
                            <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="#!">Item Five</a></h4>
                                <h5>$24.99</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur! Lorem ipsum dolor sit amet.</p>
                            </div>
                            <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
                            <a href="#!"><img class="card-img-top" src="https://via.placeholder.com/700x400" alt="..." /></a>
                            <div class="card-body">
                                <h4 class="card-title"><a href="#!">Item Six</a></h4>
                                <h5>$24.99</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
                            </div>
                            <div class="card-footer"><small class="text-muted">★ ★ ★ ★ ☆</small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
@endsection