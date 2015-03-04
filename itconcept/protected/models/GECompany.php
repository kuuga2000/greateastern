<?php

/**
 * This is the model class for table "ge_company".
 *
 * The followings are the available columns in table 'ge_company':
 * @property integer $id
 * @property string $company_name
 * @property string $address
 * @property integer $phone
 * @property integer $fax
 * @property string $username
 * @property string $password
 */
class GECompany extends CActiveRecord
{
	
	public $hassPass;
	
	public function init(){
		$this->hassPass = new PasswordHash;
	}
	/*membuat fungsi untuk engkrip data*/
	public function encrypt($value) {
		return $this->hassPass->create_hash($value);
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			$this->password = $this->encrypt($this->password);	
			return TRUE;
		}else{return FALSE;}
	}
	
	public function validatePassword($charPassword, $hasPassword){
		return $this->hassPass -> validate_password($charPassword,$hasPassword);
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_company';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_name, email, address, phone, fax, username, password', 'required'),
			array('phone, fax', 'numerical', 'integerOnly'=>true),
			array('company_name', 'length', 'max'=>100),
			array('address', 'length', 'max'=>200),
			array('username', 'length', 'max'=>32),
			array('password', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, company_name, address, phone, fax, username, password', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_name' => 'Company Name',
			'address' => 'Address',
			'phone' => 'Phone',
			'fax' => 'Fax',
			'username' => 'Username',
			'password' => 'Password',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('fax',$this->fax);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbRoot;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GECompany the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function resetPassword($Company,$newPassword){
		//get data matched
		$CompanyData = GECompany::model()->find(array(
			'condition'=>'email=:email',
			'params'=>array(':email'=>$Company->email)	
		));
		if(count($CompanyData)==1){
			//double strike.. :)
			if($CompanyData->email==$Company->email){	
				$CompanyData->password = $newPassword;
				if($CompanyData->save()){
					return TRUE;
				}
				//$mail->send('kuuga@itconcept.sg','ini testing doank yah','Aku adalah orang yang kebetulan lewat ingat itu!');
			}
		}else{
			exit(json_encode(array(
				'success'=>FALSE,
				'message'=>'Email is not found in database'
			)));
		}
	}
}
