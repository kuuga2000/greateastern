<?php
$this->avoidDoubleLoadJs();
/* @var $this ClientsController */
/* @var $model GEClient */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="block">
		<div class="block-title">
            <h2><strong><?php echo $title;?></strong></h2>
        </div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geclient-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">
		Fields with <span class="required">*</span> are required.
		<?php echo $form->labelEx($model,'is_active',array('class'=>'pull-right')); ?>
		<?php echo $form->checkBox($model,'is_active',array('size'=>60,'maxlength'=>100,'class'=>'pull-right','style'=>'margin-right:15px;')); ?>
	</p>

	<?php echo $form->errorSummary($model); ?>
	
	<fieldset>
		<div class="form-group">
			<div class="col-md-3">
			<?php echo $form->labelEx($model,'coverage_id'); ?>
			<?php echo $form->dropDownList($model,'coverage_id',CHtml::listData(GECoverage::model()->findAll(array('order'=>'coverage_name ASC')),'id','coverage_name'),array('empty'=>'--Select--','class'=>'form-control coverage_id')); ?>
			<?php echo $form->error($model,'coverage_id'); ?>
			</div>
			
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'product_id'); ?>
				<?php echo $form->dropDownList($model,'product_id',CHtml::listData(GEProduct::model()->findAll(array('order'=>'product_name ASC')),'id','product_name'),array('empty'=>'--Select--','class'=>'form-control product_id')); ?>
				<?php echo $form->error($model,'product_id'); ?>
			</div>
		
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'status_id'); ?>
				<?php echo $form->dropDownList($model,'status_id',CHtml::listData(GEStatus::model()->findAll(array('order'=>'description ASC')),'id','description'),array('empty'=>'--Select--','class'=>'form-control status_id')); ?>
				<?php echo $form->error($model,'status_id'); ?>
			</div>
		
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'agent_id'); ?>
				<?php echo $form->dropDownList($model,'agent_id',CHtml::listData(GEAgent::model()->findAll(array('order'=>'first_name ASC')),'id','full_name'),array('empty'=>'--Select--','class'=>'form-control')); ?>
				<?php echo $form->error($model,'agent_id'); ?>
			</div>
		</div>
		<div class="clearfix"></div><br>
	</fieldset>
	
	<div class="form-group">
		<?php echo $form->labelEx($model,'client_name'); ?>
		<?php echo $form->textField($model,'client_name',array('size'=>60,'maxlength'=>500,'class'=>'form-control client_name')); ?>
		<?php echo $form->error($model,'client_name'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'client_email'); ?>
		<?php echo $form->textField($model,'client_email',array('size'=>60,'maxlength'=>70,'class'=>'form-control client_email')); ?>
		<?php echo $form->error($model,'client_email'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>15,'maxlength'=>15,'class'=>'form-control phone')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'cell_phone'); ?>
		<?php echo $form->textField($model,'cell_phone',array('size'=>15,'maxlength'=>15,'class'=>'form-control cell_phone')); ?>
		<?php echo $form->error($model,'cell_phone'); ?>
	</div>

	<fieldset>
		
	
		<div class="form-group">
			<div class="col-md-10">
			<?php echo $form->labelEx($model,'address'); ?>
			<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>500,'class'=>'form-control address')); ?>
			<?php echo $form->error($model,'address'); ?>
			</div>
		</div>
	
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'city'); ?>
				<?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>100,'class'=>'form-control city')); ?>
				<?php echo $form->error($model,'city'); ?>
			</div>
	
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'country_id'); ?>
				<?php echo $form->dropDownList($model,'country_id',CHtml::listData(GECountry::model()->findAll(array('order'=>'name ASC')),'id','name'),array('empty'=>'--Select--','class'=>'form-control country_id')); ?>
				<?php echo $form->error($model,'country_id'); ?>
			</div>
	
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'zip_code'); ?>
				<?php echo $form->textField($model,'zip_code',array('class'=>'form-control zip_code','maxlength'=>5)); ?>
				<?php echo $form->error($model,'zip_code'); ?>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<legend>Personal</legend>	
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'gender'); ?>
				<?php echo $form->dropDownList($model,'gender',array('0'=>'Female','1'=>'Male'),array('empty'=>'--Select--','class'=>'form-control gender')); ?>
				<?php echo $form->error($model,'gender'); ?>
			</div>
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'height'); ?>
				<?php echo $form->dropDownList($model,'height',CHtml::listData(GEHeight::model()->findAll(array('order'=>'height ASC')),'height','height'),array('empty'=>'--Select--','class'=>'form-control height')); ?>
				<?php echo $form->error($model,'height'); ?>
			</div>
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'weight'); ?>
				<?php echo $form->textField($model,'weight',array('class'=>'form-control weight')); ?>
				<?php echo $form->error($model,'weight'); ?>
			</div>
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'date_of_birth'); ?>
				<?php echo $form->textField($model,'date_of_birth',array('class'=>'form-control datepicker date_of_birth','value'=>!$model->isNewRecord ? $model->display_date_of_birth : '',)); ?>
				<?php echo $form->error($model,'date_of_birth'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<div class="col-md-5">
				<?php echo $form->labelEx($model,'policy_number'); ?>
				<?php echo $form->textField($model,'policy_number',array('class'=>'form-control policy_number')); ?>
				<?php echo $form->error($model,'policy_number'); ?>
			</div>
		</div>
	</fieldset>

	<fieldset>
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'premium'); ?>
				<?php echo $form->textField($model,'premium',array('class'=>'form-control premium')); ?>
				<?php echo $form->error($model,'premium'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'commission'); ?>
				<?php echo $form->textField($model,'commission',array('class'=>'form-control commission')); ?>
				<?php echo $form->error($model,'commission'); ?>
			</div> 
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'renewal'); ?>
				<?php echo $form->textField($model,'renewal',array('class'=>'form-control renewal')); ?>
				<?php echo $form->error($model,'renewal'); ?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'bonus_commission'); ?>
				<?php echo $form->textField($model,'bonus_commission',array('class'=>'form-control bonus_commission')); ?>
				<?php echo $form->error($model,'bonus_commission'); ?>
			</div>
			<div class="col-md-3">
				<?php echo $form->labelEx($model,'bonus_renewal'); ?>
				<?php echo $form->textField($model,'bonus_renewal',array('class'=>'form-control bonus_renewal')); ?>
				<?php echo $form->error($model,'bonus_renewal'); ?>
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
	$(document).ready(function(){
		$('.datepicker').datepicker({ 
			format:'dd/mm/yyyy', 
			todayHighlight: true 
		});
		$("#save").click(function(){
			//alert($("#GEClient_phone").val());
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
					if(response.GEClient_client_name){
						$("#GEClient_client_name.client_name").addClass('error');
						$("#GEClient_client_name_em_").html(response.GEClient_client_name).show();
					}else{
						$("#GEClient_client_name.client_name").removeClass('error');
						$("#GEClient_client_name_em_").hide();
					}
					
					if(response.GEClient_client_email){
						$("#GEClient_client_email.client_email").addClass('error');
						$("#GEClient_client_email_em_").html(response.GEClient_client_email).show();
					}else{
						$("#GEClient_client_email.client_email").removeClass('error');
						$("#GEClient_client_email_em_").hide();
					}
					
					if(response.GEClient_phone){
						$("#GEClient_phone.phone").addClass('error');
						$("#GEClient_phone_em_").html(response.GEClient_phone).show();
					}else{
						$("#GEClient_phone.phone").removeClass('error');
						$("#GEClient_phone_em_").hide();
					}
					
					if(response.GEClient_cell_phone){
						$("#GEClient_cell_phone.cell_phone").addClass('error');
						$("#GEClient_cell_phone_em_").html(response.GEClient_cell_phone).show();
					}else{
						$("#GEClient_cell_phone.cell_phone").removeClass('error');
						$("#GEClient_cell_phone_em_").hide();
					}
					
					if(response.GEClient_address){
						$("#GEClient_address.address").addClass('error');
						$("#GEClient_address_em_").html(response.GEClient_address).show();
					}else{
						$("#GEClient_address.address").removeClass('error');
						$("#GEClient_address_em_").hide();
					}
					
					if(response.GEClient_city){
						$("#GEClient_city.city").addClass('error');
						$("#GEClient_city_em_").html(response.GEClient_city).show();
					}else{
						$("#GEClient_city.city").removeClass('error');
						$("#GEClient_city_em_").hide();
					}
					
					if(response.GEClient_country_id){
						$("#GEClient_country_id.country_id").addClass('error');
						$("#GEClient_country_id_em_").html(response.GEClient_country_id).show();
					}else{
						$("#GEClient_country_id.country_id").removeClass('error');
						$("#GEClient_country_id_em_").hide();
					}
					
					if(response.GEClient_zip_code){
						$("#GEClient_zip_code.zip_code").addClass('error');
						$("#GEClient_zip_code_em_").html(response.GEClient_zip_code).show();
					}else{
						$("#GEClient_zip_code.zip_code").removeClass('error');
						$("#GEClient_zip_code_em_").hide();
					}
					
					if(response.GEClient_gender){
						$("#GEClient_gender.gender").addClass('error');
						$("#GEClient_gender_em_").html(response.GEClient_gender).show();
					}else{
						$("#GEClient_gender.gender").removeClass('error');
						$("#GEClient_gender_em_").hide();
					}
					
					if(response.GEClient_product_id){
						$("#GEClient_product_id.product_id").addClass('error');
						$("#GEClient_product_id_em_").html(response.GEClient_product_id).show();
					}else{
						$("#GEClient_product_id.product_id").removeClass('error');
						$("#GEClient_product_id_em_").hide();
					}
					
					if(response.GEClient_status_id){
						$("#GEClient_status_id.status_id").addClass('error');
						$("#GEClient_status_id_em_").html(response.GEClient_status_id).show();
					}else{
						$("#GEClient_status_id.status_id").removeClass('error');
						$("#GEClient_status_id_em_").hide();
					}
					
					if(response.GEClient_agent_id){
						$("#GEClient_agent_id.agent_id").addClass('error');
						$("#GEClient_agent_id_em_").html(response.GEClient_agent_id).show();
					}else{
						$("#GEClient_agent_id.agent_id").removeClass('error');
						$("#GEClient_agent_id_em_").hide();
					}
					
					if(response.GEClient_coverage_id){
						$("#GEClient_coverage_id.coverage_id").addClass('error');
						$("#GEClient_coverage_id_em_").html(response.GEClient_coverage_id).show();
					}else{
						$("#GEClient_coverage_id.coverage_id").removeClass('error');
						$("#GEClient_coverage_id_em_").hide();
					}
					
					if(response.GEClient_date_of_birth){
						$("#GEClient_date_of_birth.date_of_birth").addClass('error');
						$("#GEClient_date_of_birth_em_").html(response.GEClient_date_of_birth).show();
					}else{
						$("#GEClient_date_of_birth.date_of_birth").removeClass('error');
						$("#GEClient_date_of_birth_em_").hide();
					}
					
					if(response.GEClient_premium){
						$("#GEClient_premium.premium").addClass('error');
						$("#GEClient_premium_em_").html(response.GEClient_premium).show();
					}else{
						$("#GEClient_premium.premium").removeClass('error');
						$("#GEClient_premium_em_").hide();
					}
					
					if(response.GEClient_commission){
						$("#GEClient_commission.commission").addClass('error');
						$("#GEClient_commission_em_").html(response.GEClient_commission).show();
					}else{
						$("#GEClient_commission.commission").removeClass('error');
						$("#GEClient_commission_em_").hide();
					}
					
					if(response.GEClient_renewal){
						$("#GEClient_renewal.renewal").addClass('error');
						$("#GEClient_renewal_em_").html(response.GEClient_renewal).show();
					}else{
						$("#GEClient_renewal.renewal").removeClass('error');
						$("#GEClient_renewal_em_").hide();
					}
					
					if(response.GEClient_bonus_commission){
						$("#GEClient_bonus_commission.bonus_commission").addClass('error');
						$("#GEClient_bonus_commission_em_").html(response.GEClient_bonus_commission).show();
					}else{
						$("#GEClient_bonus_commission.bonus_commission").removeClass('error');
						$("#GEClient_bonus_commission_em_").hide();
					}
					
					if(response.GEClient_bonus_renewal){
						$("#GEClient_bonus_renewal.bonus_renewal").addClass('error');
						$("#GEClient_bonus_renewal_em_").html(response.GEClient_bonus_renewal).show();
					}else{
						$("#GEClient_bonus_renewal.bonus_renewal").removeClass('error');
						$("#GEClient_bonus_renewal_em_").hide();
					}
					
					if(response.GEClient_policy_number){
						$("#GEClient_policy_number.policy_number").addClass('error');
						$("#GEClient_policy_number_em_").html(response.GEClient_policy_number).show();
					}else{
						$("#GEClient_policy_number.policy_number").removeClass('error');
						$("#GEClient_policy_number_em_").hide();
					}
				}
				$("#save").attr({
					'value':'<?php echo $model->isNewRecord ? 'Create' : 'Save';?>',
					'disabled':false,
				});
			},'json');
			
		});
		$(".product_id").change(function(){
			var product_id = $(this).val();
			$.post('<?php echo $this->baseUrlAgent(TRUE);?>/rqst/getcr','product_id='+product_id,function(response){
				$(".commission").val(response.commission);
				$(".renewal").val(response.renewal);
			},'json'); 
		});
	});
</script>