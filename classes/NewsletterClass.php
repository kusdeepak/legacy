<?php
class NewsletterClass
{
    private $db;
	private $paging;
	private $rs;

    /**
     * Constructor to create instance of DB object
     *
     */
    public function __construct()
	{
        $this -> db = DbClass::getInstance();
		$this -> db -> getsettingsData();
    }
public function updateNewsletterTopic()
{
	$news_letter_topic_title = $this -> db -> cleanData($_REQUEST['news_letter_topic_title']);
	$news_letter_topic = $this -> db -> cleanData($_REQUEST['news_letter_topic']);
	$status = $this -> db -> cleanData($_REQUEST['status']);   
	// update db
	if(isset($_REQUEST['id'])&&$_REQUEST['id']>0)
	{
		$updateSQL = "UPDATE newslettertopic SET 
					news_letter_topic_title = '".$news_letter_topic_title."',   
					news_letter_topic = '".$news_letter_topic."',     
					status = '".$status."'";
	}
	else
	{
		$updateSQL = "INSERT into newslettertopic SET 
					news_letter_topic_title = '".$news_letter_topic_title."',   
					news_letter_topic = '".$news_letter_topic."',     
					status = '".$status."'";
	}
	$rs = $this -> db -> query($updateSQL);
	if($rs == 0)
	{
	   return "Failed to save information.";
	}
	else
	{
	   return "Information saved successfully.";
	}
}	
public function getNewsletterTopic()
{
	$SQL = "SELECT * FROM newslettertopic WHERE 1";
	$results =  $this -> db -> row($SQL);
	return $results;
}	
public function newsletter($email='') 
{
	
	$email = $this -> db -> cleanData($email);
	if(($this -> isEmail($email)))
	{
		$user = $this -> db -> row("SELECT * FROM newsletter WHERE email = '$email'");
		if($user > 0)
		{
			//$id = 1 ;
			$id = 'Email Aleady Exists.';
		}
		else
		{
			$contactObj = new ContactClass();
			$updateSQL = "INSERT INTO newsletter SET email = '".$email."',date=NOW(),status = 'Y'";
			$this -> db -> query($updateSQL) or die(mysql_error()); 			 
			$id = 'Email Subscribed Successfully.';
			
			//$from_address = $email;
			/*$to_address = $email;
			$subject = 'Newsletter';
			$contents = "<p>Thank you for register to GetAdorned newsletter</p> ";		
			if($contactObj -> sendSimpleMail($to_address,$subject,$contents))
			{
				$toemail = ADMINMAIL;
				$subject = 'Newsletter Subscription';
				$message = '<p>One new customer subscribe to GetAdorned newsletter. Below are the customer details information.</p>';
				$message .= '<p>Email : '.$email.'</p>';
				$message .= '<p>B-Day month : '.$dob_mnth.'</p>';
				$contactObj -> sendSimpleMail($toemail,$subject,$message);
			}*/
		}
	 }
	 else
	 {
		$id = 'Failed To Subscribe.';
	 }
	
	return($id);
}

