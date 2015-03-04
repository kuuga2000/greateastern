<?php
/* @var $this EmailsentController */
/* @var $model GEEmailSent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geemail-sent-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'select_recipients'); ?>
		<?php echo $form->textField($model,'select_recipients',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'select_recipients'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'send_with_temperature'); ?>
		<?php echo $form->textField($model,'send_with_temperature',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'send_with_temperature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'send_with_status'); ?>
		<?php echo $form->textField($model,'send_with_status',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'send_with_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'send_with_coverage'); ?>
		<?php echo $form->textField($model,'send_with_coverage',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'send_with_coverage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'send_with_carrier'); ?>
		<?php echo $form->textField($model,'send_with_carrier',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'send_with_carrier'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'send_with_product'); ?>
		<?php echo $form->textField($model,'send_with_product',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'send_with_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'send_sample_to'); ?>
		<?php echo $form->textField($model,'send_sample_to',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'send_sample_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'template_id'); ?>
		<?php echo $form->textField($model,'template_id'); ?>
		<?php echo $form->error($model,'template_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_name'); ?>
		<?php echo $form->textField($model,'from_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'from_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_subject_line'); ?>
		<?php echo $form->textField($model,'email_subject_line',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'email_subject_line'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_email_address'); ?>
		<?php echo $form->textField($model,'from_email_address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'from_email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content_email'); ?>
		<?php echo $form->textArea($model,'content_email',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'content_email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->