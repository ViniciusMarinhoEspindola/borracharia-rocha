<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Cadastro</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{ asset('css/login/styles.css') }}">
</head>
<body>
    <a href="/">
      <img src="css/login/logo.png"  alt="" width='160' weight='160'>
    </a>

    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">

              <h5 class="card-title text-center">Cadastro</h5>

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

              <form class="form-signin" method="POST" action="{{ route('cadastrar') }}">
                @csrf

                <div class="form-label-group">
                  <input type="text" id="inputName" class="form-control" name="name" placeholder="Nome" required autofocus>
                  <label for="inputName">Nome</label>
                </div>

                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address" required>
                  <label for="inputEmail">Email</label>
                </div>

                <div class="form-label-group">
                  <input type="number" id="inputPhone" class="form-control" name="phone" placeholder="Phone" required>
                  <label for="inputPhone">Telefone</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                  <label for="inputPassword">Senha</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">

                </div>

                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Cadastrar</button>
                <hr class="my-4">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>