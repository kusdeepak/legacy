<?php
class AdminClass{
	
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
     * Admin Login
     *
	 * @param int - user id
	 *
	 */
	public function adminLogin($username, $password, $remember=false){
				
		$username = $this -> db -> cleanData($username);
		$password = $this -> db -> cleanData($password);
		
		$passObj = new PassHashClass();
		
		//$encrypted_pass = crypt($password,PWSTR);
		$encrypted_pass = $passObj -> hash($password);
		
		$admin = $this -> db -> row("SELECT * FROM `admin` WHERE username = :u AND password = :ep ",array('u' => $username, 'ep' => $encrypted_pass));
		
		if(count($admin) && $admin['adminId'] > 0){
			$_SESSION['adminId'] = $admin['adminId'];
			$_SESSION['adminuname'] = $admin['username'];
			$_SESSION['lastlogin'] = time();
			echo "<script>location.href='Homepage.php'</script>";
		}
		else{
			header('Location: index.php?notlogin=1');
			
    		die();
		}
	}

	
	
	/**
     * Admin Forgot Password
     *
	 * @param string - user email
	 *
	 */
	public function forgotPassword($email){
		$email = $this -> db -> cleanData(trim($email));
		if($email==ADMINMAIL)
		{
			$new_pass = $this -> generatePassword();
			$encrypted_pass = crypt($new_pass,PWSTR);
			
			$this -> db -> execute("UPDATE admin SET password = '$encrypted_pass' ");
			
			$to = $email;
			$subject = 'Website Admin Password Has Been Reset';
			$message = "Dear Admin,\r\n";
			$message .= "Your Website password has been reset using the 'Forgot Password' form on ".SITETITLE.".\r\n";
			$message .= "------------------------------------------\r\n";
			$message .= "This is your new randomly created password: ".$new_pass."\r\n";
			$message .= "------------------------------------------\r\n";
			$message .= "Please login to your Website account using this password, and change it to something you will remember.\r\n";
			$message .= "Thanks,\r\n";
			$message .= "legacyconverting.com Team\r\n";
			$from = 'info@kusdemos.com
';
			$mail = $this -> sendSimpleEmail($to, $subject, $message, $from);
			if($mail){
				header('Location: forgetpass.php?msg=done');
			}
			else{
				header('Location: forgetpass.php?msg=1');
			}
		}
		else
		{
			header("Location: forgetpass.php?msg=1");
		}
		die;
	}
	
	/**
     * Create random password
     *
     * @param int $length - password length
	 */
	public function generatePassword($length = 8){
		// start with a blank password
		$password = "";
		$possible = "2346789bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";
		$maxlength = strlen($possible);
		if ($length > $maxlength) {
		  $length = $maxlength;
		}
		$i = 0; 
		while ($i < $length) { 
		  $char = substr($possible, mt_rand(0, $maxlength-1), 1);
		  if (!strstr($password, $char)) {
			$password .= $char;
			$i++;
		  }
		}
		return $password;
	  }
	
	
	/**
     * Admin Logout
	 *
	 */
	public function adminLogout(){
		$_SESSION = array(); //destroy all of the session variables
    	session_destroy();
		echo "<script>location.href='index.php?msg=log'</script>";		
	}
	
	
	/**
     * Check Admin Login
	 *
	 */
	public function checkAdmin(){		
		if(isset($_SESSION['adminId']) && $_SESSION['adminId']){
			if (isset($_SESSION['lastlogin']) && (time() - $_SESSION['lastlogin'] > 1800)) {
				// last request was more than 30 minutes ago
				session_destroy();
				header('Location: index.php');
				die();
			}
			$_SESSION['lastlogin'] = time();
			return true;
		}
		else{
			session_destroy();
			header('Location: index.php');
    		die();
		}	
	}
	
	
	/**
     * Change Password
     *
	 * @param string - old password
	 * @param string - new password
	 * @param string - confirm new password
	 *
	 * @return string - status message
	 */
	public function changePassword($oldpass, $newpass, $confpass){
		$user_pass = trim($oldpass);
		
		if($this -> checkPassword($user_pass) == 'true'){
			if(strlen($newpass) >= 5 && $newpass == $confpass ){
				$passObj = new PassHashClass();		
				$new_pass = $passObj -> hash($newpass);
				$rs = $this -> db -> query("UPDATE admin SET password = :p",array("p"=>$new_pass));
				if($rs == 0)
				{
					return 'Failed to update your password';
				}else{
					return 'Your password has been updated.';
				}
			}
			else{
				return 'Your new password must be at least 5 characters in length and must match the confirm password field.';
			}
		}
		else{
			return 'Your current password is incorrect.';	
		}
	}
	
	/**
     * Check Password
     *
	 * @param boolean - password status
	 *
	 */
	public function checkPassword($user_pass){
		
		$passObj = new PassHashClass();		
		$user_pass = $passObj -> hash($user_pass);		
		$user = $this -> db -> row("SELECT * FROM admin WHERE  password = :up",array("up"=>$user_pass));
		
		if(count($user) && $user['adminId'] > 0){
			return 'true';
		}
		else{
			return 'false';
		}
	}  
	  
