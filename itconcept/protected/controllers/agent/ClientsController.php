<?php

class ClientsController extends AgentcController
{
	
	public function actionNote($id){
        if($this->isAjax()) {
            $model = New GENote;
            $Client = $this->loadModel($id);
            $emailSender = Yii::app()->user->email;
            $nameSender = Yii::app()->user->full_name;
            if(isset($_POST['GENote'])){
                $model->attributes = $_POST['GENote'];
                if($model->validate()){
                    if($model->save()){
                        $mail = New Mail;
                        $mail->email_sender = $emailSender;
                        $mail->sender_name = $nameSender;
                        $message = $this->renderPartial('/emails/company',array(

                            'title'=>"Message From {$nameSender}",
                            'message'=>"Dear {$Client->client_name},<br>
							<p>
								{$model->note}
							</p>
							<p>Thank you.</p>
							<p><i><font size='2'>

							This message sent via system message, to reply you can use your reply button from your real email service.

							</font></i></p>
							<p><i><font size='2'>

							Sender : $nameSender
							<br>
							Email : $emailSender

							</font></i></p>
							",
                        ),TRUE);
                        $mail->send($Client->client_email,"{$nameSender} Sent You Message",$message);
                        exit(json_encode(array('success'=>true)));
                    }
                }else{
                    exit(CActiveForm::validate($model));
                }
            }
            $this->renderPartial('_note', array(
                'model' => $model,
                'modelName' => strtolower(get_class($model)),
                'title' => 'Note',
                'receiver' => $Client
            ), false, true);
        }
	}

	public function actionTask($id){
        if($this->isAjax()) {
        	//echo date("g:i a", strtotime("23:00"));
        	//echo date("H:i:s", strtotime("11:10 pm"));
            $model = New GETask;
            $Client = $this->loadModel($id);
            $emailSender = Yii::app()->user->email;
            $nameSender = Yii::app()->user->full_name;
            if(isset($_POST['GETask'])){
                $model->attributes = $_POST['GETask'];
				$AGENT = GEAgent::model()->findByPk($model->agent_id);
				$time = $_POST['GETask']['H'].':'.$_POST['GETask']['I'].' '.$_POST['GETask']['A'];
				$event = Tools::getCategoryEvent($model->event_category_id);
				$model->time = date("H:i:s", strtotime($time));
                if($model->validate()){
                    if($model->save()){
                        $mail = New Mail;
						$mail->copy_carbon = $AGENT->email;
						$mail->copy_name = $AGENT->full_name;
                        $mail->email_sender = $emailSender;
                        $mail->sender_name = $nameSender;
                        $message = $this->renderPartial('/emails/company',array(

                            'title'=>"Message From {$nameSender}",
                            'message'=>"Dear {$Client->client_name}<br>
							<p>
								{$model->description}
							</p>
							<p>
							Event <b>{$event->event_name}</b><br>
							Date <b>".$_POST['GETask']['date']."</b><br>
							Time <b>{$time}</b><br>
							Attend  <b>{$Client->client_name}, {$AGENT->full_name}</b>
							</p>
							<p>Thank you.</p>
							<p><i><font size='2'>

							This message sent via system message, to reply you can use your reply button from your real email service.

							</font></i></p>
							<p><i><font size='2'>

							Sender : $nameSender
							<br>
							Email : $emailSender

							</font></i></p>
							",
                        ),TRUE);
                        $mail->send($Client->client_email,"{$nameSender} Add New Task For You",$message);
                        exit(json_encode(array('success'=>true)));
                    }
                }else{
                    exit(CActiveForm::validate($model));
                }
            }
            $this->renderPartial('_task', array(
                'model' => $model,
                'modelName' => strtolower(get_class($model)),
                'title' => 'Task',
                'receiver' => $Client
            ), false, true);
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
				'title'=>'Detail Client #'.$id,
			),FALSE,TRUE);
		}
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
				$model->agent_id = Yii::app()->user->id;
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
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		if($this->isAjax()){
			$model=$this->loadModel($id);
	
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
	
			if(isset($_POST['GEClient']))
			{
				$model->attributes=$_POST['GEClient'];
				$model->agent_id = Yii::app()->user->id;
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
					'modelName'=>strtolower(get_class($model)),
					'title'=>'Edit Client',
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('GEClient');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GEClient('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->condition = 'agent_id=:id';
		$model->dbCriteria->params=array(':id'=>Yii::app()->user->id);
		if(isset($_GET['GEClient']))
			$model->attributes=$_GET['GEClient'];

		$this->render('admin',array(
			'model'=>$model,
		));
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
