<?php include("../includes/common.php");
include("includes/header.php");
	$producttypeObj  = new ProductTypesClass();
	/*echo '<pre>';
	print_r($_POST);*/
	if(isset($_POST['mode'])&&($_POST['mode']=='insertupdate_producttypes'))
	{
		$productTypeId = '';
		if(isset($_POST['productTypeId'])&&($_POST['productTypeId']!=''))
		{
			$productTypeId = $_POST['productTypeId'];
		}		
		$parentId = '';
		if(isset($_POST['parentId'])&&($_POST['parentId']!=''))
		{
			$parentId = $_POST['parentId'];
		}		
		
		$GLOBALS['err_msg'] = $producttypeObj -> editProductTypes($productTypeId,$parentId);
		
	}
	
	if(isset($_REQUEST['productTypeId'])&&($_REQUEST['productTypeId']!=''))
	{
		$productTypeId = $_REQUEST['productTypeId'];
		$producttype_info = $producttypeObj -> getProductType($productTypeId);
		$form_title = "Edit Product Type";		
		$productType = stripslashes($producttype_info['productType']);
		$display_order = $producttype_info['display_order'];
		$status = $producttype_info['status'];
	}
	else
	{
		$form_title = "Add Product Type";
		$productTypeId = "";		
		$productType = "";
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
		function chk_addPTYPE(frm)
		{
			if(frm.productType.value.search(/\S/)==-1)
			{
				alert("Please Enter Product Type Name.");
				frm.productType.focus();
				return false;
			}
			if(frm.display_order.value.search(/\S/)==-1)
			{
				alert("Please enter display order.");
				frm.display_order.focus();
				return false;
			}			
			frm.mode.value = 'insertupdate_producttypes';
		}
/***************************** END OF VALIDATION *************************************************/
	</script>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Product Type
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
		<?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != '' && ($GLOBALS['err_msg'] == 'Failed to save information.')){ ?>
      	<div class="alert alert-error" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php }elseif(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != ''){ ?>
        <div class="alert alert-success" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php } ?>
      <div class="box-content">
<form class="fill-up" id="UserAddForm" method="post" action="" accept-charset="utf-8" name="frm_addUSER" onSubmit="return chk_addPTYPE(this)" enctype="multipart/form-data"><div style="display:none;"><input type="hidden" name="_method" value="POST" />
<input type="hidden" name="mode" value="">
<input type="hidden" name="productTypeId" value="<?php echo $productTypeId; ?>" />
<input type="text" name="parentId" value="<?php echo $parentId; ?>" />
</div>		 <div class="row">
			<div class="col-lg-6">

              <ul class="padded separate-sections">
				<li class="input">
                 <label>Product Type Name:</label>
                <input name="productType" type="text" value="<?php echo $productType;?>" maxlength="255" id="productType" /></li>
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
            <button type="button" class="btn btn-default" onclick="window.location='productType.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php include("includes/footer.php");?>