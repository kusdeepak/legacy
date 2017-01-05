<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$productObj = new ProductClass();
	$brochureObj = new BrochureClass();
	$msdsObj = new MSDSClass();
	$catObj = new CategoryClass();	
	$industryObj = new IndustriesClass();
	$siteInfo = $adminObj -> getAllSettings();
	$productId = 0; 
	if(isset($_REQUEST['productId'])&&$_REQUEST['productId']>0)
		$productId = $_REQUEST['productId'];
	$product_info = $productObj -> getProduct($productId);	
	$related_products = explode(',',$product_info['related_products']);	
	$industryId = 0;
	if(isset($_REQUEST['industryId'])&&$_REQUEST['industryId']>0)
		$industryId = $_REQUEST['industryId'];
	$industryInfo = $industryObj -> getIndustries($industryId);
	if($product_info['category']!=''){
		$cats = explode(',',$product_info['category']);
	$categoryId = $cats[0]; 
	}
	else
	$categoryId = 0;
	if(isset($_REQUEST['categoryId'])&&$_REQUEST['categoryId']>0)
		$categoryId = $_REQUEST['categoryId'];
	$categoryInfo = $catObj -> getCategory($categoryId);	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $siteInfo['site_name']; ?>| <?php echo(isset($product_info['pname'])&&$product_info['pname']!=''?$product_info['pname']:'Single Product') ?></title>
<?php include("includes/css.php"); ?>
</head>
<body>
<?php include("includes/header.php"); ?>

