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
                  <input type="text" id="inputName" class="form-control @error('name') border-danger @enderror" name="name" value="{{ old('name') }}" placeholder="Nome" required autofocus>
                  <label for="inputName">Nome</label>

                  @error('name')
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                  @enderror
                </div>

                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control @error('email') border-danger @enderror" name="email" value="{{ old('email') }}" placeholder="Endereço de e-mail" required>
                  <label for="inputEmail">Email</label>

                  @error('email')
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                  @enderror
                </div>

                <div class="form-label-group">
                  <input type="text" id="inputPhone" class="form-control @error('phone') border-danger @enderror" name="phone" value="{{ old('phone') }}" placeholder="Telefone" required>
                  <label for="inputPhone">Telefone</label>

                  @error('phone')
                    <small class="text-danger">{{ $errors->first('phone') }}</small>
                  @enderror
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control @error('password') border-danger @enderror" name="password" value="{{ old('password') }}" placeholder="Senha" required>
                  <label for="inputPassword">Senha</label>

                  @error('password')
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                  @enderror
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.2.0/vanilla-masker.min.js" integrity="sha512-RbMQw6xKGymv6bRMO4z5OxHBzzem7BPEQX7nTJC9G08A70gXdUka76Rvgey83MsSXrIEJddog0vxUKN6iTce2Q==" crossorigin="anonymous"></script>
<script>
    function inputHandler(masks, max, event) {
        var c = event.target;
        var v = c.value.replace(/\D/g, '');
        var m = c.value.length > max ? 1 : 0;
        VMasker(c).unMask();
        VMasker(c).maskPattern(masks[m]);
        c.value = VMasker.toPattern(v, masks[m]);
    }

    var telMask = ['(99) 9999-99999', '(99) 99999-9999'];
    var tel = document.querySelector('#inputPhone');
    VMasker(tel).maskPattern(telMask[0]);
    tel.addEventListener('input', inputHandler.bind(undefined, telMask, 14), false);
</script>