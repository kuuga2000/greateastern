<?php

/**
 * This is the model class for table "ge_email_template".
 *
 * The followings are the available columns in table 'ge_email_template':
 * @property integer $id
 * @property string $template_name
 * @property string $email_subject_line
 * @property string $from_name
 * @property string $from_email_address
 * @property string $bcc_yourself
 * @property string $email_template
 */
class GEEmailTemplate extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_email_template';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('template_name, email_subject_line, from_name, from_email_address, bcc_yourself, email_template', 'required'),
			array('template_name','unique'),
			array('bcc_yourself,from_email_address','email'),
			array('template_name, email_subject_line, from_name, from_email_address, bcc_yourself', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, template_name, email_subject_line, from_name, from_email_address, bcc_yourself, email_template', 'safe', 'on'=>'search'),
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
			'template_name' => 'Template Name',
			'email_subject_line' => 'Email Subject Line',
			'from_name' => 'From Name',
			'from_email_address' => 'From Email Address',
			'bcc_yourself' => 'Bcc Yourself',
			'email_template' => 'Email Template',
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
		$criteria->compare('template_name',$this->template_name,true);
		$criteria->compare('email_subject_line',$this->email_subject_line,true);
		$criteria->compare('from_name',$this->from_name,true);
		$criteria->compare('from_email_address',$this->from_email_address,true);
		$criteria->compare('bcc_yourself',$this->bcc_yourself,true);
		$criteria->compare('email_template',$this->email_template,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GEEmailTemplate the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
