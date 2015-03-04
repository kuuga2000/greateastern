<div class="block push-bit">
	<!-- Login Form -->
	<!--
	<form action="" method="post" id="form-login" class="form-horizontal form-bordered form-control-borderless">
	-->
	<?php echo CHtml::beginForm('','post',array("id"=>"form-login","class"=>"form-horizontal form-bordered form-control-borderless"));?>	
		<div class="form-group username">
			<div class="col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="gi gi-user"></i></span><!--
					<input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email">-->
					<?php echo CHtml::activeTextField($model,'username',array("class"=>"form-control input-lg","placeholder"=>"Username"));?>
					<div class="help-block animation-slideDown errorUsername" for="login-email" style="display: none;">
						
					</div>
				</div>
			</div>
		</div>
		<div class="form-group password">
			<div class="col-xs-12">
				<div class="input-group">
					<span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
					<?php echo CHtml::activePasswordField($model,'password',array("class"=>"form-control input-lg","placeholder"=>"Password"));?>
					<div class="help-block animation-slideDown errorPassword" for="login-password" style="display: none;">
						
					</div>
				</div>
			</div>
		</div>
		<div class="form-group form-actions">
			<div class="col-xs-4">
				&nbsp; <!--
				<label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
				<input type="checkbox" id="login-remember-me" name="login-remember-me" checked>
				<span></span>
				</label>
				-->
			</div>
			<div class="col-xs-8 text-right">
				<button type="button" class="btn btn-sm btn-primary login-button">
					<i class="fa fa-angle-right"></i><span class="label-button"> Login to Dashboard</span>
				</button>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-xs-12 text-center" style="text-align: right;">
				<a href="javascript:void(0)" id="link-reminder-login"><small>Forgot password?</small></a>
			</div>
		</div>
	<?php echo CHtml::endForm();?>
	<!-- END Login Form -->
	<!-- Reminder Form -->
	<form action="<?php echo $this->baseUrl();?>/login/resetpassword" method="post" id="form-reminder" class="form-horizontal form-bordered form-control-borderless display-none">
		<div class="form-group">
			
			<div class="col-xs-12">
				<div class="alert alert-dismissable" style="display: none;">as
				</div>
				<div class="input-group">
					<span class="input-group-addon"><i class="gi gi-envelope"></i></span>
					<input type="text" id="reminder-email" name="Forgot[email]" class="form-control input-lg" placeholder="Email">
				</div>
			</div>
		</div>
		<div class="form-group form-actions">
			<div class="col-xs-12 text-right">
				<button type="button" class="btn btn-sm btn-primary resetpassword">
					<i class="fa fa-angle-right"></i> <span class="labelbutton">Reset Password</span>
				</button>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-12 text-center">
				<small>Did you remember your password?</small><a href="#login" id="link-reminder" class="remember"> <small>Login</small></a>
			</div>
		</div>
	</form>
	<!-- END Reminder Form -->
</div>
<script>
	$(function() {
		$(".resetpassword").click(function(){
			$('.resetpassword').attr({
				'disabled':true,
			});
			$('.labelbutton').html('Sending...');
			$.post($("#form-reminder").attr('action'),$("#form-reminder").serialize(),function(response){
				if(response.success==true){
					$(".alert").removeClass('alert-danger');
					$(".alert").addClass('alert-success');
					$(".alert").html(response.message).fadeIn();
				}else{
					$(".alert").removeClass('alert-success');
					$(".alert").addClass('alert-danger');
					$(".alert").html(response.message).fadeIn();
				}
				$('.resetpassword').attr({
					'disabled':false,
				});
				$('.labelbutton').html('Reset Password');	
			},'json');
		});
		$(".login-button").click(function() {
			$(".login-button").attr({
				'disabled' : true,
			});
			$(".label-button").html(' Please Wait...');
			
			$.post($("#form-login").attr("action"),$("#form-login").serialize(),function(response){
				if(response.success==true){
					$(".label-button").html(' Redirecting...');
					window.location.reload(true);
					return false;
				}else{
					if(response.CompanyLoginForm_username){
						$(".username").addClass("has-error");
						$(".errorUsername").html(response.CompanyLoginForm_username).show();
					}else{
						$(".username").removeClass("has-error");
						$(".errorUsername").hide();
					}
					if(response.CompanyLoginForm_password){
						$(".password").addClass("has-error");
						$(".errorPassword").html(response.CompanyLoginForm_password).show();
					}else{
						$(".password").removeClass("has-error");
						$(".errorPassword").hide();
					}
					
				}
				$(".login-button").attr({
				'disabled' : false,
				});
				$(".label-button").html(' Login to Dashboard');
			},'json');
			
			
		});
	});

</script>