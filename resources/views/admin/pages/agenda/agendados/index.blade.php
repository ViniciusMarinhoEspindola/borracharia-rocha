@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-calendar-alt"></i> Agendamentos</h2>
</div>

<div class="card my-4 p-4 px-md-5 px-sm-0">
    <form action="">
        <div class="row form-group my-3">
            <input type="text" placeholder="Pesquisar por protocolo, cliente ou serviço" class="form-control" value="{{ $filters['s'] ?? "" }}" name="s" id="s">
        </div>

        <div class="form-group">
            <button class="btn btn-outline-danger">Pesquisar</button>
        </div>
    </form>
</div>

<div class="card my-4 p-4">
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Protocolo</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Cliente</th>
                    <th>Serviço</th>
                    <th>Status</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($agendamentos as $agendamento)
                    <tr>
                        <td><strong>#{{ $agendamento->protocolo }}</strong></td>
                        <td>{{ $agendamento->dt_agendamento->format('d/m/Y') }}</td>
                        <td>{{ $agendamento->hr_agendamento->format('H:i') }}</td>
                        <td>{{ $agendamento->cliente->name }}</td>
                        <td>{{ $agendamento->servico->title }}</td>
                        <td>
                            <span class="btn btn-sm text-white btn-{{ $agendamento->ic_status == 0 ? 'danger' : ($agendamento->ic_status == 1 ? 'info' : 'success') }}"  style="cursor: default;">
                                {{ $status[$agendamento->ic_status] }}
                            </span>
                        </td>
                        @if($agendamento->ic_status == 1)
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('admin.agendamentos.finish', $agendamento->id) }}" class="btn btn-outline-danger border-0" title="Finalizar"><i class="fas fa-check"></i></a>
                                <a href="{{ route('admin.agendamentos.destroy', $agendamento->id) }}" class="btn btn-outline-danger border-0" title="Cancelar"><i class="fas fa-times"></i></a>
                            </td>
                        @else
                            <td></td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum agendamento encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $agendamentos->appends($filters)->links('admin.includes.paginator') }}
    </div>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')
@endsection
