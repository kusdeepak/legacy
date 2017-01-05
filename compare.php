<?php
	include("includes/common.php");
	$adminObj = new AdminClass();	
	$prodObj = new ProductClass();	
	$siteInfo = $adminObj -> getAllSettings();
	$rs = '';
	if(isset($_REQUEST['mode'])&&$_REQUEST['mode']=='deletecompare'){ 
		$rs = $prodObj -> DeleteCompare();		
	}
        $pagename = 'compare';
	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $siteInfo['site_name']; ?> | Compare</title>

<?php include("includes/css.php"); ?>

<?php if($rs == 'No product selected.') {
  echo '<script type="text/javascript">setTimeout(function(){$.bootstrapGrowl("'.$rs.'", { type: "warning" });},1000)</script>';
 } elseif($rs!=''){
 echo '<script type="text/javascript">setTimeout(function(){$.bootstrapGrowl("'.$rs.'", { type: "success" });},1000)</script>';
 } ?>
</script>
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span>Compare</span></li>
				</ul>
			</div>			
			<h1 class="page-title">Compare</h1>
		</div>
</section>  

<form name="deletefrm" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <input type="hidden" name="mode" value="deletecompare"> 
    
<section class="content-area">
		<div class="container">
			<div class="row">
				<?php include("includes/sidebar.php"); ?>				
				<div class="col-sm-8 col-md-9 content">				
					<div class="content-top">
						<div class="row">
							<div class="col-md-5">		
                              <input type="submit" value="Delete" class="btn btn-default btn-danger" />
							</div>
						</div>
					</div>
                    
					<div class="products-list">				
                        
						<div class="row">
                        	<h3 class="col-sm-12">Compare Products</h3> 
							<?php $prodInfo = $prodObj -> GetAllCompare();
							      if(!empty($prodInfo)){
								  foreach($prodInfo as $pid){
									  $prod_row = $prodObj -> getProduct($pid); 
		 					?>
                           
							<div class="product-item col-sm-6 col-md-4">
								<div class="product-inner">
                                	
									<div class="prod-img" style="background-image:url(<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>)">
										<img src="<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>" alt="product image" /> 
									</div>
                                   
									<div class="">										
                                        <ul class="list-group">
                                          <li class="list-group-item"> Name: <?php echo $prod_row['pname'] ?></li>
                                          <li class="list-group-item">Each dimension: <?php echo $prod_row['each_dimension'] ?></li>
                                          <li class="list-group-item">Sheet Size: <?php echo $prod_row['sheet_size'] ?></li>
                                          <li class="list-group-item">Items per each: <?php echo $prod_row['items_per_each'] ?></li>
                                          <li class="list-group-item">Case total pcs: <?php echo $prod_row['case_total_pcs'] ?></li>  
                                        </ul>
                                        
									</div>
                                    
									<div class="prod-compare">
										<div class="">                                        
											<div class="checkbox col-md-4">
												<label><input name="productids[]" value="<?php echo $prod_row['productId']?>" type="checkbox"> <span class="primary-color"></span>
                                                </label>                                               
											</div>   
                                            <label><a href="<?php echo SITEURL.'singleproduct.php?productId='.$prod_row['productId']?>" class="btn btn-default">View Details</a></label>                                          
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

</form>
<?php include("includes/footer.php"); ?>
</body>
</html>