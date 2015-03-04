<?php

/**
 * This is the model class for table "ge_notes".
 *
 * The followings are the available columns in table 'ge_notes':
 * @property integer $id
 * @property integer $to_lead_id
 * @property integer $to_client_id
 * @property string $note
 * @property integer $from_lead_id
 * @property integer $from_client_id
 */
class GENote extends CActiveRecord
{
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_notes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('note', 'required'),
			array('to_lead_id, to_client_id, from_lead_id, from_client_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, to_lead_id, to_client_id, note, from_lead_id, from_client_id', 'safe', 'on'=>'search'),
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
			'to_lead_id' => 'To Lead',
			'to_client_id' => 'To Client',
			'note' => 'Note',
			'from_lead_id' => 'From Lead',
			'from_client_id' => 'From Client',
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
		$criteria->compare('to_lead_id',$this->to_lead_id);
		$criteria->compare('to_client_id',$this->to_client_id);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('from_lead_id',$this->from_lead_id);
		$criteria->compare('from_client_id',$this->from_client_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GENote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
