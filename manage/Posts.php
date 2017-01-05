<?php include("../includes/common.php");
include("includes/header.php");
		
	$jobObj = new JobClass();
	if(isset($_REQUEST['mode'])&&($_REQUEST['mode']=='delete_job'))
	{
		if(isset($_POST['jobId'])&&($_POST['jobId']!=''))
		{
			$jobId = $_POST['jobId'];	
			$str_response = $jobObj -> deleteJob($jobId);
			$GLOBALS['err_msg']=$str_response;
		}
	}
	
	$allJob = $jobObj -> getAllJob();
?>
<script type="text/javascript">
function delete_job(jobId)
{
	
	var userResp = window.confirm("Are you sure you want to delete?");
	if( userResp == true )
	{
		
		frm = document.frm_opts;
		frm.jobId.value = jobId;
		frm.mode.value = 'delete_job';
		frm.submit();
	}
}
</script>
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
		<input type="hidden" name="mode" value="">
		<input type="hidden" name="jobId" value="">
	</form>
<div class="container">
    <div class="row">
      <div class="area-top clearfix">
        <div class="pull-left header">
          <h3 class="title">
            <i class="icon-table"></i>Post Job
          </h3>          
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  	<div class="row">
    	<div class="col-md-12">
    <div class="box">
      <div class="box-header"><span class="title">Manage Post Job</span>
          <ul class="box-toolbar">
          <li><span class="label"><a href="addeditjob.php">New Post Job</a></span></li>
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
  <th>Description</th>
  <th>Created Date</th>
  <th width="10%">Option</th>
</tr>
</thead>
<tbody>
<?php foreach($allJob as $jobId => $job_row){?>
<tr>
  <td><?php echo $job_row['post_name']; ?></td>  
  <td><?php echo $job_row['description']; ?></td> 
  <td><?php echo $job_row['date']; ?></td> 
  <td class="left">
   <div class="btn-group">
                      <button class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i></button>
                      <ul class="dropdown-menu">
                         <li><a href="addeditjob.php?jobId=<?php echo $job_row['jobId'] ?>">Edit</a></li>
                          <li class="divider"></li>
                          <li><a href="javascript:void(0)" onClick="delete_job('<?php echo $job_row['jobId'];?>')">Delete</a></li>
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