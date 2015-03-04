<?php
/* @var $this AgentsController */
/* @var $model GEAgent */
/* @var $form CActiveForm */
?>

<div class="clearfix"></div>
<br>
<br>
<div class="wide form">
	<?php $form = $this -> beginWidget('CActiveForm', array('action' => Yii::app() -> createUrl($this -> route), 'method' => 'get','id'=>'form-search' ));?>

	<div class="form-group">
		<div class="col-md-2" style="padding-top: 10px;">
			<?php echo $form->checkBox($model,'is_active',array('size'=>60,'maxlength'=>100,'class'=>'pull-left','style'=>'margin-right:15px;','checked'=>"checked")); ?>
			Active
		</div>
		<div class="col-md-1">
			<?php echo $form -> textField($model, 'id', array('class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('id')));?>
		</div>
		<div class="col-md-3">
			<?php echo $form -> textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => 'Name'));?>
		</div>
		<div class="col-md-3">
			<?php echo $form -> textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => $model -> getAttributeLabel('email')));?>
		</div>
		<div class="col-md-3">
			<?php echo $form -> textField($model, 'cell', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control', 'placeholder' => 'Mobile'));?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="form-group">
		<div class="col-md-3">
			<?php echo $form -> dropDownList($model, 'country_id',CHtml::listData(GECountry::model()->findAll(array('order'=>'name ASC')),'id','name'),array('empty'=>'All Country','class'=>'form-control'));?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::submitButton('Filter', array('class' => 'btn btn-md btn-success'));?>
		</div>
		<div class="col-md-1">
			<?php echo CHtml::button('Reset Filter', array('class' => 'btn btn-md reset-search btn-primary'));?>
		</div>
	</div>
	<?php $this -> endWidget();?>

	<div class="clearfix"></div>
</div><!-- search-form -->