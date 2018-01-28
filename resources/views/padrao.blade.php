<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PIB</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>
<body>
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" title="PIB" href="{{ route('home') }}">Calculo do PIB</a>
                </div>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('home') }}" title="Calcular PIB">Calcular PIB</a>
                    </li>
                    <li>
                        <a href="{{ route('grafico') }}" title="Graficos e Comparações">Graficos e Comparações</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                @yield('conteudo')
            </div>
        </div>
    </main>
<script src="{{ asset('js/jquery.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}" type="text/javascript" charset="utf-8"></script>
</body>
</html>