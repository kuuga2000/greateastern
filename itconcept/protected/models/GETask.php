<?php

/**
 * This is the model class for table "ge_tasks".
 *
 * The followings are the available columns in table 'ge_tasks':
 * @property integer $id
 * @property integer $lead_id
 * @property integer $client_id
 * @property integer $agent_id
 * @property string $date
 * @property string $time
 * @property string $description
 */
class GETask extends CActiveRecord
{
	public $H;
	public $HH = array(
		'1'=>'1',
		'2'=>'2',
		'3'=>'3',
		'4'=>'4',
		'5'=>'5',
		'6'=>'6',
		'7'=>'7',
		'8'=>'8',
		'9'=>'9',
		'10'=>'10',
		'11'=>'11',
		'12'=>'12',
	);
	public $I;
	public $II = array(
		'00'=>'00',
		'15'=>'15',
		'30'=>'30',
		'45'=>'45',
	);
	public $A;
	public $AA = array(
		'am'=>'AM',
		'pm'=>'PM',
	);
	
	public $display_full_calendar;
	public $display_agent;
	public $display_event=array();
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_tasks';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_category_id,date, time, description', 'required'),
			array('event_category_id,lead_id, client_id, agent_id', 'numerical', 'integerOnly'=>true),
			array('date','checkDateType'),
			array('google_calendar_id,google_summary_event','safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, lead_id, client_id, agent_id, date, time, description', 'safe', 'on'=>'search'),
		);
	}
	
	public function checkDateType(){
		if(!Validate::is_valid_date($this->date)){
			$this->addError('date','Date format must be DD/MM/YY.');
		}
	}
	
	public function afterFind(){
		parent::afterFind();
		$TIME = str_replace(':',' ',date('g:i a',strtotime($this->time)));
		$Time = explode(' ', $TIME);
		$this->H = $Time[0];
		$this->I = $Time[1];
		$this->A = $Time[2]; 
		$this->display_full_calendar = date('Y,m,d',strtotime("{$this->date} -1 months")).','.date("H,i",strtotime($this->time));
		$this->display_agent= Tools::getAgent($this->agent_id);
		$dataEvent = Tools::getCategoryEvent($this->event_category_id);
		$this->display_event = empty($dataEvent) ? $this->google_summary_event : $dataEvent;
	}
	
	public function beforeSave(){
		if(parent::beforeSave()){
			$this->date = date('Y-m-d',strtotime(str_replace('/', '-', $this->date)));
			return TRUE;
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

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'lead_id' => 'Lead',
			'client_id' => 'Client',
			'agent_id' => "Who's Responsible",
			'date' => 'Date',
			'time' => 'Time',
			'description' => 'Description',
			'event_category_id'=>'Category'
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
		$criteria->compare('lead_id',$this->lead_id);
		$criteria->compare('client_id',$this->client_id);
		$criteria->compare('agent_id',$this->agent_id);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GETask the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
