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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

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
                        <h4 class="mt-4 mb-2">Seus Serviços Agendados</h4>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Protocolo</th>
                                        <th>Data</th>
                                        <th>Hora</th>
                                        <th>Cliente</th>
                                        <th>Serviço</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($agendamentos as $agendamento)
                                        <tr>
                                            <td><strong>#{{ $agendamento->protocolo }}</strong></td>
                                            <td>{{ $agendamento->dt_agendamento->format('d/m/Y') }}</td>
                                            <td>{{ $agendamento->hr_agendamento->format('H:i') }}</td>
                                            <td>{{ $agendamento->cliente->name }}</td>
                                            <td>{{ $agendamento->servico->title }}</td>
                                            <td>
                                                <span class="badge badge-{{ $agendamento->ic_status == 0 ? 'danger' : ($agendamento->ic_status == 1 ? 'info' : 'success') }}"  style="cursor: default;">
                                                    {{ $status[$agendamento->ic_status] }}
                                                </span>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Você ainda não tem nenhum serviço marcado</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
