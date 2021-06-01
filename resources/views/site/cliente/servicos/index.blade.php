@extends('site.cliente.layouts.master')

@section('content')

<div class='dashboard-app'>
    <div class='dashboard-content'>
        <div class='container'>
            <div class='card'>
                <div class='card-header'>
                    <h2>Agendar um serviço</h2>
                </div>
                <div class='card-body'>
                    <form method="POST" action="{{ route('servicos.store') }}">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Dias disponíveis:</label>

                                    @forelse($dias_disponiveis as $dia)
                                        <span class="badge badge-info">{{ $dia->nm_dia_semana }}</span>
                                    @empty
                                        <p>Nunhum dia dísponível</p>
                                    @endforelse
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="date">Escolha a data e hora:</label>
                                    <div id="datepicker"></div>
                                    <input type="date" id="inputDate" name="dt_agendamento" class="d-none" required>
                                    <input type="time" step="1" id="inputTime" name="hr_agendamento" class="d-none" required>
                                    <div class="invalid-feedback">
                                        Por favor, selecione um dia e horário disponíveis.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group col-md-6 col-sm-12 my-3">
                                <label for="servico">Serviço <span class="text-danger">*</span></label>
                                <select name="servico" class="form-control @error('servico') border-danger @enderror" id="servico">
                                    @foreach($servicos as $key => $servico)
                                        <option {{ old('servico') == $servico->id ? 'selected' : '' }} value="{{ $servico->id }}">{{ $servico->title }}</option>
                                    @endforeach
                                </select>
                                @error('servico')
                                    <small class="text-danger">{{ $errors->first('servico') }}</small>
                                @enderror
                            </div>
                        </div>

                        <button class="btn btn-danger" type="submit">Agendar serviço</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ asset('css/jquery.datetimepicker.min.css') }}">
<script src="{{ asset('js/jquery.datetimepicker.full.min.js') }}"></script>

<script type="text/javascript">
    let date = new Date();
    date = date.getFullYear() + "-" + (date.getMonth() + 1) + '-' +  date.getDate();
    var horarios = [];

    $(document).ready(async function() {
        await $.ajax({
            async: false,
            url: '/cliente/servicos/horarios-disponiveis/' + date,
            type: 'get',
            success: function (data) {
                horarios = data.horariosDisponiveis;
            }
        });

        'use strict';
        jQuery.datetimepicker.setLocale('pt-BR');

        jQuery('#datepicker').datetimepicker({
            allowTimes: horarios,
            inline: true,
            minDate: 'today',
            lang:'pt-BR',
            step: 50,
            yearStart:'2020',
            todayButton: true,
            timepicker: horarios.length,
            onChangeDateTime:function(dp,$input) {
                date = dp;
                date = date.getFullYear() + "-" + (date.getMonth() + 1) + '-' +  date.getDate();
                datePicker = this;
                $.ajax({
                    url: '/cliente/servicos/horarios-disponiveis/' + date,
                    type: 'get',
                    beforeSend: function() {
                        $("#btn-submit").attr('disabled', true);
                    },
                    success: function (data) {
                        horarios = data.horariosDisponiveis;

                        if(horarios.length > 0) {
                            datePicker.setOptions({
                                allowTimes: horarios,
                                timepicker: true
                            });
                            // Get value from datetimepicker
                            var d = $('#datepicker').datetimepicker('getValue');
                            // Get date from value dd/mm/yyyy
                            var date = d.toLocaleDateString();
                            date = FormataStringData(date);
                            // Get time from value hh:mm:ss
                            var time = d.toLocaleTimeString();

                            verificaTime = time.split(':');
                            verificaTime = verificaTime[0] + ':' + verificaTime[1];

                            if(horarios.includes(verificaTime)) {
                                $('#inputDate').val(date);
                                $('#inputTime').val(time);
                            } else {
                                $('#inputDate').val(date);
                                $('#inputTime').val("");
                            }
                        } else {
                            $("#inputDate").val("");
                            $("#inputTime").val("");

                            datePicker.setOptions({
                                allowTimes: horarios,
                                timepicker: false
                            });

                        }

                        $("#btn-submit").attr('disabled', false);
                    }
                });
            }
        });
    });

    function FormataStringData(data) {
        var dia  = data.split("/")[0];
        var mes  = data.split("/")[1];
        var ano  = data.split("/")[2];

        return ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-2);
    }
</script>
@endsection
