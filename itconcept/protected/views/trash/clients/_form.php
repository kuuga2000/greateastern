<?php
/* @var $this ClientsController */
/* @var $model GEClient */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geclient-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'client_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cell_phone'); ?>
		<?php echo $form->textField($model,'cell_phone',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'cell_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city'); ?>
		<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->textField($model,'country_id'); ?>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code'); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender'); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id'); ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
		<?php echo $form->error($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agent_id'); ?>
		<?php echo $form->textField($model,'agent_id'); ?>
		<?php echo $form->error($model,'agent_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_number'); ?>
		<?php echo $form->textField($model,'policy_number'); ?>
		<?php echo $form->error($model,'policy_number'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'premium'); ?>
		<?php echo $form->textField($model,'premium'); ?>
		<?php echo $form->error($model,'premium'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'commission'); ?>
		<?php echo $form->textField($model,'commission'); ?>
		<?php echo $form->error($model,'commission'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'renewal'); ?>
		<?php echo $form->textField($model,'renewal'); ?>
		<?php echo $form->error($model,'renewal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bonus_commission'); ?>
		<?php echo $form->textField($model,'bonus_commission'); ?>
		<?php echo $form->error($model,'bonus_commission'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bonus_renewal'); ?>
		<?php echo $form->textField($model,'bonus_renewal'); ?>
		<?php echo $form->error($model,'bonus_renewal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'coverage_id'); ?>
		<?php echo $form->textField($model,'coverage_id'); ?>
		<?php echo $form->error($model,'coverage_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->