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
                    @foreach($produtos as $key => $produto)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="{{ route('produtos.show', $produto->id) }}" class="text-decoration-none">
                                <div class="card h-100 card-produto">
                                    <img class="card-img-top" src="{{ asset("storage/pneus/{$produto->imagens->last()->img}") }}" alt="..." />

                                    <div class="card-body">
                                        <h5 class="card-title text-danger">{{ $produto->modelo }}</h5>
                                        <p class="card-text desc-container small text-muted">{{ $produto->descricao }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <small class="text-muted">
                                            <h5 class="float-left">R$ {{ number_format($produto->valor, 2, ',', '.') }}</h5>
                                            <span class="float-right">Restam: {{ $produto->quantidade }}</span>
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center">
                    {{ $produtos->links('site.includes.paginator') }}
                </div>
            </div>
        </div>
    </div>

    @include('site.includes.contact')
@endsection