<div class="row">
	<div class="col-sm-12">
		<div class="block full">
			<div class="block-title">
				<h2>
					<strong>Top 10 Agents</strong>
				</h2>
			</div>
			<div id="chart-pie" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
		</div>
	</div>
</div>
<script>
	$(function () {
	    $('#chart-pie').highcharts({
	    	credits: {
		      enabled: false
		    },
	        chart: {
	            plotBackgroundColor: null,
	            plotBorderWidth: 1,//null,
	            plotShadow: false
	        },
	        title: {
	            text: ''
	        },
	        tooltip: {
	            pointFormat: '{series.name}: <b>{point.y}</b>'
	        },
	        plotOptions: {
	            pie: {
	                allowPointSelect: true,
	                cursor: 'pointer',
	                dataLabels: {
	                    enabled: true,
	                    format: '<b>{point.name}</b>: {point.y}',
	                    style: {
	                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
	                    }
	                }
	            }
	        },
	        series: [{
	            type: 'pie',
	            name: 'Clients',
	            data: [
	                <?php foreach($Data as $data){?>
	                ['<?php echo $data->full_name;?>',   <?php echo count(Tools::getAllDataClientByAgent2($data->id));?>],
	                <?php } ?>
	                //['Rinalda',       70],
	                /*
	                {
	                    name: 'Day Care',
	                    y: 12,
	                    sliced: true,
	                    selected: true
	                },*/
	                 
	            ]
	        }]
	    });
	});
</script>