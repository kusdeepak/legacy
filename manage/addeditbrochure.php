<?php include("../includes/common.php");
include("includes/header.php");
	$brochureObj  = new BrochureClass();
	if(isset($_POST['mode'])&&($_POST['mode']=='insertupdate_brochure'))
	{
		$brochureId = '';
		if(isset($_POST['brochureId'])&&($_POST['brochureId']!=''))
		{
			$brochureId = $_POST['brochureId'];
		}
		
		$GLOBALS['err_msg'] = $brochureObj -> editBrochure($brochureId);
		
	}
	
	if(isset($_REQUEST['brochureId'])&&($_REQUEST['brochureId']!=''))
	{
		$brochureId = $_REQUEST['brochureId'];
		$brochure_info = $brochureObj -> getBrochure($brochureId);
		$form_title = "Edit Brochure";		
		$brochure_name = stripslashes($brochure_info['brochure_name']);
		$imgloc =  stripslashes($brochure_info['brochure_file']);
	}
	else
	{
		$form_title = "Add Brochure";
		$brochureId = "";		
		$brochure_name = "";		
		$imgloc = "";
	}

?>
<script language="javascript">
/***************************** START OF VALIDATION *************************************************/
		function chk_addSUPPLIER(frm)
		{
			if(frm.brochure_name.value.search(/\S/)==-1)
			{
				alert("Please Enter Brochure Name");
				frm.brochure_name.focus();
				return false;
			}						
			frm.mode.value = 'insertupdate_brochure';
		}
/***************************** END OF VALIDATION *************************************************/
	</script>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Brochure
          </h3>
          <h5>
            <span>
              <?php echo $form_title; ?> From Here
            </span>
          </h5>
        </div>

        
      </div>
    </div>
  </div>
  <div class="container padded">
    <div class="row">

      <!-- Breadcrumb line -->

      <div id="breadcrumbs">
        <div class="breadcrumb-button blue">
          <span class="breadcrumb-label"><i class="icon-home"></i> Home</span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>

        

        <div class="breadcrumb-button">
          <span class="breadcrumb-label">
            <i class="icon-dashboard"></i> <?php echo $form_title; ?></span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  
  <div class="box">
      <div class="box-header">
        <span class="title"><?php echo $form_title; ?> Form</span>
        <ul class="box-toolbar">
          <li>
            <i class="icon-refresh"></i>
          </li>
          
        </ul>
      </div>
		<?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != '' && ($GLOBALS['err_msg'] == 'Failed to save information.' || $GLOBALS['err_msg'] == "Email address already exist. Please try with another email." )){ ?>
      	<div class="alert alert-error" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php }elseif(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != ''){ ?>
        <div class="alert alert-success" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php } ?>
      <div class="box-content">
<form class="fill-up" id="UserAddForm" method="post" action="" accept-charset="utf-8" name="frm_addUSER" onSubmit="return chk_addSUPPLIER(this)" enctype="multipart/form-data"><div style="display:none;"><input type="hidden" name="_method" value="POST" />
<input type="hidden" name="mode" value="">
<input type="hidden" name="brochureId" value="<?php echo $brochureId; ?>" />
</div>		 <div class="row">
			<div class="col-lg-6">

              <ul class="padded separate-sections">
				<li class="input">
                 <label>Brochure Name:</label>
                <input name="brochure_name" type="text" value="<?php echo $brochure_name;?>" maxlength="255" id="brochure_name" /></li>                
                <li class="input">
                 <label>Brochure File: </label>                 
                <input type="file" name="brochure_file" id="brochure_file" /></li>
               </li>                
              </ul>
            </div>
             
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-blue">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.location='Brochure.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php include("includes/footer.php");?>