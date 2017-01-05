<?php 
$catObj = new CategoryClass();
$catInfo = $catObj -> getAllCategory();
$productTypeObj = new ProductTypesClass();
$industryObj = new IndustriesClass();
$adminObj = new AdminClass();
	 
?>
<header class="header">
		<div class="topbar">
			<div class="container">
				<div class="topbar-right">
					<ul>
						<li><a href="<?php echo SITEURL; ?>news.php">News</a></li>
						<li><a href="career.php">Careers</a></li>
						<li><a class="search-icon" href="#"><i class="fa fa-search"></i></a></li>
					</ul>

					<div class="main-search-form">
						<form class="search-form" method="post" action="<?php echo SITEURL.'search.php'?>">
							<div class="search-input-wrapper">
								<input required type="text" class="search-field" name="keyword" placeholder="Search...">
							</div>
						</form>
						<a class="search-button" href="#"><i class="fa fa-search"></i></a>
					</div>

				</div>
			</div>
		</div>
		<?php include('menu.php');?>
	</header>
    
