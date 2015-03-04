<?php

class EmailsController extends AgentcController
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
	public function actionCreate()
	{
		$this->forceAjaxRequest();
		$model=new GEEmailTemplate;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['GEEmailTemplate']))
		{
			$model->attributes=$_POST['GEEmailTemplate'];
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
			'title'=>'Add Email Template',
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
		$this->forceAjaxRequest();
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['GEEmailTemplate']))
		{
			$model->attributes=$_POST['GEEmailTemplate'];
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
			'title'=>'Edit Email Template',
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
		$dataProvider=new CActiveDataProvider('GEEmailTemplate');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GEEmailTemplate('search');
		$modelEmailSent = New GEEmailSent;
		$model->unsetAttributes();  // clear any default values
		//$model->dbCriteria->condition = 'agent_id=:id';
		//$model->dbCriteria->params=array(':id'=>Yii::app()->user->id);
		if(isset($_GET['GEEmailTemplate'])){
			$model->attributes=$_GET['GEEmailTemplate'];
		}
		
		$EmailMarketing =new GEEmailMarketing('search');
		$EmailMarketing->unsetAttributes();  // clear any default values
		$EmailMarketing->dbCriteria->order = 'id DESC';
		$EmailMarketing->dbCriteria->condition = 'agent_id=:id';
		$EmailMarketing->dbCriteria->params=array(':id'=>Yii::app()->user->id);
		if(isset($_GET['EmailMarketing'])){
			$model->attributes=$_GET['EmailMarketing'];
		}
		
		$this->render('admin',array(
			'dataMarketingPlan'=>$EmailMarketing,
			'model'=>$model,
			'modelEmailSent'=>$modelEmailSent,
			'modelName'=>strtolower(get_class($model)),
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GEEmailTemplate the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GEEmailTemplate::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GEEmailTemplate $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='geemail-template-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
