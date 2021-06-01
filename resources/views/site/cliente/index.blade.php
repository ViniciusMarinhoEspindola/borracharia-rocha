@extends('site.cliente.layouts.master')

@section('content')
    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h2>Bem vindo, {{ Auth::guard('cliente')->user()->name }}</h2>
                    </div>
                    <div class='card-body'>
                        <div class="mt-4">
                            <h4 class="float-left mb-3">Seus Serviços Agendados</h4>

                            <a href="{{ route('servicos.index') }}" class="btn btn-danger float-right mb-3">Agendar Serviço</a>
                        </div>

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
                                                <span class="badge badge-{{ $agendamento->ic_status == 0 ? 'danger' : ($agendamento->ic_status == 1 ? 'info' : 'success') }}"  style="cursor: default;">
                                                    {{ $status[$agendamento->ic_status] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Você ainda não tem nenhum serviço marcado</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection