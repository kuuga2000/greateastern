<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();


	public $Website;
	public function init(){
		$this->Website = New Website;
		$this->Website->defaultMeta();
		$segment = explode('/',$this->id);
		if($segment[0]=='agent' && $segment[1]!="login"){
			$this->forceAgentLogin();
		}
		if($segment[0]!='login' && !isset($segment[1])){
			$this->forceCompanyLogin();	 
		}
		parent::init();
	}

    public function baseUrl(){
        return Yii::app()->getBaseUrl(TRUE);
    }
	public function baseUrlAgent($val=FALSE){
		return $val==TRUE ? Yii::app()->getBaseUrl(TRUE).'/agent' : Yii::app()->getBaseUrl(TRUE).'/agent/dashboard';
		
	}
	public function isAjax(){
		return Yii::app() -> request -> isAjaxRequest;
	}
	public function forceAjaxRequest(){
		if(!$this->isAjax()){
			exit;
		}
	}
	public function baseHref(){
		return "http://great-eastern.cms.clientsdemo.net";
	}
	public function avoidDoubleLoadJs(){
		
		$cs=Yii::app()->clientScript;
       	return $cs->scriptMap=array(
         'jquery.js'=>false,
         'jquery.ui.js' => false,
		);
	}
	
	public function forceAgentLogin(){
		if(!isset(Yii::app()->user->agentLogin)){
			$this->redirect(array('/agent/login'));
		}
	}
	
	public function forceCompanyLogin(){
		if(!isset(Yii::app()->user->companyLogin)){
			$this->redirect(array('/'));
		}
	}
	
}