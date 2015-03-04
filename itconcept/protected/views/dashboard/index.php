<!-- Mini Top Stats Row -->
<div class="row">
	<div class="col-sm-6 col-lg-6">
		<!-- Widget -->
		<a href="<?php echo $this->baseUrl();?>/products/admin" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="gi gi-wallet"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong>&nbsp;</strong>
			<br>
			<small>Product Management</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<div class="col-sm-6 col-lg-6">
		<!-- Widget -->
		<a href="<?php echo $this->baseUrl();?>/config" class="widget widget-hover-effect1">
		<div class="widget-simple">
			<div class="widget-icon pull-left themed-background animation-fadeIn">
				<i class="fa fa fa-wrench"></i>
			</div>
			<h3 class="widget-content text-right animation-pullDown"><strong>&nbsp;</strong>
			<br>
			<small>General Configuration</small></h3>
		</div> </a>
		<!-- END Widget -->
	</div>
	<!---->
</div>
<!-- END Mini Top Stats Row -->
<!-- Classic and Bars Chart -->
<?php $this->renderPartial('/dashboard/recent-agents',array('model'=>$modelAgent));?>
<?php //$this->renderPartial('/dashboard/recent-clients');?>
