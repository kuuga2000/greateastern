<?php
Class Tools{
	
	public static function rand_color() {
    	return $color = sprintf('#%02X%02X%02X', rand(0, 255), rand(0, 255), rand(0, 255));  
    	//return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	}
	
	public static function countHotLead(){
		return $DATA = GELead::model()->findAll(array(
			'condition'=>'temperature_id=1 AND agent_id=:agent_id',
			'params'=>array(
				':agent_id'=>Yii::app()->user->id
			)
		));
	}
	
	public static function countWarmLead(){
		return $DATA = GELead::model()->findAll(array(
			'condition'=>'temperature_id=2 AND agent_id=:agent_id',
			'params'=>array(
				':agent_id'=>Yii::app()->user->id
			)
		));
	}
	
	public static function countCoolLead(){
		return $DATA = GELead::model()->findAll(array(
			'condition'=>'temperature_id=3 AND agent_id=:agent_id',
			'params'=>array(
				':agent_id'=>Yii::app()->user->id
			)
		));
	}
	
	public static function countColdLead(){
		return $DATA = GELead::model()->findAll(array(
			'condition'=>'temperature_id=4 AND agent_id=:agent_id',
			'params'=>array(
				':agent_id'=>Yii::app()->user->id
			)
		));
	}
	
	public static function countPotentialCommissionLead(){
		return $DATA = GELead::model()->findAll(array(
			'condition'=>'commission<>:commission AND agent_id=:agent_id',
			'params'=>array(
				':commission'=>111,
				':agent_id'=>Yii::app()->user->id
			),
		));
	}
	
	public static function countActiveClientByAgent(){
		return GEClient::model()->findAll(array(
			'condition'=>'agent_id=:id AND is_active=:active',
			'params'=>array(
					':id'=>Yii::app()->user->id,
					':active'=>1,
				)
			)
		);
	}
	
	public static function countPotentialRenewalClientByAgent(){
		return GEClient::model()->findAll(array(
			'condition'=>'agent_id=:id AND renewal<>:renewal',
			'params'=>array(
					':id'=>Yii::app()->user->id,
					':renewal'=>0,
				)
			)
		);
	}

	public static function getTopAgents($date='',$now=''){
		$now = date('Y-m-d');
		$datef = empty($date) ? null : "WHERE ge_clients.created_date >='{$date}' AND ge_clients.created_date <='{$now}'";
		$DATA = Yii::app()->db->createCommand(
			"SELECT COUNT(ge_clients.agent_id) AS totalClient,ge_agents.first_name,ge_agents.id AS agent_id FROM ge_clients
			 LEFT JOIN ge_agents ON ge_agents.id = ge_clients.agent_id
			 $datef
			 GROUP BY ge_clients.agent_id")->query();
		$agent_id = array();
		if($DATA===NULL){
			return array(0);
		}else{
			foreach($DATA as $data){
				$agent_id[]= $data['agent_id'];
			}
			return $agent_id;
		}
	}
	
	public static function getAllDataClientByAgent(){
		return GEClient::model()->findAll(array(
			'condition'=>'agent_id=:id',
			'params'=>array(':id'=>Yii::app()->user->id)
			)
		);
	}
	
	public static function getAllDataClientByAgent2($id){
		return GEClient::model()->findAll(array(
			'condition'=>'agent_id=:id',
			'params'=>array(':id'=>$id)
			)
		);
	}
	
	public static function getAllDataLeadByAgent2($id){
		return GELead::model()->findAll(array(
			'condition'=>'agent_id=:id',
			'params'=>array(':id'=>$id)
			)
		);
	}
	
	public static function getAllDataLeadByAgent(){
		return GELead::model()->findAll(array(
			'condition'=>'agent_id=:id',
			'params'=>array(':id'=>Yii::app()->user->id)
			)
		);
	}
	
	public static function getAllDataActiveLeadByAgent(){
		return GELead::model()->findAll(array(
			'condition'=>'agent_id=:id AND is_Active=1',
			'params'=>array(':id'=>Yii::app()->user->id)
			)
		);
	}
	
	public static function geDataAgent(){
		$Agent = GEAgent::model()->findByPk(Yii::app()->user->id);
		if(!empty($Agent)){
			return $Agent;
		}
		return NULL;
	}
		
	public static function getBgCompany(){
		$DATA = GECompanyBg::model()->find(array(
			'order'=>'RAND()',
			//'condition'=>'company_id=:id',
			//'params'=>array(':id'=>1),
			'limit'=>1,)
		);
		return empty($DATA) ? NULL : $DATA;
	}
	
	public static function getLogo(){
		$DATA = GECompanyLogo::model()->find(array('limit'=>1));
		return empty($DATA) ? NULL : $DATA;
	}
	
	public static function getCountry($id){
		$Country = GECountry::model()->findByPk($id);
		return empty($Country) ? "" : $Country->name;
	}
	
	public static function getCoverage($id){
		$Data = GECoverage::model()->findByPk($id);
		return empty($Data) ? "" : $Data->coverage_name;
	}
	
	public static function getStatus($id){
		$Data = GEStatus::model()->findByPk($id);
		return empty($Data) ? "" : $Data->description;
	}
	
	public static function getAgent($id){
		$Data = GEAgent::model()->findByPk($id);
		return empty($Data) ? "" : $Data->full_name;
	}
	
	public static function getProduct($id){
		$Data = GEProduct::model()->findByPk($id);
		return empty($Data) ? "" : $Data->product_name;
	}
	
	public static function getCategoryEvent($id){
		$Data = GECategoryEvent::model()->findByPk($id);
		return empty($Data) ? "" : $Data;
	}
	
	public static function getTemperature($id){
		$DATA = GETemperature::model()->findByPk($id);
		return empty($DATA) ? "" : $DATA->temperature;
	}
	
	public static function getGender($id=3){
		if($id==3){
			return $gender = "I Don't Know";
		}
		return $id==0 ? "Female":"Male";
	}
	
	public static function getEmailTemplate($id){
		$DATA = GEEmailTemplate::model()->findByPk($id);
		return empty($DATA) ? NULL : $DATA->email_template;
	}
	
	public static function getEmailTemplate2($id){
		$DATA = GEEmailTemplate::model()->findByPk($id);
		return empty($DATA) ? NULL : $DATA;
	}
	
	public static function getMarketingPlan(){
		$DATA = GEEmailMarketing::model()->findAll(array(
			'condition'=>'is_active=1'
		));
		return $DATA;
	}
	
	
	/*{getDATA*/
	public static function getAgentDATA($id){
		$Data = GEAgent::model()->findByPk($id);
		return empty($Data) ? "" : $Data;
	}
	/*getDATA}*/
}