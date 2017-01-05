<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$blogObj = new BlogClass();
	$brochureObj = new BrochureClass();
	$msdsObj = new MSDSClass();
	$catObj = new CategoryClass();	
	$industryObj = new IndustriesClass();
	$siteInfo = $adminObj -> getAllSettings();
	$blogId = 0; 
	if(isset($_REQUEST['newsId'])&&$_REQUEST['newsId']>0)
		$blogId = $_REQUEST['newsId'];
	$blog_info = $blogObj -> getBlogs($blogId);	
	
	
	
	
	
	
	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php  echo $siteInfo['site_name']; ?> | News |<?php echo $blog_info['title'] ?> </title>

<?php include("includes/css.php"); ?>
<script type="text/javascript">
function addtocompare(pid)
{
	if(pid>0){
		$.ajax({
			type: "POST",
			url: "<?php echo SITEURL; ?>ajax/ajax.php",
			data: { blogId: pid,mode:'addtocompare'}
			}).done(function( msg ) {
				if(msg == 'This product added to comparelist.')	
				{
					setTimeout(function() {
                    $.bootstrapGrowl(msg, { type: 'success' });
               		}, 500);
				}
				else if(msg == 'This product removed from comparelist.'){
					setTimeout(function() {
                    $.bootstrapGrowl(msg, { type: 'warning' });
               		}, 500);					
				}
				else{
					setTimeout(function() {
                    $.bootstrapGrowl(msg, { type: 'info' });
               		}, 500);
				}
			});
	}	
}
               
</script>
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span>News</span></li>
				</ul>
			</div>
           <!-- <div class="category-wrapper">
				<select>
					<option value="">Select Category</option>
					<option value="1">Category 1</option>
					<option value="2">Category 2</option>
				</select>
			</div>	-->	
			
					
			<h1 class="page-title"><?php //echo $blog_info['title'] ?></h1>
		</div>
</section>  

<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="hidden" name="mode" value="">            
        <input type="hidden" name="page" value="">
        <input type="hidden" name="limit" value="<?php //echo $limit?>"> 
        <input type="hidden" name="indid" value="<?php //echo $industryId;?>">
        <input type="hidden" name="ptid" value="<?php //echo $prodTypeId;?>">
    </form>
<section class="content-area">
	<div class="container">
			<div class="row">
				<div class="col-sm-4 col-md-3 sidebar">

					<div class="sidebar-block collapsible">
						<h3 class="block-heading">CURRENT SECTION</h3>
						<ul class="sidebar-nav">
							<li><a href="#">Subpage</a></li>
							<li><a href="#">Subpage</a></li>
							<li><a href="#" class="current">Current Subpage</a></li>
							<li><a href="#">Subpage</a></li>
							<li><a href="#">Subpage</a></li>
						</ul>
					</div>

					<div class="sidebar-block collapsible collapsed">
						<h3 class="block-heading">SECTION</h3>
						<ul class="sidebar-nav">
							<li><a href="#">Subpage</a></li>
							<li><a href="#">Subpage</a></li>
							<li><a href="#" class="current">Current Subpage</a></li>
							<li><a href="#">Subpage</a></li>
							<li><a href="#">Subpage</a></li>
						</ul>
					</div>

					<div class="sidebar-block">
						<h3 class="block-heading">SECTION with No expandable</h3>
					</div>

					<hr />
				</div>

				<div class="col-sm-8 col-md-9 content">

					<article class="single-post post">
						<h2 class="post-title"><?php echo $blog_info['title'] ?></h2>
						<div class="post-image">
                      <?php if($blog_info['imageloc']!=''){ ?>  
				<img src="<?php echo SITEURL; ?>uploads/Legacy/Blog/<?php echo $blog_info['imageloc'] ?>" alt="product image" />
                <?php } ?>
						</div>
						<h3 class="post-subtitle"><?php echo $blog_info['subtitle'] ?></h3>
						<div class="post-content">
                        
                        <?php echo str_replace("../",SITEURL,$blog_info['description']); ?>
							</div>
						</div>
					</article>

				</div>
			</div>
		</div>
	</section>

<?php include("includes/footer.php"); ?>
</body>
</html>