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
    <a href="/"><img src="css/login/logo.png"  alt="" width='160' weight='160'></a>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Cadastro</h5>
            <form class="form-signin">
            <div class="form-label-group">
                <input type="text" id="inputName" class="form-control" placeholder="Nome" required autofocus>
                <label for="inputName">Nome</label>
              </div>
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
                <label for="inputEmail">Email</label>
              </div>
              <div class="form-label-group">
                <input type="number" id="inputPhone" class="form-control" placeholder="Phone" required>
                <label for="inputPhone">Telefone</label>
              </div>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
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