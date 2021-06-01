@extends('site.layouts.master')

@section('content')
    <div style="height: 50px"></div>

    <!-- Page Content-->
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($produto->imagens as $key => $imagem)
                                <li class="splide__slide"><img class="card-img-top" src="{{ asset("storage/pneus/{$imagem->img}") }}" alt="..." /></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <span class="float-right">
                    Restam: {{ $produto->quantidade }}
                </span>

                <h4 class="card-title text-danger">{{ $produto->modelo }}</h4>
                <h5 class="mt-3">R$ {{ number_format($produto->valor, 2, ',', '.') }}</h5>

                <div class="mt-4">
                    <p class="card-text desc-container small text-muted"><strong>Aro:</strong> {{ $produto->aro }}</p>
                    <p class="card-text desc-container small text-muted"><strong>Largura:</strong> {{ $produto->largura }}</p>
                    <p class="card-text desc-container small text-muted"><strong>Perfil:</strong> {{ $produto->perfil }}</p>
                </div>

                <a target="_blank" href="https://api.whatsapp.com/send?phone=5513981400942&text={{ $mensagem }}" class="btn btn-outline-success d-flex align-items-center col-4 rounded mt-4">
                    <i class="fab fa-whatsapp mr-2" style="font-size: 25px"></i> Tenho Interesse
                </a>

                <div class="mt-4">
                    <h6>Descrição</h6>
                    <p id="description" class="card-text desc-container small text-muted">{!! nl2br($produto->descricao) !!}</p>

                    <button id="show-more" class="btn btn-sm btn-link">Ver Mais</button>
                    <button id="show-less" style="display: none" class="btn btn-sm btn-link">Ver Menos</button>
                </div>
            </div>
        </div>
    </div>

    @include('site.includes.contact')
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@2.4.21/dist/js/splide.min.js"></script>
<script>
	new Splide( '.splide' ).mount();

    document.querySelector('#show-more').onclick = function() {
        document.querySelector('#description').classList.remove('desc-container');
        document.querySelector('#show-more').style.display = "none";
        document.querySelector('#show-less').style.display = "block";
    }
    document.querySelector('#show-less').onclick = function() {
        document.querySelector('#description').classList.add('desc-container');
        document.querySelector('#show-less').style.display = "none";
        document.querySelector('#show-more').style.display = "block";
    }
</script>
@endsection