<?php include("../includes/common.php");
include("includes/header.php");

	$parentId ="0";
	if(isset($_REQUEST['parentId']) && ($_REQUEST['parentId']))
	{
		$parentId = $_REQUEST['parentId'];
	}
		
	$industriesObj = new IndustriesClass();		
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_industry'))
	{
		if(isset($_POST['iId'])&&($_POST['iId']!=''))
		{
			$industryId = $_POST['iId'];	
			$str_response = $industriesObj -> deleteIndustry($industryId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	$allSubIndustries = $industriesObj -> getAllSubIndustries($parentId);
?>
<script>
function showsubcat(val)
{
	frm = document.frm_opts;
	frm.parentId.value = val;
	frm.submit();
	
}
function addsubindustry(val)
{
	if(val == 0)
	{
		alert("First select an Industry");
	}else{				
		window.location.href = "addeditindustries.php?parentId="+val;
	}
}
function delete_subIndustry(iId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.iId.value = iId;
		frm.mode.value = 'delete_industry';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="iId" value="">
        <input type="hidden" name="parentId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Sub Industries
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title"><?php echo $industriesObj -> getAllSubIndustriesDropdown($parentId);?></span>
          <ul class="box-toolbar">
          <li><span class="label"><a href="#" onclick="return addsubindustry(<?php echo $parentId; ?>);">New Sub Industry</a></span></li>
        </ul>
      </div>
      
      <?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] == 0){ ?>
      	<div class="alert alert-error" id="alertsuccess"><?php echo "Failed to delete information."; ?></div>		
      <?php }elseif(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] == 1){ ?>
        <div class="alert alert-success" id="alertsuccess"><?php echo "Information deleted successfully."; ?></div>		
      <?php } ?>
      <div class="box-content">
        <!-- find me in partials/data_tables_custom -->

<div id="dataTables">

<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
<thead>
<tr>
  <th>Industries Name</th>
  <th>Image Name</th>
  <th>Display Order</th>
  <th>Status</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allSubIndustries as $iId => $industries_row){?>
<tr>
  <td><?php echo $industries_row['industries_name']; ?></td>  
  <td><?php echo $industries_row['imgname']; ?></td>
  <td><?php echo $industries_row['display_order']; ?></td>
  <td>
  <?php 
		if(isset($industries_row['status'])&&($industries_row['status']=='Y'))
		   {
				echo "<font color=\"#66CC00\"><b>Active</b></font>";
		   }
		   elseif(isset($industries_row['status'])&&($industries_row['status']=='N'))
		   {
				echo "<font color=\"#FF0000\"><b>In-Acitve</b></font>";
		   } 
				
  ?>
  </td>
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">
                         <li><a href="addeditindustries.php?industriesId=<?php echo $industries_row['industriesId'] ?>&parentId=<?php echo $industries_row['parentId'] ?>">Edit</a></li>
                         <?php if($parentId != 0){?>
                         	<li class="divider"></li>
                          	<li><a href="javascript:void(0)" onClick="delete_subIndustry('<?php echo $industries_row['industriesId'];?>')">Delete</a></li>
                         <?php } ?>
                          
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
<?php include("includes/footer.php");?>