	public function activeNewsltrAcount($newsLtrId,$activeCode)
	{
		$newsLtrId = $this -> db -> cleanData($newsLtrId);
        $activeCode = $this -> db -> cleanData($activeCode);
		$news = $this -> db -> fetchRow("SELECT * FROM newsletter WHERE id = '$newsLtrId' AND status = 'N'");
		if($news['activecode'] == $activeCode)
		{
			$SQL = "UPDATE newsletter SET status = 'Y', 
									codeactivestatus = 'Y' WHERE id = '$newsLtrId'";
			$rs = $this -> db -> execute($SQL);
		    if($this -> db ->countaffectedRows()==0)
		  	{
				return "Désolé! Il ya un problème pour activer votre service de newsletter.";
		  	}else{					
				$newsLetterContent = mysql_fetch_array(mysql_query("SELECT * FROM newslettertopic WHERE status='Y'"));
				$from_address = ADMINMAIL;
				$to_address = $news['email'];
				$subject = $newsLetterContent['news_letter_topic_title'];	
				$contents = $newsLetterContent['news_letter_topic'];
				$contents .= "<small>Si vous ne souhaitez plus recevoir ce bulletin, s&acute;il vous pla&icirc;t cliquez ici pour &ecirc;tre</small> ";		
				$contents .= "<a href=".SITEURL."unsubscribe.php?id=$newsLtrId&mode=remove_user><small>retiré de notre liste de diffusion.</small></a>";
				$headerstr  = 'MIME-Version: 1.0' . "\r\n";
				$headerstr .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headerstr .= 'From: chikado.com <chikado.com>' . "\r\n";
				$headerstr .= 'Reply-to: ".ADMINMAIL."\n';
				$mail = mail($to_address, $subject, $contents,$headerstr);	
				return "Merci. Vous activez succès notre service de newsletter.";
			}
		}else{
			return "Votre compte est déjà activé.";
		}
	}
	/**
     * Check email
     *
	 * @return bool - email valid
	 */
public function isEmail($email)
{
	if (preg_match('/^[_A-z0-9-]+((\.|\+)[_A-z0-9-]+)*@[A-z0-9-]+(\.[A-z0-9-]+)*(\.[A-z]{2,4})$/',$email))
	{
		return true;
	}
  else
    {
		return false;
	}
}		
public function getNewssubscriber($start,$limit)
{
  $SQL = "SELECT * from newsletter WHERE 1 LIMIT $start,$limit";
  $results =  $this -> db -> query($SQL);
  return $results;
}	
//////////////////////////////////// Function to delete Record//////////////////////////////////

public function delete_newsletter()
{
	if(isset($_REQUEST['allbox']))
	{
		
		foreach($_REQUEST['allbox'] as $id) 
		{
			
			$SQL="DELETE FROM newsletter WHERE id='".$id."'";
			$results =  $this -> db -> query($SQL);		
		}
		
	}
	else
	{
	$GLOBALS['err_msg']="No Record Selected.";
	}
	main();
	exit();
}
//////////////////////////////////// Function to delete inactive subscriber//////////////////////////////////
public function send_allmail()
{
	$contactObj = new ContactClass();	
	//fetch mail content and subject
	$sql2 = $this -> db -> row("SELECT * FROM newslettertopic WHERE status='Y'");
	$sql = "SELECT * FROM newsletter where status = 'Y'";
	$exec_sql = $this -> db -> query($sql) or die(mysql_error());
    //$tot=mysql_affected_rows();
	if($exec_sql > 0)
	{
		foreach($exec_sql as $user)
		{
			$from_address = ADMINMAIL;
		    $to_address = $user["email"];
			$subject = $sql2['news_letter_topic_title'];	
			$contents = $sql2['news_letter_topic'];
			$contactObj -> sendSimpleMail($to_address,$subject,$contents);			
	    } 		
		$GLOBALS['err_msg']="Mail Sent Successfully.";
		main();
	}
	else
	{
		$GLOBALS['err_msg']="There are no such guru(s) to send mail.";
		main();
	}
}


/////////////////////////////////////Send mail //////////////////////////////////////////////////

public function send_mail()
{
	$contactObj = new ContactClass();	
	if(isset($_REQUEST['ids'])&&($_REQUEST['ids']!=''))
	{
		$sql2 = $this -> db -> row("SELECT * FROM newslettertopic WHERE status='Y'");
		$guruarr = explode(",",substr($_REQUEST['ids'],0,-1));
		foreach($guruarr as $id)
		{
			$rec = $this -> db -> row("SELECT * FROM newsletter WHERE id = '".$id."'");
			$from_address = ADMINMAIL;
		    $to_address = $rec["email"];
			$acc_code = $rec['id'];
			$subject = $sql2['news_letter_topic_title'];
			$contents = $sql2['news_letter_topic'];
			$contents .= "<small>If you no longer wish to receive this newsletter, please click here to be</small> ";		
			$contents .= "<a href=".SITEURL."unsubscribe.php?id=$rec[id]&mode=remove_user><small>removed from our mailing list.</small></a>";
			
			//echo $subject;die();
			$contactObj -> sendSimpleMail($to_address,$subject,$contents);
			$contents = "";		
		}	
		$GLOBALS['err_msg']="Mail Sent Successfully.";
		main();
	}
}
/**
	 * delete NewsLetter Subscriber
	 *
     * @param int $id - newsletter subscriber id
     *
	 */
	
	public function deleteNewsLetter($id='') 
	{
			$id = $this -> db -> cleanData($id);
			if($id>0)
			{
				$user = $this -> db -> fetchRow("SELECT * FROM newsletter WHERE id = '$id'");
				
				if(count($user) > 0){				
				$updateSQL = "UPDATE newsletter SET 
							 status = 'N' where id = '$id' ";
				$usermail = $this -> db -> execute($updateSQL);
					$to = $user['email'];
					$from = ADMINMAIL;
					$subject = "Marina Newsletter";
					$message = '';
					$message = '<p>Thank You for Subscribing our News Letter.</p>';
					$str_response = $this -> sendSimpleEmail($to, $subject, $message, $from);
					if($str_response)
					{
						return 2;
					}
				}		
				
			}
		}
public function sendSimpleEmail($to, $subject, $message, $from)
{ 
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: chikado.com <info@chikado.com>' . "\r\n";
	$mail = @mail($to, $subject, $message, $headers);
	if(!$mail)
	{ 
	  return false;
	} 
	  return true;  
	}
public function write_log($log_str,$log_file_name)
{		
	$fp = fopen("$log_file_name","a+");
	fwrite($fp,$log_str);	
	fclose($fp);
}
public function countAllPages()
{
	$SQL = "SELECT * FROM newsletter WHERE 1";
    $results =  $this -> db -> countRows($SQL);
	return $results;
}
public function getPagination($frmname="",$start="",$page="")
{
    $total_record =  $this -> countAllPages();
	$this -> paging = PagingClass::getInstance();
	$pagination1 =  $this -> paging -> pagingGeneral($frmname,$start,$page,$total_record,RECORDPERPAGE);
	return $pagination1;
}
public function activeinactive()
{
	if(isset($_POST['id'])&&($_POST['id']!=''))
	{
	  $id = $this -> db -> cleanData($_POST['id']);
	}
	if(isset($_POST['status'])&&($_POST['status']!=''))
	{
	  $status = $this -> db -> cleanData($_POST['status']);
	}
	$useractive = $this -> db -> query("update newsletter set status='".$status."' where id='".$id."'");
	main();
}
}
?>