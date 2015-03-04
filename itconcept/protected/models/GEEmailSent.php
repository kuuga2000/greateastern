<?php

/**
 * This is the model class for table "ge_email_sent".
 *
 * The followings are the available columns in table 'ge_email_sent':
 * @property integer $id
 * @property string $select_recipients
 * @property string $send_with_temperature
 * @property string $send_with_status
 * @property string $send_with_coverage
 * @property string $send_with_carrier
 * @property string $send_with_product
 * @property string $send_sample_to
 * @property integer $template_id
 * @property string $from_name
 * @property string $email_subject_line
 * @property string $from_email_address
 * @property string $content_email
 */
class GEEmailSent extends CActiveRecord
{
	
	public $recipients;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_email_sent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('template_id,from_email_address,from_name,select_recipients,email_subject_line', 'required'),
			array('from_email_address,send_sample_to','email'),
			array('template_id', 'numerical', 'integerOnly'=>true),
			//array('select_recipients','checkRecipients'),
			array('select_recipients, send_with_temperature, send_with_status, send_with_coverage, send_with_carrier, send_with_product, send_sample_to, from_name, email_subject_line, from_email_address', 'length', 'max'=>500),
			array('content_email,recipients', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, select_recipients, send_with_temperature, send_with_status, send_with_coverage, send_with_carrier, send_with_product, send_sample_to, template_id, from_name, email_subject_line, from_email_address, content_email', 'safe', 'on'=>'search'),
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
			'select_recipients' => 'Select Recipients',
			'send_with_temperature' => 'Send With Temperature',
			'send_with_status' => 'Send With Status',
			'send_with_coverage' => 'Send With Coverage',
			'send_with_carrier' => 'Send With Carrier',
			'send_with_product' => 'Send With Product',
			'send_sample_to' => 'Send Sample To',
			'template_id' => 'Using Template Email',
			'from_name' => 'From Name',
			'email_subject_line' => 'Email Subject Line',
			'from_email_address' => 'From Email Address',
			'content_email' => 'Content Email',
			'recipients'=>'Select Recipients',
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
		$criteria->compare('send_sample_to',$this->send_sample_to,true);
		$criteria->compare('template_id',$this->template_id);
		$criteria->compare('from_name',$this->from_name,true);
		$criteria->compare('email_subject_line',$this->email_subject_line,true);
		$criteria->compare('from_email_address',$this->from_email_address,true);
		$criteria->compare('content_email',$this->content_email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GEEmailSent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
