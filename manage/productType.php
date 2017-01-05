<?php include("../includes/common.php");
include("includes/header.php");

	$parentId ="0";
	if(isset($_REQUEST['parentId']) && ($_REQUEST['parentId']))
	{
		$parentId = $_REQUEST['parentId'];
	}
		
	$producttypeObj = new ProductTypesClass();		
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_producttype'))
	{
		if(isset($_POST['ptypeId'])&&($_POST['ptypeId']!=''))
		{
			$ptypeId = $_POST['ptypeId'];	
			$str_response = $producttypeObj -> deleteProductType($ptypeId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	$allProductTypes = $producttypeObj -> getAllProductTypes($parentId);
?>
<script>
function showsubcat(val)
{
	frm = document.frm_opts;
	frm.parentId.value = val;
	frm.submit();
	
}
function addproducttype(val)
{
	if(val == 0)
	{
		alert("First select an Industry");
	}else{				
		window.location.href = "addeditproducttype.php?parentId="+val;
	}
}
function delete_producttype(ptypeId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.ptypeId.value = ptypeId;
		frm.mode.value = 'delete_producttype';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="ptypeId" value="">
        <input type="hidden" name="parentId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Product Type
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title"><?php echo $producttypeObj -> getAllSubIndustriesDropdown($parentId);?></span>
          <ul class="box-toolbar">
          <li><span class="label"><a href="#" onclick="return addproducttype(<?php echo $parentId; ?>);">New Product Type</a></span></li>
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
  <th>Display Order</th>
  <th>Status</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allProductTypes as $ptypeId => $producttype_row){?>
<tr>
  <td><?php echo $producttype_row['productType']; ?></td> 
  <td><?php echo $producttype_row['display_order']; ?></td>
  <td>
  <?php 
		if(isset($producttype_row['status'])&&($producttype_row['status']=='Y'))
		   {
				echo "<font color=\"#66CC00\"><b>Active</b></font>";
		   }
		   elseif(isset($producttype_row['status'])&&($producttype_row['status']=='N'))
		   {
				echo "<font color=\"#FF0000\"><b>In-Acitve</b></font>";
		   } 
				
  ?>
  </td>
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">
                         <li><a href="addeditproducttype.php?productTypeId=<?php echo $producttype_row['productTypeId'] ?>&parentId=<?php echo $producttype_row['industryId'] ?>">Edit</a></li>
                         <?php if($parentId != 0){?>
                         	<li class="divider"></li>
                          	<li><a href="javascript:void(0)" onClick="delete_producttype('<?php echo $producttype_row['productTypeId'];?>')">Delete</a></li>
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