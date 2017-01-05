<?php include("../includes/common.php");
	
	$adminObj = new AdminClass();
	if(isset($_POST['mode'])&&($_POST['mode']=='updatedashboard'))
	{
		$GLOBALS['err_msg'] = $adminObj -> updateHomeImages();
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
            Homepage Images
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
            <i class="icon-dashboard"></i> Homepage Images
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
                <label>* Image size should be 1920px X 209px </label>               
                <table border="0" cellpadding="4" cellspacing="4" style="margin: 18px 0px 0px 18px;">       
        <tr>
            <td class="nameFont">
                Default Image
            </td>
            <td style="width: 20px;">
                :
            </td>
            <td align="left" class="nameFont">
            	 <?php if($info['default_image']!=''){?>
                	<img src="../uploads/Legacy/Homeimage/normal/<?php echo $info['default_image'];?>" width="1000"/>
                <?php } ?>
                <input type="file" name="ctl00$ContentPlaceHolder1$flDefault" id="ctl00_ContentPlaceHolder1_flDefault" />
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="nameFont">
                Health Care
            </td>
            <td style="width: 20px;">
                :
            </td>
            <td align="left" class="nameFont">
            	<?php if($info['health_care']!=''){?>
                	<img src="../uploads/Legacy/Homeimage/normal/<?php echo $info['health_care'];?>" />
                <?php } ?>
                <input type="file" name="ctl00$ContentPlaceHolder1$flHealthCare" id="ctl00_ContentPlaceHolder1_flHealthCare" />
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="nameFont">
                Foodservice
            </td>
            <td style="width: 20px;">
                :
            </td>
            <td align="left" class="nameFont">
            	<?php if($info['foodservice']!=''){?>
                	<img src="../uploads/Legacy/Homeimage/normal/<?php echo $info['foodservice'];?>" />
                <?php } ?>
                <input type="file" name="ctl00$ContentPlaceHolder1$flFoodservice" id="ctl00_ContentPlaceHolder1_flFoodservice" />
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="nameFont">
                Work Place
            </td>
            <td style="width: 20px;">
                :
            </td>
            <td align="left" class="nameFont">
            	<?php if($info['work_place']!=''){?>
                	<img src="../uploads/Legacy/Homeimage/normal/<?php echo $info['work_place'];?>" />
                <?php } ?>
                <input type="file" name="ctl00$ContentPlaceHolder1$flWorkPlace" id="ctl00_ContentPlaceHolder1_flWorkPlace" />
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="nameFont">
                Hospitality
            </td>
            <td style="width: 20px;">
                :
            </td>
            <td align="left" class="nameFont">
            	<?php if($info['hospitality']!=''){?>
                	<img src="../uploads/Legacy/Homeimage/normal/<?php echo $info['hospitality'];?>" />
                <?php } ?>
                <input type="file" name="ctl00$ContentPlaceHolder1$flHospitality" id="ctl00_ContentPlaceHolder1_flHospitality" />
            </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
            <td class="nameFont">
                Technology
            </td>
            <td style="width: 20px;">
                :
            </td>
            <td align="left" class="nameFont">
            	<?php if($info['technology']!=''){?>
                	<img src="../uploads/Legacy/Homeimage/normal/<?php echo $info['technology'];?>" />
                <?php } ?>
                <input type="file" name="ctl00$ContentPlaceHolder1$flTechnology" id="ctl00_ContentPlaceHolder1_flTechnology" />
            </td>
        </tr>
    </table>
                </li>
              </ul>
              <div class="form-actions">
                <button type="submit" class="btn btn-blue">Update</button>                
              </div>
            </div>
            
          </div>          
         </form>
      </div>
    </div>  
</div>
  <?php include("includes/footer.php");?>