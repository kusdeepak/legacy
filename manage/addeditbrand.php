<?php include("../includes/common.php");
include("includes/header.php");
	$brandObj  = new BrandClass();
	if(isset($_POST['mode'])&&($_POST['mode']=='insertupdate_brand'))
	{
		$brandId = '';
		if(isset($_POST['brandId'])&&($_POST['brandId']!=''))
		{
			$brandId = $_POST['brandId'];
		}
		
		$GLOBALS['err_msg'] = $brandObj -> editBrand($brandId);
		
	}
	
	if(isset($_REQUEST['brandId'])&&($_REQUEST['brandId']!=''))
	{
		$brandId = $_REQUEST['brandId'];
		$brand_info = $brandObj -> getBrand($brandId);
		$form_title = "Edit Brand";		
		$brand_name = stripslashes($brand_info['brand_name']);
		$brand_desc = stripslashes($brand_info['brand_desc']);
		$brand_img =  stripslashes($brand_info['brand_img']);
		$brand_banner_img =  stripslashes($brand_info['brand_banner_img']);
		$brand_inner_img =  stripslashes($brand_info['brand_inner_img']);
	}
	else
	{
		$form_title = "Add Brand";
		$brandId = "";		
		$brand_name = "";
		$brand_desc = "";
		$brand_img = "";
		$brand_banner_img = "";
		$brand_inner_img = "";
	}

?>
<script language="javascript">
/***************************** START OF VALIDATION *************************************************/
		function chk_addSUPPLIER(frm)
		{
			if(frm.brand_name.value.search(/\S/)==-1)
			{
				alert("Please Enter Brand Name");
				frm.brand_name.focus();
				return false;
			}			
			frm.mode.value = 'insertupdate_brand';
		}
/***************************** END OF VALIDATION *************************************************/
	</script>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Brand
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
<input type="hidden" name="brandId" value="<?php echo $brandId; ?>" />
</div>		 <div class="row">
			<div class="col-lg-6">

              <ul class="padded separate-sections">
				<li class="input">
                 <label>Brand Name:</label>
                <input name="brand_name" type="text" value="<?php echo $brand_name;?>" maxlength="255" id="brand_name" /></li>
                <li class="input">
                 <label>Brand Image: (Brand image size should be 727px X 125px) </label>
                 <?php if($brand_img!=''){?>
                	<img src="../uploads/Legacy/Brand/thumb/<?php echo $brand_img;?>" />
                 <?php } ?>
                <input type="file" name="brand_img" id="brand_img" /></li>
                <li class="input">
                 <label>Banner Image:  (Banner size must be 1920px X 209px) </label>
                  <?php if($brand_banner_img!=''){?>
                	<img src="../uploads/Legacy/Brand/Banner/<?php echo $brand_banner_img;?>" />
                 <?php } ?>
                <input type="file" name="brand_banner_img" id="brand_banner_img" /></li>
                <li class="input">
                 <label>Inner Banner Image:  (Banner size must be 727px X 125px) </label>
                  <?php if($brand_inner_img!=''){?>
                	<img src="../uploads/Legacy/Brand/BannerInner/<?php echo $brand_inner_img;?>" />
                 <?php } ?>
                <input type="file" name="brand_inner_img" id="brand_inner_img" /></li>
                <li class="input">
                 <label>Brand Description:</label>                
                <textarea name="brand_desc" class="ckeditor" id="brand_desc"><?php echo $brand_desc;?></textarea></li>                
              </ul>
            </div>
             
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-blue">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.location='Brands.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php include("includes/footer.php");?>