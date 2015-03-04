<?php
Class Mail{
	public $email_sender;
	public $sender_name;
	public $copy_carbon;
	public $copy_name;
	
	public $send_sample_to_email_address;
	
	public function send($to,$subject,$message,$replayTo=''){
		$smtpMail = ConfigSmtpEmail::model()->findByPk(1);	
		$mail = Yii::app() -> Smtpmail->Host=$smtpMail->host_smtp;//"mail.budgetdesign.com.sg";
		$mail = Yii::app() -> Smtpmail->Username=$smtpMail->username_smtp;//"testing@budgetdesign.com.sg";
		$mail = Yii::app() -> Smtpmail->Password=$smtpMail->password_smtp;//"testing";
		$mail = Yii::app() -> Smtpmail->Port=$smtpMail->port_smtp;//"testing";
		// /$message = $this->renderPartial('templateEmail',array(),TRUE);
		$mail = Yii::app() -> Smtpmail;
		
		$email_sender = empty($this->email_sender) ? $smtpMail->email_sender : $this->email_sender;
		$sender_name = empty($this->sender_name) ? $smtpMail->sender_name: $this->sender_name;
		
		//$mail->SetFrom($smtpMail->email_sender, $smtpMail->sender_name);
		$mail->SetFrom($email_sender, $sender_name);
		$mail -> Subject = $subject;
		$mail -> MsgHTML($message);
		$mail -> AddAddress($to, "");
		if(!empty($replayTo)){
			$mail->AddReplyTo($replayTo,'');
		}
		/*foreach cc*/
		if(!empty($this->copy_carbon)){
			$mail->AddCC($this->copy_carbon,$this->copy_name);
		}
		if(!empty($smtpMail->carbon_copy)){
			$ccEmail = explode(';', $smtpMail->carbon_copy);
			foreach($ccEmail as $cc){
				$mail -> AddBCC($cc);
			}
		}
		/*end foreach cc*/
		if($mail -> Send()){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function sendBlast($to,$subject,$message,$replayTo=''){
		$smtpMail = ConfigSmtpEmail::model()->findByPk(1);	
		$mail = Yii::app() -> Smtpmail->Host=$smtpMail->host_smtp;//"mail.budgetdesign.com.sg";
		$mail = Yii::app() -> Smtpmail->Username=$smtpMail->username_smtp;//"testing@budgetdesign.com.sg";
		$mail = Yii::app() -> Smtpmail->Password=$smtpMail->password_smtp;//"testing";
		$mail = Yii::app() -> Smtpmail->Port=$smtpMail->port_smtp;//"testing";
		// /$message = $this->renderPartial('templateEmail',array(),TRUE);
		$mail = Yii::app() -> Smtpmail;
		
		$email_sender = empty($this->email_sender) ? $smtpMail->email_sender : $this->email_sender;
		$sender_name = empty($this->sender_name) ? $smtpMail->sender_name: $this->sender_name;
		
		
		
		//$mail->SetFrom($smtpMail->email_sender, $smtpMail->sender_name);
		$mail->SetFrom($email_sender, $sender_name);
		$mail -> Subject = $subject;
		$mail -> MsgHTML($message);
		$mail -> AddAddress($to, "");
		if(!empty($replayTo)){
			$mail->AddReplyTo($replayTo,'');
		}
		/*foreach cc*/
		if(!empty($this->copy_carbon)){
			$mail->AddCC($this->copy_carbon,$this->copy_name);
		}
		if(!empty($smtpMail->carbon_copy)){
			$ccEmail = explode(';', $smtpMail->carbon_copy);
			foreach($ccEmail as $cc){
				$mail -> AddBCC($cc);
			}
		}
		/*end foreach cc*/
		if($mail -> Send()){
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	
}