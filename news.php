<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	//$industryObj = new IndustriesClass();
	//$catObj = new CategoryClass();
	
	$blogObj = new BlogClass();
	$pageObj = new PageClass();
	//$productTypeObj = new ProductTypesClass();
	//$brochureObj = new BrochureClass();
	//$msdsObj = new MSDSClass();
	$siteInfo = $adminObj -> getAllSettings();
	//$productTypeInfo = '';
	//$industryId = '';
	////$parentId = '';
	$prodTypeId = '';
	/*if(isset($_REQUEST['indid']) && $_REQUEST['indid'] != '')
	{
		$parentId = $industryObj -> getParentId($_REQUEST['indid']);
		$industryId = $_REQUEST['indid'];
	}
	if(isset($_REQUEST['ptid']) && $_REQUEST['ptid'] != '')
	{
		$prodTypeId = $_REQUEST['ptid'];
		$productTypeInfo = $productTypeObj -> getProductType($prodTypeId);
	}
	*/
	//$industryInfo = $industryObj -> getIndustries($industryId);
	//$parentInfo = $industryObj -> getIndustries($parentId);
	
	$limit = 2;

	$start=0;
	if(isset($_REQUEST['limit']) && $_REQUEST['limit']>5)
		$limit = $_REQUEST['limit'];
	if(isset($_REQUEST['page']) && ($_REQUEST['page']))
	{
		$start= ($_REQUEST['page'] - 1) * $limit;
		$page = $_REQUEST['page'];
	}
	else
	{
		$start=0;
		$page = 1;
	}
	if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='changelimit'))
	{
		if(isset($_REQUEST['limit']) && $_REQUEST['limit']>5)
		{
			$limit =$_REQUEST['limit'];
		}
	}
	$sortby = "";
	if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='changepost'))
	{
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby']=="latest")
		{
			$sortby =$_REQUEST['sortby'];
		}
		if(isset($_REQUEST['sortby']) && $_REQUEST['sortby']=="popular")
		{
			$sortby =$_REQUEST['sortby'];
		}
		
	}
	
	$pagename='news';
?>
<!DOCTYPE html>
<html>
<head>
<title><?php  echo $siteInfo['site_name']; ?> | News</title>

<?php include("includes/css.php"); ?>
 <script src='http://connect.facebook.net/en_US/all.js'></script>
