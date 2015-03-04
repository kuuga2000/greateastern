<?php
Class LoginController extends GreatEastController{
	
	public $Website;
	
	public function actionIndex() {
		$this->layout = "loginLayout"; 	
		$model = new CompanyLoginForm;

		// jika ajax maka divalidasi dengan ajax
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			/*tampilkan hasil validasi form*/
			echo CActiveForm::validate($model);
			/*end/exit/die*/
			Yii::app() -> end();
		}

		 
		if (isset($_POST['CompanyLoginForm']) && $this->isAjax()) {
			$model -> attributes = $_POST['CompanyLoginForm'];
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
		if(isset(Yii::app()->user->companyLogin)==TRUE){
			$this->redirect(array('/dashboard'));
		}
		// tampilkan login form
		$this -> render('_formLogin', array('model' => $model));
	}
	
	public function actionResetpassword(){
		
		if($this->isAjax()){
			if(isset($_POST['Forgot'])){
				$email = $_POST['Forgot']['email'];
				$Company = GECompany::model()->find(array(
					'condition'=>'email=:email',
					'params'=>array(':email'=>$email)	
				));
				if(empty($Company)){
					exit(json_encode(array(
						'success'=>FALSE,
						'message'=>'Email is not found in database'
					)));
				}else{
					$newPassword = uniqid();
					if($Company->resetPassword($Company,$newPassword)){
						$mail = New Mail;
						$message = $this->renderPartial('/emails/company',array(
							'title'=>'Reset Your Password',
							'message'=>"Hello,<p>
								{$Company->company_name}'s Password has been reseted, below your login information:
								<p>Username : {$Company->username}
								<br>
								Password : {$newPassword}
								</p>
								</p>
								Thank you.",
						),TRUE);
						if($mail->send($Company->email,'Reset Password',$message)){
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
	
	public function actionLogout() {
		/*logout user*/
		Yii::app() -> user -> logout();
		/*direct ke halaman yang diinginkan*/
		$this -> redirect(array('/'));
		//$this -> redirect(array('/adminou/login/login-admin'));
	}
}
