@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-cogs"></i> Serviços</h2>
</div>

<div class="card my-4 p-4 px-md-5 px-sm-0">
    <form action="">
        <div class="row form-group my-3">
            <input type="text" placeholder="Pesquisar" class="form-control" value="{{ $filters['s'] ?? "" }}" name="s" id="s">
        </div>

        <div class="form-group">
            <button class="btn btn-outline-danger">Pesquisar</button>
        </div>
    </form>
</div>

<div class="card my-4 p-4">
    <div class="row justify-content-between mb-5">
        <div class="d-flex justify-content-end col">
            <a class="btn btn-danger" href="{{ route("admin.servicos.create") }}"><i class="fas fa-plus"></i> Cadastrar</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Tipo</th>
                    <th>Tempo Estimado</th>
                    <th>Descrição</th>
                    <th class="text-center" width="20%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($servicos as $servico)
                    <tr>
                        <td>{{ $servico->title }}</td>
                        <td>{{ $servico->type }}</td>
                        <td>{{ $servico->estimated_time }}</td>
                        <td>{{ $servico->description }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.servicos.edit', $servico->id) }}" class="btn btn-outline-danger border-0"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.servicos.destroy', $servico->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum serviço encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $servicos->appends($filters)->links('admin.includes.paginator') }}
    </div>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')
@endsection
