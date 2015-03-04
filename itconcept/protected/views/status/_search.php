<?php
/* @var $this StatusController */
/* @var $model GEStatus */
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
		<div class="col-md-1">			 
			<?php echo $form->textField($model,'id',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('id'))); ?>
		</div>
		<div class="col-md-6">			 
			<?php echo $form->textField($model,'description',array('size'=>50,'maxlength'=>50,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('description'))); ?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::submitButton('Filter',array('class'=>'btn btn-md btn-success')); ?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::button('Reset Filter',array('class'=>'btn btn-md reset-search btn-primary')); ?>
		</div>
	</div>

	

<?php $this->endWidget(); ?>

<div class="clearfix"></div>
</div><!-- search-form -->