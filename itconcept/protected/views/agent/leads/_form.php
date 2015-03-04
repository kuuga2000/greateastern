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

	<p class="note">Fields with <span class="required">*</span> are required.
	<?php echo $form->labelEx($model,'is_active',array('class'=>'pull-right')); ?>
	<?php echo $form->checkBox($model,'is_active',array('size'=>60,'maxlength'=>100,'class'=>'pull-right','style'=>'margin-right:15px;')); ?>
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
				<?php echo $form->labelEx($model,'product_id'); ?>
				<?php echo $form->dropDownList($model,'product_id',CHtml::listData(GEProduct::model()->findAll(array('order'=>'product_name ASC')),'id','product_name'),array('empty'=>'--Select--','class'=>'form-control pro')); ?>
				<?php echo $form->error($model,'product_id'); ?>
			</div>
		
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'status_id'); ?>
				<?php echo $form->dropDownList($model,'status_id',CHtml::listData(GEStatus::model()->findAll(array('order'=>'description ASC')),'id','description'),array('empty'=>'--Select--','class'=>'form-control')); ?>
				<?php echo $form->error($model,'status_id'); ?>
			</div>
		
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
			<?php echo $form->textField($model,'date_of_birth',array('class'=>'form-control datepicker','value'=>!$model->isNewRecord ? $model->display_date_of_birth : '',)); ?>
			<?php echo $form->error($model,'date_of_birth'); ?>
		</div>
		<div class="clearfix"></div>
	</div>
	</fieldset>
	
	<fieldset>
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'premium'); ?>
				<?php echo $form->textField($model,'premium',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'premium'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'commission'); ?>
				<?php echo $form->textField($model,'commission',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'commission'); ?>
			</div> 
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'renewal'); ?>
				<?php echo $form->textField($model,'renewal',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'renewal'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'bonus_commission'); ?>
				<?php echo $form->textField($model,'bonus_commission',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'bonus_commission'); ?>
			</div>
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'bonus_renewal'); ?>
				<?php echo $form->textField($model,'bonus_renewal',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'bonus_renewal'); ?>
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
			callUrlForm($("#gelead-form").attr("action"));
		});
		$("#savenconvert").click(function(){
			$("#savenconvert").attr({
				'value':'Loading...',
				'disabled':true,
			});
			callUrlForm($("#gelead-form").attr("action")+'?convert');
		});
		$(".pro").change(function(){
			var product_id = $(this).val();
			$.post('<?php echo $this->baseUrlAgent(TRUE);?>/rqst/getcr','product_id='+product_id,function(response){
				$("#GELead_commission").val(response.commission);
				$("#GELead_renewal").val(response.renewal);
			},'json'); 
		});
		
		function callUrlForm(action){
			$.post(action,$("#gelead-form").serialize(),function(response){
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
					
					if(response.GELead_date_of_birth){
						$("#GELead_date_of_birth").addClass('error');
						$("#GELead_date_of_birth_em_").html(response.GELead_date_of_birth).show();
					}else{
						$("#GELead_date_of_birth").removeClass('error');
						$("#GELead_date_of_birth_em_").hide();
					}
					
					if(response.GELead_premium){
						$("#GELead_premium").addClass('error');
						$("#GELead_premium_em_").html(response.GELead_premium).show();
					}else{
						$("#GELead_premium").removeClass('error');
						$("#GELead_premium_em_").hide();
					}
					
					if(response.GELead_commission){
						$("#GELead_commission").addClass('error');
						$("#GELead_commission_em_").html(response.GELead_commission).show();
					}else{
						$("#GELead_commission").removeClass('error');
						$("#GELead_commission_em_").hide();
					}
					
					if(response.GELead_renewal){
						$("#GELead_renewal").addClass('error');
						$("#GELead_renewal_em_").html(response.GELead_renewal).show();
					}else{
						$("#GELead_renewal").removeClass('error');
						$("#GELead_renewal_em_").hide();
					}
					
					if(response.GELead_bonus_commission){
						$("#GELead_bonus_commission").addClass('error');
						$("#GELead_bonus_commission_em_").html(response.GELead_bonus_commission).show();
					}else{
						$("#GELead_bonus_commission").removeClass('error');
						$("#GELead_bonus_commission_em_").hide();
					}
					
					if(response.GELead_bonus_commission){
						$("#GELead_bonus_renewal").addClass('error');
						$("#GELead_bonus_renewal_em_").html(response.GELead_bonus_renewal).show();
					}else{
						$("#GELead_bonus_renewal").removeClass('error');
						$("#GELead_bonus_renewal_em_").hide();
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