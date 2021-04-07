@extends('admin.layouts.clean')

@section('content')

<section class="login-page">
    <div class="row login-form col-xl-4 col-lg-6 col-md-8 col-sm-12">
        <div class="d-flex justify-content-center mb-4">
            <h3 class="title text-muted">Painel Administrativo</h3>
        </div>
        <hr>

        <div class="card border-0 mb-3 rounded py-2">
            <div class="row">
                <div class="p-0">
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{session('success')}}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{session('error')}}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('auth.logar') }}">
                            @csrf

                            <div class="mb-2 mt-3">
                                <label for="email" class="form-label text-muted">E-mail</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="email">
                            </div>
                            <div class="mb-2">
                                <label for="password" class="form-label text-muted">Senha</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-2">
                                <a href="{{ route('auth.forgot-password') }}" class="small text-danger text-decoration-none">Esqueci a senha</a>
                            </div>
                            <button type="submit" class="btn btn-danger text-white my-3 w-100">Acessar Painel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
