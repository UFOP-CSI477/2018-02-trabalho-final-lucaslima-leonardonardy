$(document).ready(function() {
    $('#example').DataTable({
        "language": {
            "Processing": "A processar...",
            "lengthMenu": "Mostrar _MENU_ registos",
            "zeroRecords": "Não foram encontrados resultados",
            "info": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
            "infoEmpty": "Mostrando de 0 até 0 de 0 registos",
            "infoFiltered": "(filtrado de _MAX_ registos no total)",
            "InfoPostFix": "",
            "sSearch": "Procurar:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Primeiro",
                "sPrevious": "Anterior",
                "sNext": "Seguinte",
                "sLast": "Último"
            }
        }
    });
});