 
<?php
/* @var $this LeadsController */
/* @var $model GELead */
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
		<div class="col-md-2" style="padding-top: 10px;">
			<?php echo $form->checkBox($model,'is_active',array('size'=>60,'maxlength'=>100,'class'=>'pull-left','style'=>'margin-right:15px;','checked'=>"checked")); ?>
			Active
		</div>
		<div class="col-md-1">
			<?php echo $form->textField($model,'id',array('class'=>'form-control','placeholder'=>$model->getAttributeLabel('id'))); ?>
		</div>
		<div class="col-md-3">			 
			<?php echo $form->textField($model,'lead_name',array('size'=>60,'maxlength'=>500,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('lead_name'))); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->textField($model,'lead_email',array('size'=>60,'maxlength'=>70,'class'=>'form-control','placeholder'=>$model->getAttributeLabel('lead_email'))); ?>
		</div>
		<div class="col-md-2">
			<?php echo $form->dropDownList($model,'temperature_id',
				CHtml::listData(GETemperature::model()->findAll(array('order'=>'id ASC')),'id','temperature')
			,array('class'=>'form-control','empty'=>$model->getAttributeLabel('temperature'))); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="form-group">
		<div class="col-md-3">
			 
			<?php echo $form->dropDownList($model,'coverage_id',CHtml::listData(GECoverage::model()->findAll(),'id','coverage_name'),array('empty'=>'All Coverages','class'=>'form-control')); ?>
		</div>
		<div class="col-md-3">
			 
			<?php echo $form->dropDownList($model,'product_id',CHtml::listData(GEProduct::model()->findAll(),'id','product_name'),array('empty'=>'All Products','class'=>'form-control')); ?>
		</div>
		<div class="col-md-3">
		 
		<?php echo $form->dropDownList($model,'status_id',CHtml::listData(GEStatus::model()->findAll(),'id','description'),array('empty'=>'All Status','class'=>'form-control')); ?>
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
 