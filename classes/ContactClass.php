<?php
class ContactClass{
	
    private $db;
	
    /**
     * Constructor to create instance of DB object
     *
     */
    public function __construct(){
        $this -> db = DbClass::getInstance();
		$this -> db -> getsettingsData();
    }
	/**
     * Contact Send Mail
     *
	 * @param array - user info
	 *
	 */
	public function sendContactMail(){
		$name = "";
		$company = "";
		$title = "";
		$email = "";		
		$ContactNo = "";
		$question = "";
		$hereabout = "";
		
			
		if(isset($_REQUEST['name'])&&($_REQUEST['name']!=''))
		{
        	$name = $this -> db -> cleanData($_REQUEST['name']);
		}
		if(isset($_REQUEST['company'])&&($_REQUEST['company']!=''))
		{
        	$company = $this -> db -> cleanData($_REQUEST['company']);
		}
		if(isset($_REQUEST['title'])&&($_REQUEST['title']!=''))
		{
        	$title = $this -> db -> cleanData($_REQUEST['title']);
		}
		if(isset($_REQUEST['email'])&&($_REQUEST['email']!=''))
		{
        	$email = $this -> db -> cleanData($_REQUEST['email']);
		}
		if(isset($_REQUEST['ContactNo'])&&($_REQUEST['ContactNo']!=''))
		{
        	$ContactNo = $this -> db -> cleanData($_REQUEST['ContactNo']);
		} 
		if(isset($_REQUEST['question'])&&($_REQUEST['question']!=''))
		{
        	$question = $this -> db -> cleanData($_REQUEST['question']);
		}
		if(isset($_REQUEST['hereabout'])&&($_REQUEST['hereabout']!=''))
		{
        	$hereabout = $this -> db -> cleanData($_REQUEST['hereabout']);
		}
		$message = '';
		$to = ADMINMAIL;		
		$subject = 'New Contact Request';
		$message .= "<p>Dear Admin,</p>";
		$message .= "<p>New user contacted you on site. Here are the User details!</p>";		
		$message .= "<p><b>Name: </b>".$name."</p>";
		$message .= "<p><b>Company: </b>".$company."</p>";		
		$message .= "<p><b>Title: </b>".$title."</p>";		
		$message .= "<p><b>Email Address: </b>".$email."</p>";
		$message .= "<p><b>Phone: </b>".$ContactNo."</p>";		
		$message .= "<p><b>Question: </b>".$question."</p>";
		$message .= "<p><b>How did you hear about us?: </b>".$hereabout."</p>";		
		$message .= "<p>------------------------------------------</p>";
		$message .= "<p>Thanks</p>";
		$from = $email;		
		$mail = $this -> sendSimpleEmail($to,$subject,$message,$from);
		if($mail){
			
			if(isset($_REQUEST['newsletter']) && $_REQUEST['newsletter'] == 'yes')
			{
				$rslt = $this -> db -> query("INSERT INTO newsletter(email)VALUES(:email)",array("email"=>$email));
			}			
			return 'Contact mail send successfull.';
		}
		else{
			return 'Failed to send mail.';
		}
		
	}
	 /**
     * Send simple email
     *
	 */
	public function sendSimpleEmail($to, $subject, $message, $from){ 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: legacyconverting.com <info@legacyconverting.com>' . "\r\n";
		$mail = @mail($to, $subject, $message, $headers);
		if(!$mail){ 
			return false;
		} 
		return true;  
	}
}
?>