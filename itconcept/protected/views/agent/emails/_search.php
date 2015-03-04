<?php
/* @var $this EmailtemplatesController */
/* @var $model GEEmailTemplate */
/* @var $form CActiveForm */
?>

<div class="clearfix"></div>
<br><br>
<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	'id'=>'form-search',
)); ?>
	<div class="form-group">
		
		<div class="col-md-1" style="padding-left: 0px !important;">
			<?php echo $form->textField($model,'id',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('id'))); ?>
		</div>
	
		<div class="col-md-3">
			<?php echo $form->textField($model,'template_name',array('size'=>60,'maxlength'=>500,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('template_name'))); ?>
		</div>
	
		<div class="col-md-3">
			<?php echo $form->textField($model,'email_subject_line',array('size'=>60,'maxlength'=>500,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('email_subject_line'))); ?>
		</div>
	
		<div class="col-md-1">
			<?php echo CHtml::submitButton('Filter',array('class'=>'btn btn-md btn-success')); ?>
		</div>
		
		<div class="col-md-1">
			<?php echo CHtml::button('Reset Filter',array('class'=>'btn btn-md reset-search btn-primary')); ?>
		</div>
		
		<div class="clearfix"></div>
		
	</div>

<?php $this->endWidget(); ?>

<div class="clearfix"></div>
</div><!-- search-form -->