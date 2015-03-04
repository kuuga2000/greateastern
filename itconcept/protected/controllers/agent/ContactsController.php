<?php
require_once (realpath($_SERVER["DOCUMENT_ROOT"]).'/ext/google-api/src/Google_Client.php');
class ContactsController extends AgentcController
{
	
	public function actionAdmin(){
		$model=new GEContact('search');
		$model->unsetAttributes();  // clear any default values
		$model->dbCriteria->order = 'id DESC';
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
	
	public function actionSyncGoogle($limit=''){
		if($this->isAjax()){
			$client = new Google_Client();
			$limit = empty($limit) ? 500 : $limit;
			if (isset($_SESSION['token'])) {
		  		$client->setAccessToken($_SESSION['token']);
			}
			if ($client->getAccessToken()) {
				$token = json_decode($client->getAccessToken());
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
					$model = New GEContact;
					$email = $xml->xpath('//gd:email')[$i]->attributes()->address;
					$Check = GEContact::model()->find(array(
							'condition'=>'contact_email=:email',
							'params'=>array(':email'=>$email)
						)
					);
					if($Check===NULL){
					  	$model->contact_name = $element->title;
						$model->google_contact_id = $element->id;
					  	$model->contact_email = $email;
					  	$model->agent_id = Yii::app()->user->id;
						$model->save(FALSE);
					}
					//echo $i.' '.$element->title.' '.$xml->xpath('//gd:email')[$i]->attributes()->address.'<br>';
					$i++;
				}
				exit(json_encode(array('success'=>TRUE)));
			}
		}
	}

	public function save2GoogleContact($model){
		$client = new Google_Client();
		
		/*data*/
		$country = Tools::getCountry($model->country_id);
		$temperature = Tools::getTemperature($model->temperature_id);
		$coverage= Tools::getCoverage($model->coverage_id);
		$product= Tools::getProduct($model->product_id);
		/*end data*/
		
		//-------------------------------------
		// How to save an entry to your My Contacts List
		
		// This is an example contact XML that Google is looking for.
		//$user_email = "ryuki.servaiv@gmail.com";
		$token = json_decode($_SESSION['token']);
		$email = ("https://www.google.com/m8/feeds/contacts/default/full?max-results=0&oauth_token={$token->access_token}");
		$xml = simplexml_load_file($email); // Convert to an ARRAY
		 

	  // The contacts api only returns XML responses.
	    $email_user =  $xml->id;
		
		$contact="
		<atom:entry xmlns:atom='http://www.w3.org/2005/Atom'
			xmlns:gd='http://schemas.google.com/g/2005'
			xmlns:gContact='http://schemas.google.com/contact/2008'>
		  <atom:category scheme='http://schemas.google.com/g/2005#kind'
			term='http://schemas.google.com/contact/2008#contact'/>
		  <gd:name>
			 <gd:fullName>{$model->contact_name}</gd:fullName>
		  </gd:name>
		  <atom:content type='text'>{$temperature},{$coverage}</atom:content>
		  <gd:email rel='http://schemas.google.com/g/2005#work'
			primary='true'
			address='{$model->contact_email}' displayName='-'/>
		  <gd:phoneNumber rel='http://schemas.google.com/g/2005#home'
			primary='true'>
			{$model->phone}
		  </gd:phoneNumber>
		  <gd:phoneNumber rel='http://schemas.google.com/g/2005#main'>
			{$model->cell_phone}
		  </gd:phoneNumber>
		  <gd:im address='{$model->contact_email}'
			protocol='http://schemas.google.com/g/2005#GOOGLE_TALK'
			primary='true'
			rel='http://schemas.google.com/g/2005#home'/>
		  <gd:structuredPostalAddress
			  rel='http://schemas.google.com/g/2005#work'
			  primary='true'>
			<gd:city>{$model->city}</gd:city>
			<gd:street>{$model->address}</gd:street>
			<gd:region> </gd:region>
			<gd:postcode>{$model->zip_code}</gd:postcode>
			<gd:country>{$country}</gd:country>
			<gd:formattedAddress>
			  {$model->address} {$model->city} {$model->zip_code} {$country}
			</gd:formattedAddress>
		  </gd:structuredPostalAddress>
		 <gContact:groupMembershipInfo deleted='false'
				href='http://www.google.com/m8/feeds/groups/{$email_user}/base/6'/>
		</atom:entry>
		";
	
		//print_r($_SESSION['token']);exit;
		
		//$req = new Google_HttpRequest("https://www.google.com/m8/feeds/contacts/default/full");
 	 	//$val = $client->getIo()->authenticatedRequest($req);
		
		//print_r($client->getAccessToken());exit;
		
		$len = strlen($contact);
		$add = new Google_HttpRequest("https://www.google.com/m8/feeds/contacts/default/full?oauth_token={$token->access_token}");
		$add->setRequestMethod("POST");
		$add->setPostBody($contact);
		$add->setRequestHeaders(array(
			'content-length' => $len, 
			'GData-Version'=> '3.0',
			'content-type'=>'application/atom+xml; charset=UTF-8; type=feed')
		);
		
		$submit = $client->getIo()->authenticatedRequest($add);
		$sub_response = $submit->getResponseBody();		
		$parsed = simplexml_load_string($sub_response);	
		$client_id = explode("base/",$parsed->id);
		
		//etag 
		$att_gd = $parsed->attributes("gd",1);
		$etagg = str_replace('"',"",$Etag = $att_gd["etag"]);
		
		return array($parsed->id,$etagg);//$client_id[1];
	}
	
