<?php require '../includes/common.php';
include("includes/header.php");

if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='addedit_slider'))
{
	addedit_slider();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='insertupdate_slider'))
{
	insertupdate_slider();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_slider'))
{
	delete_slider();
}
else
{
	main();
}

function main()           ///////////////////////////////   Function Main Start /////////////////
{
	$sliderObj = new SliderClass();	
	$message = "";	
	$slider_info = $sliderObj -> getAllSlider();
?>

<script type="text/javascript">
function delete_slider(sliderId)
{	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{		
		frm = document.frm_opts;
		frm.sliderId.value = sliderId;
		frm.mode.value = 'delete_slider';
		frm.submit();
	}	
}
	
function add_slider()
{
	frm = document.frm_opts;		
	frm.mode.value = 'addedit_slider';
	frm.submit();
}
function addedit_slider(sliderId)
{	
	frm = document.frm_opts;
	frm.sliderId.value = sliderId;
	frm.mode.value = 'addedit_slider';
	frm.submit();
}	
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">        	
        <input type="hidden" name="sliderId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-exchange"></i>Slider
          </h3>
          <h5>
            <span><a href="slider.php">Back to Slider's</a></span>
          </h5>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Slider</span>
          <ul class="box-toolbar">          
          <li><span class="label"><a href="#" onClick="add_slider();">Add Slider</a></span></li>
        </ul>
      </div>
    
      <?php if(isset($GLOBALS['err_msg']) && strpos($GLOBALS['err_msg'],'Failed')===0){ ?>
      	<div class="alert alert-error" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?><button class="close" data-dismiss="alert" type="button">x</button></div>		
      <?php }if(isset($GLOBALS['err_msg']) && strpos($GLOBALS['err_msg'],'Failed')!==0){ ?>
        <div class="alert alert-success" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?><button class="close" data-dismiss="alert" type="button">x</button></div>		
      <?php } if($message!=""){ ?>
       <div class="alert alert-success" id="alertsuccess"><?php echo $message; ?><button class="close" data-dismiss="alert" type="button">x</button></div>
       <?php } ?>
      <div class="box-content">
        <!-- find me in partials/data_tables_custom -->
<div id="dataTables">

<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
<thead>
<tr>  
  <th><div>Title</div></th>
  <th>Image</th>
  <th><div>Display Order</div></th>
  <th width="10%">Status</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php $count=0; foreach($slider_info as $row){  ?>
<tr>
  
  <td><?php echo $row['title']; ?></td>
  <td><?php if(isset($row['imageloc']) && $row['imageloc']!=''){ ?> <img id="preview" src="../uploads/slider/thumb/<?php echo $row['imageloc'];?>" class="imageThumb" width="70" height="50" /><?php }?></td>
  <td><?php echo $row['displayorder']; ?></td>
   <td><?php if(isset($row['status'])&&($row['status']=='Y')){echo '<font color="#00FF00">Active</font>';}else{echo '<font color="#FF0000">Inactive</font>'; }?></td> 
  <td class="left">
   <div class="btn-group">
      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
      <ul class="dropdown-menu">
         <li> <a href="javascript:void(0)" onClick="addedit_slider('<?php echo $row['sliderId'];?>')">Edit</a> </li>
         <li class="divider"></li>
         <li><a href="javascript:void(0)" onClick="delete_slider('<?php echo $row['sliderId'];?>')">Delete</a></li>                          
      </ul>
    </div></td>
                 
</tr>
<?php }?>
</tbody>
</table>
</div>
      </div>
    </div>
  </div>
    </div>
  </div>
 <?php }        ///////////////////////////////   Function Main End /////////////////
 
function addedit_slider()   ///////////////////////////////   Function Add/Edit Start /////////////////
{
	$sliderObj = new SliderClass();
	
	if(isset($_POST['sliderId'])&&($_POST['sliderId']!=''))
	{
		$slider_info = $sliderObj -> getSlider($_POST['sliderId']);
		$sliderId = $_REQUEST['sliderId'];
		$form_title = "Edit Slider";		
		$title =  stripslashes($slider_info['title']);
		$description = stripslashes($slider_info['description']);
		$displayorder = stripslashes($slider_info['displayorder']);		
		$imageloc = stripslashes($slider_info['imageloc']);			
		$status = stripslashes($slider_info['status']);
	}
	else
	{
		$form_title = "Add Slider";
		$sliderId = '';	
		$title = '';
		$description = '';
		$displayorder = '';		
		$imageloc = '';		
		$status = 'Y';
	}
 ?>
 
 <script language="javascript">
/***************************** START OF VALIDATION *************************************************/
	function check_form(frm)
	{
		if(frm.title.value.search(/\S/) == -1)
		{
			alert("Please! Enter Slider Title.");
			frm.title.focus();
			return false;
		}
		if(frm.displayorder.value.search(/\S/) == -1)
		{
			alert("Please! Enter display Order.");
			frm.displayorder.focus();
			return false;
		}
		var fileInput = document.getElementsByName("imageloc");		
		for (var i = 0, j = fileInput.length; i < j; i++) {	
			// do stuff with your file
			var fileName = fileInput[i].value;			
			if(fileName != ''){
				var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
				if(ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "PNG" || ext == "png"){			}else{
					alert("Sorry, " + fileName + " is invalid, allowed extensions are: jpeg, jpg, png.");
					return false;
				}
			}
		}		
		frm.mode.value = 'insertupdate_slider';
	}
/***************************** END OF VALIDATION *************************************************/	
	function readURL(input,id)
	{
		if (input.files && input.files[0]) {
			var fup = document.getElementById('f');
			var fileName = fup.value;
			var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
			if(ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "PNG" || ext == "png")
			{
				 var reader = new FileReader();
				reader.onload = function (e) {
					$('#'+id).attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			} else{
				alert("Sorry, " + fileName + " is invalid, allowed extensions are: jpeg, jpg, png.");
				//return false;
		   }
		}
	}		
</script>

  <div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-exchange"></i>
            Slider
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
          <span class="breadcrumb-label"><i class="icon-home"></i><a href="slider.php">Slider</a></span>
          <span class="breadcrumb-arrow"><span></span></span>
        </div>        

        <div class="breadcrumb-button">
          <span class="breadcrumb-label">
            <i class="icon-calendar"></i> <?php echo $form_title; ?></span>
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
<?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != ''){ ?>
        <div class="alert alert-success" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>		
      <?php } ?>
      
      <div class="box-content">
	  <form class="fill-up" id="frm_addeditslider" method="post" action="" accept-charset="utf-8" name="frm_addeditslider" onSubmit="return check_form(this)" enctype="multipart/form-data">
		<input type="hidden" name="mode" value="">
 		<input type="hidden" name="sliderId" value="<?php echo $sliderId;?>"/>
        <div class="row">
			<div class="col-lg-6">
              <ul class="padded separate-sections">
				<li class="input">
                 <label>Title</label>                
                 <input type="text" name="title" size="40" class="inploginbig" value="<?php echo $title;?>" /></li>
                <li class="input">
                 <label>Description</label>
                 <textarea name="description" id="description" class="#ckeditor" style="width: 422px; height: 52px;"><?php echo $description;?></textarea></textarea>
                </li>                
                <li class="input">
                 <label>Display Order</label>
                <input type="number" name="displayorder" size="40" class="inploginbig" value="<?php echo $displayorder;?>" ></li>                                    
                <li class="input">
				<label>Image:</label>	                        
                    <tr>
                        <td align="left">
                        <?php if(isset($imageloc) && $imageloc!=''){ ?> <img id="preview" src="../uploads/slider/<?php echo $imageloc;?>" class="imageThumb" width="70" height="50" /><?php }?>											
                        </td>
                    </tr>                                        
                    <tr>									
                        <td align="center"><input type="file" name="imageloc" onchange="readURL(this,'preview');" id="f" /></td>							
                    </tr>	
				</li> 
                <li class="clearfix">
					<div class="note pull-right">Please upload only jpg|jpeg|png files and Image dimension must be <b>1150X300</b></div>
				</li>
                <li class="input">                              
                    <label>Status</label>
                    &nbsp;&nbsp;
                    <input type="radio" name="status" class="icheck" id="iradio1" value="Y" <?php if(isset($status)&&($status=='Y'))echo 'checked';?>>
                    <label for="iradio1">Active</label>
                    &nbsp;&nbsp;
                    <input type="radio" name="status" class="icheck" id="iradio2" value="N" <?php if(isset($status)&&($status=='N'))echo 'checked';?>>
                    <label for="iradio2">In-Active</label> 
                </li> 
              </ul>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-blue">Submit</button>
            <button type="button" class="btn btn-default" onclick="window.location='slider.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php } 

function insertupdate_slider()
{
	$sliderId = "";	
	if(isset($_POST['sliderId'])&&($_POST['sliderId']!=''))
	{
		$sliderId = $_POST['sliderId'];
	}	
	$sliderObj = new SliderClass();
	$str_response = $sliderObj -> editSlider($sliderId);
	$GLOBALS['err_msg']=$str_response;
	main();
}
function delete_slider()
{
	if(isset($_POST['sliderId'])&&($_POST['sliderId']!=''))
	{
		$sliderId = $_POST['sliderId'];
	}
	$sliderObj = new SliderClass();
	$GLOBALS['err_msg'] = $sliderObj -> deleteSlider($sliderId);
	main();
}
?>