<?php
class LeadsController extends AgentcController
{
	
	public function actionNote($id){
        if($this->isAjax()) {
            $model = New GENote;
            $Lead = $this->loadModel($id);
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
                            'message'=>"Dear {$Lead->lead_name},<br>
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
                        $mail->send($Lead->lead_email,"{$nameSender} Sent You Message",$message);
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
                'receiver' => $Lead
            ), false, true);
        }
	}

	public function actionTask($id){
        if($this->isAjax()) {
        	//echo date("g:i a", strtotime("23:00"));
        	//echo date("H:i:s", strtotime("11:10 pm"));
            $model = New GETask;
            $Lead = $this->loadModel($id);
            $emailSender = Yii::app()->user->email;
            $nameSender = Yii::app()->user->full_name;
            if(isset($_POST['GETask'])){
                $model->attributes = $_POST['GETask'];
				$AGENT = GEAgent::model()->findByPk($model->agent_id);
				$time = $_POST['GETask']['H'].':'.$_POST['GETask']['I'].' '.$_POST['GETask']['A'];
				$event = Tools::getCategoryEvent($model->event_category_id);;
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
                            'message'=>"Dear {$Lead->lead_name}<br>
							<p>
								{$model->description}
							</p>
							<p>
							Event <b>{$event->event_name}</b><br>
							Date <b>".$_POST['GETask']['date']."</b><br>
							Time <b>{$time}</b><br>
							Attend  <b>{$Lead->lead_name}, {$AGENT->full_name}</b>
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
                        $mail->send($Lead->lead_email,"{$nameSender} Add New Task For You",$message);
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
                'receiver' => $Lead
            ), false, true);
        }
	}
	
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
		if($this->isAjax()){
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
			
			if(isset($_POST['GELead']))
			{
				$model->attributes=$_POST['GELead'];
				$model->agent_id = Yii::app()->user->id;
				$model->temperature_id = 1;
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
		$model=$this->loadModel($id);
		if($this->isAjax()){
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
	
			if(isset($_POST['GELead']))
			{
				$model->attributes=$_POST['GELead'];
				$model->agent_id = Yii::app()->user->id;
				if($model->validate()){
					if($model->save()){
						if(isset($_GET['convert'])){
							$Client = New GEClient;
							$Client->attributes = $_POST['GELead'];
							$Client->client_name = $model->lead_name;
							$Client->client_email = $model->lead_email;
							$Client->agent_id = $model->agent_id;
							if($Client->save(FALSE)){
								$this->loadModel($id)->delete();
							}
							
						}
						exit(json_encode(array('success'=>true)));	
					}
				}else{
					exit(CActiveForm::validate($model));
				}
			}
	
			$this->renderPartial('_form',array(
					'model'=>$model,
					'modelName'=>strtolower(get_class($model)),
					'title'=>'Edit Lead',
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
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GELead('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->condition = 'agent_id=:id';
		$model->dbCriteria->params=array(':id'=>Yii::app()->user->id);
		
		if(isset($_GET['GELead'])){
			$model->attributes=$_GET['GELead'];
		}
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionSearch(){
		$model = New GELead;
		$model->id = 27;
		$data = $model->search()->getData();
		foreach($data as $d){
			echo $d->id.'<br>';
		}
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
