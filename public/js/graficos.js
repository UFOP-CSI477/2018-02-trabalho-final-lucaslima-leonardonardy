function graficos() {
	var ano = $("#anoPibSelect").val();
	var pais = $("#paisPibSelect").val();
	var pib = "";

	if ($.isNumeric(ano)) {
		if (pais !== "Selecione o pais") {
			pib = pais
		}else {
			pib = ano;	
		}	
	}else if (pais !== "Selecione o pais") {
		pib = pais
	}
	
	if (document.URL.indexOf('grafico') == 15 && pib.length !== 0) {

		var  urlAnoPaisPib = "http://pib.com/graficoPost/".concat(pib);
		var urlAnoPaisPibPer = "http://pib.com/graficoPostPer/".concat(pib);

		//limpando gradico 1
		document.getElementById("myChartCont1").innerHTML = '&nbsp;';
		document.getElementById("myChartCont1").innerHTML = '<canvas id="myChart1"></canvas>';

		//limpando gradico 2
		document.getElementById("myChartCont2").innerHTML = '&nbsp;';
		document.getElementById("myChartCont2").innerHTML = '<canvas id="myChart2"></canvas>';

		//limpando gradico 3
		document.getElementById("myChartCont3").innerHTML = '&nbsp;';
		document.getElementById("myChartCont3").innerHTML = '<canvas id="myChart3"></canvas>';

		//limpando gradico 4
		document.getElementById("myChartCont4").innerHTML = '&nbsp;';
		document.getElementById("myChartCont4").innerHTML = '<canvas id="myChart4"></canvas>';

		//Grafico 1
		$.ajax({
			type: 'GET',
			url: urlAnoPaisPib,
			
			success: function (data) {
				data = JSON.parse(data);
				var rotulos = [];
				var dados = [];
				
				for (var i = 0; i < data.length; i++) {
					rotulos.push(Math.round(data[i].totalPib));
					dados.push(data[i].pais);
				}

				var ctx = document.getElementById("myChart1").getContext('2d');
				var myChart1 = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: dados,
						datasets: [{
							label: 'PIB',
							data: rotulos,
							backgroundColor: 'rgba(255, 99, 132, 0.2)',
							borderColor: 'rgba(255,99,132,1)',
							borderWidth: 1
						}]
					}
				});
			}
		});

		//Grafico 2
		$.ajax({
			type: 'GET',
			url: urlAnoPaisPibPer,

			success: function (data) {
				data = JSON.parse(data);
				var rotulos2 = [];
				var dados2 = [];
				
				for (var i = 0; i < data.length; i++) {
					rotulos2.push(data[i].totalPib);
					dados2.push(data[i].pais);
				}

				var ctx = document.getElementById("myChart2").getContext('2d');
				var myChart2 = new Chart(ctx, {
					type: 'bar',
					data: {
						labels: dados2,
						datasets: [{
							label: 'PIB PER CAPITA',
							data: rotulos2,
							backgroundColor: 'rgba(255, 99, 132, 0.2)',
							borderColor: 'rgba(255,99,132,1)',
							borderWidth: 1
						}]
					}
				});
			}
		});

		//Grafico 3
		$.ajax({
			type: 'GET',
			url: urlAnoPaisPib,
			
			success: function (data) {
				data = JSON.parse(data);
				var rotulos3 = [];
				var dados3 = [];
				
				for (var i = 0; i < data.length; i++) {
					rotulos3.push(data[i].totalPib);
					dados3.push(data[i].pais);
				}
				var ctx = document.getElementById("myChart3").getContext('2d');
				var myChart3 = new Chart(ctx, {
					type: 'line',
					data: {
						labels: dados3,
						datasets: [{
							label: 'PIB',
							data: rotulos3,
							backgroundColor: 'rgba(54, 162, 235, 0.2)',
							borderColor: 'rgba(54, 162, 235, 1)',
							borderWidth: 1
						}]
					}
				});
			}
		});

		//Grafico 4
		$.ajax({
			type: 'GET',
			url: urlAnoPaisPibPer,

			success: function (data) {
				data = JSON.parse(data);
				var rotulos4 = [];
				var dados4 = [];
				
				for (var i = 0; i < data.length; i++) {
					rotulos4.push(data[i].totalPib);
					dados4.push(data[i].pais);
				}

				var ctx = document.getElementById("myChart4").getContext('2d');
				var myChart4 = new Chart(ctx, {
					type: 'line',
					data: {
						labels: dados4,
						datasets: [{
							label: 'PIB PER CAPITA',
							data: rotulos4,
							backgroundColor: 'rgba(54, 162, 235, 0.2)',
							borderColor: 'rgba(54, 162, 235, 1)',
							borderWidth: 1
						}]
					}
				});
			}
		});		
	}
};