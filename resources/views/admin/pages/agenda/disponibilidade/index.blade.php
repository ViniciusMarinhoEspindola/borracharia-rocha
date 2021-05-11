@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-calendar-alt"></i> Configurar Disponibilidade</h2>
</div>

<div class="card my-4 p-4">
    <div class="row">
        @foreach($dias_semana as $dia_semana)
            <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                <div class="card borders border-top border-bottom">
                    <div class="card-body">
                        <h6 class="text-danger">{{ $dia_semana->nm_dia_semana }}</h6>

                        <form action="" class="mt-4">
                            <label for="">Dia de atendimento? </label>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" @if($dia_semana->ic_funcionamento == 1) checked @endif data-id="{{ $dia_semana->id }}" type="radio" name="funcionamento" id="sim-{{ $dia_semana->id }}" value="1">
                                    <label class="form-check-label" for="sim-{{ $dia_semana->id }}">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" @if($dia_semana->ic_funcionamento == 0) checked @endif data-id="{{ $dia_semana->id }}" type="radio" name="funcionamento" id="nao-{{ $dia_semana->id }}" value="0">
                                    <label class="form-check-label" for="nao-{{ $dia_semana->id }}">Não</label>
                                </div>
                            </div>
                        </form>

                        <form data-id="{{ $dia_semana->id }}" id="form-hora-{{ $dia_semana->id }}" action="" class="mt-4 form-hora" style="@if(!$dia_semana->ic_funcionamento) display: none; @endif">
                            <h6 class="text-muted">Horários de Funcionamento</h6>

                            @forelse($dia_semana->horarios_funcionamento as $horario_funcionamento)
                                <div class="d-flex align-items-center">
                                    <span>De:</span>
                                    <input type="time" class="form-control form-control-sm border-0" value="{{ $horario_funcionamento->hr_inicio->format('H:i:s') }}" name="time_de" id="">

                                    <span>Até:</span>
                                    <input type="time"  class="form-control form-control-sm border-0" value="{{ $horario_funcionamento->hr_termino->format('H:i:s') }}" name="time_ate" id="">
                                </div>
                            @empty
                                <div class="d-flex align-items-center">
                                    <span>De:</span>
                                    <input type="time" class="form-control form-control-sm border-0" value="09:00:00" name="time_de" id="">

                                    <span>Até:</span>
                                    <input type="time"  class="form-control form-control-sm border-0" value="18:00:00" name="time_ate" id="">
                                </div>
                            @endforelse
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="mt-4">
            <button id="btn-salvar" style="display: none;" class="btn btn-success">Salvar</button>
        </div>
    </div>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
       $('input[name=funcionamento]').click(function(e) {
           var id = $(this).data('id');
           var val = $(this).val();
            $.ajax({
                url: '{{ url("/admin/agenda/disponibilidade") }}/' + id,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                data: {
                    funcionamento: val
                },
                dataType: 'JSON',
                success: function(data) {
                    if(val == 1) {
                        $('#form-hora-' + id).fadeIn();
                    } else {
                        $('#form-hora-' + id).hide();
                    }

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
                },
                error: function(request, status, error) {
                    new Notify({
                        status: 'error',
                        title: 'Erro',
                        text: error,
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
        });

        $('input[name=time_de]').change(function(e) {
            $('#btn-salvar').fadeIn();
        });
        $('input[name=time_ate]').change(function(e) {
            $('#btn-salvar').fadeIn();
        });


        $('#btn-salvar').click(function(e) {
            $(this).hide();

            $('.form-hora').each(function(index) {
                let de = $(this).find('input[name=time_de]')
                let ate = $(this).find('input[name=time_ate]')
                var id = $(this).data('id');

                if(de.val() !== "" && ate.val() !== "") {
                    $.ajax({
                        url: '{{ url("/admin/agenda/disponibilidade") }}/' + id,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        data: {
                            de: de.val(),
                            ate: ate.val(),
                        },
                        dataType: 'JSON',
                        success: function(data) {

                        },
                        error: function(request, status, error) {
                            new Notify({
                                status: 'error',
                                title: 'Erro',
                                text: error,
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

            new Notify({
                status: 'success',
                title: 'Sucesso',
                text: "Salvo com sucesso!",
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
        });
    </script>
@endsection
