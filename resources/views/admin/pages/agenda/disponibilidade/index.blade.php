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
                                    <input class="form-check-input" @if($dia_semana->ic_funcionamento == 1) checked @endif type="radio" name="inlineRadioOptions" id="sim-{{ $dia_semana->id }}" value="1">
                                    <label class="form-check-label" for="sim-{{ $dia_semana->id }}">Sim</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" @if($dia_semana->ic_funcionamento == 0) checked @endif type="radio" name="inlineRadioOptions" id="nao-{{ $dia_semana->id }}" value="0">
                                    <label class="form-check-label" for="nao-{{ $dia_semana->id }}">Não</label>
                                </div>
                            </div>
                        </form>

                        <form action="" class="mt-4">
                            <h6 class="text-muted">Horários de Funcionamento</h6>

                            <div class="d-flex align-items-center">
                                <span>De:</span>
                                <input type="time" class="form-control form-control-sm border-0" name="" id="">

                                <span>Até:</span>
                                <input type="time"  class="form-control form-control-sm border-0" name="" id="">
                            </div>
                        </form>
                    </div>
                </div>
                <div></div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')
@endsection
