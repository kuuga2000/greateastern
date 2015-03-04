<?php
$this -> avoidDoubleLoadJs();
/* @var $this StatusController */
/* @var $model GEStatus */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="block">
		<div class="block-title">
			<h2><strong><?php echo $title;?></strong></h2>
		</div>
		<div class="form">
			<?php $form = $this -> beginWidget('CActiveForm', array('id' => 'gestatus-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation' => true, ));
			?>

			<p class="note">
				Fields with <span class="required">*</span> are required.
			</p>
			<?php echo $form -> errorSummary($model);?>

			<div class="form-group">
				<div class="col-md-5" style="padding-left: 0px;">
					<?php echo $form -> labelEx($model, 'description');?>
					<?php echo $form -> textField($model, 'description', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'description');?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<?php echo CHtml::Button($model -> isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-primary', 'id' => 'save'));?>
				<?php echo CHtml::Button('Cancel', array('class' => 'btn btn-danger', "data-dismiss" => "modal"));?>
			</div>
			<?php $this -> endWidget();?>
		</div><!-- form -->
	</div>
</div>
<script>
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
					
					 
				}else{
					if(response.GEStatus_description){
						$("#GEStatus_description.form-control").addClass('error');
						$("#GEStatus_description_em_").html(response.GEStatus_description).show();
					}else{
						$("#GEStatus_description").removeClass('error');
						$("#GEStatus_description_em_").hide();
					}
				}
				$("#save").attr({
					'value':'<?php echo $model->isNewRecord ? 'Create' : 'Save';?>',
					'disabled':false,
				});
			},'json');
	});
</script>