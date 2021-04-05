@extends('admin.layouts.clean')

@section('content')

<section class="login-page">
    <div class="row login-form col-4">
        <div class="d-flex justify-content-center mb-4">
            <h3 class="title text-muted">Redefinir senha</h3>
        </div>
        <hr>

        <div class="card border-0 mb-3 rounded px-4 py-2">
            <div class="row">
                <div class="col-md-12 px-4">
                    <div class="card-body">

                        <form method="POST" action="{{ route('auth.password_resets.with_token') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="new_password" class="form-label text-muted">Nova senha</label>
                                <input type="password" name="new_password" class="form-control" id="new_password">
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
