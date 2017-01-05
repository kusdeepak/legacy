<?php require '../includes/common.php';
include("includes/header.php");

if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='addedit_page'))
{
	addedit_page();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='insertupdate_page'))
{
	insertupdate_page();
}
elseif(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_page'))
{
	delete_page();
}
else
{
	main();
}

function main()           ///////////////////////////////   Function Main Start /////////////////
{
	$pageObj = new PageClass();
	$message = "";	
	$pages_info = $pageObj -> getAllPages(0,1000); 
?>

<script type="text/javascript">
function delete_page(pageId)
{	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{		
		frm = document.frm_opts;
		frm.pageId.value = pageId;
		frm.mode.value = 'delete_page';
		frm.submit();
	}	
}
	
function add_page()
{
	frm = document.frm_opts;				
	frm.mode.value = 'addedit_page';
	frm.submit();
}
function addedit_page(pageId)
{	
	frm = document.frm_opts;
	frm.pageId.value = pageId;
	frm.mode.value = 'addedit_page';
	frm.submit();
}	
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">        	
        <input type="hidden" name="pageId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-eye-close"></i>Page
          </h3>
          <h5>
            <span><a href="pages.php">Back to Page's</a></span>
          </h5>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Page</span>
          <ul class="box-toolbar">          
          <li><span class="label"><a href="#" onClick="add_page();">Add Page</a></span></li>
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
  <th><div>SI. No.</div></th>
  <th><div>Page Name</div></th>
  <th><div>SEO URL</div></th>
  <th><div>Display Order</div></th>
  <th width="10%">Status</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php $count=0; foreach($pages_info as $row){  ?>
<tr>
  
  <td><?php echo ++$count;?></td>
  <td><?php echo $row['title']; ?></td>
  <td><?php echo $row['seourl']; ?></td>
  <td><?php echo $row['displayorder']; ?></td>
  <td><?php if(isset($row['status'])&&($row['status']=='Y')){echo '<font color="#00FF00">Active</font>';}else{echo '<font color="#FF0000">Inactive</font>'; }?></td> 
  <td class="left">
   <div class="btn-group">
      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
      <ul class="dropdown-menu">
         <li> <a href="javascript:void(0)" onClick="addedit_page('<?php echo $row['pageId'];?>')">Edit</a> </li>
         <li class="divider"></li>
         <li><a href="javascript:void(0)" onClick="delete_page('<?php echo $row['pageId'];?>')">Delete</a></li>                          
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
 
function addedit_page()   ///////////////////////////////   Function Add/Edit Start /////////////////
{
	$pageObj = new PageClass();	
	
	if(isset($_POST['pageId'])&&($_POST['pageId']!=''))
	{
		$pagesObj = new PageClass();
		$pages_info = $pagesObj -> getPages($_POST['pageId']);
		$pageId = $_POST['pageId'];
		$form_title = "Edit Page";
		$title =  stripslashes($pages_info['title']);
		$description = stripslashes($pages_info['description']);
		$imageloc = stripslashes($pages_info['imageloc']);	
		$displayorder = stripslashes($pages_info['displayorder']);
		$status = stripslashes($pages_info['status']);
		$seourl = stripslashes($pages_info['seourl']);
	}
	else
	{
		$form_title = "Add Page";
		$pageId = "";
		$title =  "";
		$description = "";
		$imageloc = '';
		$displayorder = "";
		$status = "Y";	
		$seourl = "";
	}
 ?>
 
 <script language="javascript">
/***************************** START OF VALIDATION *************************************************/
	function check_form(frm)
	{
		if(frm.title.value.search(/\S/) == -1)
		{
			alert("Please! Enter Pages Title.");
			frm.title.focus();
			return false;
		}
		if(frm.displayorder.value.search(/\S/) == -1)
		{
			alert("Please! Enter Display Order.");
			frm.displayorder.focus();
			return false;
		}	
		frm.mode.value = 'insertupdate_page';
	}
/***************************** END OF VALIDATION *************************************************/				
</script>

  <div class="container">
    <div class="row">

      <div class="area-top clearfix">
        <div class="header">
          <h3 class="title">
            <i class="icon-eye-close"></i>
            Page
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
          <span class="breadcrumb-label"><i class="icon-home"></i><a href="pages.php">Page</a></span>
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
	  <form class="fill-up" id="frm_addeditpage" method="post" action="" accept-charset="utf-8" name="frm_addeditpage" onSubmit="return check_form(this)" enctype="multipart/form-data">
		<input type="hidden" name="mode" value="">
 		<input type="hidden" name="pageId" value="<?php echo $pageId;?>" />    
        <input type="hidden" name="seourl" value="<?php echo $seourl;?>" />
        <div class="row">
			<div class="col-lg-12">
              <ul class="padded separate-sections">
				<li class="input">
                 <label>Page Name</label>                
                 <input name="title" type="text"  value="<?php echo $title; ?>" class="inploginbig" size="40" /></li>
                <li class="input">
                 <label>Description</label>
                 <textarea name="description" rows="5" cols="38" class="ckeditor" style="width:420px;"> <?php echo $description;?></textarea>
                </li>
                 <li class="input">
				<label>Image:</label>	                        
                    <tr>
                        <td align="left">
                        <?php if(isset($imageloc) && $imageloc!=''){ ?> <img id="preview" src="../uploads/pages/<?php echo $imageloc;?>" class="imageThumb" width="70" height="50" /><?php }?>											
                        </td>
                    </tr>                                        
                    <tr>									
                        <td align="center"><input type="file" name="imageloc" onchange="readURL(this,'preview');" id="f" /></td>							
                    </tr>	
				</li>           
                <li class="input ">
                 <label>Display Order</label>
                <input type="number" name="displayorder" size="40" class="inploginbig" value="<?php echo $displayorder;?>" ></li>
                              
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
            <button type="button" class="btn btn-default" onclick="window.location='pages.php';">Cancel</button>
          </div>
         </form>
      </div>
    </div>  
</div>
<?php } 

function insertupdate_page()
{
	$pageId = "";	
	if(isset($_POST['pageId'])&&($_POST['pageId']!=''))
	{
		$pageId = $_POST['pageId'];
	}	
	$pageObj = new PageClass();
	$str_response = $pageObj -> editPage($pageId);
	$GLOBALS['err_msg']=$str_response;
	main();
}
function delete_page()
{
	if(isset($_POST['pageId'])&&($_POST['pageId']!=''))
	{
		$pageId = $_POST['pageId'];
	}
	$pageObj = new PageClass();
	$GLOBALS['err_msg'] = $pageObj -> deletePage($pageId);
	main();
}
?>