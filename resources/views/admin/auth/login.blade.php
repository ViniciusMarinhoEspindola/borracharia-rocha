@extends('admin.layouts.clean')

@section('content')

<section class="login-page">
    <div class="row login-form col-4">
        <div class="card shadow mb-3 rounded py-3">
            <div class="row">
                <div class="col-md-12 p-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-5 mt-3">
                            <h3 class="title text-muted">Painel Administrativo</h3>
                        </div>

                        <form method="POST" action="{{ route('auth.logar') }}">
                            @csrf

                            <div class="mb-5 mt-3">
                                {{-- <label for="email" class="form-label text-danger">E-mail</label> --}}
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="E-mail" id="email" aria-describedby="email">
                            </div>
                            <div class="mb-5">
                                {{-- <label for="password" class="form-label text-danger">Senha</label> --}}
                                <input type="password" name="password" class="form-control form-control-lg" placeholder="Senha" id="password">
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('auth.forgot-password') }}" class="small text-muted ">Esqueci a senha</a>
                            </div>
                            <button type="submit" class="btn btn-danger btn-lg text-white my-3 w-100">Acessar Painel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection