<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();	
	$pagesObj = new PageClass();	
	$siteInfo = $adminObj -> getAllSettings();
	
	$pageId = 8;	
	$pages_info = $pagesObj -> getPages($pageId);	
?>
<!DOCTYPE html>
<html>
<head>

<title><?php echo $siteInfo['site_name']; ?> | <?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'Carrers') ?></title>

<?php include("includes/css.php"); ?>

</head>
<body>

<?php include("includes/header.php"); ?>

<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span><?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'Carrers') ?></span></li>
				</ul>
			</div>			
			<h1 class="page-title"><?php echo(isset($pages_info['title'])&&$pages_info['title']!=''?$pages_info['title']:'Carrers') ?></h1>
		</div>
</section>
<section class="content-area">
    <div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<article class="carrer_row">
             		<?php echo(isset($pages_info['description'])&&$pages_info['description']!=''?str_replace('../',SITEURL,$pages_info['description']):'Carrers') ?>
                </article>
            </div>
        </div>					
    </div>    
</section>

<?php include("includes/footer.php"); ?>


</body>
</html>
