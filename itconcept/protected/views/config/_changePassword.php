<div class="row">
	<div class="block full">
	<div class="block-title">
		<h2><strong>Change Password</strong></h2>
	</div>
	<div class="alert alert-success alert-dismissable" style="display: none;">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <h4>
        	<i class="fa fa-check-circle"></i> Success</h4> 
        	Settings <b class="alert-link">updated</b>!
    </div>
	<div class="block">
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>$modelName.'-form',
				// Please note: When you enable ajax validation, make sure the corresponding
				// controller action is handling ajax validation correctly.
				// There is a call to performAjaxValidation() commented in generated controller code.
				// See class documentation of CActiveForm for details on this.
				'action'=>$this->baseUrl().'/config/changepassword',
				'enableClientValidation'=>true,
				'enableAjaxValidation'=>false,
			)); ?>
			<div class="form-group">
				
				<?php echo $form->labelEx($changePassword,'oldPassword'); ?>
       			<?php echo $form -> passwordField($changePassword, 'oldPassword', array('class'=>'form-control','size' => 35, )); ?>
        		<?php echo $form -> error($changePassword, 'oldPassword'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($changePassword,'newPassword'); ?>
				<?php echo $form -> passwordField($changePassword, 'newPassword', array('class'=>'form-control','size' => 35, )); ?>
        		<?php echo $form -> error($changePassword, 'newPassword'); ?>
			</div>
			<div class="form-group">
				<?php echo $form->labelEx($changePassword,'compareNewPassword'); ?>
				<?php echo $form -> passwordField($changePassword, 'compareNewPassword', array('class'=>'form-control','size' => 35, )); ?>
            	<?php echo $form -> error($changePassword, 'compareNewPassword'); ?>
			</div>
			<div class="form-group">
			<?php
				echo CHtml::Button('Change Password Now',array('class'=>'btn btn-sm btn-success','id'=>'save'));
			?>
			</div>
			<?php $this->endWidget(); ?>
		</div>
	</div>
	</div>
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
					if(response.ChangePassword_oldPassword){
						$("#ChangePassword_oldPassword").addClass('error');
						$("#ChangePassword_oldPassword_em_").html(response.ChangePassword_oldPassword).show();
					}else{
						$("#ChangePassword_oldPassword").removeClass('error');
						$("#ChangePassword_oldPassword_em_").hide();
					}
					if(response.ChangePassword_newPassword){
						$("#ChangePassword_newPassword").addClass('error');
						$("#ChangePassword_newPassword_em_").html(response.ChangePassword_newPassword).show();
					}else{
						$("#ChangePassword_newPassword").removeClass('error');
						$("#ChangePassword_newPassword_em_").hide();
					}
					if(response.ChangePassword_compareNewPassword){
						$("#ChangePassword_compareNewPassword").addClass('error');
						$("#ChangePassword_compareNewPassword_em_").html(response.ChangePassword_compareNewPassword).show();
					}else{
						$("#ChangePassword_compareNewPassword").removeClass('error');
						$("#ChangePassword_compareNewPassword_em_").hide();
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