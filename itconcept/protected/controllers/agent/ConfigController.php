<?php
class ConfigController extends AgentcController{	
	public function actionSettheme(){
		$theme =  $_POST['theme'];
		Yii::app()->user->setState('theme',$theme);
	}
}