<script type="text/javascript">
function addtocompare(pid)
{
	if(pid>0){
		$.ajax({
			type: "POST",
			url: "<?php echo SITEURL; ?>ajax/ajax.php",
			data: { productId: pid,mode:'addtocompare'}
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
function check_limit(limit)
{
	
document.frm_opts.limit.value=limit;
document.frm_opts.mode.value="changelimit";
document.frm_opts.submit();	
}


function check_post(post)
{
	
document.frm_opts.sortby.value=post;
document.frm_opts.mode.value="changepost";
document.frm_opts.submit();	
}
    function postTofacebookFeed(name,image) {
		// alert(name +' '+ desc);
		//alert("test");
		 
		  FB.init({appId: "1424189231224923", status: true, cookie: true}); 
		  var x=' http://beckandstone.com/dev/legacy/uploads/Legacy/Blog/1_pageimg.jpg'
		  var y=image;
		        // calling the API ...
        var obj = {
          method: 'feed',
          redirect_url: 'https://www.facebook.com/appcenter/fbiphone?fb_source=search&redirect_uri=https%3A%2F%2Fwww.facebook.com%2Fapps%2Fapplication.php%3Fid%120984404656841&fref=ts',
          link: 'http://beckandstone.com/dev/legacy/news.php',
          picture:x+y,
          name: name,
          caption: 'http://beckandstone.com',
          description: ''
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }
        FB.ui(obj, callback);
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
			<h1 class="page-title">News<?php //if(!empty($productTypeInfo)){echo $productTypeInfo['productType'];}else{echo $industryInfo['industries_name'];} ?></h1>
		</div>
</section>  

<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="hidden" name="mode" value="">            
        <input type="hidden" name="page" value="">
        <input type="hidden" name="limit" value="<?php echo $limit?>">
        <input type="hidden" name="sortby" value="<?php echo $sortby?>">  
    </form>
<section class="content-area">
		<div class="container">
			<div class="row">
				<?php include("includes/sidebar.php"); ?> 
				<?php 
				
					//$pagination =  $blogObj -> getPagination("frm_opts",$start,$page,$limit);
         $pagination =  $blogObj ->getPagination("frm_opts",$start,$page,$limit); ?>        
                
                
                
				
                <div class="col-sm-8 col-md-9 content">
					<div class="content-top">
						<div class="row">
							<div class="col-lg-3 ">
                            
                             <?php	echo $pagination;?>
								<!--<ul class="legacy-pagination">
									<li class="first"><a href="#" aria-label="Previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a></li>
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li class="abbr"><span>...</span></li>
									<li><a href="#">10</a></li>
									<li class="last"><a href="#" aria-label="Next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
								</ul>-->
							</div>
							<div class="col-lg-9 listing-criteria">
								<div class="content-top-form">
									<label>Sort by</label>
									<div class="sort-by-wrapper">
										<select onChange="check_post(this.value);">
											<option value="latest" <?php if($sortby=="latest"){echo 'selected';}?>>Latest</option>
											<option value="popular" <?php if($sortby=="popular"){echo 'selected';}?>>Popular</option>
										</select>
									</div>
								</div>
								<div class="content-top-form">
									<label>Showing</label>
									<div class="showing-wrapper">
										<select onChange="check_limit(this.value);" >
											<option value="5" <?php if($limit==5){echo 'selected';}?>  >5 Articles</option>
											<option value="10" <?php if($limit==10){echo 'selected';}?>>10 Articles</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <!------------Blog Loop--------->
                    

					<div class="articles-list">
                    
						<?php /*?><article class="featured-post post">
							<h2 class="post-title"><a href="#">This is the blog Title. Blog Title Goes here.</a></h2>
							<div class="post-image">
								<div class="post-date"><div class="month">APR</div><div class="day">22</div></div>
								<img src="images/placeholder/blog-image-1.jpg" alt="" />
							</div>
							<div class="post-meta">
								<div class="post-author">By <span class="author-name">John Smith</span></div>
								<div class="share-icon"><a href="#"><i class="fa fa-share-alt"></i></a></div>
							</div>
							<div class="post-excerpt">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique erat ac lectus commodo egestas. Aenean malesuada...
								<a href="#">Read</a>
							</div>
							<div class="post-tags">
								<i class="fa fa-tag tag-mark"></i>
								<a href="#">Tag</a>
								<a href="#">Tag</a>
								<a href="#">Tag</a>
							</div>
						</article><?php */?>
                        
                       <?php 
					   $counter=0;
					   $blogInfo = $blogObj -> getAllBlogs($start,$limit,$sortby);
					foreach($blogInfo as $pId => $blog_row){ 
							$mydate=$blog_row['addedon'];
							$month = date("M",strtotime($mydate));
							$dt = date("d",strtotime($mydate));	
							$name=	$blog_row['title'];	
							$image=	$blog_row['imageloc'];  
		 				if($counter<1){								
								?>
                            
                            <article class="featured-post post">
				<h2 class="post-title"><a href="<?php echo SITEURL.'singlenews.php?newsId='.$blog_row['blogId'];?>"><?php echo $blog_row['title'] ?></a></h2>
                         <?php							
							
							//$desc=	substr(strip_tags($blog_row['description']),0,211);			
							?>
                            <div class="post-image">
								<div class="post-date"><div class="month"><?php echo $month;?><!--APR--></div><div class="day"><?php echo $dt;?></div></div>
				<img src="<?php echo SITEURL; ?>uploads/Legacy/Blog/<?php echo $blog_row['imageloc'] ?>" alt="product image" />
							</div>
                            
							<div class="post-meta">
								<div class="post-author">By <span class="author-name"> Admin<!--John Smith--></span></div>
								<div class="share-icon">
                                <!---------------------share media------------------------------------>
                                 <div>
                                    <ul>
                                    <!--<li><p>Follow us:</p></li>-->
<!--   				               <li><a href="javascript:void(o)"onClick="postTofacebookFeed('<?php  echo $name ?>','<?php  echo $image?>')"><img src="<?php echo SITEURL; ?>images/facebooklogo.gif"  alt=""></a></li>
-->    
									<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo SITEURL.'singlenews.php?newsId='.$blog_row['blogId'];?>" target="_blank"><img src="<?php echo SITEURL; ?>images/facebooklogo.gif"  alt=""></a></li>
                                    <li><a href="http://www.twitter.com/share?url=<?php echo SITEURL.'singlenews.php?newsId='.$blog_row['blogId'];?>" target="_blank"><img src="<?php echo SITEURL; ?>images/twitterlogo.gif"  alt=""></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo SITEURL.'singlenews.php?newsId='.$blog_row['blogId'];?>" target="_blank"><img src="<?php echo SITEURL; ?>images/linkedinlogo.gif"  alt=""></a></li>
                                    </ul>
                                </div>
                                  </div>
                         
							</div>
							<div class="post-excerpt"><?php echo substr(strip_tags($blog_row['description']),0,111); ?>
								<a href="<?php echo SITEURL.'singlenews.php?newsId='.$blog_row['blogId'];?>">Read</a>
							</div>
							<div class="post-tags">
								<i class="fa fa-tag tag-mark"></i>
								<a href="#">Tag</a>
								<a href="#">Tag</a>
								<a href="#">Tag</a>
							</div>
						</article>
                        <?php }else{?>

						<article class="post">
							<div class="row">
								<div class="col-md-5">
									<div class="post-image">
									  <!-- <div class="post-date"><div class="month">APR</div><div class="day">22</div></div>-->    
                            		 <div class="post-date"><div class="month"><?php echo $month;?><!--APR--></div><div class="day"><?php echo $dt;?></div></div>

				    <img src="<?php echo SITEURL; ?>uploads/Legacy/Blog/<?php echo $blog_row['imageloc'] ?>" alt="product image" />

                                        
                                      <!--  <img src="images/placeholder/blog-image-1.jpg" alt="" />-->
									</div>
								</div>
								<div class="col-md-7">
									<h2 class="post-title"><a href="<?php echo SITEURL.'singlenews.php?newsId='.$blog_row['blogId'];?>"><?php echo $blog_row['title'] ?></a></h2>
									
									<div class="post-excerpt">
                                    <?php echo substr($blog_row['description'],0,111); ?>
<!--										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque tincidunt sodales dolor ac vestibulum. Proin eu felis odio. Nulla ut tortor ante. Vivamus tristique... 
-->										<a href="<?php echo SITEURL.'singleblog.php?blogId='.$blog_row['blogId'];?>">Read</a>
									</div>
									<div class="post-meta">
								<!--<div class="share-icon"><a href="#"><i class="fa fa-share-alt"></i></a></div>-->                                    
                                         <div class="share-icon">
                                <!---------------------share media------------------------------------>
                                 <div>
                                    <ul>
                                    <!--<li><p>Follow us:</p></li>-->
<!--                                    <li><a href="<?php echo $siteInfo['fburl']; ?>?blog_url=<?php echo SITEURL.'singleblog.php?blogId='.$blog_row['blogId'];?>" target="_blank"><img src="<?php echo SITEURL; ?>images/facebooklogo.gif"  alt=""></a></li>
-->                                 <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo SITEURL.'singlenews.php?newsId='.$blog_row['blogId'];?>" target="_blank"><img src="<?php echo SITEURL; ?>images/facebooklogo.gif"  alt=""></a></li>
                                    <li><a href="<?php echo $siteInfo['tweeturl']; ?>?blog_url=<?php echo SITEURL.'singleblog.php?blogId='.$blog_row['blogId'];?>" target="_blank"><img src="<?php echo SITEURL; ?>images/twitterlogo.gif"  alt=""></a></li>
                                    <li><a href="<?php echo $siteInfo['linkedinurl']; ?>?blog_url=<?php echo SITEURL.'singleblog.php?blogId='.$blog_row['blogId'];?>" target="_blank"><img src="<?php echo SITEURL; ?>images/linkedinlogo.gif"  alt=""></a></li>
                                    </ul>
                                </div>
                                  </div>
										<div class="post-tags">
											<i class="fa fa-tag tag-mark"></i>
											<a href="#">Tag</a>
											<a href="#">Tag</a>
											<a href="#">Tag</a>
										</div>
									</div>
								</div>
							</div>
						</article>
                        
						 <?php }$counter++; } ?>  
						
					</div>
                     
					
					<?php /*?><ul class="legacy-pagination">
						<li class="first"><a href="#" aria-label="Previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></span></a></li>
						<li class="active"><span>1</span></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li class="abbr"><span>...</span></li>
						<li><a href="#">10</a></li>
						<li class="last"><a href="#" aria-label="Next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
					</ul><?php */?>
				</div>
                <!------------------------------------------------------------------------------------------>
                
                <?php /*?><!--<div class="col-sm-8 col-md-9 content">
					<div class="content-top">
						<div class="row">
							<div class="col-md-5">								
                                <?php	echo $pagination;?>
							</div>
							<div class="col-md-7 listing-criteria">
								<div class="content-top-form">
									<span class="caption">Products Per Page</span>
									<div class="inline-margin">
										<div class="radio">
											<label><input onClick="location.href='<?php echo $_SERVER['PHP_SELF']?>?indid=<?php echo $industryId?>&ptid=<?php echo $prodTypeId?>&limit=12'" <?php if($limit==12)echo 'checked'?> type="radio" name="count" value="12"> 12</label>
										</div>
									</div>
									<div class="inline-margin">
										<div class="radio">
											<label><input onClick="location.href='<?php echo $_SERVER['PHP_SELF']?>?indid=<?php echo $industryId?>&ptid=<?php echo $prodTypeId?>&limit=24'" <?php if($limit==24)echo 'checked'?> type="radio" name="count" value="24"> 24</label>
										</div>
									</div>
									<div class="inline-margin">
										<div class="radio">
											<label><input onClick="location.href='<?php echo $_SERVER['PHP_SELF']?>?indid=<?php echo $industryId?>&ptid=<?php echo $prodTypeId?>&limit=36'" <?php if($limit==36)echo 'checked'?> type="radio" name="count" value="36"> 36</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="products-list">
						<div class="row "> 
                        	    ------------------->                  	
							<?php $industries = $industryObj -> getAllSubIndustries($industryId,'fend');
								  if(!empty($industries)){	
								  	echo '<h3 class="col-sm-12">Sub Industries</h3> ';
								  foreach($industries as $hlthchld_row){ 
		 					?>
							<div class="product-item col-sm-6 col-md-4">
								<div class="product-inner">									
									<div class="prod-info">
										<a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hlthchld_row['industriesId']; ?>" class="prod-name uppercase"><?php echo $hlthchld_row['industries_name'] ?></a>
									</div>									
								</div>
							</div>
                            <?php } } ?>                           					
						</div>
                        
						<div class="row">
                        	<h3 class="col-sm-12">Products</h3> 
							<?php $prodInfo = $blogObj -> getAllProductByInd($industryId,$prodTypeId,$start,$limit);
								  foreach($prodInfo as $pId => $prod_row){ 
		 					?>
							<div class="product-item col-sm-6 col-md-4">
								<div class="product-inner">
									<div class="prod-img" style="background-image:url(<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>)">
										<img src="<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>" alt="product image" />
									</div>
									<div class="prod-info">
										<a href="<?php echo SITEURL.'singleproduct.php?productId='.$prod_row['productId'].'&industryId='.$industryId?>" class="prod-name uppercase"><?php echo $prod_row['pname'] ?></a>
									</div>
									<div class="prod-compare">
										<div class="inline-margin">
											<div class="checkbox">
												<label><input <?php if($blogObj->GetCompare($prod_row['productId']))echo 'checked';?> onClick="addtocompare(<?php echo $prod_row['productId']?>);" type="checkbox"> <span class="primary-color">Compare Product</span></label>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <?php } ?>							
						</div>
					
					</div>

					<?php	echo $pagination;?>

				</div><?php */?>
			</div>
            
            
            
            
            
            
            
            
		</div>
	</section>

<?php include("includes/footer.php"); ?>
</body>
</html>