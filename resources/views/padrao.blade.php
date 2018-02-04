<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PIB</title>
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}"/>    
    </head>
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">
                        Toggle navigation
                    </span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">
                        Controle e Calculo do PIB
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="{{ $activeHome or "" }}"><a href="{{ route('home') }}">Cadastrar PIB</a></li>
                        <li class="{{ $activeAlterarPib or "" }}"><a href="{{ route('alterarPib') }}">Alterar PIB</a></li>
                        <li class="{{ $activePais or "" }}"><a href="{{ route('gerenciarPais') }}">Cadastrar Pais</a></li>
                        <li class="{{ $activeGraficos or "" }}"><a href="{{ route('grafico') }}">Graficos Comparativos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <body>
        <main>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        @if(session()->has('success'))
                        <div class="alert alert-success text-center">
                            {{ session()->get('success') }}
                        </div>
                        @elseif(session()->has('error'))
                        <div class="alert alert-danger text-center">
                            {{ session()->get('error') }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @yield('conteudo')
                    </div>
                </div>
            </div>
        </main>
        <br>
        <br>
        <br>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/Chart.min.js') }}"></script>
        <script src="{{ asset('datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('js/config-datatables.js') }}"></script>
        <script src="{{ asset('js/ajax-modal-pib.js') }}"></script>       
        <script src="{{ asset('js/graficos.js') }}"></script>       
    </body>
</html>