<?php include("../includes/common.php");
include("includes/header.php");
		
	$industriesObj = new IndustriesClass();		
	$allIndustries = $industriesObj -> getAllIndustries();
?>

<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="iId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Industries
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Industries</span>
          <ul class="box-toolbar">
          <li><span class="label">&nbsp;</span></li>
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
<?php foreach($allIndustries as $iId => $industries_row){?>
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