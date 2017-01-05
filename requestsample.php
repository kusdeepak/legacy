<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo SITEURL; ?>css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="<?php echo SITEURL; ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script> 
<script type="text/javascript" src="<?php echo SITEURL; ?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo SITEURL; ?>js/bootstrap.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css'>
<link href="<?php echo SITEURL; ?>css/nav.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/jquery_ppup.css" />
<script src="<?php echo SITEURL; ?>js/jquery.meanmenu.js"></script>
<script src="<?php echo SITEURL; ?>js/jquery_popup.js"></script>
<title>Untitled Document</title>
</head>

<body>
<div id="contactdiv">
<form class="form popup_form" action="#" id="contact">
    <h3>Request Sample</h3>
    <br/>
    <div id="response_message"></div>
    <form name="request" id="request" action="">
    <div class="request_frm">
        <div class="form_sec">
            <label>Category or Industry:</label>
            <input type="text" id="cat" class="from_input" readonly="readonly" value="<?php echo $_REQUEST['cat']?>"/>
        </div>
        
        <div class="popup_form_content">
                <div class="form_sec">
                    <label>Product</label>
                    <input type="text" id="prod" class="from_input" readonly="readonly" value="<?php echo $_REQUEST['prod']?>" />
                </div>
                
                <div class="form_sec">
                    <label>Contact Name: <span>*</span></label>
                    <input type="text" id="name" class="from_input" placeholder="Contact Name"/>
                </div>
                
                <div class="form_sec">
                    <label>Company Name: <span>*</span></label>
                    <input type="text" id="cname" class="from_input" placeholder="Company Name"/>
                </div>
                
                <div class="form_sec">
                    <label>Address: <span>*</span></label>
                    <input type="text" id="addr" class="from_input" placeholder="Address"/>
                </div>
            
                <div class="form_sec">
                    <label>Email: <span>*</span></label>
                    <input type="text" id="email" class="from_input" placeholder="Email"/>
                </div>
                
                <div class="form_sec">
                    <label>Phone No: <span>*</span></label>
                    <input type="text" id="contactno" class="from_input" placeholder="Phone No."/>
               </div>
               
               <div class="form_sec">
                    <input type="image" id="send" src="<?php echo SITEURL; ?>images/carsub_btn.png"/>
               </div> 
         </div>  
         </div>
     </form>
      
</form>
</div>
</body>
</html>