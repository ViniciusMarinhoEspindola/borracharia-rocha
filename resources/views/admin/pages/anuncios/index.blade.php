@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-boxes"></i> Anúncios</h2>
</div>



<div class="card my-4 p-4">
    <div class="table-responsive">
        <table class="table" id="table-anuncios">
            <tbody style="cursor: move">
                @forelse ($anuncios as $anuncio)
                    <tr id="{{ $anuncio->id }}">
                        <td>{{ $anuncio->pneu->modelo }}</td>
                        <td style="cursor: pointer" class="text-center remove-anuncio" data-anuncio-id="{{ $anuncio->id }}">
                            x
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum anúncio encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<div class="card my-4 p-4 px-md-5 px-sm-0">
    <form action="">
        <div class="row form-group my-3">
            <input type="text" placeholder="Pesquisar" class="form-control" name="s" id="s">
        </div>
    </form>

    <table class="table" id="table-pneus">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Aro</th>
                <th>Largura</th>
                <th>Perfil</th>
                <th class="text-center">Adicionar</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
     <!-- JQUERY UI -->
     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script>
        function adicionaAnuncio(pneu_id) {
            $.ajax({
                method: 'POST',
                url: '{{ route("admin.anuncios.store") }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: { id: pneu_id },
                success: function(anuncios) {
                    $("#table-anuncios tbody").html('');

                    anuncios.forEach(anuncio => {
                        let tr = $('<tr />').attr('id', anuncio.id);

                        let modelo = $("<td />").html(anuncio.pneu.modelo)

                        let remove = $("<td />").addClass('text-center remove-anuncio').data('anuncio-id', anuncio.id).css('cursor', 'pointer').html("x")

                        tr.append([modelo, remove]);

                        $("#table-anuncios tbody").append(tr);
                    })

                    $('.remove-anuncio').click(function(e) {
                        e.preventDefault();
                        let anuncio_id = $(this).data('anuncio-id');

                        removeAnuncio(anuncio_id);
                    })

                    sortable();
                }
            });

            atualizaPneus();
        }

        function removeAnuncio(anuncio_id) {

            $.ajax({
                method: 'DELETE',
                url: '{{ route("admin.anuncios.destroy") }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    anuncio_id: anuncio_id
                },
                success: function(anuncios) {
                    $("#table-anuncios tbody").html('');

                    anuncios.forEach(anuncio => {
                        let tr = $('<tr />').attr('id', anuncio.id);

                        let modelo = $("<td />").html(anuncio.pneu.modelo)

                        let remove = $("<td />").addClass('text-center remove-anuncio').data('anuncio-id', anuncio.id).css('cursor', 'pointer').html("x")

                        tr.append([modelo, remove]);

                        $("#table-anuncios tbody").append(tr);
                    })

                    $('.remove-anuncio').click(function(e) {
                        e.preventDefault();
                        let anuncio_id = $(this).data('anuncio-id');

                        removeAnuncio(anuncio_id);
                    })

                    sortable();
                }
            });

            atualizaPneus();
        }

        function atualizaPneus() {
            $.ajax({
                method: 'GET',
                url: '{{ route("admin.pneus.index") }}',
                data: { s: $('#s').val(), exceptAnuncios: true },
                success: function(pneus) {
                    $("#table-pneus tbody").html('');

                    pneus.forEach(pneu => {
                        let tr = $('<tr />');

                        let modelo = $("<td />").html(pneu.modelo)
                        let aro = $("<td />").html(pneu.aro)
                        let largura = $("<td />").html(pneu.largura)
                        let perfil = $("<td />").html(pneu.perfil)

                        let add = $("<td />").addClass('text-center adicionar-pneu').data('pneu-id', pneu.id).css('cursor', 'pointer').html("+")

                        tr.append([modelo, aro, largura, perfil, add]);

                        $("#table-pneus tbody").append(tr);
                    })

                    $('.adicionar-pneu').click(function(e) {
                        e.preventDefault();
                        let pneu_id = $(this).data('pneu-id');

                        adicionaAnuncio(pneu_id);
                    })
                }
            });
        }

        $(document).ready(function() {
            atualizaPneus();

        });

        $('#s').keyup(function() {
            atualizaPneus();
        });

        $('.remove-anuncio').click(function(e) {
            e.preventDefault();
            let anuncio_id = $(this).data('anuncio-id');

            removeAnuncio(anuncio_id);
        })

        function sortable() {
            $("#table-anuncios tbody").sortable({
                update: function() {
                    var order = $("#table-anuncios tbody").sortable('toArray');

                    $.ajax({
                        url: '{{ route("admin.anuncios.update") }}',
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
        }

        sortable();
    </script>
@endsection
