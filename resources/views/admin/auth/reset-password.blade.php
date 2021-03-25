@extends('admin.layouts.clean')

@section('content')

<section class="login-page">
    <div class="row login-form col-4">
        <div class="card shadow mb-3 rounded py-3">
            <div class="row">
                <div class="col-md-12 p-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center mb-5 mt-3">
                            <h3 class="title text-muted">Redefinir senha</h3>
                        </div>

                        <form method="POST" action="{{ route('auth.password_resets.with_token') }}">
                            @csrf

                            <div class="mb-4 mt-3">
                                {{-- <label for="new_password" class="form-label text-danger">Nova senha</label> --}}
                                <input type="password" name="new_password" class="form-control" placeholder="Nova Senha" id="new_password">
                            </div>

                            <input type="hidden" name="user_email" value="{{ $email }}">
                            <input type="hidden" name="reset_token" value="{{ $token }}">

                            <button type="submit" class="btn btn-danger my-3 w-100">Alterar senha</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection