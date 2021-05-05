<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/login/styles.css') }}">
</head>
<body>
<a href="/"><img src="css/login/logo.png"  alt="" width='160' weight='160'></a>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">

            <h5 class="card-title text-center">Login</h5>

            @if(session()->has('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
            @endif

            @if(session()->has('error'))
              <div class="alert alert-danger" role="alert">
                {{ session('error') }}
              </div>
            @endif

            <form class="form-signin" method="POST" action="{{ route('logar') }}">
              @csrf

              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required autofocus>
                <label for="inputEmail">E-mail</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Senha</label>
              </div>
                Não é cadastrado? <a href="/cadastro"> Cadastre-se</a>
              <div class="custom-control custom-checkbox mb-3">

              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
              <hr class="my-4">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>