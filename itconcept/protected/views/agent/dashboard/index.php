<style>
	.paging_bootstrap{
		width: 100% !important;
	}
	table tbody tr td:last-child{
		width: 20% !important;
	}
</style>
<!-- Mini Top Stats Row -->
<div class="row">
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="<?php echo $this->baseUrlAgent(TRUE);?>/leads/admin" class="widget widget-hover-effect1" data-toggle="tooltip" title="" data-original-title="HOT LEADS">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="gi gi-wallet"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countHotLead());?></strong>
			<br>
			<small>HOT LEADS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="<?php echo $this->baseUrlAgent(TRUE);?>/leads/admin" class="widget widget-hover-effect1" data-toggle="tooltip" title="" data-original-title="WARM LEADS">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa-calculator"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countWarmLead());?></strong>
			<br>
			<small>WARM LEAD</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="<?php echo $this->baseUrlAgent(TRUE);?>/leads/admin" class="widget widget-hover-effect1" data-toggle="tooltip" title="" data-original-title="COOL LEADS">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa-calculator"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::countCoolLead());?></strong>
			<br>
			<small>COOL LEADS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-3">
		<!-- Widget -->
		<a href="<?php echo $this->baseUrlAgent(TRUE);?>/clients/admin" class="widget widget-hover-effect1" data-toggle="tooltip" title="" data-original-title="TOTAL CLIENTS">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa-calculator"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong><?php echo count(Tools::getAllDataClientByAgent());?></strong>
			<br>
			<small>TOTAL CLIENTS</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<!---->


</div>
<!-- END Mini Top Stats Row -->
<!-- Classic and Bars Chart -->
<?php $this->renderPartial('/agent/dashboard/recent-leads',array('modelLead'=>$modelLead));?>
<?php $this->renderPartial('/agent/dashboard/recent-clients',array('modelClient'=>$modelClient));?>
