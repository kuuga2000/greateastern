<?php
$this->avoidDoubleLoadJs();
/* @var $this EmailtemplatesController */
/* @var $model GEEmailTemplate */
/* @var $form CActiveForm */
?>

<div class="row">
	<div class="block">
		<div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2>
        </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>$modelName.'-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'template_name'); ?>
			<?php echo $form->textField($model,'template_name',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'template_name'); ?>
		</div>
	
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'email_subject_line'); ?>
			<?php echo $form->textField($model,'email_subject_line',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email_subject_line'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'from_name'); ?>
			<?php echo $form->textField($model,'from_name',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'from_name'); ?>
		</div>
	
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'from_email_address'); ?>
			<?php echo $form->textField($model,'from_email_address',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'from_email_address'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'bcc_yourself'); ?>
			<?php echo $form->textField($model,'bcc_yourself',array('size'=>60,'maxlength'=>500,'class'=>'form-control','placeholder'=>'Send a copy of email to yourself')); ?>
			<?php echo $form->error($model,'bcc_yourself'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'email_template'); ?>
			<?php echo $form->textArea($model,'email_template',array('id'=>'content','rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email_template'); ?>
		</div>
		<div class="clearfix"></div>
	</div>

	<div class="form-group">
		<div class="col-md-12">
			<?php echo CHtml::Button($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary','id'=>'save')); ?>
			 &nbsp; 
			<?php echo CHtml::Button('Cancel',array('class'=>'btn btn-danger',"data-dismiss"=>"modal")); ?>
		</div>
		<div class="clearfix"></div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>

</div>
<?php $this->renderPartial("_var");?>
<script>


$(document).ready(function(){
	$("#save").click(function(){
		$("#save").attr({
			'value':'<?php echo $model->isNewRecord ? 'Creating...' : 'Saving...';?>',
			'disabled':true,
		});
		var template = CKEDITOR.instances['content'].getData();
		//GEEmailTemplate[email_template]
		var DATA = $("#<?php echo $modelName?>-form").serialize()+'&GEEmailTemplate%5Bemail_template%5D='+encodeURIComponent(template);
		$.post($("#<?php echo $modelName?>-form").attr("action"),DATA,function(response){
			if(response.success==true){
				$(".errorMessage").hide();
				$(".error").removeClass('error');
				//$(".modal,.modal-backdrop").hide();
				$('#myModal').modal('hide');
				
				$('#<?php echo $modelName?>-grid').yiiGridView('update', {
					data: $(this).serialize()
				});
				 
			}else{
				if(response.GELead_lead_name){
					$("#GELead_lead_name").addClass('error');
					$("#GELead_lead_name_em_").html(response.GELead_lead_name).show();
				}else{
					$("#GELead_lead_name").removeClass('error');
					$("#GELead_lead_name_em_").hide();
				}
				
			}
			$("#save").attr({
				'value':'<?php echo $model->isNewRecord ? 'Create' : 'Save';?>',
				'disabled':false,
			});
		},'json');
		
	});
	CKEDITOR.replace( 'content', {
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