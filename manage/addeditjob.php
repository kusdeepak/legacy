<?php include("../includes/common.php");
include("includes/header.php");
	$jobObj  = new JobClass();
	if(isset($_POST['mode'])&&($_POST['mode']=='insertupdate_job'))
	{
		$jobId = '';
		if(isset($_POST['jobId'])&&($_POST['jobId']!=''))
		{
			$jobId = $_POST['jobId'];
		}
		
		$GLOBALS['err_msg'] = $jobObj -> editJob($jobId);
		
	}
	
	if(isset($_REQUEST['jobId'])&&($_REQUEST['jobId']!=''))
	{
		$jobId = $_REQUEST['jobId'];
		$job_info = $jobObj -> getJob($jobId);
		$form_title = "Edit Job";		
		$post_name = stripslashes($job_info['post_name']);
		$description =  stripslashes($job_info['description']);
	}
	else
	{
		$form_title = "Add Job";
		$jobId = "";		
		$post_name = "";		
		$description = "";
	}

?>
<script language="javascript">
/***************************** START OF VALIDATION *************************************************/
		function chk_addSUPPLIER(frm)
		{
			if(frm.post_name.value.search(/\S/)==-1)
			{
				alert("Please Enter Job Name");
				frm.post_name.focus();
				return false;
			}						
			frm.mode.value = 'insertupdate_job';
		}
/***************************** END OF VALIDATION *************************************************/
	</script>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Job
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
<input type="hidden" name="jobId" value="<?php echo $jobId; ?>" />
</div>		 <div class="row">
			<div class="col-lg-6">

              <ul class="padded separate-sections">
				<li class="input">
                 <label>Post Name:</label>
                <input name="post_name" type="text" value="<?php echo $post_name;?>" maxlength="255" id="post_name" /></li>                
                <li class="input">
                 <label>Description: </label>                 
                <textarea name="description" id="description"><?php echo $description?></textarea></li>
               </li>                
              </ul>
            </div>
             
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-blue">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.location='Posts.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php include("includes/footer.php");?>