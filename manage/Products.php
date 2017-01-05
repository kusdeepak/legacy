<?php include("../includes/common.php");
include("includes/header.php");
		
	$productObj = new ProductClass();
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_product'))
	{
		if(isset($_POST['pId'])&&($_POST['pId']!=''))
		{
			$productId = $_POST['pId'];	
			$str_response = $productObj -> deleteProduct($productId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	
	$allproducts = $productObj -> getAllProduct();
?>
<script type="text/javascript">
function delete_product(pId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.pId.value = pId;
		frm.mode.value = 'delete_product';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="pId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Products
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Products</span>
          <ul class="box-toolbar">
          <li><span class="label"><a href="addeditproduct.php">New Product</a></span></li>
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
  <th>Product Id</th>
  <th>Product Name</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allproducts as $pId => $product_row){?>
<tr>
  <td><?php echo $product_row['pId']; ?></td>  
  <td><?php echo $product_row['pname']; ?></td> 
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">
                         <li><a href="addeditproduct.php?productId=<?php echo $product_row['productId'] ?>">Edit</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)" onClick="delete_product('<?php echo $product_row['productId'];?>')">Delete</a></li>
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