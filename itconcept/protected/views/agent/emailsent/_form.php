<?php
$this->avoidDoubleLoadJs();
/* @var $this EmailsentController */
/* @var $model GEEmailSent */
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
			</p>
			<?php echo $form -> errorSummary($model);?>
			<div class="form-group">
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'select_recipients <span class="required">*</span>');?> 
					<?php echo $form -> checkBox($model, 'recipients', array('name' => "GEEmailSent[recipients][]",'value'=>'leads'));?>
					Leads
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
					<?php echo $form -> checkBox($model, 'recipients', array('name' => "GEEmailSent[recipients][]",'value'=>'clients'));?>
					Clients 
					<div style="display:none" id="GEEmailSent_recipients_em_" class="errorMessage"></div>
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
					<?php echo $form -> labelEx($model, 'send_with_status');?>
					<?php echo $form -> dropDownList($model, 'send_with_status', CHtml::listData(GEStatus::model() -> findAll(array('order' => 'id ASC')), 'id', 'description'), array('empty' => 'Select Status', 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_with_status');?>
				</div>
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'send_with_coverage');?>
					<?php echo $form -> dropDownList($model, 'send_with_coverage', CHtml::listData(GECoverage::model() -> findAll(array('order' => 'id ASC')), 'id', 'coverage_name'), array('empty' => 'Select Coverage', 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_with_coverage');?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<?php /*<div class="col-md-6">
				 <?php //echo $form->labelEx($model,'send_with_carrier');
				 ?>
				 <?php //echo $form->textField($model,'send_with_carrier',array('size'=>60,'maxlength'=>500,'class'=>'form-control'));
				 ?>
				 <?php //echo $form->error($model,'send_with_carrier');
				 ?>
				 </div>
				 */
				?>
			<div class="col-md-6">
				<?php echo $form -> labelEx($model, 'send_with_product');?>
				<?php echo $form -> dropDownList($model, 'send_with_product',
					CHtml::listData(GEProduct::model()->findAll(array('order'=>'product_name ASC')),'id','product_name')
				,array('empty'=>'Select Product','class' => 'form-control'));?>
				<?php echo $form -> error($model, 'send_with_product');?>
			</div>
			<div class="col-md-6">
				<?php echo $form -> labelEx($model, 'template_id');?>
				<?php echo $form -> dropDownList($model, 'template_id', 
					CHtml::listData(GEEmailTemplate::model()->findAll(),'id','template_name'),
				array('empty'=>'Template Email','class' => 'form-control'));?>
				<?php echo $form -> error($model, 'template_id');?>
			</div>
			<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'send_sample_to');?>
					<?php echo $form -> textField($model, 'send_sample_to', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'send_sample_to');?>
				</div>
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'email_subject_line');?>
					<?php echo $form -> textField($model, 'email_subject_line', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'email_subject_line');?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'from_name');?>
					<?php echo $form -> textField($model, 'from_name', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'from_name');?>
				</div>
				<div class="col-md-6">
					<?php echo $form -> labelEx($model, 'from_email_address');?>
					<?php echo $form -> textField($model, 'from_email_address', array('size' => 60, 'maxlength' => 500, 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'from_email_address');?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<?php echo $form -> labelEx($model, 'content_email');?>
					<?php echo $form -> textArea($model, 'content_email', array('id'=>'content2','rows' => 6, 'cols' => 50, 'class' => 'form-control'));?>
					<?php echo $form -> error($model, 'content_email');?>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-md-12">
					<?php echo CHtml::Button('Send Email', array('class' => 'btn btn-success', 'id' => 'send'));?>
					 &nbsp; 
					<?php echo CHtml::Button('Cancel',array('class'=>'btn btn-danger',"data-dismiss"=>"modal")); ?>
				</div>
				<div class="clearfix"></div>
			</div>
			<?php $this -> endWidget();?>
		</div><!-- form -->
		
	</div>
</div>
<script>
$(document).ready(function(){
	$("#send").click(function(){
		$("#send").attr({
			'value':'Sending Email...',
			'disabled':true,
		});
		var content_email = CKEDITOR.instances['content2'].getData();
		//GEEmailTemplate[email_template]
		var DATA = $("#<?php echo $modelName?>-form").serialize()+'&GEEmailTemplate%5Bemail_template%5D='+encodeURIComponent(content_email);
		$.post($("#<?php echo $modelName?>-form").attr("action"),DATA,function(response){
			if(response.success==true){
				$(".errorMessage").hide();
				$(".error").removeClass('error');
				//$(".modal,.modal-backdrop").hide();
				//$('#myModal').modal('hide');
				
				$('#<?php echo $modelName?>-grid').yiiGridView('update', {
					data: $(this).serialize()
				});
				 
			}else{
				if(response.GEEmailSent_template_id){
					$("#GEEmailSent_template_id.form-control").addClass('error');
					$("#GEEmailSent_template_id_em_").html(response.GEEmailSent_template_id).show();
				}else{
					$("#GEEmailSent_template_id.form-control").removeClass('error');
					$("#GEEmailSent_template_id_em_").hide();
				}
				
				if(response.GEEmailSent_from_email_address){
					$("#GEEmailSent_from_email_address.form-control").addClass('error');
					$("#GEEmailSent_from_email_address_em_").html(response.GEEmailSent_from_email_address).show();
				}else{
					$("#GEEmailSent_from_email_address.form-control").removeClass('error');
					$("#GEEmailSent_from_email_address_em_").hide();
				}
				
				if(response.GEEmailSent_from_name){
					$("#GEEmailSent_from_name.form-control").addClass('error');
					$("#GEEmailSent_from_name_em_").html(response.GEEmailSent_from_name).show();
				}else{
					$("#GEEmailSent_from_name.form-control").removeClass('error');
					$("#GEEmailSent_from_name_em_").hide();
				}
				
				if(response.GEEmailSent_select_recipients){
					$("#GEEmailSent_select_recipients.form-control").addClass('error');
					$("#GEEmailSent_recipients_em_").html(response.GEEmailSent_select_recipients).show();
				}else{
					$("#GEEmailSent_select_recipients.form-control").removeClass('error');
					$("#GEEmailSent_recipients_em_").hide();
				}
				
			}
			$("#send").attr({
				'value':'Send Email',
				'disabled':false,
			});
		},'json');
		
	});
	CKEDITOR.replace( 'content2', {
		//enterMode : CKEDITOR.ENTER_DIV
		filebrowserBrowseUrl : '<?php echo $this->baseHref();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=files',
		filebrowserImageBrowseUrl : '<?php echo $this->baseHref();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=images',
		filebrowserFlashBrowseUrl : '<?php echo $this->baseHref();?>/ext/ckedifind/ckfinder/browse.php?opener=ckeditor&type=flash',
		filebrowserUploadUrl : '<?php echo $this->baseHref();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=files',
		filebrowserImageUploadUrl :  '<?php echo $this->baseHref();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=images',
		filebrowserFlashUploadUrl : '<?php echo $this->baseHref();?>/ext/ckedifind/ckfinder/upload.php?opener=ckeditor&type=flash',
	});
});
</script>