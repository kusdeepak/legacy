<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();	
	$siteInfo = $adminObj -> getAllSettings();	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $siteInfo['site_name']; ?> | What's New</title>
<?php include("includes/css.php"); ?>
<style>
.conten_left_what {
    float: left;
    width: 100%;
    word-wrap: break-word;
}
.conten_left_what img{
    float: left;
    width: 100%;    
}
</style>
</head>
<body>
<header>
<?php include("includes/header.php"); ?>  
<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span>What's New</span></li>
				</ul>
			</div>			
			<h1 class="page-title">What's New</h1>
		</div>
</section>
  
<section class="content-area">
		<div class="container">
			<div class="row">   
              <div class="col-sm-12"> <img src="<?php echo SITEURL?>images/whatnew-img.jpg" alt="" width="100%" /></div>         	
				<?php include("includes/sidebar.php"); ?> 
               
				<div class="col-sm-6"> 
                    <h1>WHAT'S NEW</h1>   
                    <div class="conten_left_what"><?php echo str_replace("../",SITEURL,$siteInfo['what_new']);?></div>
                </div>
                
				<div class="col-sm-2 ">
                	<iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FLegacy-Converting-Inc%2F190657114287731&amp;width=300&amp;colorscheme=light&amp;show_faces=false&amp;stream=true&amp;header=false&amp;height=395" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:395px;" allowTransparency="true"></iframe>
                </div>
			</div>
		</div>
</section>	   
    


<?php include("includes/footer.php"); ?>
</body>
</html>