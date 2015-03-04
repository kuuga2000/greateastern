<?php

class AgentsController extends GreatEastController
{
	public $agents = 'active';
	
	public function actionView_client($id){
		if($this->isAjax()){
			$model = GEClient::model()->findByPk($id);
			$this->renderPartial('/agent/clients/view',array(
				'model'=>$model,
				'title'=>'Detail Client #'.$id,
			),FALSE,TRUE);
		}
	}
	
	public function actionView_lead($id){
		if($this->isAjax()){
			$model = GELead::model()->findByPk($id);
			$this->renderPartial('/agent/leads/view',array(
				'model'=>$model,
				'title'=>'Detail Lead #'.$id,
			),FALSE,TRUE);
		}
	}
	
	public function actionView_contact($id){
		if($this->isAjax()){
			$model = GEContact::model()->findByPk($id);
			$this->renderPartial('/agent/contacts/view',array(
				'model'=>$model,
				'title'=>'Detail Contact #'.$id,
			),FALSE,TRUE);
		}
	}
	
	public function actionDetail($id){
		
		$modelLead=new GELead('search');
		$modelLead->unsetAttributes();  // clear any default values
		$modelLead->dbCriteria->condition = 'agent_id=:id';
		$modelLead->dbCriteria->params=array(':id'=>$id);
		
		$modelClient=new GEClient('search');
		$modelClient->unsetAttributes();  // clear any default values
		$modelClient->dbCriteria->condition = 'agent_id=:id';
		$modelClient->dbCriteria->params=array(':id'=>$id);
		
		$modelContact = New GEContact('search');
		$modelContact->unsetAttributes();
		$modelContact->dbCriteria->condition = 'agent_id=:id';
		$modelContact->dbCriteria->params = array(':id'=>$id);
		
		if(isset($_GET['GEClient'])){
			$modelClient->attributes=$_GET['GEClient'];
		}
		
		if(isset($_GET['GELead'])){
			$modelLead->attributes=$_GET['GELead'];
		}
		
		if(isset($_GET['GEContact'])){
			$modelContact->attributes=$_GET['GEContact'];
		}
		
		$this->render('detail',array(
			'modelLead'=>$modelLead,
			'modelClient'=>$modelClient,
			'modelContact'=>$modelContact,
			'model'=>$this->loadModel($id),
			'title'=>'Detail Agent #'.$id,
		),FALSE,TRUE);
		
	}
	
	public function actionSuspend($id){
		if($this->isAjax()){
			$model = $this->loadModel($id);
			$model->is_active = 0;
			if($model->save()){
				exit(json_encode(
					array(
						"success"=>true,
						'message'=>"Agent with name <b>{$model->full_name} #$id has been suspended successfully",
					)
				   )
				);
			}
		}
	}
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->renderPartial('view',array(
			'model'=>$this->loadModel($id),
			'title'=>'Detail Agent #'.$id,
		),FALSE,TRUE);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GEAgent;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GEAgent']))
		{
			$model->attributes=$_POST['GEAgent'];
			$model->password = $password = uniqid();
			$model->username = $model->email;
			if($model->validate()){
				if($model->save()){
					$mail = New Mail;
					$message = $this->renderPartial('/emails/company',array(
						'footer'=>Yii::app()->user->company_name,
						'title'=>'Your Agent Login Info',
						'message'=>"Dear {$model->first_name},<br>
							Please find below your login information:
							<p>
								Username: {$model->username}<br>
								Password: {$password}<br>
								Login URL: <a href='".$this->baseUrlAgent(TRUE)."/login'>".$this->baseUrlAgent(TRUE)."/login</a>
							</p>
							Thank you.",
					),TRUE);
					$mail->send($model->email,'New Agent Added',$message);
					exit(json_encode(array('success'=>true)));	
				}
			}else{
				exit(CActiveForm::validate($model));
			}	
		}

		$this->renderPartial('_form',array(
			'model'=>$model,
			'title'=>'Add Agent',
			'modelName'=>strtolower(get_class($model)),
		),FALSE,TRUE);
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

		if(isset($_POST['GEAgent']))
		{
			$model->attributes=$_POST['GEAgent'];
			$model->username = $model->email;
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
			'title'=>'Edit Agent',
			'modelName'=>strtolower(get_class($model)),
		),FALSE,TRUE);
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
		$dataProvider=new CActiveDataProvider('GEAgent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GEAgent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GEAgent'])){		
			$model->attributes=$_GET['GEAgent'];
		}
		$this->render('admin',array(
			'model'=>$model,
			'title'=>'Agents'
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GEAgent the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GEAgent::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GEAgent $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='geagent-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
