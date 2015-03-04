<?php
Class ConfigSite extends CActiveRecord{
	public $name;
	public $title;
	public $keywords;
	public $description;
	public $favicon;
	public $logo;
	public $copyright;
	 
	
	//baron
	public $phone;
	public $fax;
	public $email;
	public $address;
	public $barcode;
	public $facebook;
	public $twitter;
	public $gplus;
	public $maintenance;
	
	public $seoWebsite = array(
		'name','title','keywords','description','favicon','logo','logo','copyright','phone','fax','maintenance','address','email','barcode','facebook','twitter','gplus'
	);
	
	/*social network*/
	/*public $og_facebook;
	public $og_twitter;
	public $inject_code;
	*/
	
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
	
	public function tableName(){
		return 'tb_config';
	}
	
	public function rules(){
		return array(
			array('name,title','required'),
			array('email','email'),
			array('keywords,copyright,favicon,description,fax,email,phone,logo,twitter,facebook,gplus,address,barcode','safe')
		);
	}
	
	public function attributeLabels(){
		return array(
			'name'=>'Company Name',
			'title'=>'Title App',
			'keywords'=>'Website keyword',
			'description'=>'Description',
			'favicon'=>'Favicon',
			'logo'=>'Logo',
			'copyright'=>'Copyright',
			'phone'=>'Phone',
			'fax'=>'Fax',	
			'gplus'=>'Google plus',
			 
		);
	}

	public function saveSeoWebsite($value){
		foreach($this->seoWebsite as $var){
			Yii::app()->db->createCommand("UPDATE tb_config SET value='".$value->{$var}."' WHERE name ='".$var."'")->query();
		}
	}
}