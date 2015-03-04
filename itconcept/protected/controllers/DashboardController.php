<?php
Class DashboardController extends GreatEastController {
	
	public $dashboard = 'active';
	
	public function actionStatistic(){
		$date='';
		if(isset($_GET['Filter'])){
			$by = $_GET['Filter']['by'];	
			if($by=='weekly'){
				$date = date('Y-m-d',strtotime('-7 days'));
			}
			if($by=='monthly'){
				$date = date('Y-m-d',strtotime('-1 month'));
			}
			if($by=='6months'){
				$date = date('Y-m-d',strtotime('-6 months'));
			}
			if($by=='1year'){
				$date = date('Y-m-d',strtotime('-1 years'));
			}
			
		}
		$agent_id = Tools::getTopAgents($date);
		if(!empty($agent_id)){
			$Data = GEAgent::model()->findAll(array('limit'=>10,'condition'=>'id IN('.implode(',',$agent_id).')'));
			$this->renderPartial('statistic',array('Data'=>$Data));
		}
	}
	
	public function actionIndex() {
		$modelAgent = new GEAgent('search');
		$modelAgent -> unsetAttributes();
		$date='';
		//if($this->isAjax()){
		if(isset($_GET['Filter'])){
			$by = $_GET['Filter']['by'];	
			if($by=='weekly'){
				$date = date('Y-m-d',strtotime('-7 days'));
			}
			if($by=='monthly'){
				$date = date('Y-m-d',strtotime('-1 month'));
			}
			if($by=='6months'){
				$date = date('Y-m-d',strtotime('-6 months'));
			}
			if($by=='1year'){
				$date = date('Y-m-d',strtotime('-1 years'));
			}
		}
		//}
		$agent_id = Tools::getTopAgents($date);
		$modelAgent->dbCriteria->limit = 10;
		if(!empty($agent_id)){
			$modelAgent->dbCriteria->condition = 'id IN('.implode(',',$agent_id).')';
		}else{
			$modelAgent->dbCriteria->condition = 'id IN(0)';
		}
		
		if (isset($_GET['GEAgent'])){			 
			$model -> attributes = $_GET['GEAgent'];
		}
		$this -> render('index', 
			array(
				'modelAgent' => $modelAgent, 
			)
		);
	}
}
