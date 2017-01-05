<?php include("../includes/common.php");
include("includes/header.php");
		
	$categoryObj = new CategoryClass();
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_category'))
	{
		if(isset($_POST['cId'])&&($_POST['cId']!=''))
		{
			$categoryId = $_POST['cId'];	
			$str_response = $categoryObj -> deleteCategory($categoryId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	
	$allcategories = $categoryObj -> getAllCategory();
?>
<script type="text/javascript">
function delete_category(cId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.cId.value = cId;
		frm.mode.value = 'delete_category';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="cId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Categories
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Categories</span>
          <ul class="box-toolbar">
          <li><span class="label"><a href="addeditcategory.php">New Category</a></span></li>
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
  <th>Category Name</th>
  <th>Description</th>
  <th>Image Name</th> 
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allcategories as $cId => $cqategory_row){?>
<tr>
  <td><?php echo $cqategory_row['category_name']; ?></td>  
  <td><?php echo $cqategory_row['Description']; ?></td>
  <td><?php echo $cqategory_row['imagename']; ?></td>  
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">
                         <li><a href="addeditcategory.php?categoryId=<?php echo $cqategory_row['categoryId'] ?>">Edit</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)" onClick="delete_category('<?php echo $cqategory_row['categoryId'];?>')">Delete</a></li>
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