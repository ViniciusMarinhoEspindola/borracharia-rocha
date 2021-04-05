@extends('admin.layouts.clean')

@section('content')

<section class="login-page">
    <div class="row login-form col-4">
        <div class="d-flex justify-content-center mb-4">
            <h3 class="title text-muted">Esqueci minha senha</h3>
        </div>
        <hr>

        <div class="card border-0 mb-3 rounded px-4 py-2">
            <div class="row">
                <div class="col-md-12 px-4">
                    <div class="card-body">

                        <form method="POST" action="{{ route('auth.forgot-password') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label text-muted">E-mail</label>
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email" aria-describedby="email">
                            </div>
                            <button type="submit" class="btn btn-danger my-3 w-100">Enviar e-mail</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