	 /**
     * Send simple email
     *
	 */
	public function sendSimpleEmail($to, $subject, $message, $from){ 
		$mail = @mail($to, $subject, $message, 'From: '.$from);
		if(!$mail){ 
			return false;
		} 
		return true;  
	}
	
	/**
     * Get website settings varialbes
     *
     * @return array - settings table array
     */
    public function getAllSettings(){
		$SQL = "SELECT * FROM settings";
        $results =  $this -> db -> row($SQL);
        return $results;
    }
	
	/**
     * Edit Settings Table
     *
     * 
     * @param array $pages_info - pages info
     * 
     * @return string - error message
     */
    public function editSettings($pages_info=array()){
        $site_name = $this -> db -> cleanData($_POST['site_name']);
        $site_url = $this -> db -> cleanData($_POST['site_url']);
        $admin_email = $this -> db -> cleanData($_POST['admin_email']);
		$sales_email = $this -> db -> cleanData($_POST['sales_email']);
		$paypal_email = $this -> db -> cleanData($_POST['paypal_email']);
        $results = $this -> db -> cleanData($_POST['results']);		
        $fburl = $this -> db -> cleanData($_POST['fburl']);
        $tweeturl = $this -> db -> cleanData($_POST['tweeturl']);
		$linkedinurl = $this -> db -> cleanData($_POST['linkedinurl']);
		$address1 = $this -> db -> cleanData($_POST['address1']);
		$address2 = $this -> db -> cleanData($_POST['address2']);
		$telephone = $this -> db -> cleanData($_POST['telephone']);
		$fax = $this -> db -> cleanData($_POST['fax']);
        $copyright = $this -> db -> cleanData($_POST['copyright']);
		// update db	  	
	  $rs = $this -> db -> query("UPDATE settings SET site_name = :sn, site_url = :su, admin_email = :ae, sales_email = :se, paypal_email = :pe, results = :r, fburl = :fu, tweeturl = :tu, linkedinurl = :lu,address1=:add1,address2=:add2,telephone=:tel,fax=:fx,copyright=:cpr",array("sn"=>$site_name,"su"=>$site_url,"ae"=>$admin_email,"se"=>$sales_email,"pe"=>$paypal_email,"r"=>$results,"fu"=>$fburl,"tu"=>$tweeturl,"lu"=>$linkedinurl,"add1"=>$address1,"add2"=>$address2,"tel"=>$telephone,"fx"=>$fax,"cpr"=>$copyright));
	  			
			 $response = false;	
	   		 if($_FILES['imageloc']['tmp_name']!= '')
			 {
				$response = $this -> uploadLogo($_FILES['imageloc']);
			 }
	  
	  if($rs == 0 && $response !=true)
	  {
		return 0;
	  }
	  else
	  {		  
		return 1;
	  }
    }
	
	private function uploadLogo($file){

		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);
		$imageloc = 'logo'.'.'.$file_type;
		$target = ROOTURL.'/uploads/Legacy/'.$imageloc;
		
