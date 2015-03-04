<?php
Class LoginController extends AgentcController{
	//public $layout="/agent/login/loginLayout";
	
	public function actionProfile(){
		$DataAgent = GEAgent::model()->findByPk(Yii::app()->user->id);
		$ChangePassword = ChangePasswordAgent::model()->findByPk(Yii::app()->user->id);
		if($this->isAjax()){
			if(isset($_POST['ChangePasswordAgent'])){
				$ChangePassword->attributes = $_POST['ChangePasswordAgent'];
				if($ChangePassword->validate()){
					$ChangePassword->password = $_POST['ChangePasswordAgent']['newPassword'];
					
					if($ChangePassword->save()){
						exit(json_encode(array('success'=>true)));
					}
					
				}else{
					exit(CActiveForm::validate($ChangePassword));
				}
			}
		}
		$this->render("_profile",array(
			'model'=>$DataAgent,
			'changePassword'=>$ChangePassword,
			'modelName'=>get_class($ChangePassword)
			)
		);
	}
	
	public function actionResetpassword(){
		if($this->isAjax()){
			if(isset($_POST['Forgot'])){
				$email = $_POST['Forgot']['email'];
				$Agent = GEAgent::model()->find(array(
					'condition'=>'email=:email',
					'params'=>array(':email'=>$email)	
				));
				if(empty($Agent)){
					exit(json_encode(array(
						'success'=>FALSE,
						'message'=>'Email is not found in database'
					)));
				}else{
					$newPassword = uniqid();
					if($Agent->resetPassword($Agent,$newPassword)){
						$mail = New Mail;
						$message = $this->renderPartial('/emails/company',array(
							'title'=>'Reset Your Password',
							'message'=>"Hello,<p>
								{$Agent->full_name}'s Password has been reseted, below your login information:
								<p>Username : {$Agent->username}
								<br>
								Password : {$newPassword}
								</p>
								</p>
								Thank you.",
						),TRUE);
						if($mail->send($Agent->email,'Reset Password',$message)){
							exit(json_encode(
								array(
									'success'=>true,
									'message'=>'Your password has been sent to your email.'
								)
							  )
							);
						}
					}
				}
			}
		}
	}
	
	/*action Index Agent*/
	public function actionIndex() {
		$this->layout = "loginLayout";
		$model = new AgentLoginForm;

		// jika ajax maka divalidasi dengan ajax
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			/*tampilkan hasil validasi form*/
			echo CActiveForm::validate($model);
			/*end/exit/die*/
			Yii::app() -> end();
		}

		 
		if (isset($_POST['AgentLoginForm']) && $this->isAjax()) {
			$model -> attributes = $_POST['AgentLoginForm'];
			//$model->verifyCode   = $_POST['captcha'];
			/*validaasi data yang diinput oleh user dan
			 * jika valid maka ...
			 */
			if ($model -> validate() && $model -> login()) {
				/*redirect ke halaman yang diinginkan
				 *(dalam hal ini kita direct ke halaman product/admin)
				 **/
				exit(json_encode(array('success'=>true)));
				//$this->redirect(array('adminou/user/profile'));
			}else{
				exit(CActiveForm::validate($model));
			}
		}
		if(isset(Yii::app()->user->agentLogin)==TRUE){
			$this->redirect(array('agent/dashboard'));
		}
		// tampilkan login form
		$this -> render('_formLoginAgent', array('model' => $model));
	}

	public function actionLogout() {
		/*logout user*/
		Yii::app() -> user -> logout();
		/*direct ke halaman yang diinginkan*/
		$this -> redirect(array('/agent/login'));
		//$this -> redirect(array('/adminou/login/login-admin'));
	}
	
}
