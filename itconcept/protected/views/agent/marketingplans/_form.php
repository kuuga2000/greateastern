<?php
$this -> avoidDoubleLoadJs();
/* @var $this MarketingplansController */
/* @var $model GEEmailMarketing */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="block">
		<div class="block-title">
			<h2><i class="fa fa-envelope"></i> &nbsp; &nbsp; <strong><?php echo $title;?></strong></h2>
		</div>
		<div class="form">
			<?php $form = $this -> beginWidget('CActiveForm', array('id' => $modelName . '-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// There is a call to performAjaxValidation() commented in generated controller code.
			// See class documentation of CActiveForm for details on this.
				'enableAjaxValidation' => true, ));
			?>

			<p class="note">
				Fields with <span class="required">*</span> are required.
				<?php echo $form->labelEx($model,'is_active',array('class'=>'pull-right')); ?>
				<?php echo $form->checkBox($model,'is_active',array('size'=>60,'maxlength'=>100,'class'=>'pull-right','style'=>'margin-right:15px;')); ?>
			</p>
			<?php echo $form -> errorSummary($model);?>
			<div class="form-group">
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'marketing_plan_name');?>
					<?php echo $form -> textField($model, 'marketing_plan_name', array('class' => 'form-control'));?>
					<?php echo $form -> error($model, 'marketing_plan_name');?>
				</div>
				<div class="col-md-6">
					<?php $Selects = explode(',',$model->select_recipients);?>
					<?php echo $form -> labelEx($model, 'select_recipients <span class="required">*</span>');?>
					<?php echo $form -> checkBox($model, 'recipients', array('name' => "GEEmailMarketing[recipients][]", 'value' => 'leads','checked'=>in_array('leads',$Selects)?'true':''));?>
					Leads
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<?php echo $form -> checkBox($model, 'recipients', array('name' => "GEEmailMarketing[recipients][]", 'value' => 'clients','checked'=>in_array('clients',$Selects)?'true':''));?>
					Clients
					<div style="display:none" id="GEEmailMarketing_recipients_em_" class="errorMessage"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'send_with_status');?>
					<?php echo $form -> dropDownList($model, 'send_with_status', CHtml::listData(GEStatus::model() -> findAll(array('order' => 'id ASC')), 'id', 'description'), array('empty' => 'Select Status', 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_with_status');?>
				</div>
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'send_with_temperature');?>
					<?php echo $form -> dropDownList($model, 'send_with_temperature', CHtml::listData(GETemperature::model() -> findAll(array('order' => 'id ASC')), 'id', 'temperature'), array('empty' => 'Select Temperature', 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_with_temperature');?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'send_with_product');?>
					<?php echo $form -> dropDownList($model, 'send_with_product', CHtml::listData(GEProduct::model() -> findAll(array('order' => 'product_name ASC')), 'id', 'product_name'), array('empty' => 'Select Product', 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_with_product');?>
				</div>
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'send_with_coverage');?>
					<?php echo $form -> dropDownList($model, 'send_with_coverage', CHtml::listData(GECoverage::model() -> findAll(array('order' => 'id ASC')), 'id', 'coverage_name'), array('empty' => 'Select Coverage', 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_with_coverage');?>
				</div>
				<div class="clearfix"></div>
			</div>
			 
			<div class="form-group">
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'template_id');?>
					<?php echo $form -> dropDownList($model, 'template_id', CHtml::listData(GEEmailTemplate::model() -> findAll(), 'id', 'template_name'), array('empty' => 'Template Email', 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'template_id');?>
				</div>
				<div class="col-md-2">
					<?php echo $form -> labelEx($model, 'send_after');?>
					<?php echo $form -> textField($model, 'send_after', array('class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_after');?>
				</div>
				<div class="col-md-2">
					<?php echo $form -> labelEx($model, 'time_name');?>
					<?php echo $form -> dropDownList($model, 'time_name', $model -> times_, array('class' => 'form-control'));?>
					<?php echo $form -> error($model, 'time_name');?>
				</div>
				<div class="col-md-2" style="padding-top:27px;">
					Example : 11 Minutes
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<?php echo CHtml::Button($model -> isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-success', 'id' => 'save'));?>
					&nbsp;
					<?php echo CHtml::Button('Cancel', array('class' => 'btn btn-danger', "data-dismiss" => "modal"));?>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php $this -> endWidget();?>
		</div><!-- form -->
	</div>
</div>
<script>
$(document).ready(function(){
	$("#save").click(function(){
		$("#save").attr({
			'value':'<?php echo $model -> isNewRecord ? 'Creating...' : 'Saving...';?>',
			'disabled':true,
		});
		//GEEmailTemplate[email_template]
		var DATA = $("#<?php echo $modelName?>-form").serialize();
		$.post($("#<?php echo $modelName?>-form").attr("action"),DATA,function(response){
			if(response.success==true){
				$(".errorMessage").hide();
				$(".error").removeClass('error');
				$(".modal,.modal-backdrop").hide();
				window.location.reload(true);
				/*
				$('#php echo $modelName?>-grid').yiiGridView('update', {
					data: $(this).serialize()
				});*/
				 
			}else{
				if(response.GEEmailMarketing_marketing_plan_name){
					$("#GEEmailMarketing_marketing_plan_name.form-control").addClass('error');
					$("#GEEmailMarketing_marketing_plan_name_em_").html(response.GEEmailMarketing_marketing_plan_name).show();
				}else{
					$("#GEEmailMarketing_marketing_plan_name.form-control").removeClass('error');
					$("#GEEmailMarketing_marketing_plan_name_em_").hide();
				}
				
				if(response.GEEmailMarketing_select_recipients){
					$("#GEEmailMarketing_select_recipients.form-control").addClass('error');
					$("#GEEmailMarketing_recipients_em_").html(response.GEEmailMarketing_select_recipients).show();
				}else{
					$("#GEEmailMarketing_select_recipients.form-control").removeClass('error');
					$("#GEEmailMarketing_recipients_em_").hide();
				}
				
				if(response.GEEmailMarketing_send_after){
					$("#GEEmailMarketing_send_after.form-control").addClass('error');
					$("#GEEmailMarketing_send_after_em_").html(response.GEEmailMarketing_send_after).show();
				}else{
					$("#GEEmailMarketing_send_after.form-control").removeClass('error');
					$("#GEEmailMarketing_send_after_em_").hide();
				}
				
				if(response.GEEmailMarketing_time_name){
					$("#GEEmailMarketing_time_name.form-control").addClass('error');
					$("#GEEmailMarketing_time_name_em_").html(response.GEEmailMarketing_time_name).show();
				}else{
					$("#GEEmailMarketing_time_name.form-control").removeClass('error');
					$("#GEEmailMarketing_time_name_em_").hide();
				}
				
				if(response.GEEmailMarketing_time_name){
					$("#GEEmailMarketing_time_name.form-control").addClass('error');
					$("#GEEmailMarketing_time_name_em_").html(response.GEEmailMarketing_time_name).show();
				}else{
					$("#GEEmailMarketing_time_name.form-control").removeClass('error');
					$("#GEEmailMarketing_time_name_em_").hide();
				}
				if(response.GEEmailMarketing_agent_id){
					$(".errorSummary ul li").html(response.GEEmailMarketing_agent_id);
					$(".errorSummary").show();
				}else{
					$(".errorSummary").hide();
					$(".errorSummary ul li").html('');
				}
				
				
			}
			$("#save").attr({
				'value':'<?php echo $model -> isNewRecord ? 'Create' : 'Save';?>',
				'disabled':false,
			});
		},'json');
		
	});
});
</script>