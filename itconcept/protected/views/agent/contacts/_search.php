<?php
/* @var $this ContactsController */
/* @var $model GEContact */
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
	 	<div class="col-md-3">
			<?php echo $form->textField($model,'contact_name',array('class'=>'form-control','size'=>60,'maxlength'=>500,'placeholder'=>$model->getAttributeLabel('contact_name'))); ?>
	 	</div>
	 	<div class="col-md-3">
			<?php echo $form->textField($model,'contact_email',array('class'=>'form-control','size'=>60,'maxlength'=>70,'placeholder'=>$model->getAttributeLabel('contact_email'))); ?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::submitButton('Filter',array('class'=>'btn btn-md btn-success')); ?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::button('Reset Filter',array('class'=>'btn btn-md reset-search btn-primary')); ?>
		</div>
	</div>
<?php $this->endWidget(); ?>
</div><!-- search-form -->