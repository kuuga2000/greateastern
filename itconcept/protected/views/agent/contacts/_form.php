<?php
$this->avoidDoubleLoadJs();
/* @var $this LeadsController */
/* @var $model GELead */
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
	//'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.
	<?php /*
	<?php echo $form->labelEx($model,'is_active',array('class'=>'pull-right')); ?>
	<?php echo $form->checkBox($model,'is_active',array('size'=>60,'maxlength'=>100,'class'=>'pull-right','style'=>'margin-right:15px;')); ?>
	*/?>
	</p>
	<?php echo $form->errorSummary($model); ?>
	
	<fieldset>
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'coverage_id'); ?>
				<?php echo $form->dropDownList($model,'coverage_id',CHtml::listData(GECoverage::model()->findAll(array('order'=>'coverage_name ASC')),'id','coverage_name'),array('empty'=>'--Select--','class'=>'form-control')); ?>
				<?php echo $form->error($model,'coverage_id'); ?>
			</div>
			
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'temperature_id'); ?>
				<?php echo $form->dropDownList($model,'temperature_id',CHtml::listData(GETemperature::model()->findAll(array('order'=>'id ASC')),'id','temperature'),array('empty'=>'--Select--','class'=>'form-control pro')); ?>
				<?php echo $form->error($model,'temperature_id'); ?>
			</div>
		
			<?php /*
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'status_id'); ?>
				<?php echo $form->dropDownList($model,'status_id',CHtml::listData(GEStatus::model()->findAll(array('order'=>'description ASC')),'id','description'),array('empty'=>'--Select--','class'=>'form-control')); ?>
				<?php echo $form->error($model,'status_id'); ?>
			</div>
			*/?>
		
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'agent_id'); ?>
				<span class="form-control"><?php echo Yii::app()->user->full_name;?></span>
				<?php //echo $form->textField($model,'agent_id',array('size'=>60,'maxlength'=>500,'class'=>'form-control','value'=>Yii::app()->user->id)); ?>
				<?php echo $form->error($model,'agent_id'); ?>
			</div>
			
		</div>
	</fieldset>
	<div class="clearfix"></div>
	<br>
	<div class="form-group">
		<?php echo $form->labelEx($model,'contact_name'); ?>
		<?php echo $form->textField($model,'contact_name',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'contact_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>60,'maxlength'=>70,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'contact_email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cell_phone'); ?>
		<?php echo $form->textField($model,'cell_phone',array('size'=>15,'maxlength'=>15,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'cell_phone'); ?>
	</div>
	<fieldset>
		
	
		<div class="form-group">
			<div class="col-md-10">
			<?php echo $form->labelEx($model,'address'); ?>
			<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
			<?php echo $form->error($model,'address'); ?>
			</div>
		</div>
	
		<div class="form-group">
			<div class="col-md-3">
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
				<?php echo $form->textField($model,'zip_code',array('class'=>'form-control','maxlength'=>5)); ?>
				<?php echo $form->error($model,'zip_code'); ?>
			</div>
		</div>
	</fieldset>
	<fieldset>
	<legend>Personal</legend>	
	<div class="form-group">
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'gender'); ?>
			<?php echo $form->dropDownList($model,'gender',array('0'=>'Female','1'=>'Male'),array('empty'=>'--Select--','class'=>'form-control')); ?>
			<?php echo $form->error($model,'gender'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'height'); ?>
			<?php echo $form->dropDownList($model,'height',CHtml::listData(GEHeight::model()->findAll(array('order'=>'height ASC')),'height','height'),array('empty'=>'--Select--','class'=>'form-control')); ?>
			<?php echo $form->error($model,'height'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'weight'); ?>
			<?php echo $form->textField($model,'weight',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'weight'); ?>
		</div>
		<div class="col-md-3">
			<?php echo $form->labelEx($model,'date_of_birth'); ?>
			<?php echo $form->textField($model,'date_of_birth',array('class'=>'form-control datepicker','value'=>!$model->isNewRecord ? $model->display_date_of_birth : '',)); ?>
			<?php echo $form->error($model,'date_of_birth'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	</fieldset>

	<div class="form-group">
		<?php echo CHtml::Button($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-primary','id'=>'save')); ?>
		 &nbsp; 
		<?php if(!$model->isNewRecord){?>
		<?php echo CHtml::Button($model->isNewRecord ? 'Save & Convert To Lead' : 'Save & Convert To Lead',array('name'=>'convert','class'=>'btn btn-success','id'=>'savenconvert')); ?>
		 &nbsp;
		<?php } ?>  
		<?php echo CHtml::Button('Cancel',array('class'=>'btn btn-danger',"data-dismiss"=>"modal")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
</div>
<script>
	$(function(){
		
		$('.datepicker').datepicker({ 
			format:'dd/mm/yyyy', 
			todayHighlight: true 
		});
		$("#save").click(function(){
			$("#save").attr({
				'value':'<?php echo $model->isNewRecord ? 'Creating...' : 'Saving...';?>',
				'disabled':true,
			});
			callUrlForm($("#<?php echo $modelName;?>-form").attr("action"));
		});
		$("#savenconvert").click(function(){
			$("#savenconvert").attr({
				'value':'Loading...',
				'disabled':true,
			});
			callUrlForm($("#<?php echo $modelName;?>-form").attr("action")+'?convert');
		});
		function callUrlForm(action){
			$.post(action,$("#<?php echo $modelName;?>-form").serialize(),function(response){
				if(response.success==true){
					$(".errorMessage").hide();
					$(".error").removeClass('error');
					//$(".modal,.modal-backdrop").hide();
					$('#myModal').modal('hide');
					
					$('#<?php echo $modelName?>-grid').yiiGridView('update', {
						data: $(this).serialize()
					});
					 
				}else{
					if(response.GEContact_contact_name){
						$("#GEContact_contact_name.form-control").addClass('error');
						$("#GEContact_contact_name_em_").html(response.GEContact_contact_name).show();
					}else{
						$("#GEContact_contact_name.form-control").removeClass('error');
						$("#GEContact_contact_name_em_").hide();
					}
					
					if(response.GEContact_contact_email){
						$("#GEContact_contact_email.form-control").addClass('error');
						$("#GEContact_contact_email_em_").html(response.GEContact_contact_email).show();
					}else{
						$("#GEContact_contact_email.form-control").removeClass('error');
						$("#GEContact_contact_email_em_").hide();
					}
					
					if(response.GEContact_phone){
						$("#GEContact_phone.form-control").addClass('error');
						$("#GEContact_phone_em_").html(response.GEContact_phone).show();
					}else{
						$("#GEContact_phone.form-control").removeClass('error');
						$("#GEContact_phone_em_").hide();
					}
					
					if(response.GEContact_cell_phone){
						$("#GEContact_cell_phone.form-control").addClass('error');
						$("#GEContact_cell_phone_em_").html(response.GEContact_cell_phone).show();
					}else{
						$("#GEContact_cell_phone.form-control").removeClass('error');
						$("#GEContact_cell_phone_em_").hide();
					}
					
					if(response.GEContact_address){
						$("#GEContact_address.form-control").addClass('error');
						$("#GEContact_address_em_").html(response.GEContact_address).show();
					}else{
						$("#GEContact_address.form-control").removeClass('error');
						$("#GEContact_address_em_").hide();
					}
					
					if(response.GEContact_city){
						$("#GEContact_city.form-control").addClass('error');
						$("#GEContact_city_em_").html(response.GEContact_city).show();
					}else{
						$("#GEContact_city.form-control").removeClass('error');
						$("#GEContact_city_em_").hide();
					}
					
					if(response.GEContact_country_id){
						$("#GEContact_country_id.form-control").addClass('error');
						$("#GEContact_country_id_em_").html(response.GEContact_country_id).show();
					}else{
						$("#GEContact_country_id.form-control").removeClass('error');
						$("#GEContact_country_id_em_").hide();
					}
					
					if(response.GEContact_zip_code){
						$("#GEContact_zip_code.form-control").addClass('error');
						$("#GEContact_zip_code_em_").html(response.GEContact_zip_code).show();
					}else{
						$("#GEContact_zip_code.form-control").removeClass('error');
						$("#GEContact_zip_code_em_").hide();
					}
					
					if(response.GEContact_gender){
						$("#GEContact_gender.form-control").addClass('error');
						$("#GEContact_gender_em_").html(response.GEContact_gender).show();
					}else{
						$("#GEContact_gender.form-control").removeClass('error');
						$("#GEContact_gender_em_").hide();
					}
					
					if(response.GEContact_status_id){
						$("#GEContact_status_id.form-control").addClass('error');
						$("#GEContact_status_id_em_").html(response.GEContact_status_id).show();
					}else{
						$("#GEContact_status_id.form-control").removeClass('error');
						$("#GEContact_status_id_em_").hide();
					}
					
					if(response.GEContact_agent_id){
						$("#GEContact_agent_id.form-control").addClass('error');
						$("#GEContact_agent_id_em_").html(response.GEContact_agent_id).show();
					}else{
						$("#GEContact_agent_id.form-control").removeClass('error');
						$("#GEContact_agent_id_em_").hide();
					}
					
					if(response.GEContact_date_of_birth){
						$("#GEContact_date_of_birth.form-control").addClass('error');
						$("#GEContact_date_of_birth_em_").html(response.GEContact_date_of_birth).show();
					}else{
						$("#GEContact_date_of_birth.form-control").removeClass('error');
						$("#GEContact_date_of_birth_em_").hide();
					}	
				}
				resetSaveButton();
				resetConvertButton();
			},'json');
		}
		
		function resetSaveButton(){
			$("#save").attr({
					'value':'<?php echo $model->isNewRecord ? 'Create' : 'Save';?>',
					'disabled':false,
				});
		}
		function resetConvertButton(){
			$("#savenconvert").attr({
				'value':'Save & Convert To Lead',
				'disabled':false,
			});
		}
		 
	});
	
</script>