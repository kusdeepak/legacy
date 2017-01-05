<?php include("../includes/common.php");
include("includes/header.php");
		
	$brochureObj = new BrochureClass();
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_brochure'))
	{
		if(isset($_POST['brcId'])&&($_POST['brcId']!=''))
		{
			$brochureId = $_POST['brcId'];	
			$str_response = $brochureObj -> deleteBrochure($brochureId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	
	$allbrochure = $brochureObj -> getAllBrochure();
?>
<script type="text/javascript">
function delete_brochure(brcId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.brcId.value = brcId;
		frm.mode.value = 'delete_brochure';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="brcId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Brochure
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Brochure</span>
          <ul class="box-toolbar">
          <li><span class="label"><a href="addeditbrochure.php">New Brochure</a></span></li>
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
  <th>Brochure Name</th>
  <th>Brochure File</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allbrochure as $brcId => $brochure_row){?>
<tr>
  <td><?php echo $brochure_row['brochure_name']; ?></td>  
  <td><?php echo $brochure_row['filename']; ?></td> 
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">
                         <li><a href="addeditbrochure.php?brochureId=<?php echo $brochure_row['brochureId'] ?>">Edit</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)" onClick="delete_brochure('<?php echo $brochure_row['brochureId'];?>')">Delete</a></li>
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