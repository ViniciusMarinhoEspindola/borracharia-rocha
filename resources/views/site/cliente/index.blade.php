<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Borracharia Rocha</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('index\favicon.ico') }}" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/index/cliente/style.css') }}">
        <link href="css/index/cliente/script.js" rel="script">
    </head>
  
    <div class='dashboard'>
    <div class="dashboard-nav">
        <header><a href="#!" class="menu-toggle"><i class="fas fa-bars"></i></a><a href="#"
                                                                                   class="brand-logo"><i
                class="fas fa-user"></i> <span>Cliente: {{ Auth::guard('cliente')->user()->name }}</span></a></header>
        <nav class="dashboard-nav-list"><a href="/" class="dashboard-nav-item"><i class="fas fa-home"></i>
            Home </a>
          <a href="{{ route('logout') }}" class="dashboard-nav-item"><i class="fas fa-sign-out-alt"></i> Logout </a>
        </nav>
    </div>
    <div class='dashboard-app'>
        <div class='dashboard-content'>
            <div class='container'>
                <div class='card'>
                    <div class='card-header'>
                        <h1>Bem vindo, {{ Auth::guard('cliente')->user()->name }}</h1>
                    </div>
                    <div class='card-body'>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
