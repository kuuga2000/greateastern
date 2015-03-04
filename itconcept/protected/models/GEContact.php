<?php

/**
 * This is the model class for table "ge_contacts".
 *
 * The followings are the available columns in table 'ge_contacts':
 * @property integer $id
 * @property string $contact_name
 * @property string $contact_email
 * @property string $phone
 * @property string $cell_phone
 * @property string $address
 * @property string $city
 * @property integer $country_id
 * @property integer $zip_code
 * @property integer $gender
 * @property integer $product_id
 * @property integer $status_id
 * @property integer $agent_id
 * @property string $height
 * @property string $weight
 * @property string $date_of_birth
 * @property integer $premium
 * @property integer $commission
 * @property integer $renewal
 * @property integer $bonus_commission
 * @property integer $bonus_renewal
 * @property integer $coverage_id
 * @property integer $is_active
 * @property integer $temperature_id
 */
class GEContact extends CActiveRecord
{
	public $display_country;
	public $display_coverage;
	public $display_product;
	public $display_status;
	public $display_agent;
	public $display_gender;
	public $display_date_of_birth;
	public $display_temperature;
	
	public function afterFind(){
		parent::afterFind();
		$this->display_country = Tools::getCountry($this->country_id);
		$this->display_coverage= Tools::getCoverage($this->coverage_id);;
		$this->display_product= Tools::getProduct($this->product_id);;
		$this->display_status= Tools::getStatus($this->status_id);;
		$this->display_agent= Tools::getAgent($this->agent_id);
		$this->display_gender = Tools::getGender($this->gender);
		$this->display_temperature = Tools::getTemperature($this->temperature_id);
		$this->display_date_of_birth = date('d/m/Y',strtotime(str_replace('-', '/', $this->date_of_birth)));
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_contacts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contact_name, contact_email, phone, cell_phone, address, city, country_id, zip_code, gender, agent_id', 'required'),
			array('country_id, zip_code, gender, product_id, status_id, agent_id, premium, commission, renewal, bonus_commission, bonus_renewal, coverage_id, is_active, temperature_id', 'numerical', 'integerOnly'=>true),
			array('product_id,coverage_id,status_id,google_contact_id,google_etag','safe'),
			array('contact_name, address', 'length', 'max'=>500),
			array('contact_email', 'length', 'max'=>70),
			array('contact_email','email'),
			array('contact_email','unique'),
			array('phone, cell_phone', 'length', 'max'=>15),
			array('city', 'length', 'max'=>100),
			array('height, weight', 'length', 'max'=>11),
			array('date_of_birth', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, contact_name, contact_email, phone, cell_phone, address, city, country_id, zip_code, gender, product_id, status_id, agent_id, height, weight, date_of_birth, premium, commission, renewal, bonus_commission, bonus_renewal, coverage_id, is_active, temperature_id', 'safe', 'on'=>'search'),
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
			'contact_name' => 'Name',
			'contact_email' => 'Email',
			'phone' => 'Phone',
			'cell_phone' => 'Phone Cell',
			'address' => 'Address',
			'city' => 'City',
			'country_id' => 'Country',
			'zip_code' => 'Zip Code',
			'gender' => 'Gender',
			'product_id' => 'Product',
			'status_id' => 'Status',
			'agent_id' => 'Agent',
			'height' => 'Height',
			'weight' => 'Weight',
			'date_of_birth' => 'Date Of Birth',
			'premium' => 'Premium',
			'commission' => 'Commission',
			'renewal' => 'Renewal',
			'bonus_commission' => 'Bonus Commission',
			'bonus_renewal' => 'Bonus Renewal',
			'coverage_id' => 'Coverage',
			'is_active' => 'Is Active',
			'temperature_id' => 'Temperature',
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
		$criteria->compare('contact_name',$this->contact_name,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('cell_phone',$this->cell_phone,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('height',$this->height,true);
		$criteria->compare('weight',$this->weight,true);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('premium',$this->premium);
		$criteria->compare('commission',$this->commission);
		$criteria->compare('renewal',$this->renewal);
		$criteria->compare('bonus_commission',$this->bonus_commission);
		$criteria->compare('bonus_renewal',$this->bonus_renewal);
		$criteria->compare('coverage_id',$this->coverage_id);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('temperature_id',$this->temperature_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GEContact the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
