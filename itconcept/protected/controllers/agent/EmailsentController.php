<?php

class EmailsentController extends AgentcController
{

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreatexx()
	{
		$model=new GEEmailSent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GEEmailSent']))
		{
			$model->attributes=$_POST['GEEmailSent'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionCreate()
	{
		$model=new GEEmailSent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GEEmailSent']))
		{
			$model->attributes=$_POST['GEEmailSent'];
			if($model->validate()){
				if($model->save()){
					exit(json_encode(array('success'=>true)));	
				}
			}else{
				exit(CActiveForm::validate($model));
			}
		}

		$this->renderPartial('_form',array(
			'model'=>$model,
			'title'=>'Send Emails',
			'modelName'=>strtolower(get_class($model)),
		),FALSE,TRUE);
	}
	
	public function actionDo()
	{
		$this->forceAjaxRequest();
		$model=new GEEmailSent;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['GEEmailSent']))
		{
			$model->attributes=$_POST['GEEmailSent'];
			$recipients = $model->recipients;
			if(!empty($recipients)){
				asort($recipients);
				array_splice($recipients, 0, 2);
				$model->select_recipients = (implode(',',$recipients));
			}
			if($model->validate()){
				if($model->save()){
					$this->Sent($model);
					exit(json_encode(array('success'=>true)));	
				}
			}else{
				exit(CActiveForm::validate($model));
			}
		}

		$this->renderPartial('_form',array(
			'model'=>$model,
			'title'=>'Send Emails',
			'modelName'=>strtolower(get_class($model)),
		),FALSE,TRUE);
	}

	protected function Sent($model){
		$mail = New Mail;
		$template = Tools::getEmailTemplate($model->template_id);
		$recipients = explode(',',$model->select_recipients);
		$mail->email_sender = $model->from_email_address;
		$mail->sender_name = $model->from_name;
		//{send email for clients
		if(in_array('clients',$recipients)){
			/*$Clients = GEClient::model()->findAll(array(
				'condition'=>'is_active=1'
			));*/
			$Clients = New GEClient;
			$Clients->status_id = $model->send_with_status;
			$Clients->is_active = 1;
			$Clients->coverage_id = $model->send_with_coverage;
			$Clients->product_id = $model->send_with_product;
			$Clientss = $Clients->search()->getData();
			/*if(empty($Leadss)){
				exit(json_encode(array('success'=>FALSE)));
			}*/
			$i=1;
			foreach($Clientss as $Client):
				$message = str_replace('#RECEIVER_NAME#', $Client->client_name,$template);
				$message_2 = str_replace('#RECEIVER_ADDRESS#', $Client->address,$message);
				$message_3 = str_replace('#RECEIVER_CITY#', $Client->city,$message_2);
				$message_4 = str_replace('#RECEIVER_STATE#', $Client->display_country,$message_3);
				$message_5 = str_replace('#RECEIVER_ZIP#', $Client->zip_code,$message_4);
				$message_6 = str_replace('#RECEIVER_PHONE#', $Client->phone,$message_5);
				$message_7 = str_replace('#RECEIVER_CELLPHONE#', $Client->cell_phone,$message_6);
				$message_8 = str_replace('#PRODUCT#', $Client->display_product,$message_7);
				$message_9 = str_replace('#COVERAGE_TYPE#', $Client->display_coverage,$message_8);
				$message_10 = str_replace('#COMMISSION#', $Client->commission,$message_9);
				$message_11 = str_replace('#RENEWAL#', $Client->renewal,$message_10);
				$message_12 = str_replace('#CREATE_DATE#', $Client->created_date,$message_11);
				$message_13 = str_replace('#RECEIVER_EMAIL#', $Client->client_email,$message_12);
				//$message = str_replace('#RECEIVER_TEMPERATURE#', $Client->temperature_id,$template);
				$message_14 = str_replace('#AGENT_NAME#', Tools::getAgentDATA($Client->agent_id)->full_name,$message_13);
				$message_15 = str_replace('#AGENT_EMAIL#', Tools::getAgentDATA($Client->agent_id)->email,$message_14);
				$message_16 = str_replace('#AGENT_ADDRESS#', Tools::getAgentDATA($Client->agent_id)->address,$message_15);
				//$message .= str_replace('#AGENT_ADDRESS2#', $Client->agent_name,$template);
				$message_17 = str_replace('#AGENT_CITY#', Tools::getAgentDATA($Client->agent_id)->city,$message_16);
				$message_18 = str_replace('#AGENT_STATE#', Tools::getCountry(Tools::getAgentDATA($Client->agent_id)->country_id),$message_17);
				$message_19 = str_replace('#AGENT_ZIP#', Tools::getAgentDATA($Client->agent_id)->zip_code,$message_18);
				$message_20 = str_replace('#AGENT_CELLPHONE#', Tools::getAgentDATA($Client->agent_id)->cell,$message_19);
				$message_21 = str_replace('#AGENT_PHONE#', Tools::getAgentDATA($Client->agent_id)->phone,$message_20);
				$message_23 = str_replace('#EMAIL_CONTENT#', $model->content_email,$message_21);
				$mail->sendBlast($Client->client_email,$model->email_subject_line,$message_23);
			$i++;
			endforeach;	
		}
		//send email for clients}
		//{send email for leads
		//if($i==count($Clients)){
			if(in_array('leads',$recipients)){
				/*$Leads = GELead::model()->findAll(array(
					'condition'=>'is_active=1'
				));*/
				$Leads = New GELead;
				$Leads->status_id = $model->send_with_status;
				$Leads->is_active = 1;
				$Leads->temperature_id = $model->send_with_temperature;
				$Leads->coverage_id = $model->send_with_coverage;
				$Leads->product_id = $model->send_with_product;
				$Leadss = $Leads->search()->getData();
				/*if(empty($Leadss)){
					exit(json_encode(array('success'=>FALSE)));
				}*/
				foreach($Leadss as $Lead):
					$message = str_replace('#RECEIVER_NAME#', $Lead->lead_name,$template);
					$message_2 = str_replace('#RECEIVER_ADDRESS#', $Lead->address,$message);
					$message_3 = str_replace('#RECEIVER_CITY#', $Lead->city,$message_2);
					$message_4 = str_replace('#RECEIVER_STATE#', $Lead->display_country,$message_3);
					$message_5 = str_replace('#RECEIVER_ZIP#', $Lead->zip_code,$message_4);
					$message_6 = str_replace('#RECEIVER_PHONE#', $Lead->phone,$message_5);
					$message_7 = str_replace('#RECEIVER_CELLPHONE#', $Lead->cell_phone,$message_6);
					$message_8 = str_replace('#PRODUCT#', $Lead->display_product,$message_7);
					$message_9 = str_replace('#COVERAGE_TYPE#', $Lead->display_coverage,$message_8);
					$message_10 = str_replace('#COMMISSION#', $Lead->commission,$message_9);
					$message_11 = str_replace('#RENEWAL#', $Lead->renewal,$message_10);
					$message_12 = str_replace('#CREATE_DATE#', $Lead->created_date,$message_11);
					$message_13 = str_replace('#RECEIVER_EMAIL#', $Lead->lead_email,$message_12);				
					$message_14 = str_replace('#AGENT_NAME#', Tools::getAgentDATA($Lead->agent_id)->full_name,$message_13);
					$message_15 = str_replace('#AGENT_EMAIL#', Tools::getAgentDATA($Lead->agent_id)->email,$message_14);
					$message_16 = str_replace('#AGENT_ADDRESS#', Tools::getAgentDATA($Lead->agent_id)->address,$message_15);
					//$message .= str_replace('#AGENT_ADDRESS2#', $Client->agent_name,$template);
					$message_17 = str_replace('#AGENT_CITY#', Tools::getAgentDATA($Lead->agent_id)->city,$message_16);
					$message_18 = str_replace('#AGENT_STATE#', Tools::getCountry(Tools::getAgentDATA($Lead->agent_id)->country_id),$message_17);
					$message_19 = str_replace('#AGENT_ZIP#', Tools::getAgentDATA($Lead->agent_id)->zip_code,$message_18);
					$message_20 = str_replace('#AGENT_CELLPHONE#', Tools::getAgentDATA($Lead->agent_id)->cell,$message_19);
					$message_21 = str_replace('#AGENT_PHONE#', Tools::getAgentDATA($Lead->agent_id)->phone,$message_20);
					$message_23 = str_replace('#EMAIL_CONTENT#', $model->content_email,$message_21);
					$message_24 = str_replace('#RECEIVER_TEMPERATURE#', $Lead->display_temperature,$message_23);
					$mail->sendBlast($Lead->lead_email,$model->email_subject_line,$message_24);
				endforeach;	
			}
		//}
		//send email for leads}
		//sent sample
		if(!empty($model->send_sample_to)){
			//lead
			$mail->sendBlast($model->send_sample_to,$model->email_subject_line,$message_24);
			//client
			$mail->sendBlast($model->send_sample_to,$model->email_subject_line,$message_23);
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GEEmailSent']))
		{
			$model->attributes=$_POST['GEEmailSent'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GEEmailSent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GEEmailSent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GEEmailSent']))
			$model->attributes=$_GET['GEEmailSent'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GEEmailSent the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GEEmailSent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GEEmailSent $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='geemailsent-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
