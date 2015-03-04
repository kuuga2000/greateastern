<?php
/* @var $this MarketingplansController */
/* @var $model GEEmailMarketing */
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
		<?php echo $form->label($model,'template_id'); ?>
		<?php echo $form->textField($model,'template_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'send_after'); ?>
		<?php echo $form->textField($model,'send_after'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_name'); ?>
		<?php echo $form->textField($model,'time_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->