@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-boxes"></i> Pneus</h2>
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
        {{-- <form action="" class="col ">
            <select name="" class="form form-select per-page" id="">
                <option value="">5</option>
            </select>
        </form> --}}

        <div class="d-flex justify-content-end col">
            <a class="btn btn-danger" href="{{ route("admin.pneus.create") }}"><i class="fas fa-plus"></i> Cadastrar</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="20%">Modelo</th>
                    <th width="20%">Medidas</th>
                    <th width="10%">Quantidade</th>
                    <th width="10%">Valor</th>
                    <th width="20%">Data de Cadastro</th>
                    <th class="text-center" width="20%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pneus as $pneu)
                    <tr>
                        <td>{{ $pneu->modelo }}</td>
                        <td>{{ $pneu->largura }}/{{ $pneu->perfil }} R {{ $pneu->aro }}</td>
                        <td>{{ $pneu->quantidade }}</td>
                        <td>R$ {{ $pneu->valor }}</td>
                        <td>{{ $pneu->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.pneus.edit', $pneu->id) }}" class="btn btn-outline-danger border-0"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('admin.pneus.destroy', $pneu->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger border-0"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum pneu encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $pneus->appends($filters)->links('admin.includes.paginator') }}
    </div>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')
@endsection
