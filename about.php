<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();
	$pagesObj = new PageClass();	
	$siteInfo = $adminObj -> getAllSettings();
	$pageId = 7;
	//if(isset($_REQUEST['id'])&&$_REQUEST['id']>0)
		//$pageId = $_REQUEST['id'];
	
	$pages_info = $pagesObj -> getPages($pageId);	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title><?php echo $siteInfo['site_name']; ?> | <?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'About') ?></title>

<?php include("includes/css.php"); ?>	
</head>
<body>

<?php include("includes/header.php"); ?>   

<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span><?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'About') ?></span></li>
				</ul>
			</div>			
			<h1 class="page-title"><?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'About') ?></h1>
		</div>
</section>
		

<section class="content-area">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<article class="single-post post">
                    <?php echo(isset($pages_info['description'])&&$pages_info['description']!=''?str_replace('../',SITEURL,$pages_info['description']):'About') ?>
                    </article>					
				</div>
			</div>
		</div>
	</section>
    
<?php include("includes/footer.php"); ?>

</body>
</html>