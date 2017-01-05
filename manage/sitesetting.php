<?php
require '../includes/common.php';
$adminObj = new AdminClass();
if(isset($_POST['mode'])&&($_POST['mode']=='updatesettings'))
{
	$GLOBALS['err_msg'] = $adminObj -> editSettings();
}
include("includes/header.php");
$sitesetting_info = $adminObj -> getAllSettings();
?>
<div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-cog"></i>
            Site Setting
          </h3>
          <h5>
            <span>
              Edit Site Setting Information From Here
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
            <i class="icon-cog"></i> Edit Site Setting</span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  
  <div class="box">
      <div class="box-header">
        <span class="title">Website Settings</span>
        <ul class="box-toolbar">
          <li>
            <i class="icon-refresh"></i>
          </li>
          
        </ul>
      </div>
      <?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] == 0){ ?>
      	<div class="alert alert-error" id="alertsuccess"><?php echo 'Failed to save information.'; ?></div>		
      <?php }elseif(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] == 1){ ?>
        <div class="alert alert-success" id="alertsuccess"><?php echo "Information saved successfully."; ?></div>		
      <?php } ?>
      <div class="box-content">
<form class="fill-up validatable" id="UserAddForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" accept-charset="utf-8" enctype="multipart/form-data">

<input type="hidden" name="mode" value="updatesettings" />
	 <div class="row">
            <div class="col-lg-6">

              <ul class="padded separate-sections">
				<li class="input">
                <label>Website Name</label>
                <input name="site_name" class="validate[required]" data-prompt-position="topLeft" type="text" placeholder="Website Name" maxlength="255" id="site_name" value="<?php echo $sitesetting_info['site_name']; ?>" /></li>
                <li class="input">
                <label>Website URL</label>
                <input name="site_url" class="validate[required]" data-prompt-position="topLeft" type="text" placeholder="Website URL" maxlength="255" id="site_url" value="<?php echo $sitesetting_info['site_url']; ?>" /></li>
                <li class="input">
                <label>Admin Email</label>
                <input name="admin_email" class="validate[required]" data-prompt-position="topLeft" type="text" placeholder="Admin Email" maxlength="255" id="admin_email" value="<?php echo $sitesetting_info['admin_email']; ?>" /></li>
                <li class="input">
                <label>Sales Email</label>
                <input name="sales_email" class="validate[required]" data-prompt-position="topLeft" type="text" placeholder="Sales Email" maxlength="255" id="sales_email" value="<?php echo $sitesetting_info['sales_email']; ?>" /></li>
                 <li class="input">
                 <label>Paypal Email</label>
                <input type="text" class="validate[required]" data-prompt-position="topLeft" name="paypal_email" placeholder="Paypal Email" id="paypal_email" value="<?php echo $sitesetting_info['paypal_email']; ?>" /></li>
                <li class="input">
                <label>Records per page</label>
                <input name="results" class="validate[required]" data-prompt-position="topLeft" type="text" placeholder="Records per page" maxlength="255" id="results" value="<?php echo $sitesetting_info['results']; ?>" /></li>                
                <li class="input">
                <label>Facebook URL</label>
                <input name="fburl" type="text" placeholder="Facebook URL" maxlength="255" id="fburl" value="<?php echo $sitesetting_info['fburl']; ?>" /></li>
                 <li class="input">
                 <label>Twitter URL</label>
                <input name="tweeturl" type="text" placeholder="Twitter URL" maxlength="255" id="tweeturl" value="<?php echo $sitesetting_info['tweeturl']; ?>" /> </li>
                <li class="input">
                 <label>Linkedin URL</label>
                <input name="linkedinurl" type="text" placeholder="Linkedin URL" maxlength="255" id="linkedinurl" value="<?php echo $sitesetting_info['linkedinurl']; ?>" /></li> 
                <li class="input">
                 <label>Address 1</label>
                <textarea name="address1"><?php echo $sitesetting_info['address1']; ?></textarea></li> 
                <li class="input">
                 <label>Address 2</label>
                <textarea name="address2"><?php echo $sitesetting_info['address2']; ?></textarea></li> 
                <li class="input">
                 <label>Telephone</label>
                <input type="text" name="telephone" value="<?php echo $sitesetting_info['telephone']; ?>"  /></li> 
                <li class="input">
                 <label>Fax</label>
                <input type="text" name="fax" value="<?php echo $sitesetting_info['fax']; ?>"  /></li> 
                <li class="input">
                 <label>Copyright Text</label>
                <input type="text" name="copyright" value="<?php echo $sitesetting_info['copyright']; ?>"  /></li> 
               <li class="input">
				<label>Image:</label>	                        
                    <tr>
                        <td align="left">
                        <?php if(isset($sitesetting_info['imageloc']) && $sitesetting_info['imageloc']!=''){ ?> <img id="preview" src="../uploads/Legacy/<?php echo $sitesetting_info['imageloc'];?>" class="imageThumb" width="70" height="50" /><?php }?>											
                        </td>
                    </tr>                                        
                    <tr>									
                        <td align="center"><input type="file" name="imageloc" onchange="readURL(this,'preview');" id="f" /></td>							
                    </tr>	
				</li>  
              </ul>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-blue">Save changes</button>
            <!--<button type="button" class="btn btn-default" onclick="">Cancel</button>-->
          </div>
         </form>
      </div>
    </div>  
</div>
<?php include("includes/footer.php");?>