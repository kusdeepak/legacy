<?php include("../includes/common.php"); 

if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='admin_login'))
{ 
	$adminObj = new AdminClass();
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$str_response =  $adminObj -> adminLogin($username,$password); 
	//$GLOBALS['err_msg']=$str_response;
}
if(isset($_REQUEST['notlogin']) && ($_REQUEST['notlogin'] == 1))
{
	$GLOBALS['err_msg']="Invalid Username and Password";
}
if(isset($_REQUEST['msg'])&&($_REQUEST['msg']=='log')){ 
	$GLOBALS['succ_msg']="Thank you for using Admin Panel.";
}
?>
<!doctype html>
<html>
<head>

  <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800">


  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine or request Chrome Frame -->
  <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

  <!-- Use title if it's in the page YAML frontmatter -->
  <title>Core Admin Theme</title>

  <link href="stylesheets/application.css" media="screen" rel="stylesheet" type="text/css" />
  <script src="javascripts/application.js" type="text/javascript"></script>
  <script language="javascript">
/***************************** START OF VALIDATION *************************************************/
		function chk_login(frm)
		{

			if(frm.username.value.search(/\S/)==-1)
			{
				alert("Please Enter Username");
				frm.username.focus();
				return false;
			}
			if(frm.password.value.search(/\S/)==-1)
			{
				alert("Please Enter Your Password");
				frm.password.focus();
				return false;
			}				
			frm.mode.value = 'admin_login';
		}
/***************************** END OF VALIDATION *************************************************/
	</script>
</head>

<body>

<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" href="index.php"><img src="images/logo.png"></a>
  </div>

  
</nav>
<div class="container">
  
<div class="col-md-4 col-md-offset-4">


  <div class="padded">
  <?php if(isset($GLOBALS['err_msg'])){?>
  <div class="alert alert-error"><span><font color="#FF0000"><b><?php echo $GLOBALS['err_msg'];?></b></span></div>
  <?php }if(isset($GLOBALS['succ_msg'])){?>
  <div class="alert alert-success"><span><font color="#000000"><b><?php echo $GLOBALS['succ_msg'];?></b></span></div>
  <?php } ?>
    <div class="login box" style="margin-top: 80px;">
	
      <div class="box-header">
        <span class="title">Login</span>
      </div>

      <div class="box-content padded">
        <form class="separate-sections" action="" name="frm_addUSER" method="post" onSubmit="return chk_login(this)">
        <input type="hidden" name="mode" value="">
          <div class="input-group addon-left">
            <span class="input-group-addon" href="#">
              <i class="icon-user"></i>
            </span>
            <input type="text" placeholder="Username" name="username">
          </div>
          <div class="input-group addon-left">
            <span class="input-group-addon" href="#">
              <i class="icon-key"></i>
            </span>
            <input type="password" placeholder="Password" name="password">
          </div>
          <input type="submit" value="Login" class="btn btn-blue btn-block" />
        </form> 
		<!--<span style="float:right;"> <a href="javascript:void(0)">Forgot Password?</a></span>-->        
      </div>

    </div>

    
  </div>
</div>
</div>
</body>
</html>