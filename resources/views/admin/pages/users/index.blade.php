@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-house-user"></i> Usuários</h2>
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
            <a class="btn btn-danger" href="{{ route("admin.users.create") }}"><i class="fas fa-plus"></i> Cadastrar</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th width="30%">Nome</th>
                    <th width="30%">E-mail</th>
                    <th width="20%">Data de Cadastro</th>
                    <th class="text-center" width="20%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td class="d-flex justify-content-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-outline-danger border-0"><i class="fas fa-user-edit"></i></a>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-outline-danger border-0"><i class="fas fa-user-times"></i></button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum usuário encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $users->appends($filters)->links('admin.includes.paginator') }}
    </div>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')
@endsection
