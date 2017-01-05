<?php include("../includes/common.php");
include("includes/header.php");
	$categoryObj  = new CategoryClass();
	if(isset($_POST['mode'])&&($_POST['mode']=='insertupdate_category'))
	{
		$categoryId = '';
		if(isset($_POST['categoryId'])&&($_POST['categoryId']!=''))
		{
			$categoryId = $_POST['categoryId'];
		}
		
		$GLOBALS['err_msg'] = $categoryObj -> editCategory($categoryId);
		
	}
	
	if(isset($_REQUEST['categoryId'])&&($_REQUEST['categoryId']!=''))
	{
		$categoryId = $_REQUEST['categoryId'];
		$category_info = $categoryObj -> getCategory($categoryId);
		$form_title = "Edit Category";		
		$category_name = stripslashes($category_info['category_name']);
		$Description =  stripslashes($category_info['Description']);
		$imgloc =  stripslashes($category_info['imgloc']);
	}
	else
	{
		$form_title = "Add Category";
		$categoryId = "";		
		$category_name = "";
		$Description = "";
		$imgloc = "";
	}

?>
<script language="javascript">
/***************************** START OF VALIDATION *************************************************/
		function chk_addSUPPLIER(frm)
		{
			if(frm.category_name.value.search(/\S/)==-1)
			{
				alert("Please Enter Category Name");
				frm.category_name.focus();
				return false;
			}	
			if(frm.Description.value.search(/\S/)==-1)
			{
				alert("Please Enter Category Description");
				frm.Description.focus();
				return false;
			}			
			frm.mode.value = 'insertupdate_category';
		}
/***************************** END OF VALIDATION *************************************************/
	</script>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Category
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
<input type="hidden" name="categoryId" value="<?php echo $categoryId; ?>" />
</div>		 <div class="row">
			<div class="col-lg-6">

              <ul class="padded separate-sections">
				<li class="input">
                 <label>Category Name:</label>
                <input name="category_name" type="text" value="<?php echo $category_name;?>" maxlength="255" id="category_name" /></li>
                <li class="input">
                 <label>Description:</label>
               <textarea name="Description" id="Description"><?php echo $Description;?></textarea></li>
                <li class="input">
                 <label>Category Image : (Category image size should be 1920px X 209px) </label>
                 <?php if($imgloc!=''){?>
                	<img src="../uploads/Legacy/Category/thumb/<?php echo $imgloc;?>" />
                 <?php } ?>
                <input type="file" name="cat_img" id="cat_img" /></li>
               </li>                
              </ul>
            </div>
             
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-blue">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.location='Categories.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php include("includes/footer.php");?>