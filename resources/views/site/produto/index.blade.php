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

    @include('site.includes.contact')
@endsection