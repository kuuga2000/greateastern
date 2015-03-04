<?php
/* @var $this EmailtemplatesController */
/* @var $model GEEmailTemplate */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geemail-template-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'template_name'); ?>
		<?php echo $form->textField($model,'template_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'template_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_subject_line'); ?>
		<?php echo $form->textField($model,'email_subject_line',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'email_subject_line'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_name'); ?>
		<?php echo $form->textField($model,'from_name',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'from_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_email_address'); ?>
		<?php echo $form->textField($model,'from_email_address',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'from_email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bcc_yourself'); ?>
		<?php echo $form->textField($model,'bcc_yourself',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'bcc_yourself'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_template'); ?>
		<?php echo $form->textArea($model,'email_template',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'email_template'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->