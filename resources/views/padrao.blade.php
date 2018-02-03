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
<script src="{{ asset('js/Chart.min.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
// var ctx = document.getElementById("myChart2").getContext('2d');
// var myChart2 = new Chart(ctx, {
//     type: 'polarArea',
//     data: {
//         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
//         datasets: [{
//             label: 'PIB Per Capita',
//             data: [12, 19, 3, 5, 2, 3],
//             backgroundColor: [
//                 'rgba(255, 99, 132, 0.2)',
//                 'rgba(54, 162, 235, 0.2)',
//                 'rgba(255, 206, 86, 0.2)',
//                 'rgba(75, 192, 192, 0.2)',
//                 'rgba(153, 102, 255, 0.2)',
//                 'rgba(255, 159, 64, 0.2)'
//             ],
//             borderColor: [
//                 'rgba(255,99,132,1)',
//                 'rgba(54, 162, 235, 1)',
//                 'rgba(255, 206, 86, 1)',
//                 'rgba(75, 192, 192, 1)',
//                 'rgba(153, 102, 255, 1)',
//                 'rgba(255, 159, 64, 1)'
//             ],
//             borderWidth: 1
//         }]
//     },
//     options: {
//         scales: {
//             yAxes: [{
//                 ticks: {
//                     beginAtZero:true
//                 }
//             }]
//         }
//     }
// });
</script>
<script>
$.ajax({
    type: 'GET',
    url: "{{ route('dadosGrafico') }}",
    success: function (data) {
        data = JSON.parse(data);
        var rotulos = [];
        var dados = [];

        for (var i = 0; i < data.length; i++) {
            rotulos.push(data[i].totalPib);
            dados.push(data[i].pais);
        }
        var ctx = document.getElementById("myChart1").getContext('2d');
        var myChart2 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dados,
                datasets: [{
                    label: 'PIB',
                    data: rotulos,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    }
});

$.ajax({
    type: 'GET',
    url: "{{ route('dadosGraficoPer') }}",
    success: function (data) {
        data = JSON.parse(data);
        var rotulos2 = [];
        var dados2 = [];

        for (var i = 0; i < data.length; i++) {
            rotulos2.push(data[i].totalPib);
            dados2.push(data[i].pais);
        }
        console.log(rotulos2);
        var ctx = document.getElementById("myChart2").getContext('2d');
        var myChart2 = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dados2,
                datasets: [{
                    label: 'PIB',
                    data: rotulos2,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            }
        });
    }
});
</script>
</body>
</html>