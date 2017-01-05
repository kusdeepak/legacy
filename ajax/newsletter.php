<?php 
include '../includes/common.php';
$newsObj = new NewsletterClass();

$str_response = '';
if(isset($_REQUEST['email']) && ($_REQUEST['email']!='')){ $email = $_REQUEST['email']; }else{ $email = ""; }

if($email == "")
{
	echo "Please enter your e-mail address!";
}elseif (!preg_match('/^[_A-z0-9-]+((\.|\+)[_A-z0-9-]+)*@[A-z0-9-]+(\.[A-z0-9-]+)*(\.[A-z]{2,4})$/',$email)){  
    echo "Address e-mail non validated";  
}else{
	
	$str_response = $newsObj -> newsletter($email);
	echo $str_response;
}
?>