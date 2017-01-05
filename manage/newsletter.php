<?php require '../includes/common.php';
include("includes/header.php");
$newsletterObj = new NewsletterClass();

if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='addedit_slider'))
{
	addedit_slider();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='insertupdate_slider'))
{
	insertupdate_slider();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='send_mail'))
{
$GLOBALS['err_msg']=  $newsletterObj -> send_mail();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_newsletter'))
{
	
	$GLOBALS['err_msg'] = $newsletterObj -> delete_newsletter();
}
else
{
	main();
}

function main()           ///////////////////////////////   Function Main Start /////////////////
{
	$newsletterObj = new NewsletterClass();	
	$message = "";	
	$newsletter_info = $newsletterObj -> getNewssubscriber(0,1000);
?>

<script type="text/javascript">
<!---------------check all------------->
function checkAll()
{	
	var arr = new Array();
	for (var i=0;i<document.frm_newsletter.elements.length;i++)
	{
		var e=document.frm_newsletter.elements[i];
		if ((e.name != 'allbox') && (e.type=='checkbox'))
		{
			e.checked=document.frm_newsletter.allbox.checked;
		}
	}
}
<!--------------------Send Mail--------------------------->
function send_mail()
{	
	if(window.confirm('Do you really want to send mail?'))
	{
		var str = "";
		var arr = new Array();
		//alert(document.mail_record.elements.length);
		for (var i=0;i<document.frm_newsletter.elements.length;i++)
		{
			var e=document.frm_newsletter.elements[i];
		
			if ((e.name != 'allbox') && (e.type=='checkbox'))
			{
				if(e.checked==true)
				{
					str += e.value+",";
				}
			}
		}
		if(str=='')
		{
			alert("Please Select Checkbox Option");
			return false;	
		}
		else
		{
			document.frm_newsletter.value=str;
			document.frm_newsletter.mode.value='send_mail';
			document.frm_newsletter.submit();
		}
	}
}


<!-----------------delete newsletter-------------------->
function delete_newsletter()
{	
	if(window.confirm('Do you really want to delete newsletter?'))
	{
		var str = "";
		var arr = new Array();
		//alert(document.mail_record.elements.length);
		for (var i=0;i<document.frm_newsletter.elements.length;i++)
		{
			var e=document.frm_newsletter.elements[i];
		
			if ((e.name != 'allbox') && (e.type=='checkbox'))
			{
				if(e.checked==true)
				{
					str += e.value+",";
				}
			}
		}
		if(str=='')
		{
			alert("Please Select Checkbox Option");
			return false;	
		}
		else
		{
		
			document.frm_newsletter.value=str;
			document.frm_newsletter.mode.value='delete_newsletter';
			document.frm_newsletter.submit();
		}
	}
}
	

/*function addedit_slider(newsletterId)
{	
	frm = document.frm_opts;
	frm.newsletterId.value = newsletterId;
	frm.mode.value = 'addedit_slider';
	frm.submit();
}	
*/
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">        	
        <input type="hidden" name="newsletterId" value="">
        
        
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-exchange"></i>Newsletter
          </h3>
          <h5>
            <span><a href="newsletter.php">Back to Newsletter's</a></span>
          </h5>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Newsletter</span>
      
          <!--<ul class="box-toolbar">          
          <li><span class="label"><a href="#" onClick="add_slider();">Add Newsletter</a></span></li>
        </ul>-->
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
 <form name="frm_newsletter" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="mode" value="">

<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
<thead>
<tr>  
  <th><div>Email</div></th>
  <th><div>Subscription Date</div></th>
  <th width="10%">Status</th>
   <th width="18%"><input type="checkbox" value=""  name="allbox" onClick="checkAll();"/>Check All &nbsp;&nbsp;
   <span ><a href="#" onClick="send_mail();">Sent Mail</a></span>&nbsp;&nbsp;
   <span><a href="javascript:void(0)" onClick="delete_newsletter()">Delete</a></span>
   </th>
  
  <!--<th width="10%">Option</th>-->
</tr>
</thead>
<tbody>
<?php $count=0; foreach($newsletter_info as $row){  ?>
<tr>
  
  <td><?php echo $row['email']; ?></td>
  <td><?php echo $row['date']; ?></td>
   <td><?php if(isset($row['status'])&&($row['status']=='Y')){echo '<font color="#00FF00">Active</font>';}else{echo '<font color="#FF0000">Inactive</font>'; }?></td> 
  <td><input type="checkbox" value="<?php echo $row['id'];?>"  name="allbox[]" onClick="uncheckAll();"/></td>
  <?php /*?><td class="left">
   <div class="btn-group">
      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
      <ul class="dropdown-menu">
         <li> <a href="javascript:void(0)" onClick="addedit_newsletter('<?php echo $row['id'];?>')">Edit</a> </li>
         <li class="divider"></li>
         <li><a href="javascript:void(0)" onClick="delete_newsletter()">Delete</a></li>                          
      </ul>
    </div></td><?php */?>
                 
</tr>
<?php }?>
</tbody>
</table>

</form>

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
	
	if(isset($_POST['newsletterId'])&&($_POST['newsletterId']!=''))
	{
		$slider_info = $sliderObj -> getSlider($_POST['newsletterId']);
		$newsletterId = $_REQUEST['newsletterId'];
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
		$newsletterId = '';	
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
 		<input type="hidden" name="newsletterId" value="<?php echo $newsletterId;?>"/>
        <div class="row">
			<div class="col-lg-6">
              <ul class="padded separate-sections">
				<li class="input">
                 <label>Title</label>                
                 <input type="text" name="title" size="40" class="inploginbig" value="<?php echo $title;?>" /></li>
                <li class="input">
                 <label>Description</label>
                 <textarea name="description" id="description" class="ckeditor" style="width: 422px; height: 52px;"><?php echo $description;?></textarea></textarea>
                </li>                
                <li class="input">
                 <label>Display Order</label>
                <input type="number" name="displayorder" size="40" class="inploginbig" value="<?php echo $displayorder;?>" ></li>                                    
                <li class="input">
				<label>Image:</label>	                        
                    <tr>
                        <td align="left">
                        <?php if(isset($imageloc) && $imageloc!=''){ ?> <img id="preview" src="../uploads/slider/<?php echo $imageloc;?>" class="imageThumb" /><?php }else{ ?>	<img id="preview" src="images/noimage.png" class="imageThumb" /><?php } ?>											
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

function insertupdate_newsletter()
{
	$newsletterId = "";	
	if(isset($_POST['newsletterId'])&&($_POST['newsletterId']!=''))
	{
		$newsletterId = $_POST['newsletterId'];
	}	
	$sliderObj = new SliderClass();
	$str_response = $sliderObj -> editSlider($newsletterId);
	$GLOBALS['err_msg']=$str_response;
	main();
}
function delete_newsletter()
{
	if(isset($_POST['newsletterId'])&&($_POST['newsletterId']!=''))
	{
		echo $newsletterId = $_POST['newsletterId'];

	}
	die;
	$sliderObj = new NewsletterClass();
	$GLOBALS['err_msg'] = $sliderObj -> delete_newsletter($newsletterId);
	main();
}
?>