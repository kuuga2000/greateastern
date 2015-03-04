<?php $this->avoidDoubleLoadJs();
/* @var $this AgentsController */
/* @var $model GEAgent */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="block">
		<div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2>
            <h2 style="float: right;">
				<strong>
					<i <?php echo $model->is_active==0 ? 'style="color:red;" class="fa fa-times"':'style="color:green;" class="fa fa-check"';?>></i> <?php echo $model->is_active==0 ? "Suspended" : "Active";?><?php //echo $model->getAttributeLabel('is_active'); ?>
					</strong>
			</h2>
        </div>
<div class="form">
	<div class="form-group">
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo CHtml::activeLabel($model,'first_name'); ?>
			<span class="form-control"><?php echo $model->first_name;?></span>
		</div>
		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'last_name'); ?>
			<span class="form-control"><?php echo $model->last_name;?></span>
		</div>
		 
		<div class="clearfix"></div>
	</div>
	<div class="form-group">
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo CHtml::activeLabel($model,'phone'); ?>
			<span class="form-control"><?php echo $model->phone;?></span>
		</div>
	
		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'cell'); ?>
			<span class="form-control"><?php echo $model->cell;?></span>
		</div>
	
		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'fax_number'); ?>
			<span class="form-control"><?php echo $model->fax_number;?></span>
		</div>
	
		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'email'); ?>
			<span class="form-control"><?php echo $model->email;?></span>
		</div>
		<div class="clearfix"></div>
	</div>
	<fieldset>
	<div class="form-group">
		<div class="row">
			<?php echo CHtml::activeLabel($model,'address'); ?>
			<span class="form-control"><?php echo $model->address;?></span>
		</div>
		
		<div class="col-md-3" style="padding-left: 0px;">
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
	<div class="form-group">
		<div class="col-md-3" style="padding-left:0px;">
			<?php echo CHtml::activeLabel($model,'date_of_birth'); ?>
			<span class="form-control"><?php echo $model->date_of_birth;?></span>
			 
		</div>
		<div class="col-md-3" style="padding-left:0px;">
			<?php echo CHtml::activeLabel($model,'date_of_birth'); ?>
			<span class="form-control"><?php echo $model->display_gender;?></span>
			 
		</div>
		<div class="clearfix"></div>
	</div>
	<fieldset>
		<div class="form-group">
		<div class="col-md-3" style="padding-left:0px;">
			<?php echo CHtml::activeLabel($model,'username'); ?>
			<span class="form-control"><?php echo $model->username;?></span>
			 
		</div>

		<div class="col-md-3">
			<?php echo CHtml::activeLabel($model,'password'); ?>
			<span class="form-control">*****************</span>	 
		</div>
		</div>
	</fieldset>
	
 

	 
 

</div><!-- form -->
</div>
</div>
 