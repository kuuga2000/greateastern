<?php
Class DashboardController extends AgentcController{

    public function actionIndex(){
    	$modelLead=new GELead('search');
		$modelLead->unsetAttributes();  // clear any default values
		$modelLead->dbCriteria->condition = 'agent_id=:id';
		$modelLead->dbCriteria->params=array(':id'=>Yii::app()->user->id);
		
		$modelClient=new GEClient('search');
		$modelClient->unsetAttributes();  // clear any default values
		$modelClient->dbCriteria->condition = 'agent_id=:id';
		$modelClient->dbCriteria->params=array(':id'=>Yii::app()->user->id);
		
		if(isset($_GET['GELead'])){
			$modelLead->attributes=$_GET['GELead'];
		}
		if(isset($_GET['GEClient'])){
			$modelClient->attributes=$_GET['GEClient'];
		}
		
        $this->render('index',array(
        		'modelLead'=>$modelLead,
        		'modelClient'=>$modelClient,
			)
		);
    }

}