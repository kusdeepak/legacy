<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();
	$pagesObj = new PageClass();	
	$siteInfo = $adminObj -> getAllSettings();
	$pageId = 6;
	//if(isset($_REQUEST['id'])&&$_REQUEST['id']>0)
		//$pageId = $_REQUEST['id'];
	
	$pages_info = $pagesObj -> getPages($pageId);	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo $siteInfo['site_name']; ?> | <?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'Terms & Conditions') ?></title>

<?php include("includes/css.php"); ?>	
</head>
<body>

<?php include("includes/header.php"); ?>   

<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span><?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'Terms & Conditions') ?></span></li>
				</ul>
			</div>			
			<h1 class="page-title"><?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'Terms & Conditions') ?></h1>
		</div>
</section>

<section class="content-area">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 features">						
						<?php echo(isset($pages_info['description'])&&$pages_info['description']!=''?$pages_info['description']:'Terms & Conditions') ?>
					</div>					
				</div>
			</div>
</section>
    
<?php include("includes/footer.php"); ?>

</body>
</html>