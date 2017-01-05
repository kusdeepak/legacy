<?php
	include("includes/common.php");
	$adminObj = new AdminClass();	
	$prodObj = new ProductClass();	
	$siteInfo = $adminObj -> getAllSettings();
	
	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $siteInfo['site_name']; ?> | Featured Products</title>

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
					<li><span>Featured Products</span></li>
				</ul>
			</div>			
			<h1 class="page-title">Featured Products</h1>
		</div>
</section>  


    
<section class="content-area">
		<div class="container">
			<div class="row">
				<?php include("includes/sidebar.php"); ?>				
				<div class="col-sm-8 col-md-9 content">				
					<div class="content-top">
						<div class="row">
							<div class="col-md-5">		
                              <!--================-->
							</div>
						</div>
					</div>
                    
					<div class="products-list">				
                        
						<div class="row">
                        	<h3 class="col-sm-12">Featured Products</h3> 
							<?php $prodInfo = $prodObj -> getAllFeaturedProducts();
							      if(!empty($prodInfo)){
								  foreach($prodInfo as $pid){
									  $prod_row = $prodObj -> getProduct($pid['productId']); 
		 					?>
                           
							<div class="product-item col-sm-6 col-md-4">
								<div class="product-inner">
									<div class="prod-img" style="background-image:url(<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>)">
										<img src="<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>" alt="product image" />
									</div>
									<div class="prod-info">
										<a href="<?php echo SITEURL.'singleproduct.php?productId='.$prod_row['productId']?>" class="prod-name uppercase"><?php echo $prod_row['pname'] ?></a>
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
                            
                            <?php } } else { ?>	
                                 <p class="col-sm-12">No products available.</p>
                                 <?php } ?>						
						</div>
					
					</div>

					

				</div>
			</div>
		</div>
	</section>

<?php include("includes/footer.php"); ?>
</body>
</html>