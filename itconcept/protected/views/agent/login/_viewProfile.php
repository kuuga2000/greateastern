
<div class="block">
	<div class="form">
		<div class="form-group">
			<div class="col-md-3" style="padding-left: 0px;">
				<?php echo CHtml::activeLabel($model, 'first_name');?>
				<span class="form-control"><?php echo $model -> first_name;?></span>
			</div>
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model, 'last_name');?>
				<span class="form-control"><?php echo $model -> last_name;?></span>
			</div>
			<?php /*
			<div class="col-md-3 pull-right" style="padding-left: 0px; padding-top: 28px;">
				<?php echo CHtml::activeLabel($model, 'is_active', array('class' => 'pull-right'));?>
				<?php echo CHtml::activeCheckBox($model, 'is_active', array("disabled" => true, 'size' => 60, 'maxlength' => 100, 'class' => 'pull-right', 'style' => 'margin-right:15px;'));?>
				<?php echo CHtml::error($model, 'is_active');?>
			</div>*/?>
			<div class="clearfix"></div>
		</div>
		<div class="form-group">
			<div class="col-md-3" style="padding-left: 0px;">
				<?php echo CHtml::activeLabel($model, 'phone');?>
				<span class="form-control"><?php echo $model -> phone;?></span>
			</div>
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model, 'cell');?>
				<span class="form-control"><?php echo $model -> cell;?></span>
			</div>
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model, 'fax_number');?>
				<span class="form-control"><?php echo $model -> fax_number;?></span>
			</div>
			<div class="col-md-3">
				<?php echo CHtml::activeLabel($model, 'email');?>
				<span class="form-control"><?php echo $model -> email;?></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<fieldset>
			<div class="form-group">
				<div class="row">
					<?php echo CHtml::activeLabel($model, 'address');?>
					<span class="form-control"><?php echo $model -> address;?></span>
				</div>
				<div class="col-md-3" style="padding-left: 0px;">
					<?php echo CHtml::activeLabel($model, 'city');?>
					<span class="form-control"><?php echo $model -> city;?></span>
				</div>
				<div class="col-md-3">
					<?php echo CHtml::activeLabel($model, 'country_id');?>
					<span class="form-control"><?php echo $model -> display_country;?></span>
				</div>
				<div class="col-md-3">
					<?php echo CHtml::activeLabel($model, 'zip_code');?>
					<span class="form-control"><?php echo $model -> zip_code;?></span>
				</div>
			</div>
		</fieldset>
		<div class="form-group">
			<div class="col-md-3" style="padding-left:0px;">
				<?php echo CHtml::activeLabel($model, 'date_of_birth');?>
				<span class="form-control"><?php echo $model -> date_of_birth;?></span>
			</div>
			<div class="clearfix"></div>
		</div>
		<fieldset>
			<div class="form-group">
				<div class="col-md-3" style="padding-left:0px;">
					<?php echo CHtml::activeLabel($model, 'username');?>
					<span class="form-control"><?php echo $model -> username;?></span>
				</div>
				<div class="col-md-3">
					<?php echo CHtml::activeLabel($model, 'password');?>
					<span class="form-control">*****************</span>
				</div>
			</div>
		</fieldset>
		<fieldset>
			<legend>Change Password</legend>
			<div class="alert alert-success alert-dismissable" style="display: none;">
    			<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
			    <h4>
			    	<i class="fa fa-check-circle"></i> Success
			    </h4> 
			    Password <b class="alert-link">Changed</b>!
			</div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>$modelName.'-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				//'action'=>$this->baseUrl().'/config/changepassword',
				'enableClientValidation'=>true,
				'enableAjaxValidation'=>false,
			)); ?>
			<div class="form-group">
			 
				<?php echo $form->labelEx($changePassword, 'oldPassword');?>
				<?php echo $form->passwordField($changePassword, 'oldPassword',array('class'=>'form-control'));?>
				<?php echo $form->error($changePassword, 'oldPassword');?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($changePassword, 'newPassword');?>
				<?php echo $form->passwordField($changePassword, 'newPassword',array('class'=>'form-control'));?>
				<?php echo $form->error($changePassword, 'newPassword');?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($changePassword, 'compareNewPassword');?>
				<?php echo $form->passwordField($changePassword, 'compareNewPassword',array('class'=>'form-control'));?>
				<?php echo $form->error($changePassword, 'compareNewPassword');?>
			</div>
			<div class="form-group">
			<?php
				echo CHtml::Button('Change Password Now',array('class'=>'btn btn-sm btn-success','id'=>'save'));
			?>
			</div>
		 
			<?php $this->endWidget(); ?>
		</fieldset>
		
	</div><!-- form -->
</div>
<script>
	$(function(){
		 
		$("#save").click(function(){
			$("#save").attr({
				'value':'Saving...',
				'disabled':true,
			});
			$.post($("#<?php echo $modelName;?>-form").attr('action'),$("#<?php echo $modelName;?>-form").serialize(),function(response){
				if(response.success==true){
					$(".alert-success").fadeIn('slow');
				}else{
					if(response.ChangePasswordAgent_oldPassword){
						$("#ChangePasswordAgent_oldPassword").addClass('error');
						$("#ChangePasswordAgent_oldPassword_em_").html(response.ChangePasswordAgent_oldPassword).show();
					}else{
						$("#ChangePasswordAgent_oldPassword").removeClass('error');
						$("#ChangePasswordAgent_oldPassword_em_").hide();
					}
					if(response.ChangePasswordAgent_newPassword){
						$("#ChangePasswordAgent_newPassword").addClass('error');
						$("#ChangePasswordAgent_newPassword_em_").html(response.ChangePasswordAgent_newPassword).show();
					}else{
						$("#ChangePasswordAgent_newPassword").removeClass('error');
						$("#ChangePasswordAgent_newPassword_em_").hide();
					}
					if(response.ChangePasswordAgent_compareNewPassword){
						$("#ChangePasswordAgent_compareNewPassword").addClass('error');
						$("#ChangePasswordAgent_compareNewPassword_em_").html(response.ChangePasswordAgent_compareNewPassword).show();
					}else{
						$("#ChangePasswordAgent_compareNewPassword").removeClass('error');
						$("#ChangePasswordAgent_compareNewPassword_em_").hide();
					}
				}
				$("#save").attr({
					'value':'Change Password Now',
					'disabled':false,
				});
			},'json');
		});
	})
</script>