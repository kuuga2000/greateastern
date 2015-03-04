<?php
$this -> avoidDoubleLoadJs();
/* @var $this LeadsController */
/* @var $model GELead */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="block">
		<div class="block-title">
			<h2><strong><?php echo $title;?></strong></h2>
			<?php /*<h2 style="float: right;">
				<strong>
					<i <?php echo $model->is_active==0 ? 'style="color:red;" class="fa fa-times"':'style="color:green;" class="fa fa-check"';?>></i> <?php echo $model->getAttributeLabel('is_active'); ?>
					</strong>
			</h2>
			*/?>
		</div>
		<div class="form">
			<fieldset>
				<div class="form-group">
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'coverage_id');?>
						<span class="form-control"><?php echo $model -> display_coverage;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'temperature_id');?>
						<span class="form-control"><?php echo $model -> display_temperature;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'status_id');?>
						<span class="form-control"><?php echo $model -> display_status;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'agent_id');?>
						<span class="form-control"><?php echo $model -> display_agent;?></span>
					</div>
				</div>
			</fieldset>
			<div class="clearfix"></div>
			<br>
			<div class="form-group">
				<?php echo CHtml::activeLabel($model, 'contact_name');?>
				<span class="form-control"><?php echo $model -> contact_name;?></span>
			</div>
			<div class="form-group">
				<?php echo CHtml::activeLabel($model, 'contact_email');?>
				<span class="form-control"><?php echo $model -> contact_email;?></span>
			</div>
			<div class="form-group">
				<?php echo CHtml::activeLabel($model, 'phone');?>
				<span class="form-control"><?php echo $model -> phone;?></span>
			</div>
			<div class="form-group">
				<?php echo CHtml::activeLabel($model, 'cell_phone');?>
				<span class="form-control"><?php echo $model -> cell_phone;?></span>
			</div>
			<fieldset>
				<div class="form-group">
					<div class="col-md-10">
						<?php echo CHtml::activeLabel($model, 'address');?>
						<span class="form-control"><?php echo $model -> address;?></span>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'city');?>
						<span class="form-control"><?php echo $model -> city;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'country_id');?>
						<span class="form-control"><?php echo $model -> display_country;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'zip_code');?>
						<span class="form-control"><?php echo $model -> zip_code;?></span>
					</div>
				</div>
			</fieldset>
			<fieldset>
				<legend>
					Personal
				</legend>
				<div class="form-group">
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'gender');?>
						<span class="form-control"><?php echo $model -> display_gender;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'height');?>
						<span class="form-control"><?php echo $model -> height;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model, 'weight');?>
						<span class="form-control"><?php echo $model -> weight;?></span>
					</div>
					<div class="col-md-3">
						<?php echo CHtml::activeLabel($model,'date_of_birth'); ?>
						<span class="form-control"><?php echo $model->display_date_of_birth;?></span>						 
					</div>
					<div class="clearfix"></div>
				</div>
			</fieldset>
		</div><!-- form -->
	</div>
</div>
