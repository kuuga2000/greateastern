<?php

/**
 * This is the model class for table "ge_products".
 *
 * The followings are the available columns in table 'ge_products':
 * @property integer $id
 * @property integer $coverage_id
 * @property string $product_name
 * @property string $commission
 * @property string $renewal
 */
class GEProduct extends CActiveRecord
{
	public $coverage_type;
	public $display_commission;
	public $display_renewal;
	
	public function afterFind(){
		$coverage = GECoverage::model()->findByPk($this->coverage_id);
		$this->coverage_type = empty($coverage) ? "" : $coverage->coverage_name;
		$this->display_commission = Yii::app()->numberFormatter->formatCurrency($this->commission,'$');
		$this->display_renewal = Yii::app()->numberFormatter->formatCurrency($this->renewal,'$');
		parent::afterFind();
	}
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ge_products';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coverage_id, product_name, commission, renewal', 'required'),
			array('coverage_id', 'numerical', 'integerOnly'=>true),
			array('renewal,commission','numerical'),
			array('product_name, commission, renewal', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, coverage_id, product_name, commission, renewal', 'safe', 'on'=>'search'),
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
			'coverage_id' => 'Coverage',
			'product_name' => 'Product Name',
			'commission' => 'Commission',
			'renewal' => 'Renewal',
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
		$criteria->compare('coverage_id',$this->coverage_id);
		$criteria->compare('product_name',$this->product_name,true);
		$criteria->compare('commission',$this->commission,true);
		$criteria->compare('renewal',$this->renewal,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GEProduct the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
