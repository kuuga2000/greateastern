<?php
$this->avoidDoubleLoadJs();
/* @var $this LeadsController */
/* @var $model GELead */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="block">
		<div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2>
        </div>
<div class="form">
	
 

	 
	
	<fieldset>
		<div class="form-group">
			<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'coverage_id'); ?>
			<span class="form-control"><?php echo $model->display_coverage;?></span>
			</div>
			
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model,'product_id'); ?>
				<span class="form-control"><?php echo $model->display_product;?></span>
				 
			</div>
		
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model,'status_id'); ?>
				<span class="form-control"><?php echo $model->display_status;?></span>
				 
			</div>
		
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model,'agent_id'); ?>
				<span class="form-control"><?php echo $model->display_agent;?></span>
				 
			</div>
		</div>
	</fieldset>
	<div class="clearfix"></div>
	<br>
	<div class="form-group">
		<?php echo CHtml::activeLabel($model,'lead_name'); ?>
		<span class="form-control"><?php echo $model->lead_name;?></span>
		 
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabel($model,'lead_email'); ?>
		<span class="form-control"><?php echo $model->lead_email;?></span>
		 
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabel($model,'phone'); ?>
		<span class="form-control"><?php echo $model->phone;?></span>
		 
	</div>

	<div class="form-group">
		<?php echo CHtml::activeLabel($model,'cell_phone'); ?>
		<span class="form-control"><?php echo $model->cell_phone;?></span>
		 
	</div>
	<fieldset>
		
	
		<div class="form-group">
			<div class="col-md-10">
			<?php echo CHtml::activeLabel($model,'address'); ?>
			<span class="form-control"><?php echo $model->address;?></span>
			 
			</div>
		</div>
	
		<div class="form-group">
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model,'city'); ?>
				<span class="form-control"><?php echo $model->city;?></span>
				 
			</div>
	
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model,'country_id'); ?>
				<span class="form-control"><?php echo $model->display_country;?></span>
				 
			</div>
	
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model,'zip_code'); ?>
				<span class="form-control"><?php echo $model->zip_code;?></span>
				 
			</div>
		</div>
	</fieldset>
	<fieldset>
	<legend>Personal</legend>	
	<div class="form-group">
		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'gender'); ?>
			<span class="form-control"><?php echo $model->display_gender;?></span>
			 
		</div>
		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'height'); ?>
			<span class="form-control"><?php echo $model->height;?></span>
			 
		</div>
		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'weight'); ?>
			<span class="form-control"><?php echo $model->weight;?></span>
			 
		</div>
		<div class="clearfix"></div>
	</div>
	</fieldset>
	
	

	 

 

</div><!-- form -->
</div>
</div>
 