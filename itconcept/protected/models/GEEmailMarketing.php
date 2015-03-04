<?php

/**
 * This is the model class for table "ge_email_marketing".
 *
 * The followings are the available columns in table 'ge_email_marketing':
 * @property integer $id
 * @property string $select_recipients
 * @property string $send_with_temperature
 * @property string $send_with_status
 * @property string $send_with_coverage
 * @property string $send_with_carrier
 * @property string $send_with_product
 * @property integer $template_id
 * @property integer $send_after
 * @property string $time_name
 */
class GEEmailMarketing extends CActiveRecord
{
	public $recipients;
	public $display_template;
	public $times_ = array(
		'minute'=>'Minute(s)',
		'hour'=>'Hour(s)',
		'day'=>'Day(s)',
		'week'=>'Week(s)',
		'month'=>'Month(s)',
		'year'=>'Year(s)',
	);
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_email_marketing';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('marketing_plan_name,select_recipients, send_after, time_name,agent_id', 'required'),
			array('marketing_plan_name','unique'),
			array('recipients,is_active','safe'),
			array('template_id, send_after', 'numerical', 'integerOnly'=>true),
			array('select_recipients, send_with_temperature, send_with_status, send_with_coverage, send_with_carrier, send_with_product', 'length', 'max'=>500),
			array('time_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, select_recipients, send_with_temperature, send_with_status, send_with_coverage, send_with_carrier, send_with_product, template_id, send_after, time_name', 'safe', 'on'=>'search'),
		);
	}
	
	public function afterFind(){
		$this->display_template = Tools::getEmailTemplate2($this->template_id);
		parent::afterFind();
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
			'marketing_plan_name'=>'Marketing Plan Name',
			'select_recipients' => 'Select Recipients',
			'send_with_temperature' => 'Send With Temperature',
			'send_with_status' => 'Send With Status',
			'send_with_coverage' => 'Send With Coverage',
			'send_with_carrier' => 'Send With Carrier',
			'send_with_product' => 'Send With Product',
			'template_id' => 'Template',
			'send_after' => 'Send After',
			'time_name' => 'Time Name',
			'is_active'=>'Active',
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
		$criteria->compare('select_recipients',$this->select_recipients,true);
		$criteria->compare('send_with_temperature',$this->send_with_temperature,true);
		$criteria->compare('send_with_status',$this->send_with_status,true);
		$criteria->compare('send_with_coverage',$this->send_with_coverage,true);
		$criteria->compare('send_with_carrier',$this->send_with_carrier,true);
		$criteria->compare('send_with_product',$this->send_with_product,true);
		$criteria->compare('template_id',$this->template_id);
		$criteria->compare('send_after',$this->send_after);
		$criteria->compare('time_name',$this->time_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GEEmailMarketing the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
