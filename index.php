<?php 
	include("includes/common.php");
	$adminObj = new AdminClass();
	$sliderObj = new SliderClass();	
	$productObj = new ProductClass();
	$industriesObj  = new IndustriesClass();
	$pagesObj = new PageClass();			
	$slider_info = $sliderObj -> getAllSlider();
	$featuredProducts = $productObj -> getAllFeaturedProducts();
?>
<!DOCTYPE html>
<!--[if IE 7]>         <html class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html> <!--<![endif]-->
<head>
	<title>Legacy</title>
    <?php include("includes/css.php"); ?>	
</head>
<body>
	<?php include("includes/header.php"); ?>
    
	<div id="main-slider" class="slider">
		<div class="swiper-container">
			<h2 class="hidden">Main Slider</h2>
			<div class="swiper-wrapper">
				<!-- Slide 01 -->
                <?php foreach($slider_info as $row){?>
				<div class="swiper-slide slide">                 
					<div class="desktop-bg" style="background-image: url(<?php echo SITEURL?>uploads/slider/<?php echo $row['imageloc'];?>)"></div>                  
					<div class="mobile-bg" style="background-image: url(<?php echo SITEURL?>uploads/slider/thumb/<?php echo $row['imageloc'];?>)"></div>
					<div class="container">
						<div class="slide-content">
							<h3 class="slide-title" data-animate="fadeInLeftShort"><?php echo $row['title'];?></h3>
							<div class="slide-descr"><?php echo $row['description'];?></div>
							<div class="slide-action"><a href="<?php echo SITEURL.'compare.php';?>" class="slide-btn">Compare</a></div>
						</div>
					</div>
				</div>
                <?php } ?>			
				
			</div>
		</div>
		<div class="container">
			<div class="page-controls clearfix"></div>
		</div>
	</div>
	
	<section class="home-featured-products">
		<div class="container">
			<h2 class="section-title">Featured Products</h2>
			<div class="featured-products-wrapper">
				<div class="swiper-container featured-carousel" id="featured-carousel">
					<div class="swiper-wrapper">
                    	<?php foreach($featuredProducts as $product){?>
						<div class="swiper-slide featured-item">
							<div class="featured-item-img">
								<a href="<?php echo SITEURL?>singleproduct.php?productId=<?php echo $product['productId']?>"><img src="<?php echo SITEURL?>uploads/Legacy/Product/<?php echo $product['product_image']?>" alt="<?php echo $product['pname']?>"></a>
							</div>
							<div class="featured-item-name"><a href="products.php?productId=<?php echo $product['productId']?>"><span><?php echo $product['pname']; ?></span></a></div>
						</div>
                        <?php } ?>
						
					</div>
				</div>
				<div class="page-controls grey clearfix"></div>
			</div>
			<div class="featured-more-wrapper"><a href="<?php echo SITEURL.'featuredproducts.php';?>" class="cta-btn">View All</a>
		</div>	
        </div>
	</section>

	<section class="home-industries-we-serve">
		<div class="container">
			<h2 class="section-title white">INDUSTRIES WE SERVE</h2>
			
			<div class="legacy-tabs hidden-xs hidden-sm">

				<!-- Nav tabs -->
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li role="presentation" class="active"><a href="#healthcare" aria-controls="healthcare" role="tab" data-toggle="tab">HEALTHCARE</a></li>
					<li role="presentation"><a href="#foodservice" aria-controls="foodservice" role="tab" data-toggle="tab">FOOD SERVICE</a></li>
					<li role="presentation"><a href="#workplace" aria-controls="workplace" role="tab" data-toggle="tab">WORKPLACE</a></li>
					<li role="presentation"><a href="#hospitality" aria-controls="hospitality" role="tab" data-toggle="tab">HOSPITALITY</a></li>
					<li role="presentation"><a href="#technology" aria-controls="technology" role="tab" data-toggle="tab">TECHNOLOGY</a></li>
				</ul>

				<!-- Tab panes -->
                <?php $healthcare_info = $industriesObj -> getIndustries(1); ?>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="healthcare">
						<div class="row">
							<div class="col-sm-6">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">HealthCare</h3>
									<h4 class="featurebox-subtitle"><?php echo $healthcare_info['small_description'];?></h4>
								</div>
								<?php echo $healthcare_info['description'];?>
								<div>
									<a href="<?php echo SITEURL; ?>products.php?indid=1" class="cta-btn">Explore</a>
								</div>
							</div>
							<div class="col-sm-6">
								<?php /*?><img src="<?php echo SITEURL?>uploads/Legacy/Industries/normal/<?php echo $healthcare_info['industries_img_name'];?>" alt="" width="500" height="250" /><?php */?>
                                <img src="images/placeholder/tab-01.jpg" alt="">
							</div>
						</div>
					</div>
                    <?php $foodservice_info = $industriesObj -> getIndustries(2); ?>
					<div role="tabpanel" class="tab-pane fade" id="foodservice">
						<div class="row">
							<div class="col-sm-6">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">Food service</h3>
									<h4 class="featurebox-subtitle"><?php echo $foodservice_info['small_description'];?></h4>
								</div>
								<?php echo $foodservice_info['description'];?>
								<div>
									<a href="<?php echo SITEURL; ?>products.php?indid=2" class="cta-btn">Explore</a>
								</div>
							</div>
							<div class="col-sm-6">
								<?php /*?><img src="<?php echo SITEURL?>uploads/Legacy/Industries/normal/<?php echo $foodservice_info['industries_img_name'];?>" alt="" width="500" height="250" /><?php */?>
                                <img src="images/placeholder/tab-01.jpg" alt="">
							</div>
						</div>
					</div>
                    <?php $workplace_info = $industriesObj -> getIndustries(3); ?>
					<div role="tabpanel" class="tab-pane fade" id="workplace">
						<div class="row">
							<div class="col-sm-6">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">Workplace</h3>
									<h4 class="featurebox-subtitle"><?php echo $workplace_info['small_description'];?></h4>
								</div>
								<?php echo $workplace_info['description'];?>
								<div>
									<a href="<?php echo SITEURL; ?>products.php?indid=3" class="cta-btn">Explore</a>
								</div>
							</div>
							<div class="col-sm-6">
								<?php /*?><img src="<?php echo SITEURL?>uploads/Legacy/Industries/normal/<?php echo $workplace_info['industries_img_name'];?>" alt="" width="500" height="250" /><?php */?>
                                <img src="images/placeholder/tab-01.jpg" alt="">
							</div>
						</div>
					</div>
                    <?php $hospitality_info = $industriesObj -> getIndustries(4); ?>
					<div role="tabpanel" class="tab-pane fade" id="hospitality">
						<div class="row">
							<div class="col-sm-6">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">Hospitality</h3>
									<h4 class="featurebox-subtitle"><?php echo $hospitality_info['small_description'];?></h4>
								</div>
								<?php echo $hospitality_info['description'];?>
								<div>
									<a href="<?php echo SITEURL; ?>products.php?indid=4" class="cta-btn">Explore</a>
								</div>
							</div>
							<div class="col-sm-6">
								<?php /*?><img src="<?php echo SITEURL?>uploads/Legacy/Industries/normal/<?php echo $hospitality_info['industries_img_name'];?>" alt="" width="500" height="250" /><?php */?>
                                <img src="images/placeholder/tab-01.jpg" alt="">
							</div>
						</div>
					</div>
                    <?php $technology_info = $industriesObj -> getIndustries(5); ?>
					<div role="tabpanel" class="tab-pane fade" id="technology">
						<div class="row">
							<div class="col-sm-6">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">Technology</h3>
									<h4 class="featurebox-subtitle"><?php echo $technology_info['small_description'];?></h4>
								</div>
								<?php echo $technology_info['description'];?>
								<div>
									<a href="<?php echo SITEURL; ?>products.php?indid=5" class="cta-btn">Explore</a>
								</div>
							</div>
							<div class="col-sm-6">
								<?php /*?><img src="<?php echo SITEURL?>uploads/Legacy/Industries/normal/<?php echo $technology_info['industries_img_name'];?>" alt="" width="500" height="250" /><?php */?>
                                <img src="images/placeholder/tab-01.jpg" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>


			<!-- Accordion panes -->
			<div class="legacy-accordion hidden-md hidden-lg">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading_healthcare">
							<h4 class="panel-title">
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#ac_healthcare" aria-expanded="true" aria-controls="ac_healthcare">
									HEALTHCARE
								</a>
							</h4>
						</div>
						<div id="ac_healthcare" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading_healthcare">
							<div class="panel-body">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">HealthCare</h3>
									<h4 class="featurebox-subtitle"><?php echo $healthcare_info['small_description'];?></h4>
								</div>
								<div class="text-center"><?php echo $healthcare_info['description'];?></div>
								<div class="text-center">
									<a href="<?php echo SITEURL; ?>products.php?indid=1" class="cta-btn">Explore</a>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading_foodservice">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ac_foodservice" aria-expanded="false" aria-controls="ac_foodservice">
									FOOD SERVICE
								</a>
							</h4>
						</div>
						<div id="ac_foodservice" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_foodservice">
							<div class="panel-body">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">Food service</h3>
									<h4 class="featurebox-subtitle"><?php echo $foodservice_info['small_description'];?></h4>
								</div>
								<div class="text-center"><?php echo $foodservice_info['description'];?></div>
								<div class="text-center">
									<a href="<?php echo SITEURL; ?>products.php?indid=2" class="cta-btn">Explore</a>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading_workplace">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ac_workplace" aria-expanded="false" aria-controls="ac_workplace">
									Workplace
								</a>
							</h4>
						</div>
						<div id="ac_workplace" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_workplace">
							<div class="panel-body">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">Workplace</h3>
									<h4 class="featurebox-subtitle"><?php echo $workplace_info['small_description'];?></h4>
								</div>
								<div class="text-center"><?php echo $workplace_info['description'];?></div>
								<div class="text-center">
									<a href="<?php echo SITEURL; ?>products.php?indid=3" class="cta-btn">Explore</a>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading_hospitality">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ac_hospitality" aria-expanded="false" aria-controls="ac_hospitality">
									HOSPITALITY
								</a>
							</h4>
						</div>
						<div id="ac_hospitality" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_hospitality">
							<div class="panel-body">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">Hospitality</h3>
									<h4 class="featurebox-subtitle"><?php echo $hospitality_info['small_description'];?></h4>
								</div>
								<div class="text-center"><?php echo $hospitality_info['description'];?></div>
								<div class="text-center">
									<a href="<?php echo SITEURL; ?>products.php?indid=4" class="cta-btn">Explore</a>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading_technology">
							<h4 class="panel-title">
								<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ac_technology" aria-expanded="false" aria-controls="ac_technology">
									TECHNOLOGY
								</a>
							</h4>
						</div>
						<div id="ac_technology" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading_technology">
							<div class="panel-body">
								<div class="featurebox">
									<div class="featurebox-icon"><img src="images/placeholder/home-healthcare.png" alt="" /></div>
									<h3 class="featurebox-title">HealthCare</h3>
									<h4 class="featurebox-subtitle"><?php echo $technology_info['small_description'];?></h4>
								</div>
								<div class="text-center"><?php echo $technology_info['description'];?></div>
								<div class="text-center">
									<a href="<?php echo SITEURL; ?>products.php?indid=5" class="cta-btn">Explore</a>
								</div>
							</div>
						</div>
					</div>
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
					<p><a href="<?php echo SITEURL.'compare.php';?>" class="cta-btn">Compare</a></p>
				</div>
			</div>
		</div>
	</section>

	<section class="home-why-legacy">
		<div class="container">
			<div class="row hidden-xs hidden-sm hidden-md">
            <?php $sec1_info = $pagesObj -> getPages(1); $sec2_info = $pagesObj -> getPages(3); $sec3_info = $pagesObj -> getPages(4); ?>
				<div class="col-sm-4">
					<div class="wl-item">
						<div class="wl-item-img" style="background-image: url(<?php echo SITEURL.'uploads/pages/'.$sec1_info['imageloc'];?>)">
							<img src="<?php echo SITEURL.'uploads/pages/'.$sec1_info['imageloc'];?>" alt="">
						</div>
						<div class="wl-item-title"><span class="primary-color">Why</span> Legacy</a></div>
						<div class="wl-item-descr">
							<?php echo strip_tags($sec1_info['description']);?>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="wl-item">
						<div class="wl-item-img" style="background-image: url(<?php echo SITEURL.'uploads/pages/'.$sec2_info['imageloc'];?>)">
							<img src="<?php echo SITEURL.'uploads/pages/'.$sec2_info['imageloc'];?>" alt="">
						</div>
						<div class="wl-item-title"><span class="primary-color">Why</span> We do it</a></div>
						<div class="wl-item-descr">
							<?php echo strip_tags($sec2_info['description']);?>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="wl-item">
						<div class="wl-item-img" style="background-image: url(<?php echo SITEURL.'uploads/pages/'.$sec3_info['imageloc'];?>)">
							<img src="<?php echo SITEURL.'uploads/pages/'.$sec3_info['imageloc'];?>" alt="">
						</div>
						<div class="wl-item-title"><span class="primary-color">How</span> We do it</a></div>
						<div class="wl-item-descr">
							<?php echo strip_tags($sec3_info['description']);?>
						</div>
					</div>
				</div>
			</div>

			<div class="wl-wrapper hidden-lg">
				<div class="swiper-container wl-carousel" id="wl-carousel">
					<div class="swiper-wrapper">
						<div class="swiper-slide wl-item">
							<div class="wl-item-img" style="background-image: url(<?php echo SITEURL.'uploads/pages/'.$sec1_info['imageloc'];?>)">
								<img src="<?php echo SITEURL.'uploads/pages/'.$sec1_info['imageloc'];?>" alt="">
							</div>
							<div class="wl-item-title"><span class="primary-color">Why</span> Legacy</a></div>
							<div class="wl-item-descr">
								<?php echo strip_tags($sec1_info['description']);?> 
							</div>
						</div>
						<div class="swiper-slide wl-item">
							<div class="wl-item-img" style="background-image: url(<?php echo SITEURL.'uploads/pages/'.$sec2_info['imageloc'];?>)">
								<img src="<?php echo SITEURL.'uploads/pages/'.$sec2_info['imageloc'];?>" alt="">
							</div>
							<div class="wl-item-title"><span class="primary-color">Why</span> We do it</a></div>
							<div class="wl-item-descr">
								<?php echo strip_tags($sec2_info['description']);?>
							</div>
						</div>
						<div class="swiper-slide wl-item">
							<div class="wl-item-img" style="background-image: url(<?php echo SITEURL.'uploads/pages/'.$sec3_info['imageloc'];?>)">
								<img src="<?php echo SITEURL.'uploads/pages/'.$sec3_info['imageloc'];?>" alt="">
							</div>
							<div class="wl-item-title"><span class="primary-color">How</span> We do it</a></div>
							<div class="wl-item-descr">
								<?php echo strip_tags($sec3_info['description']);?>
							</div>
						</div>
					</div>
				</div>
				<div class="page-controls clearfix"></div>
			</div>
		</div>
	</section>

<?php include("includes/footer.php"); ?>

</body>
</html>	