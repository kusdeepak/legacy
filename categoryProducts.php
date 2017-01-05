<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();
	$catObj = new CategoryClass();
	$prodObj = new ProductClass();
	$brochureObj = new BrochureClass();
	$pagesObj = new PageClass();
	$msdsObj = new MSDSClass();
	$siteInfo = $adminObj -> getAllSettings();
	$categoryId = '';
	if(isset($_REQUEST['cid']) && $_REQUEST['cid'] != '')
	{
		$categoryId = $_REQUEST['cid'];
	}
	$categoryInfo = $catObj -> getCategory($categoryId);
	$limit = 12;
	if(isset($_REQUEST['limit']) && $_REQUEST['limit']>12)
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
?>
<!DOCTYPE html>
<html>
<head>

<title><?php echo $siteInfo['site_name']; ?> | <?php echo $categoryInfo['category_name']; ?></title>
<?php include("includes/css.php"); ?>
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
               
</script>
</head>
<body>
<?php include("includes/header.php"); ?>   
<section class="titlebar products">
		<div class="container">
			<div class="titlebar-actions">
				<a href="#"><i><img src="images/icon-mail-white.png" alt="" /></i></a>
				<a href="#"><i><img src="images/icon-print-white.png" alt="" /></i></a>
			</div>
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Products</a></li>
					<li><span>Category</span></li>
				</ul>
			</div>
			<div class="category-wrapper">
				<select onChange="location.href='<?php echo $_SERVER['PHP_SELF']?>?cid='+this.value">					
                    <?php foreach($catInfo as $cat_row){?>
					<option <?php if($categoryId==$cat_row['categoryId'])echo'selected'?> value="<?php echo $cat_row['categoryId'] ?>"><?php echo $cat_row['category_name']; ?></option>
                    <?php } ?>					
				</select>
			</div>
			<h1 class="page-title"><?php echo $categoryInfo['category_name'];?></h1>
		</div>
	</section>

<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">    
    <input type="hidden" name="cid" value="<?php echo $categoryId;?>">  
    <input type="hidden" name="limit" value="<?php echo $limit?>">          
    <input type="hidden" name="page" value="">    
</form>
<section class="content-area">
		<div class="container">
			<div class="row">
				<?php include("includes/sidebar.php"); ?> 
				<?php $pagination =  $prodObj -> getPaginationCustom("frm_opts",$start,$page,$limit,$categoryId); ?>
				<div class="col-sm-8 col-md-9 content">
					<div class="content-top">
						<div class="row">
							<div class="col-md-5">
								<!--<ul class="legacy-pagination">
									<li class="first"><a href="#" aria-label="Previous"><i class="fa fa-chevron-left" aria-hidden="true"></i></a></li>
									<li class="active"><span>1</span></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li class="abbr"><span>...</span></li>
									<li><a href="#">10</a></li>
									<li class="last"><a href="#" aria-label="Next"><i class="fa fa-chevron-right" aria-hidden="true"></i></a></li>
								</ul>-->
                                <?php	echo $pagination;?>
							</div>
							<div class="col-md-7 listing-criteria">
								<div class="content-top-form">
									<span class="caption">Products Per Page</span>
									<div class="inline-margin">
										<div class="radio">
											<label><input onClick="location.href='<?php echo $_SERVER['PHP_SELF']?>?cid=<?php echo $categoryId?>&limit=12'" <?php if($limit==12)echo 'checked'?> type="radio" name="count" value="12"> 12</label>
										</div>
									</div>
									<div class="inline-margin">
										<div class="radio">
											<label><input onClick="location.href='<?php echo $_SERVER['PHP_SELF']?>?cid=<?php echo $categoryId?>&limit=24'" <?php if($limit==24)echo 'checked'?> type="radio" name="count" value="24"> 24</label>
										</div>
									</div>
									<div class="inline-margin">
										<div class="radio">
											<label><input onClick="location.href='<?php echo $_SERVER['PHP_SELF']?>?cid=<?php echo $categoryId?>&limit=36'" <?php if($limit==36)echo 'checked'?> type="radio" name="count" value="36"> 36</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="products-list">

						<div class="row">
							<?php $prodInfo = $prodObj -> getAllProductByCat($categoryId,$start,$limit);
								foreach($prodInfo as $pId => $prod_row){ 
		 					?>
							<div class="product-item col-sm-6 col-md-4">
								<div class="product-inner">
									<a href="<?php echo SITEURL.'singleproduct.php?productId='.$prod_row['productId'].'&categoryId='.$categoryId?>"><div class="prod-img" style="background-image:url('<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>')">
										<img src="<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>" alt="product image" />
									</div></a>
									<div class="prod-info">
										<a href="<?php echo SITEURL.'singleproduct.php?productId='.$prod_row['productId'].'&categoryId='.$categoryId?>" class="prod-name uppercase"><?php echo $prod_row['pname'] ?></a>
									</div>
									<div class="prod-compare">
										<div class="inline-margin">
											<div class="checkbox">
												<label><input <?php if($prodObj->GetCompare($prod_row['productId']))echo 'checked';?> onClick="addtocompare(<?php echo $prod_row['productId']?>);" type="checkbox"> <span class="primary-color">Compare Product</span></label>
											</div>
										</div>
									</div>
								</div>
							</div>
                            <?php } ?>							
						</div>
					
					</div>

					<?php	echo $pagination;?>

				</div>
			</div>
		</div>
	</section>

<section class="cta-compare">
    <?php $pages_info = $pagesObj -> getPages(2); ?>
		<div class="container">
			<div class="row row-v-middle">
				<div class="col-sm-6 col-md-5 cta-compare-box col-v-bottom">
					<h2 class="cta-mobile-title">
						<span class="primary-color">COMPARE OUR PRODUCTS</span><br />
						WITH THE COMPETITION
					</h2>
					<img src="<?php echo SITEURL.'uploads/pages/'.$pages_info['imageloc'] ?>" alt="" />
				</div>
				<div class="col-sm-6 col-md-7 cta-content col-v-middle">
					<h2 class="cta-title hidden-xs">
						<span class="primary-color">COMPARE OUR PRODUCTS</span><br />
						WITH THE COMPETITION
					</h2>
					<div class="hidden-xs"><?php echo $pages_info['description'] ?></div>
					<p><a href="#" class="cta-btn">Compare</a></p>
				</div>
			</div>
		</div>
	</section>   
<?php include("includes/footer.php"); ?>
</body>
</html>