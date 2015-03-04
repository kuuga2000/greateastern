<?php

class LeadsController extends GreatEastController
{
	public $leads = 'active';
	
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->renderPartial('view',array(
			'model'=>$this->loadModel($id),
			'title'=>'Detail Lead #'.$id,
		),FALSE,TRUE);
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GELead;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['GELead']))
		{
			$model->attributes=$_POST['GELead'];
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
			'title'=>'Add Lead',
			'url'=>$this->id,'/create',
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
		$this->performAjaxValidation($model);

		if(isset($_POST['GELead']))
		{
			$model->attributes=$_POST['GELead'];
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
			'title'=>'Edit Lead',
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
		$dataProvider=new CActiveDataProvider('GELead');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GELead('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GELead']))
			$model->attributes=$_GET['GELead'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GELead the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GELead::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GELead $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gelead-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
