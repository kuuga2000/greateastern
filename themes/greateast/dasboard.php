<!-- Mini Top Stats Row -->
<div class="row">
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="page_ready_article.html" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="gi gi-wallet"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong class="red">50</strong>/<strong>150</strong>
			<br>
			<small>Sales</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="page_ready_article.html" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
				<i class="fa fa-file-text"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong class="red">50</strong>/<strong>150</strong>
			<br>
			<small>Boarding Appoint.</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="page_ready_article.html" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
				<i class="fa fa-file-text"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong>50</strong>/<strong class="red">150</strong>
			<br>
			<small>Day Care Appoint.</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="page_ready_article.html" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
				<i class="fa fa-file-text"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong class="red">50</strong>/<strong>150</strong>
			<br>
			<small>Grooming Appoint.</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<!---->
	<div class="col-sm-6">
		<!-- Widget -->
		<a class="widget widget-hover-effect1" href="page_comp_charts.html">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
				<i class="fa fa-database"></i>
			</div>
			<h3 class="widget-content animation-pullDown"><strong class="red">30</strong>/<strong>130</strong><small class="red">Low Stock Product</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6">
		<!-- Widget -->
		<a class="widget widget-hover-effect1" href="page_widgets_stats.html">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="gi gi-wallet"></i>
			</div>
			<div class="pull-right">
				<!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
				<span id="mini-chart-brand"><canvas style="display: inline-block; width: 176px; height: 64px; vertical-align: top;" width="176" height="64"></canvas></span>
			</div>
			<h3 class="widget-content animation-pullDown visible-lg"> Latest <strong>Sales</strong><small>Per hour</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
</div>
<!-- END Mini Top Stats Row -->
<!-- Classic and Bars Chart -->
<div class="row">
	<div class="col-sm-6">
		<!-- Classic Chart Block -->
		<div class="block full">
			<!-- Classic Chart Title -->
			<div class="block-title">
				<h2><strong>Sales</strong> Report</h2>
			</div>
			<!-- END Classic Chart Title -->
			<!-- Classic Chart Content -->
			<!-- Flot Charts (initialized in js/pages/compCharts.js), for more examples you can check out http://www.flotcharts.org/ -->
			<div id="chart-line" class="chart"></div>
			<!--<div id="chart-line" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>-->
			<!-- END Classic Chart Content -->
			<table class="table table-vcenter table-striped">
				<thead>
					<tr>
						<th><small>Type Sales</small></th>
						<th><small>Total Sales</small></th>
						<th><small>Order Qty</small></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a class="label label-success" style="background: #7CB5EC;">All</a></td>
						<td>60</td>
						<td>1000</td>
					</tr>
					<tr>
						<td><a class="label label-info" style="background: #434348;">Retail</a></td>
						<td>80</td>
						<td>900</td>
					</tr>
					<tr>
						<td><a class="label label-info" style="background: #90ED7D;">Boarding</a></td>
						<td>30</td>
						<td>800</td>
					</tr>
					<tr>
						<td><a class="label label-info" style="background: #F7A35C;">Day Care</a></td>
						<td>30</td>
						<td>800</td>
					</tr>
					<tr>
						<td><a class="label label-info" style="background: #8085E9;">Grooming</a></td>
						<td>30</td>
						<td>800</td>
					</tr>
					 
					 
					 
				</tbody>
			</table>
			<div class="col-sm-12">
				<center>
					<button class="btn btn-sm btn-primary" type="submit">
						Week
					</button>
					<button class="btn btn-sm btn-default" type="button">
						Month
					</button>
					<button class="btn btn-sm btn-primary" type="button">
						3 Months
					</button>
					<button class="btn btn-sm btn-primary" type="button">
						Years
					</button>
				</center>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- END Classic Chart Block -->
	</div>
	<div class="col-sm-6">
		<!-- Bars Chart Block -->
		<div class="block full">
			<!-- Bars Chart Title -->
			<div class="block-title">
				<h2><strong>Categories</strong> Report</h2>
			</div>
			<!-- END Bars Chart Title -->
			<!-- Bars Chart Content -->
			<!-- Flot Charts (initialized in js/pages/compCharts.js), for more examples you can check out http://www.flotcharts.org/ -->
			<div id="chart-pie" class="chart"></div>
			<!--<div id="chart-pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>-->
			<!-- END Bars Chart Content -->
			<div class="col-sm-12">
				<center>
					<button class="btn btn-sm btn-primary" type="submit">
						Week
					</button>
					<button class="btn btn-sm btn-default" type="button">
						Month
					</button>
					<button class="btn btn-sm btn-primary" type="button">
						3 Months
					</button>
					<button class="btn btn-sm btn-primary" type="button">
						Years
					</button>
				</center>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- END Bars Chart Block -->
	</div>
	<div class="col-sm-6">
		<!-- Bars Chart Block -->
		<div class="block full">
			<!-- Bars Chart Title -->
			<div class="block-title">
				<h2><strong>Top</strong> Buyers</h2>
			</div>
			<!-- END Bars Chart Title -->
			<!-- Bars Chart Content -->
			<!-- Flot Charts (initialized in js/pages/compCharts.js), for more examples you can check out http://www.flotcharts.org/ -->
			<div id="chart-pie-buyer" class="chart"></div>
			<!--<div id="chart-pie" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>-->
			<!-- END Bars Chart Content -->
			<div class="col-sm-12">
				<center>
					<button class="btn btn-sm btn-primary" type="submit">
						Week
					</button>
					<button class="btn btn-sm btn-default" type="button">
						Month
					</button>
					<button class="btn btn-sm btn-primary" type="button">
						3 Months
					</button>
					<button class="btn btn-sm btn-primary" type="button">
						Years
					</button>
				</center>
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- END Bars Chart Block -->
	</div>
</div>
