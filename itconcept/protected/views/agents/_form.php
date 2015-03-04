<?php $this->avoidDoubleLoadJs();
/* @var $this AgentsController */
/* @var $model GEAgent */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="block">
		<div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2>
        </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geagent-form',
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
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo $form->labelEx($model,'first_name'); ?>
			<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'first_name'); ?>
		</div>
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo $form->labelEx($model,'last_name'); ?>
			<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'last_name'); ?>
		</div>
		<div class="col-md-3 pull-right" style="padding-left: 0px; padding-top: 28px;">
			<?php echo $form->labelEx($model,'is_active',array('class'=>'pull-right')); ?>
			<?php echo $form->checkBox($model,'is_active',array('size'=>60,'maxlength'=>100,'class'=>'pull-right','style'=>'margin-right:15px;')); ?>
			<?php echo $form->error($model,'is_active'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="form-group">
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo $form->labelEx($model,'phone'); ?>
			<?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'phone'); ?>
		</div>
	
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'cell'); ?>
			<?php echo $form->textField($model,'cell',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'cell'); ?>
		</div>
	
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'fax_number'); ?>
			<?php echo $form->textField($model,'fax_number',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'fax_number'); ?>
		</div>
	
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'email'); ?>
			<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'email'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<fieldset>
	<div class="form-group">
		<div class="row">
			<?php echo $form->labelEx($model,'address'); ?>
			<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'address'); ?>
		</div>
		
		<div class="col-md-3" style="padding-left: 0px;">
			<?php echo $form->labelEx($model,'city'); ?>
			<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'city'); ?>
		</div>
	
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'country_id'); ?>
			<?php echo $form->dropDownList($model,'country_id',CHtml::listData(GECountry::model()->findAll(array('order'=>'name ASC')),'id','name'),array('empty'=>'--Select--','class'=>'form-control')); ?>
			<?php echo $form->error($model,'country_id'); ?>
		</div>
	
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'zip_code'); ?>
			<?php echo $form->textField($model,'zip_code',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'zip_code'); ?>
		</div>
	</div>
	</fieldset>
	<div class="form-group">
		<div class="col-md-3" style="padding-left:0px;">
			<?php echo $form->labelEx($model,'date_of_birth'); ?>
			<?php echo $form->textField($model,'date_of_birth',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'date_of_birth'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'gender'); ?>
			<?php echo $form->dropDownList($model,'gender',array('0'=>'Female','1'=>'Male'),array('empty'=>'--Select--','class'=>'form-control')); ?>
			<?php echo $form->error($model,'gender'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	<fieldset>
		<div class="form-group">
		<div class="col-md-3" style="padding-left:0px;">
			<?php echo $form->labelEx($model,'username'); ?>
			<span class="form-control" id="GEAgent_username"><?php echo $model->username;?></span>
			<?php echo $form->error($model,'username'); ?>
		</div>

		<div class="col-md-3">
				<?php echo $form->labelEx($model,'password'); ?>
				
				<?php
					if($model->isNewRecord){ 
						echo '<div class="form-control">*****************</div>';
						//echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); 
					}else{
				?>
					<div class="form-control">*****************</div>
					
				<?php
					}
				?>
				<?php echo $form->error($model,'password'); ?>
		</div>
		</div>
	</fieldset>
	
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'user_type'); ?>
		<?php echo $form->textField($model,'user_type'); ?>
		<?php echo $form->error($model,'user_type'); ?>
	</div>
-->

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
		$("#GEAgent_email.form-control").keyup(function(){
			$("#GEAgent_username").html($(this).val());
		});
		$('#GEAgent_date_of_birth').datepicker({
			format:'dd/mm/yyyy', 
			todayHighlight: true 
		});
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
					if(response.GEAgent_first_name){
						$("#GEAgent_first_name").addClass('error');
						$("#GEAgent_first_name_em_").html(response.GEAgent_first_name).show();
					}else{
						$("#GELead_lead_name").removeClass('error');
						$("#GELead_lead_name_em_").hide();
					}
					
					if(response.GEAgent_last_name){
						$("#GEAgent_last_name").addClass('error');
						$("#GEAgent_last_name_em_").html(response.GEAgent_last_name).show();
					}else{
						$("#GEAgent_last_name").removeClass('error');
						$("#GEAgent_last_name_em_").hide();
					}
					
					if(response.GEAgent_phone){
						$("#GEAgent_phone").addClass('error');
						$("#GEAgent_phone_em_").html(response.GEAgent_phone).show();
					}else{
						$("#GEAgent_phone").removeClass('error');
						$("#GEAgent_phone_em_").hide();
					}
					
					if(response.GEAgent_cell){
						$("#GEAgent_cell").addClass('error');
						$("#GEAgent_cell_em_").html(response.GEAgent_cell).show();
					}else{
						$("#GEAgent_cell").removeClass('error');
						$("#GEAgent_cell_em_").hide();
					}
					
					if(response.GEAgent_fax_number){
						$("#GEAgent_fax_number").addClass('error');
						$("#GEAgent_fax_number_em_").html(response.GEAgent_fax_number).show();
					}else{
						$("#GEAgent_fax_number").removeClass('error');
						$("#GEAgent_fax_number_em_").hide();
					}
					
					if(response.GEAgent_email){
						$("#GEAgent_email").addClass('error');
						$("#GEAgent_email_em_").html(response.GEAgent_email).show();
					}else{
						$("#GEAgent_email").removeClass('error');
						$("#GEAgent_email_em_").hide();
					}
					
					if(response.GEAgent_address){
						$("#GEAgent_address").addClass('error');
						$("#GEAgent_address_em_").html(response.GEAgent_address).show();
					}else{
						$("#GEAgent_address").removeClass('error');
						$("#GEAgent_address_em_").hide();
					}
					
					if(response.GEAgent_city){
						$("#GEAgent_city").addClass('error');
						$("#GEAgent_city_em_").html(response.GEAgent_city).show();
					}else{
						$("#GEAgent_city").removeClass('error');
						$("#GEAgent_city_em_").hide();
					}
					
					if(response.GEAgent_country_id){
						$("#GEAgent_country_id").addClass('error');
						$("#GEAgent_country_id_em_").html(response.GEAgent_country_id).show();
					}else{
						$("#GEAgent_country_id").removeClass('error');
						$("#GEAgent_country_id_em_").hide();
					}
					
					if(response.GEAgent_zip_code){
						$("#GEAgent_zip_code").addClass('error');
						$("#GEAgent_zip_code_em_").html(response.GEAgent_zip_code).show();
					}else{
						$("#GEAgent_zip_code").removeClass('error');
						$("#GEAgent_zip_code_em_").hide();
					}
					
					if(response.GEAgent_date_of_birth){
						$("#GEAgent_date_of_birth").addClass('error');
						$("#GEAgent_date_of_birth_em_").html(response.GEAgent_date_of_birth).show();
					}else{
						$("#GEAgent_date_of_birth").removeClass('error');
						$("#GEAgent_date_of_birth_em_").hide();
					}
					
					if(response.GEAgent_username){
						$("#GEAgent_username").addClass('error');
						$("#GEAgent_username_em_").html(response.GEAgent_username).show();
					}else{
						$("#GEAgent_username").removeClass('error');
						$("#GEAgent_username_em_").hide();
					}
					
					if(response.GEAgent_password){
						$("#GEAgent_password").addClass('error');
						$("#GEAgent_password_em_").html(response.GEAgent_password).show();
					}else{
						$("#GEAgent_password").removeClass('error');
						$("#GEAgent_password_em_").hide();
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