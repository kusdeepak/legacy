<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();
	$catObj = new CategoryClass();
	$prodObj = new ProductClass();
	$productTypeObj = new ProductTypesClass();
	$brochureObj = new BrochureClass();
	$msdsObj = new MSDSClass();
	$siteInfo = $adminObj -> getAllSettings();
	$productTypeInfo = '';
	$industryId = '';
	$parentId = '';
	$prodTypeId = '';
	if(isset($_REQUEST['indid']) && $_REQUEST['indid'] != '')
	{
		$parentId = $industryObj -> getParentId($_REQUEST['indid']);
		$industryId = $_REQUEST['indid'];
	}
	if(isset($_REQUEST['ptid']) && $_REQUEST['ptid'] != '')
	{
		$prodTypeId = $_REQUEST['ptid'];
		$productTypeInfo = $productTypeObj -> getProductType($prodTypeId);
	}
	$industryInfo = $industryObj -> getIndustries($industryId);
	$parentInfo = $industryObj -> getIndustries($parentId);
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
<title><?php echo $siteInfo['site_name']; ?> | <?php echo $industryInfo['industries_name']; ?> | View All</title>

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
<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span>Products</span></li>
				</ul>
			</div>			
			<h1 class="page-title"><?php if(!empty($productTypeInfo)){echo $productTypeInfo['productType'];}else{echo $industryInfo['industries_name'];} ?></h1>
		</div>
</section>  

<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="get">
        <input type="hidden" name="mode" value="">            
        <input type="hidden" name="page" value="">
        <input type="hidden" name="limit" value="<?php echo $limit?>"> 
        <input type="hidden" name="indid" value="<?php echo $industryId;?>">
        <input type="hidden" name="ptid" value="<?php echo $prodTypeId;?>">
    </form>
<section class="content-area">
		<div class="container">
			<div class="row">
				<?php include("includes/sidebar.php"); ?> 
				<?php $pagination =  $prodObj -> getPaginationByIndCustom("frm_opts",$start,$page,$limit,$industryId); ?>
				<div class="col-sm-8 col-md-9 content">
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
							<?php $prodInfo = $prodObj -> getAllProductByInd($industryId,$prodTypeId,$start,$limit);
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

<?php include("includes/footer.php"); ?>
</body>
</html>