<?php
/* @var $this ProductsController */
/* @var $model GEProduct */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geproduct-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'coverage_id'); ?>
		<?php echo $form->textField($model,'coverage_id'); ?>
		<?php echo $form->error($model,'coverage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'product_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'commission'); ?>
		<?php echo $form->textField($model,'commission',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'commission'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'renewal'); ?>
		<?php echo $form->textField($model,'renewal',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'renewal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->