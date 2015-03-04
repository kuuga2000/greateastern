<?php
/*Change Password For Admin
 *Author : Kuuga
 *Email : ryuki.servaiv@gmail.com
 *Site : www.shariveweb.com
 **/
Class ChangePassword extends CActiveRecord {
	/*untuk membuat field 'new password' 
	 *pada form ubah password*/	
	public $newPassword;
	/*untuk membuat field 'old/current password' 
	 *pada form ubah password*/
	public $oldPassword;
	/*untuk membuat field 'confirm password' 
	 *pada formubahpassword*/
	public $compareNewPassword;
	
	public $user;
	
	public function init(){
		$this->user = New GECompany;
	}
	
	
	/*digunakan untuk meng-engkrip password dengan dengan md5*/
	protected function beforeSave() {
		if (parent::beforeSave()) {
			$this -> password = $this -> encrypt($this -> password);
			return TRUE;
		} else {
			return FALSE;
		}
	}

	/*membuat fungsi untuk engkrip data*/
	public function encrypt($value) {
		
		return $this->user->encrypt($value);
	}

	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'ge_company';
	}
	
	public function rules() {
		/*buat validate form ubah password*/
		return array(
			/*set field old/current password,new password, 
			 *confirm password tidak boleh kosong*/
			array('oldPassword, newPassword, compareNewPassword', 'required'),
			/*set min length password*/
			array('oldPassword,newPassword,compareNewPassword','length','min'=>8),
			/*set max length password*/
			array('oldPassword,newPassword,compareNewPassword', 'length', 'max'=>35),
			/*bandingkan atau confirm password*/
			array('compareNewPassword','compare','compareAttribute'=>'newPassword'),
			/*validate old password/current password 
			 *dengan function validateCurrentPassword*/
			array('oldPassword','validateCurrentPassword'),
		);
	}
	
	public function attributeLabels(){
		return array(
			'oldPassword'=>'Current Password',
			'newPassword'=>'New Password',
			'compareNewPassword'=>'Retype New Password',
		);
	}
	
	public function getDbConnection()
	{
		return Yii::app()->dbRoot;
	}
	
	/*function untuk validate current password*/
	public function validateCurrentPassword(){
		/*jika current password tidak sama dengan yang diinputkan maka*/
		$currentPassword = GECompany::model()->findByPk(Yii::app()->user->id);
        if(!$this->user->validatePassword($this->oldPassword,$currentPassword->password)){
        	/*set error dengan message 'current password . . . .*/
        	$this -> addError('oldPassword', 'Current Password is not match');
        }else{
        	/*jika benar return TRUE*/
        	return TRUE;
        }
    }
}