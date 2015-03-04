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
	'id'=>'gelead-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	
	<fieldset>
		<div class="form-group">
			<div class="col-md-3">
			<?php echo $form->labelEx($model,'coverage_id'); ?>
			<?php echo $form->dropDownList($model,'coverage_id',CHtml::listData(GECoverage::model()->findAll(array('order'=>'coverage_name ASC')),'id','coverage_name'),array('empty'=>'--Select--','class'=>'form-control')); ?>
			<?php echo $form->error($model,'coverage_id'); ?>
			</div>
			
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'product_id'); ?>
				<?php echo $form->dropDownList($model,'product_id',CHtml::listData(GEProduct::model()->findAll(array('order'=>'product_name ASC')),'id','product_name'),array('empty'=>'--Select--','class'=>'form-control')); ?>
				<?php echo $form->error($model,'product_id'); ?>
			</div>
		
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'status_id'); ?>
				<?php echo $form->dropDownList($model,'status_id',CHtml::listData(GEStatus::model()->findAll(array('order'=>'description ASC')),'id','description'),array('empty'=>'--Select--','class'=>'form-control')); ?>
				<?php echo $form->error($model,'status_id'); ?>
			</div>
		
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'agent_id'); ?>
				<?php echo $form->dropDownList($model,'agent_id',CHtml::listData(GEAgent::model()->findAll(array('order'=>'first_name ASC')),'id','full_name'),array('empty'=>'--Select--','class'=>'form-control')); ?>
				<?php echo $form->error($model,'agent_id'); ?>
			</div>
		</div>
	</fieldset>
	<div class="clearfix"></div>
	<br>
	<div class="form-group">
		<?php echo $form->labelEx($model,'lead_name'); ?>
		<?php echo $form->textField($model,'lead_name',array('size'=>60,'maxlength'=>500,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'lead_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'lead_email'); ?>
		<?php echo $form->textField($model,'lead_email',array('size'=>60,'maxlength'=>70,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'lead_email'); ?>
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
			<?php echo $form->textField($model,'date_of_birth',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'date_of_birth'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	</fieldset>
	
	

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
			
			$.post($("#gelead-form").attr("action"),$("#gelead-form").serialize(),function(response){
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
					
					if(response.GELead_lead_email){
						$("#GELead_lead_email").addClass('error');
						$("#GELead_lead_email_em_").html(response.GELead_lead_email).show();
					}else{
						$("#GELead_lead_email").removeClass('error');
						$("#GELead_lead_email_em_").hide();
					}
					
					if(response.GELead_phone){
						$("#GELead_phone").addClass('error');
						$("#GELead_phone_em_").html(response.GELead_phone).show();
					}else{
						$("#GELead_phone").removeClass('error');
						$("#GELead_phone_em_").hide();
					}
					
					if(response.GELead_cell_phone){
						$("#GELead_cell_phone").addClass('error');
						$("#GELead_cell_phone_em_").html(response.GELead_cell_phone).show();
					}else{
						$("#GELead_cell_phone").removeClass('error');
						$("#GELead_cell_phone_em_").hide();
					}
					
					if(response.GELead_address){
						$("#GELead_address").addClass('error');
						$("#GELead_address_em_").html(response.GELead_address).show();
					}else{
						$("#GELead_address").removeClass('error');
						$("#GELead_address_em_").hide();
					}
					
					if(response.GELead_city){
						$("#GELead_city").addClass('error');
						$("#GELead_city_em_").html(response.GELead_city).show();
					}else{
						$("#GELead_city").removeClass('error');
						$("#GELead_city_em_").hide();
					}
					
					if(response.GELead_country_id){
						$("#GELead_country_id").addClass('error');
						$("#GELead_country_id_em_").html(response.GELead_country_id).show();
					}else{
						$("#GELead_country_id").removeClass('error');
						$("#GELead_country_id_em_").hide();
					}
					
					if(response.GELead_zip_code){
						$("#GELead_zip_code").addClass('error');
						$("#GELead_zip_code_em_").html(response.GELead_zip_code).show();
					}else{
						$("#GELead_zip_code").removeClass('error');
						$("#GELead_zip_code_em_").hide();
					}
					
					if(response.GELead_gender){
						$("#GELead_gender").addClass('error');
						$("#GELead_gender_em_").html(response.GELead_gender).show();
					}else{
						$("#GELead_gender").removeClass('error');
						$("#GELead_gender_em_").hide();
					}
					
					if(response.GELead_product_id){
						$("#GELead_product_id").addClass('error');
						$("#GELead_product_id_em_").html(response.GELead_product_id).show();
					}else{
						$("#GELead_product_id").removeClass('error');
						$("#GELead_product_id_em_").hide();
					}
					
					if(response.GELead_status_id){
						$("#GELead_status_id").addClass('error');
						$("#GELead_status_id_em_").html(response.GELead_status_id).show();
					}else{
						$("#GELead_status_id").removeClass('error');
						$("#GELead_status_id_em_").hide();
					}
					
					if(response.GELead_agent_id){
						$("#GELead_agent_id").addClass('error');
						$("#GELead_agent_id_em_").html(response.GELead_agent_id).show();
					}else{
						$("#GELead_agent_id").removeClass('error');
						$("#GELead_agent_id_em_").hide();
					}
					
					if(response.GELead_coverage_id){
						$("#GELead_coverage_id").addClass('error');
						$("#GELead_coverage_id_em_").html(response.GELead_coverage_id).show();
					}else{
						$("#GELead_coverage_id").removeClass('error');
						$("#GELead_coverage_id_em_").hide();
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