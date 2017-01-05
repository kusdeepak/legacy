<?php include("../includes/common.php");
include("includes/header.php");
$adminObj = new AdminClass();
if(isset($_POST['mode'])&&($_POST['mode']=="changepassword"))
{
	if(isset($_SESSION['adminId']))
	{
		$oldpass=$_POST['cpass'];
		$confpass=$_POST['rpass'];
		$newpass=$_POST['password1'];
		$GLOBALS['err_msg'] = $adminObj->changePassword($oldpass, $newpass, $confpass);
	}	
	
}
	 ?>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Edit Password Information
          </h3>
        </div>
      </div>
    </div>
  </div>
  <div class="container padded">
    <div class="row"> 
    </div>
  </div>
<script language="javascript">
function validateData()
{
	var frm = document.form1;
	var regBlank = /[^\s]/;
	if(!regBlank.test(frm.cpass.value))
	{
		alert("Please enter old Password");
		frm.cpass.focus();
		return false;
	}
	if(!regBlank.test(frm.password1.value))
	{
		alert("Please enter new Password");
		frm.password1.focus();
		return false;
	}
	if(frm.password1.value != frm.rpass.value)
	{
		alert("Please confirm your Password");
		frm.rpass.focus();
		return false;
	}
	var CountryResp = window.confirm("Are you sure you want to change the password? ");
	if(CountryResp)
	{
		document.form1.mode.value = 'changepassword';
		document.form1.submit();
	}
	return false;
}
</script>
  <div class="container">
  
  <div class="box">
      <div class="box-header">
        <span class="title">Edit Password</span>
        
        <ul class="box-toolbar">
          <li>
            <i class="icon-refresh"></i>
          </li>
        </ul>
      </div>
      <?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != '' && $GLOBALS['err_msg'] == 'Your password has been updated.'){ ?>
      	<div class="alert alert-success"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php }elseif(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != ''){ ?>
        <div class="alert alert-error"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php } ?>
 
<div class="box-content">
<form name="form1" action="" method="post" onsubmit="return validateData()" class="fill-up">
<input type="hidden" name="mode" value="" />
<div class="row">
<div class="col-lg-6">
    <ul class="padded separate-sections">
    <li class="input">
    <input name="cpass" type="password" placeholder="Give Your Current Password" value="" maxlength="255" /> 		</li>
    <li class="input">
    <input name="password1" type="password" placeholder="Enter New Password" value="" maxlength="255" /></li>
    <li class="input">
    <input name="rpass" type="password" placeholder="Retype New password" value="" maxlength="255" />     </li>
    </ul>
</div>
    </div>
    <div class="form-actions">
    <button type="submit" class="btn btn-blue">Save changes</button>
    </div>
    </form>
</div>
    </div>  
</div>
<?php include("includes/footer.php");?>