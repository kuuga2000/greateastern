<?php
$this->avoidDoubleLoadJs();
/* @var $this ProductsController */
/* @var $model GEProduct */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="block">
		<div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2>
        </div>
 
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geproduct-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>TRUE,
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'coverage_id'); ?>
		<?php echo $form->dropDownList($model,'coverage_id',CHtml::listData(GECoverage::model()->findAll(),'id','coverage_name'),array('empty'=>'--Select--','class'=>'form-control')); ?>
		<?php echo $form->error($model,'coverage_id'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'product_name'); ?>
		<?php echo $form->textField($model,'product_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'product_name'); ?>
	</div>

	<div class="form-group">
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo $form->labelEx($model,'commission'); ?>
			<?php echo $form->textField($model,'commission',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'commission'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'renewal'); ?>
			<?php echo $form->textField($model,'renewal',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'renewal'); ?>
		</div>
		<div class="clearfix"></div>	
	</div>

	

	<div class="form-group">
		<?php echo CHtml::Button($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary','id'=>'save')); ?>
		<?php echo CHtml::Button('Cancel',array('class'=>'btn btn-danger',"data-dismiss"=>"modal")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
<script>
	$(function(){
		$("#save").click(function(){
			$("#save").attr({
				'value':'<?php echo $model->isNewRecord ? 'Creating...' : 'Saving...';?>',
				'disabled':true,
			});
			
			$.post($("#<?php echo $modelName;?>-form").attr("action"),$("#<?php echo $modelName;?>-form").serialize(),function(response){
				if(response.success==true){
					$(".errorMessage").hide();
					$(".error").removeClass('error');
					//$(".modal,.modal-backdrop").hide();
					$('#myModal').modal('hide');
						 
					$('#<?php echo $modelName?>-grid').yiiGridView('update', {
						data: $(this).serialize()
					});
					
					//window.location.reload(true);
					
					 
				}else{
					if(response.GEProduct_coverage_id){
						$("#GEProduct_coverage_id").addClass('error');
						$("#GEProduct_coverage_id_em_").html(response.GEProduct_coverage_id).show();
					}else{
						$("#GEProduct_coverage_id").removeClass('error');
						$("#GEProduct_coverage_id_em_").hide();
					}
					if(response.GEProduct_product_name){
						$("#GEProduct_product_name").addClass('error');
						$("#GEProduct_product_name_em_").html(response.GEProduct_product_name).show();
					}else{
						$("#GEProduct_product_name").removeClass('error');
						$("#GEProduct_product_name_em_").hide();
					}
					
					if(response.GEProduct_commission){
						$("#GEProduct_commission").addClass('error');
						$("#GEProduct_commission_em_").html(response.GEProduct_commission).show();
					}else{
						$("#GEProduct_commission").removeClass('error');
						$("#GEProduct_commission_em_").hide();
					}
					
					if(response.GEProduct_renewal){
						$("#GEProduct_renewal").addClass('error');
						$("#GEProduct_renewal_em_").html(response.GEProduct_renewal).show();
					}else{
						$("#GEProduct_renewal").removeClass('error');
						$("#GEProduct_renewal_em_").hide();
					}
				}
				$("#save").attr({
					'value':'<?php echo $model->isNewRecord ? 'Create' : 'Save';?>',
					'disabled':false,
				});
			},'json');
			
		});
	});
</script>