@extends('admin.layouts.master')

<link rel="stylesheet" href="{{ asset('js/admin/imgupload/css/dropzone.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/src/css/lightgallery.css">

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-boxes"></i> Pneus</h2>
</div>

<div class="card my-4 p-4">
    <h5 class="text-muted title"><i class="fas fa-edit"></i> Editar Pneu</h5>
</div>

<div class="card my-4 p-4">
    <form action="{{ route('admin.imagem-pneus.store', $pneu->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div id="drop-area" class="col-12 px-md-5  border border-dark dropzone" style="border-style: dashed !important;">
            <div class="pt-5 row" >
                <div class="col-lg-4 col-sm-12 d-flex justify-content-center align-items-center">
                    <label for="image" id="btn-image" class="btn btn-danger ml-5 float-left" type="button">
                        <i class="far fa-images"></i>
                        Adicionar Imagens
                    </label>
                    <div class="fallback">
                        <input type="file" id="image" title="Clique para adicionar as imagens" class="d-none" multiple accept="image/*">
                    </div>
                </div>
                <div class="col-lg-8 col-sm-12">
                    <h3 class="text-muted text-center p-3">Arraste & solte as imagens aqui</h3>
                </div>
            </div>
        </div>

        <div class="container">
            <div id="midias_enviando" class="sendarea col-12 py-5" style="display: none;">
                <ul class="list-unstyled p-2 d-flex flex-column col" id="files">
                    <li class="text-muted text-center empty">Nenhuma imagem enviada</li>
                </ul>
            </div>
        </div>
    </form>

    <ul class="d-flex upload-list" style="overflow-x: auto !important;" id="gallery">
        @foreach ($imagens as $imagem)
            <div class="card col-2 mb-1" id="{{ $imagem->id }}" style="height: 250px;">
                <form class="position-absolute" action="{{ route('admin.imagem-pneus.destroy', $imagem->id) }}" method="POST" style="z-index:999">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger rounded-circle p-2 m-2 delete-img"><small><i class="fas fa-trash"></i></small></button>
                </form>

                <li class="list-group center" href="{{ asset('storage/pneus/' . $imagem->img) }}" role="button" style="cursor: pointer;position: relative;top: 50%;transform: translateY(-50%);">
                    <img src="{{ asset("storage/pneus/{$imagem->img}") }}" alt="" class="img-fluid">
                </li>
            </div>
        @endforeach
    </ul>
</div>

<div class="card my-4 p-4">
    <form method="POST" action="{{ route('admin.pneus.update', $pneu) }}">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="modelo">Modelo <span class="text-danger">*</span></label>
                <input id="modelo" class="form-control @error('modelo') border-danger @enderror" type="text" value="{{ $pneu->modelo }}" name="modelo" required>
                @error('modelo')
                    <small class="text-danger">{{ $errors->first('modelo') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="largura">Largura <span class="text-danger">*</span></label>
                <input id="largura" class="form-control @error('largura') border-danger @enderror" type="number" step="0.01" min="0" value="{{ $pneu->largura }}"  name="largura" required>
                @error('largura')
                    <small class="text-danger">{{ $errors->first('largura') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="perfil">Perfil <span class="text-danger">*</span></label>
                <input id="perfil" class="form-control @error('perfil') border-danger @enderror" type="number" step="0.01" min="0" value="{{ $pneu->perfil }}" name="perfil" required>
                @error('perfil')
                    <small class="text-danger">{{ $errors->first('perfil') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="aro">Aro <span class="text-danger">*</span></label>
                <input id="aro" class="form-control @error('aro') border-danger @enderror" type="number" step="0.01" min="0" value="{{ $pneu->aro }}" name="aro" required>
                @error('aro')
                    <small class="text-danger">{{ $errors->first('aro') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="valor">Valor <span class="text-danger">*</span></label>
                <input id="valor" class="form-control @error('valor') border-danger @enderror" type="number" step="0.01" min="0" value="{{ $pneu->valor }}" name="valor" required>
                @error('valor')
                    <small class="text-danger">{{ $errors->first('valor') }}</small>
                @enderror
            </div>

            <div class="form-group col-md-6 col-sm-12 my-3">
                <label for="quantidade">Quantidade <span class="text-danger">*</span></label>
                <input id="quantidade" class="form-control @error('quantidade') border-danger @enderror" type="number" min="0" value="{{ $pneu->quantidade }}" name="quantidade" required>
                @error('quantidade')
                    <small class="text-danger">{{ $errors->first('quantidade') }}</small>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12 col-sm-12 my-3">
                <label for="descricao">Descrição </label>
                <textarea id="descricao" class="form-control @error('descricao') border-danger @enderror" name="descricao">{!! $pneu->descricao !!}</textarea>
                @error('descricao')
                    <small class="text-danger">{{ $errors->first('descricao') }}</small>
                @enderror
            </div>
        </div>

        <button class="btn btn-danger" type="submit">Editar Pneus</button>
    </form>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('js/admin/imgupload/js/dropzone.js') }}"></script>

    <script>
        Dropzone.options.dropArea = {
            url: "{{ route('admin.imagem-pneus.store', $pneu->id) }}",
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 10, // MB
            acceptedFiles: 'image/*',
            dictDefaultMessage: '',
            clickable: ['#btn-image'],
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            complete: function() {
                setTimeout(function() {
                    location.reload();
                }, 1000);
            }
        };
    </script>

    <!-- PHOTO GALERY -->
    <script src="https://cdn.jsdelivr.net/npm/lightgallery@1.6.12/dist/js/lightgallery-all.min.js"></script>
    <script>
        $('.upload-list').lightGallery({
            addClass:'localVideo',
            selector: 'div li'
        });
    </script>

    <!-- JQUERY UI -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script>
        $("#gallery").sortable({
            update: function() {
                var order = $("#gallery").sortable('toArray');

                $.ajax({
                    url: '{{ route("admin.imagem-pneus.reorder") }}',
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    data: {
                        order
                    },
                    dataType: 'JSON',
                    success: function(data) {
                        new Notify({
                            status: 'success',
                            title: 'Sucesso',
                            text: data,
                            effect: 'fade',
                            speed: 600,
                            customClass: null,
                            customIcon: null,
                            showIcon: true,
                            showCloseButton: true,
                            autoclose: true,
                            autotimeout: 3000,
                            gap: 20,
                            distance: 20,
                            type: 3,
                            position: 'right top'
                        });
                    }
                });
            }
	    });
    </script>
    <script>
        // $('.delete-img').click(function(e) {
        //     e.preventDefault();
        //     e.stopPropagation();

        //     $(this).parent().submit();
        // });
    </script>
@endsection
