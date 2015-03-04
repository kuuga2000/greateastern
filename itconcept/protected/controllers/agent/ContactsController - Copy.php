<?php
require_once '/../../../../ext/google-api/src/Google_Client.php';
class ContactsController extends AgentcController
{
	
	public function actionAdmin(){
		/*
		if (isset($_SESSION['token'])) {
			$token = json_decode($_SESSION['token']);
			//$token->access_token;
			$max_results = 5000;
			$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$token->access_token;
			 
			$xmlresponse =  $this->curl_file_get_contents($url);
			echo "<h3>Email Addresses:</h3>";
			$xml = $this->curl_file_get_contents($url);
			$xml =  new SimpleXMLElement($xml);
			
			$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
			$result = $xml->xpath('//gd:email');
			
			foreach ($result as $title) {
			  echo $title->attributes()->address . "<br>";
			}
			//exit;
		}*/
		
		$model=new GEContact('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GEContact'])){
			$model->attributes=$_GET['GEContact'];
		}
		if (isset($_SESSION['token'])) {
			$this->render('admin',array(
				'model'=>$model,
			));
		}else{
			$this->redirect(array('agent/calendar'));
		}
		
	}
	
	public function actionSyncGoogle2($limit=10){
		
		if (isset($_SESSION['token'])) {
			$token = json_decode($_SESSION['token']);
			//$token->access_token;
			$max_results = $limit;
			$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$token->access_token;
			 
			//$xmlresponse =  $this->curl_file_get_contents($url);
			
			$xml = new DOMDocument;
			$xml->recover = true;
			$xml->loadXML($url);
			
			$xpath = new DOMXPath($xml);
			$xpath->registerNamespace('gd', 'http://schemas.google.com/g/2005');

			$emails = $xpath->query('//gd:email');
			
			foreach ( $emails as $email )
			{
			  echo $email->getAttribute('address');

			  // To get the title.
			  // This could also be done using XPath.
			  // You can also use ->nodeValue instead of ->textContent.
			  echo $email->parentNode->getElementsByTagName('title')->item(0)->textContent;
			}
			
			//exit;
		}
	}
	
	public function actionSyncGoogle($limit=10){
		
		if (isset($_SESSION['token'])) {
			$token = json_decode($_SESSION['token']);
			//$token->access_token;
			$max_results = $limit;
			$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$token->access_token;
			 
			$xmlresponse =  $this->curl_file_get_contents($url);
			
			$xml = $this->curl_file_get_contents($url);
			$xml =  new SimpleXMLElement($xml);
			 
			$xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
			$result = $xml->xpath('//gd:email');
			$getXML = simplexml_load_file($url);
			$getXML2 = $getXML->entry;
			$i=0;
			foreach($getXML2 as $element){
				echo $i.' '.$xml->xpath('//gd:email')[$i]->attributes()->address.'<br>';
				$i++;
			}
			exit;
			//foreach ($result as $title) {
			$i=0;
			foreach ($result as $title) {
			 
			  /*$model = New GEContact;
			  $model->contact_name,
			  $model->contact_email,
			  $model->phone;
			  $model->cell_phone;
			  $model->address;
			  $model->city;
			  $model->country_id;
			  $model->zip_code;
			  $model->gender;
			  $model->agent_id'*/
			  //echo $title->title.'<br>';
			   
			  //echo $i.' = '.$title->attributes()->address.'<br>';
			  
			  /*$email = $title->xpath('//gd:email')[$i]->attributes()->address;
			  if(!empty($email)){
				echo $email.'<br>';
			  }*/
			  //echo $title->attributes()->address . "<br>";
			  $i++;
			}
			
			//exit;
		}
	}
	//http://stackoverflow.com/questions/6530050/php-gmail-contacts-xml-parsing-with-domdocument-and-curl
	public function actionNote($id){
        if($this->isAjax()) {
            $model = New GENote;
            $Contact = $this->loadModel($id);
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
                            'message'=>"Dear {$Contact->contact_name},<br>
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
                        $mail->send($Contact->contact_email,"{$nameSender} Sent You Message",$message);
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
                'receiver' => $Contact
            ), false, true);
        }
	}

	public function actionTask($id){
        if($this->isAjax()) {
        	//echo date("g:i a", strtotime("23:00"));
        	//echo date("H:i:s", strtotime("11:10 pm"));
            $model = New GETask;
            $Contact = $this->loadModel($id);
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
                            'message'=>"Dear {$Contact->contact_name}<br>
							<p>
								{$model->description}
							</p>
							<p>
							Event <b>{$event->event_name}</b><br>
							Date <b>".$_POST['GETask']['date']."</b><br>
							Time <b>{$time}</b><br>
							Attend  <b>{$Contact->contact_name}, {$AGENT->full_name}</b>
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
                        $mail->send($Contact->contact_email,"{$nameSender} Add New Task For You",$message);
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
                'receiver' => $Contact
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
				'title'=>'Detail Contact #'.$id,
			),FALSE,TRUE);
		}
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
				'title'=>'Add Contact',
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
			$this->performAjaxValidation($model);
	
			if(isset($_POST['GEContact']))
			{
				$model->attributes=$_POST['GEContact'];
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
				'title'=>'Edit Contact #'.$model->id,
				'modelName'=>strtolower(get_class($model)),
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
		$client = new Google_Client();
		$client->setApplicationName('Google Contacts PHP Sample');
		$client->setScopes(array("http://www.google.com/m8/feeds/","https://www.google.com/calendar/feeds/"));

		if (isset($_GET['code'])) {
		  $client->authenticate();
		  $_SESSION['token'] = $client->getAccessToken();
		  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
		  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) {
		 $client->setAccessToken($_SESSION['token']);
		}

		if (isset($_REQUEST['logout'])) {
		  unset($_SESSION['token']);
		  $client->revokeToken();
		}

		if ($client->getAccessToken()) {
		  $req = new Google_HttpRequest("https://www.google.com/m8/feeds/contacts/default/full");
		  $val = $client->getIo()->authenticatedRequest($req);	 
		  $_SESSION['token'] = $client->getAccessToken();
		} else {
		  $auth = $client->createAuthUrl();
		}

		if ($client->getAccessToken()) {
			$this->redirect(array('admin'));
		} else {
		  $authUrl = $client->createAuthUrl();
		  $this->redirect(array('agent/calendar'));
		}
	}

	/**
	 * Manages all models.
	 */
	
	public function curl_file_get_contents($url)
	{
		 $curl = curl_init();
		 $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
		 
		 curl_setopt($curl,CURLOPT_URL,$url);	//The URL to fetch. This can also be set when initializing a session with curl_init().
		 curl_setopt($curl,CURLOPT_RETURNTRANSFER,TRUE);	//TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
		 curl_setopt($curl,CURLOPT_CONNECTTIMEOUT,5);	//The number of seconds to wait while trying to connect.	
		 
		 curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);	//The contents of the "User-Agent: " header to be used in a HTTP request.
		 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);	//To follow any "Location: " header that the server sends as part of the HTTP header.
		 curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);	//To automatically set the Referer: field in requests where it follows a Location: redirect.
		 curl_setopt($curl, CURLOPT_TIMEOUT, 10);	//The maximum number of seconds to allow cURL functions to execute.
		 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);	//To stop cURL from verifying the peer's certificate.
		 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
		 
		 $contents = curl_exec($curl);
		 curl_close($curl);
		 return $contents;
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
