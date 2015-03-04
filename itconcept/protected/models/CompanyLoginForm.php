<?php
class CompanyLoginForm extends CFormModel {
	
	/*deklarasi public variabel*/
	public $username;
	public $password;
	public $rememberMe;
	/*deklarasi private variabel*/
	private $_identity;
	public $verifyCode;
	

	/**
	 * deklarasi validatasi
	 * yang menyatakan username dan password harus diisi.
	 */
	public function rules() {
		return array(
			// username dan password dibutuhkan
			array('username, password', 'required'),
			// untuk rememberMe dan harus sebuah boolean
			array('rememberMe', 'boolean'),
			// password akan diauthenticated
			array('password', 'authenticate'),
			//array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements()),
		);
	}

	/**
	 * deklarasi atribut labels.
	 */
	public function attributeLabels() {
		return array(
			'rememberMe' => 'Remember me next time',
		);
	}

	/**
	 * buat auth password.
	 */
	public function authenticate($attribute, $params) {
		/*jika tidak hasErrors maka*/
		if (!$this -> hasErrors()) {
			/*panggil component AgentLogin dengan param
			 *username, dan password
			 *dan ditampung oleh variabel _identity
			 */
			$this -> _identity = new CompanyLogin($this -> username, $this -> password);
			/*jika tidak authenticate/authenticate==failed maka*/
			if (!$this -> _identity -> authenticate()){
				/*kasih error*/
				$this -> addError('password', 'Incorrect username or password.');
				/*$emailUser = $this->checkUsername($this->username);
				if($emailUser){
					$mail = New Mail;
					$message = "Hello {$emailUser[1]},<br>";
					$message .="Somebody try to login with your username but wrong password.<br>";
					$message .="IP : ".$_SERVER['REMOTE_ADDR'];;
					$message .="<br>Date : ". date('Y, M d').' - '.date('H:i:s');
					$message .="<br>We hope this information is useful for you.";
					$message .="<br><br>Thank you.";
					$message .="<br>IT Concept";		
					$mail->send($emailUser[0],'Login Attempt Failed',$message);
				}*/
			}
		}
	}

	/**
	 * admin login, dengan meng-input username dan password
	 */
	public function login() {
		/*jika _indentity null maka*/
		if ($this -> _identity === null) {
			/*panggil component AgentLogin dengan param
			 *username, dan password
			 *dan ditampung oleh variabel _identity
			 */
			$this -> _identity = new CompanyLogin($this -> username, $this -> password);
			/*panggil fungsi authenticate()
			 *yang ada di component AgentLogin
			 *yang akan memvalidasi username dan password*/
			$this -> _identity -> authenticate();
		}
		/*jika errorCode/error username dan password benar maka*/
		if ($this -> _identity -> errorCode === CompanyLogin::ERROR_NONE) {
			//membuat remember me durasi 30 hari
			$duration = $this -> rememberMe ? 3600 * 24 * 30 : 0;
			// 30 days
			Yii::app() -> user -> login($this -> _identity, $duration);
			//update last_login_time admin
			//Admin::model() -> updateByPk($this -> _identity -> id, array('last_login_time' => new CDbExpression('NOW()')));
			return true;
		} else {
			return false;
		}
	}
	
	//will return email user
	protected function checkUsername($username){
		$datauser = Userdata::model()->find('username=:username',array(':username'=>$username));
		if(count($datauser)==1){
			return array($datauser->email,$datauser->name);
		}
	}

}