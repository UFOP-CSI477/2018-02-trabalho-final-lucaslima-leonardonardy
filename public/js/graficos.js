$(document).ready(function() {
	if (document.URL.indexOf('grafico') == 15) {
		
		//Grafico 1
		$.ajax({
			type: 'GET',
			url: 'http://pib.com/graficoPost',
			
			success: function (data) {
				data = JSON.parse(data);
				var rotulos = [];
				var dados = [];
				
				for (var i = 0; i < data.length; i++) {
					rotulos.push(data[i].totalPib);
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
			url: 'http://pib.com/graficoPostPer',

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
			url: 'http://pib.com/graficoPost',
			
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
			url: 'http://pib.com/graficoPostPer',

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
});