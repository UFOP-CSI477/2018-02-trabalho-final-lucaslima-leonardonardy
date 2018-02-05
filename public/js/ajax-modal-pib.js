function ajaxPibModal(id) {
    $.ajax({
        type: 'GET',
        url: "alterarModal/".concat(id),
        success: function(dataPib) {
            dataPib = JSON.parse(dataPib);
            $("#consumo").val(dataPib[0].consumo);
            $("#investimento").val(dataPib[0].investimento);
            $("#gastosGoverno").val(dataPib[0].gastosGoverno);
            $("#exportacoes").val(dataPib[0].exportacoes);
            $("#importacoes").val(dataPib[0].importacoes);
            $("#ano").val(dataPib[0].ano);
            $("#idPais").val(dataPib[0].idPais);
            $("#id").val(dataPib[0].id);
        }
    });
}