<section class="titlebar product">
		<div class="container">
			<div class="titlebar-actions">
				<a href="#"><i><img src="images/icon-mail-white.png" alt="" /></i></a>
				<a href="#"><i><img src="images/icon-print-white.png" alt="" /></i></a>
			</div>
			<div class="breadcrumbs">
				<ul>					
					<li><a href="#">Products</a></li>					
					<li><span><?php echo(isset($product_info['pname'])&&$product_info['pname']!=''?$product_info['pname']:'Single Product') ?></span></li>
				</ul>
			</div>
		</div>
	</section>

	<section class="content-area">
		<div class="product-single">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 prod-img">
						<div class="prod-img-inner">
							<img src="<?php echo SITEURL?>uploads/Legacy/Product/<?php echo $product_info['product_image'];?>" alt="" />
							<a class="popup-enlarge" rel="prettyPhoto" href="<?php echo SITEURL?>uploads/Legacy/Product/<?php echo $product_info['product_image'];?>"><i class="fa fa-arrows-alt"></i></a>
						</div>
					</div>
					<div class="col-sm-6 prod-info">
						<h3 class="prod-subtitle"><?php echo $categoryInfo['category_name'];?></h3>
						<h2 class="prod-title"><?php echo(isset($product_info['pname'])&&$product_info['pname']!=''?$product_info['pname']:'') ?></h2>
						<div class="prod-descr">
							<?php echo(isset($product_info['product_description'])&&$product_info['product_description']!=''?$product_info['product_description']:'') ?>
							<p><a href="#" class="prod-readmore">Read More <i>+</i></a></p>
						</div>
						<hr />
                        <?php if($industryId > 0){?>						  
                          <a target="_blank" href="<?php echo SITEURL;?>requestsample.php?cat=<?php echo $industryInfo['industries_name'];?>&prod=<?php echo $product_info['pId'];?>" class="cta-btn onclick" id="<?php echo $product_info['pId'] ?>_<?php echo $industryInfo['industries_name']; ?>">
                          Request a Sample</a>
                         <?php } else {?> 
                          <a target="_blank" href="<?php echo SITEURL;?>requestsample.php?cat=<?php echo $categoryInfo['category_name'];?>&prod=<?php echo $product_info['pId'];?>" class="cta-btn onclick" id="<?php echo $product_info['pId'] ?>_<?php echo $categoryInfo['category_name']; ?>">
                          Request a Sample</a>
                         <?php  } ?> 
						<ul class="prod-actions">
							<li><a href="<?php echo SITEURL;?>generatepdf.php?pid=<?php echo $product_info['productId']?>"  id="<?php echo $product_info['productId']?>_<?php echo $product_info['pId'] ?>"><i><img src="images/icon-file.png" alt="" /></i>Download Sell Sheet</a></li>
                            <?php if($product_info['series_brochure'] != 0) {
									$brochureInfo = $brochureObj -> getBrochure($product_info['series_brochure']);
							?>
							<li><a target="_blank" href="<?php echo SITEURL; ?>uploads/Legacy/Brochure/<?php echo $brochureInfo['brochure_file'] ?>"><i><img src="images/icon-book-open.png" alt="" /></i>Download Series Brochure</a></li>
                             <?php } if($product_info['MSDS'] != 0){ 
									$msdsInfo = $msdsObj -> getMSDS($product_info['MSDS']);
							 ?>
                            <li><a href="<?php echo SITEURL; ?>uploads/Legacy/MSDS/<?php echo $msdsInfo['msds_file'] ?>" target="_blank"><i><img src="images/icon-file.png" alt="" /></i>MSDS</a></li>
                            <?php  } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="product-details">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 features">
						<h3 class="uppercase">FEATURES &amp; BENEFITS</h3>
						<?php echo(isset($product_info['features_benefits'])&&$product_info['features_benefits']!=''?$product_info['features_benefits']:'') ?>
						<div class="healthcare"><img src="images/health.png" alt="" /> HEALTHCARE</div>
					</div>
					<div class="col-sm-6">
						<h3 class="uppercase">Specifications</h3>
						<table class="table">
							<tbody>
								<tr>
									<td class="bold" width="66.666%">Wiper sheet size</td>
									<td><?php echo(isset($product_info['sheet_size'])&&$product_info['sheet_size']!=''?$product_info['sheet_size']:'') ?></td>
								</tr>
								<tr>
									<td class="bold">Item per Each</td>
									<td><?php echo(isset($product_info['items_per_each'])&&$product_info['items_per_each']!=''?$product_info['items_per_each']:'') ?></td>
								</tr> 
								<tr>
									<td class="bold">Each per Ship Unit</td>
									<td><?php echo(isset($product_info['each_per_ship_unit'])&&$product_info['each_per_ship_unit']!=''?$product_info['each_per_ship_unit']:'') ?></td>
								</tr> 
								<tr>
									<td class="bold">Each Dimension</td>
									<td><?php echo(isset($product_info['each_dimension'])&&$product_info['each_dimension']!=''?$product_info['each_dimension']:'') ?></td>
								</tr> 
								<tr>
									<td class="bold">Case Total Pcs</td>
									<td><?php echo(isset($product_info['case_total_pcs'])&&$product_info['case_total_pcs']!=''?$product_info['case_total_pcs']:'') ?></td>
								</tr> 
								<tr>
									<td class="bold">Case Dimension</td>
									<td><?php echo(isset($product_info['case_dimension'])&&$product_info['case_dimension']!=''?$product_info['case_dimension']:'') ?></td>
								</tr> 
								<tr>
									<td class="bold">Case Weight</td>
									<td><?php echo(isset($product_info['case_weight'])&&$product_info['case_weight']!=''?$product_info['case_weight']:'') ?></td>
								</tr>
								<tr>
									<td class="bold">Pallet Unit Quantity</td>
									<td><?php echo(isset($product_info['pallet_unit_quantity'])&&$product_info['pallet_unit_quantity']!=''?$product_info['pallet_unit_quantity']:'') ?></td>
								</tr>
								<tr>
									<td class="bold">Pallet Dimensions</td>
									<td><?php echo(isset($product_info['pallet_dimensions'])&&$product_info['pallet_dimensions']!=''?$product_info['pallet_dimensions']:'') ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="product-compare">
			<div class="container">
				<h2 class="prod-comp-title uppercase"><span class="primary-color">Compare our product</span> with the competition</h2>
				<div class="row">
					<div class="col-sm-4 prod-comp-item">
						<div class="item-inner">
							<div class="prod-comp-img">
								<img src="images/placeholder/product-01.jpg" alt="" />
							</div>
							<h3 class="uppercase">PRO-NT-8-E</h3>
							<table class="table">
								<tbody>
									<tr>
										<td class="bold" width="66.666%">Category</td>
										<td>Healthcare</td>
									</tr>
									<tr>
										<td class="bold">Item Number</td>
										<td>123456789</td>
									</tr>
									<tr>
										<td class="bold" colspan="2"><a href="#" class="prod-readmore">More specifications <i>+</i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-sm-4 prod-comp-item">
						<div class="item-inner">
							<div class="prod-comp-img">
								<img src="images/placeholder/product-02.jpg" alt="" />
							</div>
							<h3 class="uppercase">Competition 1</h3>
							<table class="table">
								<tbody>
									<tr>
										<td class="bold" width="66.666%">Category</td>
										<td>Healthcare</td>
									</tr>
									<tr>
										<td class="bold">Item Number</td>
										<td>123456789</td>
									</tr>
									<tr>
										<td class="bold" colspan="2"><a href="#" class="prod-readmore">More specifications <i>+</i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="col-sm-4 prod-comp-item">
						<div class="item-inner">
							<div class="prod-comp-img">
								<img src="images/placeholder/product-03.jpg" alt="" />
							</div>
							<h3 class="uppercase">Competition 2</h3>
							<table class="table">
								<tbody>
									<tr>
										<td class="bold" width="66.666%">Category</td>
										<td>Healthcare</td>
									</tr>
									<tr>
										<td class="bold">Item Number</td>
										<td>123456789</td>
									</tr>
									<tr>
										<td class="bold" colspan="2"><a href="#" class="prod-readmore">More specifications <i>+</i></a></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="related-products">
			<div class="container">
				<h3 class="rel-prod-title">Related Products</h3>
				<div class="row">
                <?php foreach($related_products as $productid){
					  $product_info = $productObj -> getProduct($productid); ?>
					<div class="product-item col-sm-3">
						<div class="product-inner">
							<div class="prod-img" style="background-image:url(<?php echo SITEURL?>uploads/Legacy/Product/<?php echo $product_info['product_image'];?>)">
								<img src="<?php echo SITEURL?>uploads/Legacy/Product/<?php echo $product_info['product_image'];?>" alt="product image" />
							</div>
							<div class="prod-info">
								<a href="<?php echo SITEURL.'singleproduct.php?productId='.$productid?>" class="prod-name uppercase"><?php echo $product_info['pname'];?></a>
							</div>
						</div>
					</div>
                    <?php } ?>
				
				</div>
			</div>
		</div>
	</section>

<?php include("includes/footer.php"); ?>
</body>
</html>