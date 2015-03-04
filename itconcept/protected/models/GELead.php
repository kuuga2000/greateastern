<?php

/**
 * This is the model class for table "ge_leads".
 *
 * The followings are the available columns in table 'ge_leads':
 * @property integer $id
 * @property string $lead_name
 * @property string $lead_email
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
 */
class GELead extends CActiveRecord
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
		$this->display_temperature = Tools::getTemperature($this->temperature_id);
		$this->display_coverage= Tools::getCoverage($this->coverage_id);;
		$this->display_product= Tools::getProduct($this->product_id);;
		$this->display_status= Tools::getStatus($this->status_id);;
		$this->display_agent= Tools::getAgent($this->agent_id);
		$this->display_gender = Tools::getGender($this->gender);
		$this->display_date_of_birth = date('d/m/Y',strtotime(str_replace('-', '/', $this->date_of_birth)));
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			if($this->isNewRecord){
				$this->created_date = date('Y-m-d H:i:s');
			}
			$this->date_of_birth = !empty($this->date_of_birth) ? date('Y-m-d',strtotime(str_replace('/', '-', $this->date_of_birth))) : NULL;	
			return TRUE;
		}
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_leads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('commission,renewal,premium,bonus_commission,bonus_renewal,lead_name, lead_email, phone, cell_phone, address, date_of_birth,city, country_id, zip_code, gender, product_id, status_id, agent_id,coverage_id', 'required'),
			array('country_id, zip_code, gender, product_id, status_id, agent_id', 'numerical', 'integerOnly'=>true),
			array('lead_email','email'),
			array('lead_email','unique'),
			array('temperature_id','safe'),
			array('phone,cell_phone,commission,renewal,premium,bonus_commission,bonus_renewal,is_active','numerical'),
			array('height,weight,created_date','safe'),
			array('date_of_birth','checkDateType'),
			array('lead_name, address', 'length', 'max'=>500),
			array('lead_email', 'length', 'max'=>70),
			array('zip_code', 'length', 'max'=>5),
			array('phone, cell_phone', 'length', 'max'=>15),
			array('city', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lead_name, lead_email, phone, cell_phone, address, city, country_id, zip_code, gender, product_id, coverage_id,status_id, agent_id', 'safe', 'on'=>'search'),
		);
	}

	public function checkDateType(){
		if(!empty($this->date_of_birth)){
			if(!Validate::is_valid_date($this->date_of_birth)){
				$this->addError('date_of_birth','Date format must be DD/MM/YY.');
			}
		}
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
	
	public function xx()
	{
		return array(
			'id' => 'ID',);
	}
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lead_name' => 'Lead Name',
			'lead_email' => 'Lead Email',
			'phone' => 'Phone',
			'cell_phone' => 'Cell Phone',
			'address' => 'Address',
			'city' => 'City',
			'country_id' => 'Country',
			'zip_code' => 'Zip Code',
			'gender' => 'Gender',
			'product_id' => 'Product',
			'status_id' => 'Status',
			'agent_id' => 'Agent',
			'coverage_id'=>'Coverage Type',
			'temperature_id'=>'Temperature',
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
		$criteria->compare('lead_name',$this->lead_name,true);
		$criteria->compare('lead_email',$this->lead_email,true);
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
		$criteria->compare('coverage_id',$this->coverage_id);
		$criteria->compare('is_active',$this->is_active);
		$criteria->compare('temperature_id',$this->temperature_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchData()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('product_id',$this->product_id);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('coverage_id',$this->coverage_id);
		$criteria->compare('temperature_id',$this->temperature_id);
		$criteria->compare('is_active',$this->is_active);

		return $this::model()->findAll($criteria);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GELead the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
