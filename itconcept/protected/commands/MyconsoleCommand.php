<?php
Class MyconsoleCommand extends CConsoleCommand{
	public $TimesSend = array(
		'minute','hour','day','week','month','year'
	);
	public function run($args){
		$mail = New Mail;
		//testing $mail->sendBlast("ryuki.servaiv@gmail.com","dari demo","MESSAGE");
		$MarketingPlans = Tools::getMarketingPlan();
		foreach($MarketingPlans as $market){
			$IntervalSend = $this->checkTime($market->time_name, $market->send_after);
			//Separate Receiver
			$recipients = explode(',',$market->select_recipients);
			$checkMarketingPlanActive = $market->is_active;
			
			$EmailTemplate = Tools::getEmailTemplate($market->template_id);
			$Subject = Tools::getEmailTemplate2($market->template_id)->email_subject_line;
			
			if($checkMarketingPlanActive==1){
				if(in_array('clients',$recipients)){
					$Clients = New GEClient;
					//set criteria
					$Clients->status_id = $market->send_with_status;
					//echo "\n";
					$Clients->is_active = 1;
					//echo "\n";
					$Clients->coverage_id = $market->send_with_coverage;
					//echo "\n";
					$Clients->product_id = $market->send_with_product;
					//echo "\n";
					$Clients->agent_id = $market->agent_id;
					$Clientss=$Clients->searchData();
					//end criteria
					if(!empty($Clientss)){
						foreach($Clientss as $Client){
							$ClientCreated = date('Y-m-d H:i',strtotime($Client->created_date));
							//double check :)							
							if($Client->is_active==1 && $IntervalSend==$ClientCreated){
								//$EmailTemplate = Tools::getEmailTemplate($market->template_id);
								//$Subject = Tools::getEmailTemplate2($market->template_id)->email_subject_line; 
								$message = str_replace('#RECEIVER_NAME#', $Client->client_name,$EmailTemplate);
								$message_2 = str_replace('#RECEIVER_ADDRESS#', $Client->address,$message);
								$message_3 = str_replace('#RECEIVER_CITY#', $Client->city,$message_2);
								$message_4 = str_replace('#RECEIVER_STATE#', $Client->display_country,$message_3);
								$message_5 = str_replace('#RECEIVER_ZIP#', $Client->zip_code,$message_4);
								$message_6 = str_replace('#RECEIVER_PHONE#', $Client->phone,$message_5);
								$message_7 = str_replace('#RECEIVER_CELLPHONE#', $Client->cell_phone,$message_6);
								$message_8 = str_replace('#PRODUCT#', $Client->display_product,$message_7);
								$message_9 = str_replace('#COVERAGE_TYPE#', $Client->display_coverage,$message_8);
								$message_10 = str_replace('#COMMISSION#', $Client->commission,$message_9);
								$message_11 = str_replace('#RENEWAL#', $Client->renewal,$message_10);
								$message_12 = str_replace('#CREATE_DATE#', $Client->created_date,$message_11);
								$message_13 = str_replace('#RECEIVER_EMAIL#', $Client->client_email,$message_12);
								//$message = str_replace('#RECEIVER_TEMPERATURE#', $Client->temperature_id,$template);
								$message_14 = str_replace('#AGENT_NAME#', Tools::getAgentDATA($Client->agent_id)->full_name,$message_13);
								$message_15 = str_replace('#AGENT_EMAIL#', Tools::getAgentDATA($Client->agent_id)->email,$message_14);
								$message_16 = str_replace('#AGENT_ADDRESS#', Tools::getAgentDATA($Client->agent_id)->address,$message_15);
								//$message .= str_replace('#AGENT_ADDRESS2#', $Client->agent_name,$template);
								$message_17 = str_replace('#AGENT_CITY#', Tools::getAgentDATA($Client->agent_id)->city,$message_16);
								$message_18 = str_replace('#AGENT_STATE#', Tools::getCountry(Tools::getAgentDATA($Client->agent_id)->country_id),$message_17);
								$message_19 = str_replace('#AGENT_ZIP#', Tools::getAgentDATA($Client->agent_id)->zip_code,$message_18);
								$message_20 = str_replace('#AGENT_CELLPHONE#', Tools::getAgentDATA($Client->agent_id)->cell,$message_19);
								$message_21 = str_replace('#AGENT_PHONE#', Tools::getAgentDATA($Client->agent_id)->phone,$message_20);
								$message_22 = str_replace('#AGENCY_NAME#', $this->agencyName(),$message_21);
								//$message_23 = str_replace('#EMAIL_CONTENT#', $model->content_email,$message_21);
								$mail->sendBlast($Client->client_email,$Subject,$message_22);
								
							}
						}
					}
				}
				if(in_array('leads',$recipients)){
					$Leads = New GELead;
					//set criteria
					$Leads->status_id = $market->send_with_status;
					//echo "\n";
					$Leads->is_active = 1;
					//echo "\n";
					$Leads->coverage_id = $market->send_with_coverage;
					//echo "\n";
					$Leads->product_id = $market->send_with_product;
					//echo "\n";
					$Leads->agent_id = $market->agent_id;
					//echo "\n";
					$Leads->temperature_id = $market->send_with_temperature;
					$Leadss=$Leads->searchData();
					foreach($Leadss as $Lead){
						$LeadCreated = date('Y-m-d H:i',strtotime($Lead->created_date));
						if($Lead->is_active==1 && $IntervalSend==$LeadCreated){
							$message = str_replace('#RECEIVER_NAME#', $Lead->lead_name,$EmailTemplate);
							$message_2 = str_replace('#RECEIVER_ADDRESS#', $Lead->address,$message);
							$message_3 = str_replace('#RECEIVER_CITY#', $Lead->city,$message_2);
							$message_4 = str_replace('#RECEIVER_STATE#', $Lead->display_country,$message_3);
							$message_5 = str_replace('#RECEIVER_ZIP#', $Lead->zip_code,$message_4);
							$message_6 = str_replace('#RECEIVER_PHONE#', $Lead->phone,$message_5);
							$message_7 = str_replace('#RECEIVER_CELLPHONE#', $Lead->cell_phone,$message_6);
							$message_8 = str_replace('#PRODUCT#', $Lead->display_product,$message_7);
							$message_9 = str_replace('#COVERAGE_TYPE#', $Lead->display_coverage,$message_8);
							$message_10 = str_replace('#COMMISSION#', $Lead->commission,$message_9);
							$message_11 = str_replace('#RENEWAL#', $Lead->renewal,$message_10);
							$message_12 = str_replace('#CREATE_DATE#', $Lead->created_date,$message_11);
							$message_13 = str_replace('#RECEIVER_EMAIL#', $Lead->lead_email,$message_12);
							//$message = str_replace('#RECEIVER_TEMPERATURE#', $Client->temperature_id,$template);
							$message_14 = str_replace('#AGENT_NAME#', Tools::getAgentDATA($Lead->agent_id)->full_name,$message_13);
							$message_15 = str_replace('#AGENT_EMAIL#', Tools::getAgentDATA($Lead->agent_id)->email,$message_14);
							$message_16 = str_replace('#AGENT_ADDRESS#', Tools::getAgentDATA($Lead->agent_id)->address,$message_15);
							//$message .= str_replace('#AGENT_ADDRESS2#', $Client->agent_name,$template);
							$message_17 = str_replace('#AGENT_CITY#', Tools::getAgentDATA($Lead->agent_id)->city,$message_16);
							$message_18 = str_replace('#AGENT_STATE#', Tools::getCountry(Tools::getAgentDATA($Lead->agent_id)->country_id),$message_17);
							$message_19 = str_replace('#AGENT_ZIP#', Tools::getAgentDATA($Lead->agent_id)->zip_code,$message_18);
							$message_20 = str_replace('#AGENT_CELLPHONE#', Tools::getAgentDATA($Lead->agent_id)->cell,$message_19);
							$message_21 = str_replace('#AGENT_PHONE#', Tools::getAgentDATA($Lead->agent_id)->phone,$message_20);
							$message_22 = str_replace('#AGENCY_NAME#', $this->agencyName(),$message_21);
							//$message_23 = str_replace('#EMAIL_CONTENT#', $model->content_email,$message_21);
							$mail->sendBlast($Lead->lead_email,$Subject,$message_22);
						}
					}
				}
			}
			
			
			//$EmailTemplate = Tools::getEmailTemplate($email->template_id);
			//$mail->sendBlast("ryuki.servaiv@gmail.com","TEST S",$EmailTemplate);
		}
	}

	protected function checkTime($time,$internval){
		$TIMERS = array('minute','hour','day','week','month','year');
		if(in_array($time,$TIMERS)){
			//date_default_timezone_set('Asia/Jakarta');
			//echo date("Y-m-d H:i:s")."\n";
			return date("Y-m-d H:i",strtotime("-{$internval} $time"));
		}
	}
	
	protected function agencyName() {
		$data = ConfigSite::model() -> findAll(array('order'=>'id ASC'));
		$metaArray = array();
		foreach ($data as $value) {
			$metaArray[$value['name']] = $value['value'];
		}
		return $metaArray['name'];
	}
}

/*//echo $email_template = Tools::getEmailTemplate(2);
		//$mail->send('ryuki.servaiv@gmail.com',"TEST","INI MESSAGA");
		//echo date('H:i:s')."\n";
		//echo $a = date('10:10:10')."\n";
		//echo date($a,strtotime('+1 minutes')); 
		
		//$date1 = "2007-03-24";
		//$date2 = "2009-06-26";
		
		//$diff = abs(strtotime($date2) - strtotime($date1));
		
		//$years = floor($diff / (365*60*60*24));
		//$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
		//$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));*/
