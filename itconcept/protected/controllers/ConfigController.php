<?php
class ConfigController extends GreatEastController{
	
	public $config='active';
	
	public function actionSettheme(){
		$theme =  $_POST['theme'];
		Yii::app()->user->setState('theme',$theme);
	}
	
	public function actionChangepassword(){
		$ChangePassword = ChangePassword::model()->findByPk(Yii::app()->user->id);
		if($this->isAjax()){
			if(isset($_POST['ChangePassword'])){
				$ChangePassword->attributes = $_POST['ChangePassword'];
				if($ChangePassword->validate()){
					$ChangePassword->password = $_POST['ChangePassword']['newPassword'];
					
					if($ChangePassword->save()){
						exit(json_encode(array('success'=>true)));
					}
					
				}else{
					exit(CActiveForm::validate($ChangePassword));
				}
			}
		}
		$this->render('_changePassword',array(
				'changePassword'=>$ChangePassword,
				'modelName'=>strtolower(get_class($ChangePassword))
			)
		);
	}
	
	public function actionIndex(){
		$logo = $this->logo();
		$bg = GECompanyBg::model()->findAll(array('order'=>'id DESC'));
		$website_data = $this->actionSetting();
		$this->render('index',array('logo'=>$logo,'bg'=>$bg,'model'=>$website_data));
	}
	
	public function actionChangelogo($id){
		$model = GECompanyLogo::model()->findByPk($id);
		$model->logo = $_POST['image'];
		$model->save();
	}
	
	public function actionAddbg($id){
		$model = New GECompanyBg;
		$model->company_id = $id;
		$model->background = $_POST['image'];
		$model->save();
	}
	
	private function logo(){
		return $model = GECompanyLogo::model()->findByPk(Yii::app()->user->id);
	}
	//website data
	public function actionSetting(){
		//$this->haveRights('websitedata');
		$model = New ConfigSite;
		$modeld = ConfigSite::model()->findAll();
		$configArray = array();
		foreach($modeld as $config){
			$configArray[$config->name]=$config->value;
		}
		$model->name = $configArray['name'];
		$model->title = $configArray['title'];
		$model->keywords = $configArray['keywords'];
		$model->description = $configArray['description'];
		$model->favicon = $configArray['favicon'];
		$model->logo = $configArray['logo'];
		$model->copyright = $configArray['copyright'];
		$model->fax = $configArray['fax'];
		$model->phone = $configArray['phone'];
		$model->email = $configArray['email'];
		$model->barcode = $configArray['barcode'];
		$model->address = $configArray['address'];
		$model->facebook = $configArray['facebook'];
		$model->twitter = $configArray['twitter'];
		$model->gplus = $configArray['gplus'];
		$model->maintenance = $configArray['maintenance'];
		 
		if(isset($_POST['ConfigSite'])){
			$model->attributes = $_POST['ConfigSite'];
			if($model->validate()){
				$model->saveSeoWebsite($model);
				exit(json_encode(array('success'=>true)));
			}else{
				exit(CActiveForm::validate($model));
			}
		}
			
		return $model;
	}
}
