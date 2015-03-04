<?php
class ContactsController extends GreatEastController
{
	public $contacts = 'active';
	
	public function actionAdmin(){
		$model=new GEContact('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order = 'id DESC';
		if(isset($_GET['GEContact'])){
			$model->attributes=$_GET['GEContact'];
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
		$model=new GEContact;
		if($this->isAjax()){
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
	
			if(isset($_POST['GEContact']))
			{
				$model->attributes=$_POST['GEContact'];
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
				'title'=>'Add Contact',
				'modelName'=>strtolower(get_class($model)),
			),FALSE,TRUE);
		}
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if($this->isAjax()){
			$this->renderPartial('view',array(
				'model'=>$this->loadModel($id),
				'title'=>'Detail Contact #'.$id,
			),FALSE,TRUE);
		}
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
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return GEContact the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=GEContact::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param GEContact $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gecontact-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
