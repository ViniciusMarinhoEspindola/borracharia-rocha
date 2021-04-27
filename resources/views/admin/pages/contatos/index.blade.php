@extends('admin.layouts.master')

@section('content')

<div class="card borders my-4 p-4">
    <h2 class="text-danger title text-center"><i class="fas fa-envelope-open-text"></i> Contatos</h2>
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
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Mensagem</th>
                    <th>Data de Envio</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contatos as $contato)
                    <tr>
                        <td>{{ $contato->name }}</td>
                        <td>{{ $contato->email }}</td>
                        <td>{{ $contato->phone }}</td>
                        <td><button class="msg-desc btn border-0 btn-outline-danger" data-desc="{!! $contato->msg !!}"><i class="fas fa-envelope-open-text"></i></button></td>
                        <td>{{ $contato->created_at->format('d/m/Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Nenhum contato encontrado!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $contatos->appends($filters)->links('admin.includes.paginator') }}
    </div>
</div>

@endsection

@section('js')
    @include('admin.includes.messages')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
    <script>
        document.querySelector(".msg-desc").onclick = function(e) {
            Swal.fire({
                html: `<div class="align-left">${this.getAttribute('data-desc')}</div>`,
            });
        };
    </script>
@endsection
