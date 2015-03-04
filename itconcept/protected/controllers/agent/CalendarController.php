<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'/ext/google-api/src/Google_Client.php');
require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'/ext/google-api/src/contrib/Google_CalendarService.php');
require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'/ext/google-api/src/contrib/Google_UrlshortenerService.php');
Class CalendarController extends AgentcController{

	protected $event_name;
	protected $event_location;
	protected $event_email_receiver;
	protected $event_description;
	protected $event_date_start;
	
	public function actionAdmin(){	
		$client = new Google_Client();
		$client->setApplicationName("Google Calendar PHP Starter Application");
		$cal = new Google_CalendarService($client);
		if (isset($_GET['logout'])) {
		  unset($_SESSION['token']);
		}

		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  $_SESSION['token'] = $client->getAccessToken();
		  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
		}

		if (isset($_SESSION['token'])) {
		  $client->setAccessToken($_SESSION['token']);
		}
		
		/*
		 * bener jangan didelete*/
		/*$eventList = $cal->events->listEvents('primary');
		
  		foreach ($eventList['items'] as $dateEvent) {
  			$eventDescription = '';	
  			if(isset($dateEvent['description'])){
  				$eventDescription =  $dateEvent['description'];
  			}
  			echo "Google ID : ".$dateEvent['id'].'<br>';
		 	echo "summary: ".$dateEvent['summary'].'<br>';
			echo "description: ".$eventDescription.'<br>';
			echo "start: ".$dateEvent['start']['dateTime'].'<br>';
			echo "date format : ".date('Y-m-d',strtotime($dateEvent['start']['dateTime'])).'<br>';
			echo "time format : ".date('H:i:s',strtotime($dateEvent['start']['dateTime'])).'<br>';
			echo "<hr>";
			
		}
		exit;
		 * */
		
		
		/*
		$token = json_decode($_SESSION['token']);
		$max_results=10;
		echo $url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$max_results.'&oauth_token='.$token->access_token;
		exit;*/
		
		if ($client->getAccessToken()) {
			$Tasks = GETask::model()->findAll();
			$Notes = GENote::model()->findAll();
			$this->render('admin',array(
					'Tasks'=>$Tasks,
					'Notes'=>$Notes
				)
			);
		}else{
			$this->redirect(array($this->id));
		}
	}
	
	public function actionTt(){
		$this->event_name='hanya test';
		$this->event_location='roya medit';
		$this->event_email_receiver='kuuga@itconcept.sg';
		if($this->googleCLSave()){
			exit("SUKSES");
		}
	}
	public function actionDeleteevent($google_calendar_id,$data_id){
		$this->forceAjaxRequest();
		$client = new Google_Client();
		$service = new Google_CalendarService($client);
		$client->setApplicationName("Google Calendar PHP Starter Application"); 
		if (isset($_SESSION['token'])) {
		  $client->setAccessToken($_SESSION['token']);
		}
		$GETask = $this->loadModel($data_id);
		if($GETask->delete()){
			$service->events->delete('primary', $google_calendar_id);
			exit(
				json_encode(
					array(
						'success'=>TRUE
					)
				)
			);
		}
	}
	
	protected function googleCUpdate($google_calendar_id,$data_id){
		$client = new Google_Client();
		$client->setApplicationName("Google Calendar PHP Starter Application");
		$cal = new Google_CalendarService($client);
		if (isset($_SESSION['token'])) {
		  $client->setAccessToken($_SESSION['token']);
		}
		if ($client->getAccessToken()) {
			$event = new Google_Event();
			
			//print_r($event);exit;
			$event->setSummary($this->event_name.' | '.$this->Website->name);
			//exit;
			//$event->setLocation($this->event_location);
			$event->setDescription($this->event_description);
			
			$reminderI = new Google_EventReminder();
			$reminderI->setMethod('email');
			$reminderI->setMinutes('120');

			$reminder = new Google_EventReminders();
			$reminder->setUseDefault('false');
			$reminder->setOverrides(array($reminderI));
			$event->setReminders($reminder);
			
			$start = new Google_EventDateTime();
			$start->setDateTime($this->event_date_start.'.000-16:00');
			$event->setStart($start);
			$end = new Google_EventDateTime();
			$end->setDateTime($this->event_date_start.'.000-16:00');
			$event->setEnd($end);
			
			$attendee1 = new Google_EventAttendee();
			$attendee1->setEmail($this->event_email_receiver);
			// ...
			$attendees = array($attendee1);
			$event->attendees = $attendees;
			//$createdEvent = $cal->events->insert('primary', $event,array("sendNotifications"=>true));
			//$event = $cal->events->get('primary', 'dbtp8ksko7jak5ppdeug3jvdvc');
			$updatedEvent = $cal->events->update('primary', $google_calendar_id, $event);
			//$createdEvent = $cal->events->insert('primary', $event,array("sendNotifications"=>true));
			//print_r($updatedEvent);exit;
			if($updatedEvent){
				//get
				return TRUE;
			}
		}
		 
	}
	
	public function actionUpdateevent($google_calendar_id,$data_id){
		$this->forceAjaxRequest();
		$model = $this->loadModel($data_id);
		if(isset($_POST['GETask'])){
			$model->attributes = $_POST['GETask'];
				$time = $_POST['GETask']['H'].':'.$_POST['GETask']['I'].' '.$_POST['GETask']['A'];
				$event = Tools::getCategoryEvent($model->event_category_id);
				$AGENT = GEAgent::model()->findByPk($model->agent_id);
				$model->time = date("H:i:s", strtotime($time));
                if($model->validate()){
                    if($model->save()){
						$this->event_name = $event->event_name;
						$this->event_location = '';
						$this->event_email_receiver = $AGENT->email;
						$this->event_description = $model->description;
						$this->event_date_start = $model->date.'T'.$model->time;
						$this->googleCUpdate($google_calendar_id, $data_id);						
						exit(json_encode(array('success'=>true)));
                    }
                }else{
                    exit(CActiveForm::validate($model));
                }
		}

		$this->renderPartial('_addEvent', array(
            'model' => $model,
            'modelName' => strtolower(get_class($model)),
            'title' => 'Edit Event',
            'receiver' => NULL
        ), false, true);
	}

	protected function googleCLSave($id_inserted){
		$client = new Google_Client();
		$client->setApplicationName("Google Calendar PHP Starter Application");
		$cal = new Google_CalendarService($client);
		if (isset($_SESSION['token'])) {
		  $client->setAccessToken($_SESSION['token']);
		}
		if ($client->getAccessToken()) {
			$event = new Google_Event();
			$event->setSummary($this->event_name.' | '.$this->Website->name);
			//$event->setLocation($this->event_location);
			$event->setDescription($this->event_description);
			
			$reminderI = new Google_EventReminder();
			$reminderI->setMethod('email');
			$reminderI->setMinutes('120');

			$reminder = new Google_EventReminders();
			$reminder->setUseDefault('false');
			$reminder->setOverrides(array($reminderI));
			$event->setReminders($reminder);
			
			$start = new Google_EventDateTime();
			$start->setDateTime($this->event_date_start.'.000-16:00');
			$event->setStart($start);
			$end = new Google_EventDateTime();
			$end->setDateTime($this->event_date_start.'.000-16:00');
			$event->setEnd($end);
			
			$attendee1 = new Google_EventAttendee();
			$attendee1->setEmail($this->event_email_receiver);
			// ...
			$attendees = array($attendee1);
			$event->attendees = $attendees;
			$createdEvent = $cal->events->insert('primary', $event,array("sendNotifications"=>true));
			if($createdEvent){
				//get
				$GETask = GETask::model()->findByPk($id_inserted);
				$GETask->google_calendar_id = $createdEvent['id'];
				$GETask->save(FALSE);
				return TRUE;
			}
		}
	}
	
	public function actionAddevent(){
        if($this->isAjax()) {
            $model = New GETask;
			$emailSender = Yii::app()->user->email;
            $nameSender = Yii::app()->user->full_name;
            if(isset($_POST['GETask'])){
                $model->attributes = $_POST['GETask'];
				$time = $_POST['GETask']['H'].':'.$_POST['GETask']['I'].' '.$_POST['GETask']['A'];
				$event = Tools::getCategoryEvent($model->event_category_id);
				$AGENT = GEAgent::model()->findByPk($model->agent_id);
				$model->time = date("H:i:s", strtotime($time));
                if($model->validate()){
                    if($model->save()){
                    	$mail = New Mail;
						 
                        $mail->email_sender = $emailSender;
                        $mail->sender_name = $nameSender;
                        $message = $this->renderPartial('/emails/company',array(

                            'title'=>"Message From {$nameSender}",
                            'message'=>"Dear {$AGENT->full_name}<br>
							<p>
								{$model->description}
							</p>
							<p>
							Event <b>{$event->event_name}</b><br>
							Date <b>".$_POST['GETask']['date']."</b><br>
							Time <b>{$time}</b><br>
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
                        $mail->send($AGENT->email,"{$nameSender} Add New Event For You",$message);
                        
						$this->event_name = $event->event_name;
						$this->event_location = '';
						$this->event_email_receiver = $AGENT->email;
						$this->event_description = $model->description;
						$this->event_date_start = $model->date.'T'.$model->time;
						$this->googleCLSave($model->primaryKey);						
						exit(json_encode(array('success'=>true)));
                    }
                }else{
                    exit(CActiveForm::validate($model));
                }
            }
            $this->renderPartial('_addEvent', array(
                'model' => $model,
                'modelName' => strtolower(get_class($model)),
                'title' => 'Add Event',
                'receiver' => NULL
            ), false, true);
        }
	}
	
	public function actionIndex(){
		$client = new Google_Client();
		$client->setApplicationName("Google Calendar PHP Starter Application");
		$client->setScopes(array(
			"http://www.google.com/m8/feeds/",
			"https://www.google.com/calendar/feeds/",
			
			'https://apps-apis.google.com/a/feeds/groups/',
		    'https://apps-apis.google.com/a/feeds/alias/',
		    'https://apps-apis.google.com/a/feeds/user/',
			
			'https://www.google.com/m8/feeds/user/',
		  )
		);
		//$client->setScopes("http://www.google.com/m8/feeds/");
		// Visit https://code.google.com/apis/console?api=calendar to generate your
		// client id, client secret, and to register your redirect uri.
		// $client->setClientId('insert_your_oauth2_client_id');
		// $client->setClientSecret('insert_your_oauth2_client_secret');
		// $client->setRedirectUri('insert_your_oauth2_redirect_uri');
		// $client->setDeveloperKey('insert_your_developer_key');

		$cal = new Google_CalendarService($client);
		if (isset($_GET['logout'])){
		  unset($_SESSION['token']);
		}

		if (isset($_GET['code'])) {
		  $client->authenticate($_GET['code']);
		  $_SESSION['token'] = $client->getAccessToken();
		  header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
		}

		if (isset($_SESSION['token'])) {
		  $client->setAccessToken($_SESSION['token']);
		}
		 
		if ($client->getAccessToken()) {
			$this->redirect(array('admin'));
		} else {
		  $authUrl = $client->createAuthUrl();
		  $this->render('_googleConnect',array('authUrl'=>$authUrl));
		}
	}
	
	public function loadModel($id)
	{
		$model=GETask::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
}