		$allowed_ext = array('jpg','png','gif','jpeg');
				
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){
				$filename = ROOTURL.'uploads/Legacy/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}				
				
				$result = move_uploaded_file($file['tmp_name'], $target);
				if($result)
				{					
				$this -> db -> query("UPDATE settings SET imageloc= :imageloc",array("imageloc"=>$imageloc));
				}
				return true;
			}
			else{
				if ($file['error'] == 1) {
					$max_upload_size = min($this->let_to_num(ini_get('post_max_size')), $this->let_to_num(ini_get('upload_max_filesize')));
					return 'The file you attempted to upload was too large.<br /> Please try again with a file that is less than '.($max_upload_size/(1024*1024)).' MB';
				}
			}
		}
		else{
			return 'This filetype is not allowed. Please upload one of the following: .jpg, .jpeg, .gif, .png';
		}
	}
	/**
     * Edit Settings Table - For Home Page
     *
     * 
     * @param array $pages_info - pages info
     * 
     * @return string - error message
     */
    public function edithomeSettings($pages_info=array()){
        $homemetatitle = $this -> db -> cleanData($pages_info['homemetatitle']);
        $homemetakeyword = $this -> db -> cleanData($pages_info['homemetakeyword']);
        $homemetadescription = $this -> db -> cleanData($pages_info['homemetadescription']);
        $hometitle = $this -> db -> cleanData($pages_info['hometitle']);
        $homecontent = $this -> db -> cleanData($pages_info['homecontent']);
        
		// update db	  
	  $rs = $this -> db -> query("UPDATE settings SET homemetatitle = :hmt, homemetakeyword = :hmk, hometitle = :ht, homecontent = :hc, homemetadescription = :hmd",array("hmt"=>$homemetatitle,"hmk"=>$homemetakeyword,"ht"=>$hometitle,"hc"=>$homecontent,"hmd"=>$homemetadescription));
	  if($rs == 0)
	  {
		return "Failed to save information.";
	  }
	  else
	  {
		return "Information saved successfully.";
	  }
    }
	
	public function updateHomeImages(){
		$msg = '';
		// update default image
		if(($_FILES['ctl00$ContentPlaceHolder1$flDefault']['name'])!='')
		{
			$fileuploadresp = $this->uploadHomeImg($_FILES['ctl00$ContentPlaceHolder1$flDefault'],'default_image');
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		// update health care image
		if(($_FILES['ctl00$ContentPlaceHolder1$flHealthCare']['name'])!='')
		{
			$fileuploadresp = $this->uploadHomeImg($_FILES['ctl00$ContentPlaceHolder1$flHealthCare'],'health_care');
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		// update food service image
		if(($_FILES['ctl00$ContentPlaceHolder1$flFoodservice']['name'])!='')
		{
			$fileuploadresp = $this->uploadHomeImg($_FILES['ctl00$ContentPlaceHolder1$flFoodservice'],'foodservice');
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		// update work place image
		if(($_FILES['ctl00$ContentPlaceHolder1$flWorkPlace']['name'])!='')
		{
			$fileuploadresp = $this->uploadHomeImg($_FILES['ctl00$ContentPlaceHolder1$flWorkPlace'],'work_place');
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		// update hospitality image
		if(($_FILES['ctl00$ContentPlaceHolder1$flHospitality']['name'])!='')
		{
			$fileuploadresp = $this->uploadHomeImg($_FILES['ctl00$ContentPlaceHolder1$flHospitality'],'hospitality');
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		// update technology image
		if(($_FILES['ctl00$ContentPlaceHolder1$flTechnology']['name'])!='')
		{
			$fileuploadresp = $this->uploadHomeImg($_FILES['ctl00$ContentPlaceHolder1$flTechnology'],'technology');
			if($fileuploadresp=='true')
			{
				$msg =  "Information saved successfully.";
			}
			else
			{
				$msg =  $fileuploadresp;
			}
		}
		return $msg;
		
	}
	
	private function uploadHomeImg($file,$fieldname=""){
		
		if(isset($fieldname) && ($fieldname != ""))
		{
			$fieldname = $this -> db -> cleanData($fieldname);
		}		
		$fileParts  = pathinfo($file['name']);
		$file_type = strtolower($fileParts['extension']);
		$id = rand(0,100);
		$imageloc = 'img'.$fieldname.'.'.$file_type;
		$target = '../uploads/Legacy/Homeimage/normal/'.$imageloc;
		$targetthumb = '../uploads/Legacy/Homeimage/thumb/'.$imageloc;
		$allowed_ext = array('jpg','png','gif','jpeg');
		if(in_array($file_type,$allowed_ext)){
			if($file['error'] == 0){
									
					$filename = ROOTURL.'uploads/Legacy/Homeimage/normal/'.$imageloc;
					if (@file_exists($filename)) {
						@unlink($filename);
					}
				
				list($width, $height, $type, $attr)=getimagesize($file['tmp_name']);
				if($width > 62 ) /* Checking the width of image */
				{
					$Twidth = 62;
				}
				else
				{
					$Twidth = $width;
				}
				$Theight = $height;
				$tag = 'width';
				$result = move_uploaded_file($file['tmp_name'], $target);				
				if($result)
				{
					$this -> thumb = ThumbnailClass::getInstance();
					$this -> thumb -> thumbnail($targetthumb,$target,$Twidth,$Theight,$tag,8);
					$this -> db -> query("UPDATE settings SET ".$fieldname." = '".$imageloc."'");				
				}
				return true;
			}
			else{
				if ($file['error'] == 1) {
					$max_upload_size = min($this->let_to_num(ini_get('post_max_size')), $this->let_to_num(ini_get('upload_max_filesize')));
					return 'The file you attempted to upload was too large.<br /> Please try again with a file that is less than '.($max_upload_size/(1024*1024)).' MB';
				}
			}
		}
		else{
			return 'This filetype is not allowed. Please upload one of the following: .jpg, .jpeg, .gif, .png';
		}
	}
	
	public function editWhatsNew()
	{
		$whatsnew = $this -> db -> cleanData($_REQUEST['whatsnew']);		 
		// update db	  	
	  $rs = $this -> db -> query("UPDATE settings SET what_new = :wn",array("wn"=>$whatsnew));
	  if($rs == 0)
	  {
		return 'Failed to save information.';
	  }
	  else
	  {
		return 'Information saved successfully.';
	  }
	}
	
	public function editWhatsnewBox()
	{
		$whatsnew = $this -> db -> cleanData($_POST['whatsnew']);		 
		// update db	  	
	  $rs = $this -> db -> query("UPDATE settings SET what_new_box = :wn",array("wn"=>$whatsnew));
	  if($rs == 0)
	  {
		return 'Failed to save information.';
	  }
	  else
	  {
		return 'Information saved successfully.';
	  }
	}
}
?>