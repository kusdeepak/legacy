<?php include("../includes/common.php");
include("includes/header.php");
	$industriesObj  = new IndustriesClass();
	/*echo '<pre>';
	print_r($_POST);*/
	if(isset($_POST['mode'])&&($_POST['mode']=='insertupdate_industries'))
	{
		$industriesId = '';
		if(isset($_POST['industriesId'])&&($_POST['industriesId']!=''))
		{
			$industriesId = $_POST['industriesId'];
		}		
		$parentId = '';
		if(isset($_POST['parentId'])&&($_POST['parentId']!=''))
		{
			$parentId = $_POST['parentId'];
		}		
		
		$GLOBALS['err_msg'] = $industriesObj -> editIndustries($industriesId,$parentId);
		
	}
	
	if(isset($_REQUEST['industriesId'])&&($_REQUEST['industriesId']!=''))
	{
		$industriesId = $_REQUEST['industriesId'];
		$industries_info = $industriesObj -> getIndustries($industriesId);
		$form_title = "Edit Industries";		
		$industries_name = stripslashes($industries_info['industries_name']);
		$industries_img_name =  stripslashes($industries_info['industries_img_name']);	
		$small_description =  $industries_info['small_description'];	
		$description =  $industries_info['description'];	
		$display_order = $industries_info['display_order'];
		$status = $industries_info['status'];
	}
	else
	{
		$form_title = "Add Industries";
		$industriesId = "";		
		$industries_name = "";
		$industries_img_name = "";
		$small_description =  '';
		$description =  '';
		$display_order = "";
		$status = "Y";		
	}
	
	if(isset($_REQUEST['parentId'])&&($_REQUEST['parentId']!=''))
	{
		$parentId = $_REQUEST['parentId'];
	}else{
		$parentId = "";
	}

?>
<script language="javascript">
/***************************** START OF VALIDATION *************************************************/
		function chk_addSUPPLIER(frm)
		{
			if(frm.industries_name.value.search(/\S/)==-1)
			{
				alert("Please Enter Industries Name.");
				frm.industries_name.focus();
				return false;
			}
			if(frm.display_order.value.search(/\S/)==-1)
			{
				alert("Please enter display order.");
				frm.display_order.focus();
				return false;
			}			
			frm.mode.value = 'insertupdate_industries';
		}
/***************************** END OF VALIDATION *************************************************/
	</script>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Industries
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
<input type="hidden" name="industriesId" value="<?php echo $industriesId; ?>" />
<input type="hidden" name="parentId" value="<?php echo $parentId; ?>" />
</div>		 <div class="row">
			<div class="col-lg-8">

              <ul class="padded separate-sections">
				<li class="input">
                 <label>Industries Name:</label>
                <input name="industries_name"  type="text" value="<?php echo $industries_name;?>" maxlength="255" id="industries_name" /></li>
                <li class="input">
                 <label>Industries Image: (Industry image size should be 1920px X 209px) </label>
                 <?php if($industries_img_name!=''){?>
                	<img src="../uploads/Legacy/Industries/thumb/<?php echo $industries_img_name;?>" />
                 <?php } ?>
                <input type="file" name="industry_img" id="industry_img" /></li>
                </li>
                 <li class="input">
                 <label>Secondary Headline:</label>
                <input type="text" name="small_description" value="<?php echo $small_description;?>"  /></li>   
                 <li class="input">
                 <label>Description:</label>
                <textarea name="description" class="ckeditor"><?php echo $description;?></textarea></li>      
                <li class="input">
                 <label>Display Order:</label>
                <input name="display_order" type="text" value="<?php echo $display_order;?>" maxlength="255" id="display_order" /></li>
                <li class="input">
                 <label>Status:</label>
                <input type="radio" name="status" value="Y" <?php if(isset($status)&&($status=='Y'))echo 'checked';?>/>&nbsp;Active
					<input type="radio" name="status" value="N" <?php if(isset($status)&&($status=='N'))echo 'checked';?>/>&nbsp;In-Active</li>          
              </ul>
            </div>
             
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-blue">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.location='<?php if($parentId == 0){ ?>Industries.php<?php }else{ ?>Subindustries.php<?php } ?>';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php include("includes/footer.php");?>