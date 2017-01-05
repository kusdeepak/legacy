<?php 
	require '../includes/common.php';	
	include ROOTURL."classes/AdminClass.php";
	$adminObj = new AdminClass();
	if(isset($_POST['mode'])&&($_POST['mode']=='updatedashboard'))
	{
		$GLOBALS['err_msg'] = $adminObj -> editWhatsnewBox();
	}
	include("includes/header.php");
	$info = $adminObj -> getAllSettings();
?>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-dashboard"></i>
            Whats new? box
          </h3>          
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
            <i class="icon-dashboard"></i> Whats New? box
          </span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
  
  <div class="box">      
      <?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != '' && $GLOBALS['err_msg'] == 'Failed to save information.'){ ?>
      	<div class="alert alert-error" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php }elseif(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != ''){ ?>
        <div class="alert alert-success" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php } ?>
      <div class="box-content">
<form class="fill-up validatable" id="UserAddForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" accept-charset="utf-8" enctype="multipart/form-data">

<input type="hidden" name="mode" value="updatedashboard" />
	 <div class="row">
            <div class="col-lg-6">

              <ul class="padded separate-sections">
				<li class="input">
                            
                <textarea name="whatsnew" class="ckeditor" id="whatsnew"><?php echo $info['what_new_box'];?></textarea></li>
              </ul>
              <div class="form-actions">
                <button type="submit" class="btn btn-blue">Save changes</button>                
              </div>
            </div>
            
          </div>          
         </form>
      </div>
    </div>  
</div>
  <?php include("includes/footer.php");?>