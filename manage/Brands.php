<?php include("../includes/common.php");
include("includes/header.php");
		
	$brandObj = new BrandClass();
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_brand'))
	{
		if(isset($_POST['bId'])&&($_POST['bId']!=''))
		{
			$brandId = $_POST['bId'];	
			$str_response = $brandObj -> deleteBrand($brandId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	
	$allbrand = $brandObj -> getAllBrand();
?>
<script type="text/javascript">
function delete_brand(bId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.bId.value = bId;
		frm.mode.value = 'delete_brand';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="bId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Brands
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Brands</span>
          <ul class="box-toolbar">
          <li><span class="label"><a href="addeditbrand.php">New Brand</a></span></li>
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
  <th>Brand Name</th>
  <th>Image Name</th>
  <th>Banner Name</th> 
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allbrand as $bId => $brand_row){?>
<tr>
  <td><?php echo $brand_row['brand_name']; ?></td>  
  <td><?php echo $brand_row['brand_img']; ?></td>
  <td><?php echo $brand_row['brand_banner_img']; ?></td>  
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">
                         <li><a href="addeditbrand.php?brandId=<?php echo $brand_row['brandId'] ?>">Edit</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)" onClick="delete_brand('<?php echo $brand_row['brandId'];?>')">Delete</a></li>
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