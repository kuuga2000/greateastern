<?php
/* @var $this EmailsentController */
/* @var $model GEEmailSent */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'select_recipients'); ?>
		<?php echo $form->textField($model,'select_recipients',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_with_temperature'); ?>
		<?php echo $form->textField($model,'send_with_temperature',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_with_status'); ?>
		<?php echo $form->textField($model,'send_with_status',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_with_coverage'); ?>
		<?php echo $form->textField($model,'send_with_coverage',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_with_carrier'); ?>
		<?php echo $form->textField($model,'send_with_carrier',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_with_product'); ?>
		<?php echo $form->textField($model,'send_with_product',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_sample_to'); ?>
		<?php echo $form->textField($model,'send_sample_to',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'template_id'); ?>
		<?php echo $form->textField($model,'template_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_name'); ?>
		<?php echo $form->textField($model,'from_name',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_subject_line'); ?>
		<?php echo $form->textField($model,'email_subject_line',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_email_address'); ?>
		<?php echo $form->textField($model,'from_email_address',array('size'=>60,'maxlength'=>500)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'content_email'); ?>
		<?php echo $form->textArea($model,'content_email',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->