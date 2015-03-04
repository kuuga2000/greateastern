<?php
class ClientsController extends GreatEastController
{
	public $clients = 'active';
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if($this->isAjax()){
			$this->renderPartial('view',array(
				'model'=>$this->loadModel($id),
				'title'=>'Detail Client #'.$id,
			),FALSE,TRUE);
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GEClient('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GEClient'])){
			$model->attributes=$_GET['GEClient'];
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		if($this->isAjax()){
			$model=new GEClient;
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
	
			if(isset($_POST['GEClient']))
			{
				$model->attributes=$_POST['GEClient'];
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
					'title'=>'Add Client',
					'modelName'=>strtolower(get_class($model)),
			),FALSE,TRUE);
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GEClient the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GEClient::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GEClient $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='geclient-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
