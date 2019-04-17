<div class="main-content-wrap sidenav-open d-flex flex-column">
    <style>
	canvas {
		-moz-user-select: none;
		-webkit-user-select: none;
		-ms-user-select: none;
	}
	.chart-container {
		width: 1024px;
		margin-left: 40px;
		margin-right: 40px;
		margin-bottom: 40px;
	}
	.echartBar {
		display: flex;
		flex-direction: row;
		flex-wrap: wrap;
		justify-content: center;
	}
	</style>
	<div class="row"></div>
    <div class="row">
	    <div class="echartBar"></div>
	    {literal}
	    <script>
		function createConfig(position) {
			return {
				type: 'line',
				data: {
					labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
					datasets: [{
						label: 'Ventes',
						borderColor: window.chartColors.red,
						backgroundColor: window.chartColors.red,
						data: [10, 30, 46, 2, 8, 50, 0],
						fill: false,
					}, {
						label: 'Remborssement',
						borderColor: window.chartColors.blue,
						backgroundColor: window.chartColors.blue,
						data: [7, 49, 46, 13, 25, 30, 22],
						fill: false,
					},
					{
						label: 'Réduction',
						borderColor: window.chartColors.yellow,
						backgroundColor: window.chartColors.yellow,
						data: [2, 49, 33, 18, 47, 88, 10],
						fill: false,
					},
					{
						label: 'Vente nettes',
						borderColor: window.chartColors.green,
						backgroundColor: window.chartColors.green,
						data: [3, 55, 66, 17, 25, 90, 22],
						fill: false,
					}
					]
				},
				options: {
					responsive: true,
					title: {
						display: true,
						text: 'Récapitulatif des : ' + position
					},
					tooltips: {
						position: position,
						mode: 'index',
						intersect: true,
					},
				}
			};
		}

		window.onload = function() {
			var container = document.querySelector('.echartBar');
			['Ventes'].forEach(function(position) {
				var div = document.createElement('div');
				div.classList.add('chart-container');

				var canvas = document.createElement('canvas');
				div.appendChild(canvas);
				container.appendChild(div);

				var ctx = canvas.getContext('2d');
				var config = createConfig(position);
				new Chart(ctx, config);
			});
		};
	</script>
	    {/literal}
  </div>
</div>