	public function actionT3st(){
		
		$xml = simplexml_load_string("<?xml version='1.0' encoding='UTF-8'?>
			<entry xmlns='http://www.w3.org/2005/Atom' xmlns:gContact='http://schemas.google.com/contact/2008' xmlns:batch='http://schemas.google.com/gdata/batch' xmlns:gd='http://schemas.google.com/g/2005' gd:etag='&quot;QngzejVSLit7I2A9XRdVGUwLRAc.&quot;'>
				<id>http://www.google.com/m8/feeds/contacts/ryuki.servaiv%40gmail.com/base/6a4d35b8f3c167d</id>
				<updated>2014-11-25T10:28:53.682Z</updated>
				<app:edited xmlns:app='http://www.w3.org/2007/app'>2014-11-25T10:28:53.682Z</app:edited>
				<category scheme='http://schemas.google.com/g/2005#kind' term='http://schemas.google.com/contact/2008#contact'/>
				<title>Jon cena</title>
				<content>Warm,Auto</content>
				<link rel='http://schemas.google.com/contacts/2008/rel#photo' type='image/*' href='https://www.google.com/m8/feeds/photos/media/ryuki.servaiv%40gmail.com/6a4d35b8f3c167d'/>
				<link rel='self' type='application/atom+xml' href='https://www.google.com/m8/feeds/contacts/ryuki.servaiv%40gmail.com/full/6a4d35b8f3c167d'/>
				<link rel='edit' type='application/atom+xml' href='https://www.google.com/m8/feeds/contacts/ryuki.servaiv%40gmail.com/full/6a4d35b8f3c167d'/>
				<gd:name>
					<gd:fullName>Jon cena</gd:fullName>
					<gd:givenName>Jon</gd:givenName>
					<gd:familyName>cena</gd:familyName>
				</gd:name>
				<gd:email rel='http://schemas.google.com/g/2005#work' address='cena@gmail.com' primary='true' displayName='-'/>
				<gd:im address='cena@gmail.com' primary='true' protocol='http://schemas.google.com/g/2005#GOOGLE_TALK' rel='http://schemas.google.com/g/2005#home'/>
				<gd:phoneNumber rel='http://schemas.google.com/g/2005#home' primary='true'>999999</gd:phoneNumber>
				<gd:phoneNumber rel='http://schemas.google.com/g/2005#main'>777777</gd:phoneNumber>
				<gd:structuredPostalAddress primary='true' rel='http://schemas.google.com/g/2005#work'>
					<gd:formattedAddress>jalan raya no 89 manado 12345 Barbados</gd:formattedAddress>
					<gd:street>jalan raya no 89</gd:street>
					<gd:postcode>12345</gd:postcode>
					<gd:city>manado</gd:city>
					<gd:country>Barbados</gd:country>
				</gd:structuredPostalAddress>
				<gContact:groupMembershipInfo deleted='false' href='http://www.google.com/m8/feeds/groups/ryuki.servaiv%40gmail.com/base/6'/>
			</entry>");
		 
		$att_gd = $xml->attributes("gd",1);
		echo str_replace('"',"",$Etag = $att_gd["etag"]);
					
	}
	
	public function actionUpdatec(){
		$client = new Google_Client();
		
		 
		 
		$model=$this->loadModel(232);
		
		$model->contact_name = 'nama asli';
		
		
		//$model->contact_name = 'jihan hihan xxx';
		/*data*/
		$country = Tools::getCountry($model->country_id);
		$temperature = Tools::getTemperature($model->temperature_id);
		$coverage= Tools::getCoverage($model->coverage_id);
		$product= Tools::getProduct($model->product_id);
		$contact = explode("base/",$model->google_contact_id);
		$contact_id = $contact[1];
		/*end data*/
		
		//-------------------------------------
		// How to save an entry to your My Contacts List
		
		// This is an example contact XML that Google is looking for.
		//$user_email = "ryuki.servaiv@gmail.com";
		$token = json_decode($_SESSION['token']);
		$email = ("https://www.google.com/m8/feeds/contacts/default/full?max-results=0&oauth_token={$token->access_token}");
		
		$xml = simplexml_load_file($email); // Convert to an ARRAY
		 

	  // The contacts api only returns XML responses.
	    $email_user =  $xml->id;
		
		
		 
		 
		/*$contact="
		<atom:entry xmlns:atom='http://www.w3.org/2005/Atom'
			xmlns:gd='http://schemas.google.com/g/2005'
			xmlns:gContact='http://schemas.google.com/contact/2008'>
		  <atom:category scheme='http://schemas.google.com/g/2005#kind'
			term='http://schemas.google.com/contact/2008#contact'/>
		  <gd:name>
			<gd:givenName>New</gd:givenName>
    		<gd:familyName>Name</gd:familyName>
    		<gd:fullName>New Name</gd:fullName>
		  </gd:name>
		  <atom:content type='text'>{$temperature},{$coverage}</atom:content>
		  <gd:email rel='http://schemas.google.com/g/2005#work'
			primary='true'
			address='{$model->contact_email}' displayName='-'/>
		  <gd:phoneNumber rel='http://schemas.google.com/g/2005#home'
			primary='true'>
			{$model->phone}
		  </gd:phoneNumber>
		  <gd:phoneNumber rel='http://schemas.google.com/g/2005#main'>
			{$model->cell_phone}
		  </gd:phoneNumber>
		  <gd:im address='{$model->contact_email}'
			protocol='http://schemas.google.com/g/2005#GOOGLE_TALK'
			primary='true'
			rel='http://schemas.google.com/g/2005#home'/>
		  <gd:structuredPostalAddress
			  rel='http://schemas.google.com/g/2005#work'
			  primary='true'>
			<gd:city>{$model->city}</gd:city>
			<gd:street>{$model->address}</gd:street>
			<gd:region> </gd:region>
			<gd:postcode>{$model->zip_code}</gd:postcode>
			<gd:country>{$country}</gd:country>
			<gd:formattedAddress>
			  {$model->address} {$model->city} {$model->zip_code} {$country} sdsd
			</gd:formattedAddress>
		  </gd:structuredPostalAddress>
		 <gContact:groupMembershipInfo deleted='false'
				href='http://www.google.com/m8/feeds/groups/{$email_user}/base/6'/>
		</atom:entry>
		";*/
		$contact ="<atom:entry xmlns:atom='http://www.w3.org/2005/Atom'
			xmlns:gd='http://schemas.google.com/g/2005'
			xmlns:gContact='http://schemas.google.com/contact/2008'>
		  <atom:category scheme='http://schemas.google.com/g/2005#kind'
			term='http://schemas.google.com/contact/2008#contact'/>
		  <gd:name>
			<gd:givenName>New</gd:givenName>
    		<gd:familyName>Name</gd:familyName>
    		<gd:fullName>New Name</gd:fullName>
		  </gd:name>
		  <atom:content type='text'>{$temperature},{$coverage}</atom:content>
		  <gd:email rel='http://schemas.google.com/g/2005#work'
			primary='true'
			address='{$model->contact_email}' displayName='-'/>
		  <gd:phoneNumber rel='http://schemas.google.com/g/2005#home'
			primary='true'>
			{$model->phone}
		  </gd:phoneNumber>
		  <gd:phoneNumber rel='http://schemas.google.com/g/2005#main'>
			{$model->cell_phone}
		  </gd:phoneNumber>
		  <gd:im address='{$model->contact_email}'
			protocol='http://schemas.google.com/g/2005#GOOGLE_TALK'
			primary='true'
			rel='http://schemas.google.com/g/2005#home'/>
		  <gd:structuredPostalAddress
			  rel='http://schemas.google.com/g/2005#work'
			  primary='true'>
			<gd:city>{$model->city}</gd:city>
			<gd:street>{$model->address}</gd:street>
			<gd:region> </gd:region>
			<gd:postcode>{$model->zip_code}</gd:postcode>
			<gd:country>{$country}</gd:country>
			<gd:formattedAddress>
			  {$model->address} {$model->city} {$model->zip_code} {$country}
			</gd:formattedAddress>
		  </gd:structuredPostalAddress>
		 <gContact:groupMembershipInfo deleted='false'
				href='http://www.google.com/m8/feeds/groups/{$email_user}/base/6'/>
		</atom:entry>";
	
		//$request = new Google_Http_Request($url, $method, $headers, $postBody); 
		$len = strlen($contact);
		//ini delete yg banar
		$request = new Google_HttpRequest(
			"https://www.google.com/m8/feeds/contacts/{$email_user}/full/$contact_id?oauth_token={$token->access_token}",
			"PUT",
			array(
				'GData-Version'=> '2.0',
				'If-Match'=>'*',
				'content-type'=>'application/atom+xml; charset=UTF-8; type=feed'
			),$contact
		);
		$submit = $client->getIo()->authenticatedRequest($request);
		$sub_response = $submit->getResponseBody();	
		echo $sub_response;
		exit;
		 
		
		 
	}
	
	public function actionDeletec($id){
		$client = new Google_Client();
		$model=$this->loadModel($id);
		//$model->contact_name = 'jihan hihan xxx';
		/*data*/
		$country = Tools::getCountry($model->country_id);
		$temperature = Tools::getTemperature($model->temperature_id);
		$coverage= Tools::getCoverage($model->coverage_id);
		$product= Tools::getProduct($model->product_id);
		$contact = explode("base/",$model->google_contact_id);
		$contact_id = $contact[1];
		/*end data*/
		
		//-------------------------------------
		// How to save an entry to your My Contacts List
		
		// This is an example contact XML that Google is looking for.
		//$user_email = "ryuki.servaiv@gmail.com";
		$token = json_decode($_SESSION['token']);
		$email = ("https://www.google.com/m8/feeds/contacts/default/full?max-results=0&oauth_token={$token->access_token}");
		
		$xml = simplexml_load_file($email); // Convert to an ARRAY
		 

	    // The contacts api only returns XML responses.
	    $email_user =  $xml->id;
		
		//ini delete yg banar
		$request = new Google_HttpRequest("https://www.google.com/m8/feeds/contacts/{$email_user}/full/$contact_id?oauth_token={$token->access_token}","DELETE",array('GData-Version'=> '2.0','If-Match'=>'*'));
		$submit = $client->getIo()->authenticatedRequest($request);
		$sub_response = $submit->getResponseBody();	
		//echo $sub_response;
	}

	public function actionUnset(){
		unset($_SESSION['token']);
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
					$google_contact_id = $this->save2GoogleContact($model);
					$model->google_contact_id = $google_contact_id[0];
					$model->google_etag = $google_contact_id[1];
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
					$google_contact_id = $this->save2GoogleContact($model);
					$model->google_contact_id = $google_contact_id[0];
					$model->google_etag = $google_contact_id[1];
					$this->actionDeletec($id);
					if($model->save()){
						if(isset($_GET['convert'])){
							$Client = New GEClient;
							$Client->attributes = $_POST['GEContact'];
							$Client->client_name = $model->contact_name;
							$Client->client_email = $model->contact_email;
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
