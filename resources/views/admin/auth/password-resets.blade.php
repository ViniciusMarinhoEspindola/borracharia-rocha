@extends('admin.layouts.clean')

@section('content')

<section class="login-page">
    <div class="row login-form col-4">
        <div class="card shadow mb-3 rounded py-3">
            <div class="row">
                <div class="col-md-12 p-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-5 mt-3">
                            <h3 class="title text-muted">Esqueci minha senha</h3>
                        </div>

                        <form method="POST" action="{{ route('auth.forgot-password') }}">
                            @csrf

                            <div class="mb-4 mt-3">
                                {{-- <label for="email" class="form-label text-danger">E-mail</label> --}}
                                <input type="email" value="{{ old('email') }}" name="email" class="form-control" id="email" placeholder="E-mail" aria-describedby="email">
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