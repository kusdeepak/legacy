<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();	
	$siteInfo = $adminObj -> getAllSettings();
	$applyJob = new ApplyClass();
	
	$strresponse = '';
	
	if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='add_apply'))
	{
		$strresponse = $applyJob -> addApply();
	}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $siteInfo['site_name']; ?>| Apply</title>
<?php include("includes/css.php"); ?>
<script type="text/javascript">
function applyFrm(frm)
{
	if(frm.name.value.search(/\S/)==-1)
	{
		alert("Please Enter Name");
		frm.name.focus();
		return false;
	}
	if(checkEmail(frm.email.value) == false)
	{
		alert("Please Enter Valid Email.");
		frm.email.focus();
		return false;
	}
	if(frm.ContactNo.value.search(/\S/)==-1)
	{
		alert("Please Enter Contact No.");
		frm.ContactNo.focus();
		return false;
	}	
	if(document.getElementById('resume').value.search(/\S/)==-1)
	{
		alert("Please Upload your resume.");
		document.getElementById('resume').focus();
		return false;		
	}else{
		var img = document.getElementById('resume');
		var fileName = img.value;
		var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
		
		if(ext == "pdf" || ext == "doc" || ext == "docx")
		{
			//return true;
		}else{
			alert("Please Upload pdf,doc,docx type files only");
			img.focus();
			return false;
		}
	}
	frm.mode.value = 'add_apply';
}
function checkEmail(email) 
{
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(email)) 
	{
		return false;
	}
	else
		return true;
}
</script>
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="titlebar blog">
  <div class="container">
    <div class="breadcrumbs">
      <ul>
        <li><a href="#">Home</a></li>
        <li><span>Apply</span></li>
      </ul>
    </div>
    <h1 class="page-title">Apply</h1>
  </div>
</section>
<section class="content-area">
<div class="container">
  <div class="row">
   <div class="col-sm-12"> <img src="<?php echo SITEURL?>images/career.jpg" alt="" width="100%" /></div>
  	<div class="col-sm-2"></div>
    <div class="col-sm-8">
      <h1>Director of New Business Development</h1>
      <?php if(isset($strresponse) && $strresponse != ''){ ?>
      <p><span id="ctl00_ContentPlaceHolder1_lblError"><?php echo $strresponse; ?></span></p>
      <?php } ?>
      <div class="apply">
        <form onsubmit="return applyFrm(this)" enctype="multipart/form-data" method="post" id="apply" name="apply">
          <input type="hidden" name="mode">
          <input type="hidden" value="Director of New Business Development" name="post_name">
          <p>
            <label>Name:</label>
            <input type="text" id="ctl00_ContentPlaceHolder1_txtName" name="name">
          </p>
          <p>
            <label>Email:</label>
            <input type="text" id="ctl00_ContentPlaceHolder1_txtEmail" name="email">
          </p>
          <p>
            <label>Conatct No:</label>
            <input type="text" id="ctl00_ContentPlaceHolder1_txtContactNo" name="ContactNo">
          </p>
          <p>
            <label>Resume:</label>
            <input type="file" id="resume" name="resume">
          </p>
          <p>
            <input type="image" alt="submit" src="<?php echo SITEURL;?>images/carsub_btn.png" id="ctl00_ContentPlaceHolder1_imgbtnSubmit" name="ctl00$ContentPlaceHolder1$imgbtnSubmit">
          </p>
        </form>
        <p> "Or" </p>
        <p>  Email resume to <a style="color: #333333;font: bold 9pt Arial;
                text-decoration: underline;" id="ctl00_ContentPlaceHolder1_hlnkEmail" href="mailto:hr@legacyconverting.com?subject=Director of New Business Development">hr@legacyconverting.com</a> </p>
        <div class="row"></div>        
      </div>
    </div>
    <div class="col-sm-2"></div>
  </div>
</div>
</section>
<?php include("includes/footer.php"); ?>

</body>
</html>