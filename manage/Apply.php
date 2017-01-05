<?php include("../includes/common.php");
include("includes/header.php");
		
	$applyObj = new ApplyClass();
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_apply_job'))
	{
		if(isset($_POST['resumeId'])&&($_POST['resumeId']!=''))
		{
			$resumeId = $_POST['resumeId'];	
			$str_response = $applyObj -> deleteApplyJob($resumeId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	
	$allApplyJob = $applyObj -> getAllApplyJob();
?>
<script type="text/javascript">
function delete_apply_job(resumeId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.resumeId.value = resumeId;
		frm.mode.value = 'delete_apply_job';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="resumeId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Apply Job
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Apply Job</span>
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
  <th>Post Name</th>
  <th>Name</th>
  <th>Phone</th>
  <th>Email</th>
  <th>Apply Date</th>
  <th>&nbsp;</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allApplyJob as $resumeId => $job_row){?>
<tr>
  <td><?php echo $job_row['post_name']; ?></td>  
  <td><?php echo $job_row['name']; ?></td> 
  <td><?php echo $job_row['phone']; ?></td> 
  <td><?php echo $job_row['email']; ?></td> 
  <td><?php echo $job_row['date']; ?></td> 
  <td><a href="../uploads/Legacy/Resume/<?php echo $job_row['imgloc']; ?>" target="_blank">Download</a></td>
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">                       
                          <li><a href="javascript:void(0)" onClick="delete_apply_job('<?php echo $job_row['resumeId'];?>')">Delete</a></li>
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