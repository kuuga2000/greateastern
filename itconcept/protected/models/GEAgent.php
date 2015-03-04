<?php

/**
 * This is the model class for table "ge_agents".
 *
 * The followings are the available columns in table 'ge_agents':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property integer $phone
 * @property integer $cell
 * @property integer $fax_number
 * @property string $email
 * @property string $address
 * @property string $city
 * @property integer $country_id
 * @property integer $zip_code
 * @property string $date_of_birth
 * @property string $username
 * @property string $password
 * @property integer $user_type
 */
class GEAgent extends CActiveRecord
{
	public $hassPass;
	public $full_name;
	public $display_country;
	public $display_gender;
	public $display_total_agent;
	public function init(){
		$this->hassPass = new PasswordHash;
	}
	
	public function afterFind(){
		parent::afterFind();
		$this->full_name = $this->first_name.' '.$this->last_name;
		$this->display_gender = Tools::getGender($this->gender);
		$this->display_country = Tools::getCountry($this->country_id);
		$this->date_of_birth = date("d/m/Y",strtotime($this->date_of_birth));
		 
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			$this->date_of_birth = date("Y-m-d",strtotime(str_replace('/','-',$this->date_of_birth)));
			$this->password = $this->isNewRecord ? $this->encrypt($this->password) : $this->password;
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	/*membuat fungsi untuk engkrip data*/
	public function encrypt($value) {
		return $this->hassPass->create_hash($value);
	}
	
	public function validatePassword($charPassword, $hasPassword){
		return $this->hassPass -> validate_password($charPassword,$hasPassword);
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_agents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, last_name, phone, cell, fax_number, email, address, city, country_id, zip_code, gender,date_of_birth, username, password', 'required'),
			array('user_type,is_active','safe'),
			array('email,username','email'),
			array('email,username','unique'),
			array('password','length','min'=>8),
			array('zip_code','length','min'=>3,'max'=>5),
			array('gender,is_active,phone, cell, fax_number, country_id, zip_code, user_type', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email, address, city, password', 'length', 'max'=>100),
			array('username', 'length', 'max'=>23,'min'=>'5'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, phone, cell, fax_number, email, address, city, country_id, zip_code, date_of_birth, username, password, user_type', 'safe', 'on'=>'search'),
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
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'phone' => 'Phone',
			'cell' => 'Cell',
			'fax_number' => 'Fax Number',
			'email' => 'Email',
			'address' => 'Address',
			'city' => 'City',
			'country_id' => 'Country',
			'zip_code' => 'Zip Code',
			'date_of_birth' => 'Date Of Birth',
			'username' => 'Username',
			'password' => 'Password',
			'user_type' => 'User Type',
			'is_active'=>'Active'
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('cell',$this->cell);
		$criteria->compare('fax_number',$this->fax_number);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('user_type',$this->user_type);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GEAgent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function resetPassword($Agent,$newPassword){
		//get data matched
		$AgentData = GEAgent::model()->find(array(
			'condition'=>'email=:email',
			'params'=>array(':email'=>$Agent->email)	
		));
		if(count($AgentData)==1){
			//double strike.. :)
			if($AgentData->email==$AgentData->email){	
				$AgentData->password = $this->encrypt($newPassword);
				if($AgentData->save()){
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
