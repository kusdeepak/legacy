<?php require '../includes/common.php';
include("includes/header.php");

if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='addedit_newslettertopic'))
{
	addedit_newslettertopic();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='insertupdate_newslettertopic'))
{
	insertupdate_newslettertopic();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_newslettertopic'))
{
	delete_newslettertopic();
}
else
{
	//main();
	addedit_newslettertopic();
}

function main()           ///////////////////////////////   Function Main Start /////////////////
{
	$newslettertopicObj = new NewslettertopicClass();	
	$message = "";	
	$newslettertopic_info = $newslettertopicObj -> getAllNeswlettertopic();
?>

<script type="text/javascript">
function delete_newslettertopic(newletter_topic_id)
{	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{		
		frm = document.frm_opts;
		frm.newletter_topic_id.value = newletter_topic_id;
		frm.mode.value = 'delete_newslettertopic';
		frm.submit();
	}	
}
	
function add_newslettertopic()
{
	frm = document.frm_opts;		
	frm.mode.value = 'addedit_newslettertopic';
	frm.submit();
}
function addedit_newslettertopic(newletter_topic_id)
{	
	frm = document.frm_opts;
	frm.newletter_topic_id.value = newletter_topic_id;
	frm.mode.value = 'addedit_newslettertopic';
	frm.submit();
}	
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">        	
        <input type="hidden" name="newletter_topic_id" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-exchange"></i>Newsletter Topic
          </h3>
          <h5>
            <span><a href="slider.php">Back to Newsletter Topic's</a></span>
          </h5>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Newsletter Topic</span>
          <!--<ul class="box-toolbar">          
          <li><span class="label"><a href="#" onClick="add_newslettertopic();">Add Newsletter Topic</a></span></li>
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

<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
<thead>
<tr>  
  <th><div>Title</div></th>
  <th><div>Topic</div></th>
  <th width="10%">Status</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php $count=0; foreach($newslettertopic_info as $row){  ?>
<tr>
  
  <td><?php echo $row['news_letter_topic_title']; ?></td>
  <td><?php echo substr($row['news_letter_topic'],0,111); ?></td>
   <td><?php if(isset($row['status'])&&($row['status']=='Y')){echo '<font color="#00FF00">Active</font>';}else{echo '<font color="#FF0000">Inactive</font>'; }?></td> 
  <td class="left">
   <div class="btn-group">
      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
      <ul class="dropdown-menu">
         <li> <a href="javascript:void(0)" onClick="addedit_newslettertopic('<?php echo $row['newletter_topic_id'];?>')">Edit</a> </li>
         <li class="divider"></li>
         <li><a href="javascript:void(0)" onClick="delete_newslettertopic('<?php echo $row['newletter_topic_id'];?>')">Delete</a></li>                          
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
 
function addedit_newslettertopic()  ///////////////////////////////   Function Add/Edit Start /////////////////
{
	$newslettertopicObj = new NewslettertopicClass();
	$newslettertopic_info = $newslettertopicObj -> getNewslettertopic(1);
		
	if(!empty($newslettertopic_info)&&($newslettertopic_info['newletter_topic_id']==1))	
	{
		//$newslettertopic_info = $newslettertopicObj -> getNewslettertopic($id);
		$newletter_topic_id = $newslettertopic_info['newletter_topic_id'];
		$form_title = "Edit Newslwttertopic";		
		$title =  stripslashes($newslettertopic_info['news_letter_topic_title']);
		$description = stripslashes($newslettertopic_info['news_letter_topic']);				
		$status = stripslashes($newslettertopic_info['status']);
	}
	else
	{
		$form_title = "Add Newslettertopic";
		$newletter_topic_id = '';	
		$title = '';
		$description = '';			
		$status = 'Y';
	}
 ?>
 
 <script language="javascript">
/***************************** START OF VALIDATION *************************************************/
	function check_form(frm)
	{
		if(frm.title.value.search(/\S/) == -1)
		{
			alert("Please! Enter Topic  Title.");
			frm.title.focus();
			return false;
		}
		if(frm.description.value.search(/\S/) == -1)
		{
			alert("Please! Enter Topic Description.");
			frm.description.focus();
			return false;
		}
		
		
				
		frm.mode.value = 'insertupdate_newslettertopic';
	}
/***************************** END OF VALIDATION *************************************************/	
	
</script>

  <div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-exchange"></i>
            Newsletter Topic
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
          <span class="breadcrumb-label"><i class="icon-home"></i><a href="newslettertopic.php">Newsletter Topic</a></span>
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
	  <form class="fill-up" id="frm_addeditneswlettertopic" method="post" action="" accept-charset="utf-8" name="frm_addeditneswlettertopic" onSubmit="return check_form(this)" enctype="multipart/form-data">
		<input type="hidden" name="mode" value="">
 		<input type="hidden" name="newletter_topic_id" value="<?php echo $newletter_topic_id;?>"/>
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
            <button type="button" class="btn btn-default" onclick="window.location='newslettertopic.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php } 

function insertupdate_newslettertopic()
{
	$newletter_topic_id = "";	
	if(isset($_POST['newletter_topic_id'])&&($_POST['newletter_topic_id']!=''))
	{
		$newletter_topic_id = $_POST['newletter_topic_id'];
	}	
	$newslettertopicObj = new NewslettertopicClass();
	$str_response = $newslettertopicObj -> editNewslettertopic($newletter_topic_id);
	$GLOBALS['err_msg']=$str_response;
	//main();	
	addedit_newslettertopic();
}
function delete_newslettertopic()
{
	if(isset($_POST['newletter_topic_id'])&&($_POST['newletter_topic_id']!=''))
	{
		$newletter_topic_id = $_POST['newletter_topic_id'];
	}
	$newslettertopicObj = new NewslettertopicClass();
	$GLOBALS['err_msg'] = $newslettertopicObj -> deleteNewslettertopic($newletter_topic_id);
	main();
}
?>