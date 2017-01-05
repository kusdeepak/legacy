<div class="main-nav sticky-nav">
			<div class="container">
				<div class="logo-wrapper">
					<a href="<?php echo SITEURL.'index.php'; ?>">
                    <?php if(SITELOGO !=''){ echo '<img src="'.SITEURL.'uploads/Legacy/'.SITELOGO.'" alt="" />';} 
						  else{ echo SITENAME;	}
					?>
                    
                    </a>
				</div>

				<nav>
					<div class="main-menu clearfix">
						<ul class="menu">
							<li class="menu-item menu-item-has-children">
								<a href="#"><span>Products</span></a>
								<ul class="sub-menu">
                                	<?php foreach($catInfo as $cId => $cat_row){ ?>
									<li class="menu-item"><a href="<?php echo SITEURL;?>categoryProducts.php?cid=<?php echo $cat_row['categoryId'] ?>"><span><?php echo $cat_row['category_name']; ?></span></a></li>
									<?php } ?>
                                     <li class="menu-item"><a href="<?php echo SITEURL; ?>tableTop.php" id="ctl00_rptMenu_ctl02_HyperLink1"><span>Tabletop &amp; Guest towels</span></a></li>
       <li class="menu-item"><a href="<?php echo SITEURL; ?>privateLabel.php" id="ctl00_rptMenu_ctl03_HyperLink1"><span>Private Label Programs</span></a> </li>
<!--       <li class="menu-item"><a href="<?php echo SITEURL; ?>whatsnew.php" id="ctl00_rptMenu_ctl05_HyperLink1"><span>Whats New?</span></a></li>
-->								</ul>
							</li>
							<li class="menu-item menu-item-has-children">
								<a href="#"><span>Industries</span></a>
								<ul class="sub-menu">
									<li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=1" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 1) echo 'class="active"'; ?>><span>HEALTH CARE</span></a>
                                     <?php $healthChild = $industryObj -> getAllSubIndustries(1,'fend');
		  							  if(!empty($healthChild)){?>
                                            <?php /*?><ul class="sub-menu">
                                                <?php foreach($healthChild as $hcId => $hlthchld_row){?>
                                                    <li class="menu-item menu-item-has-children"> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hlthchld_row['industriesId']; ?>"><span><?php echo $hlthchld_row['industries_name']; ?></span></a>
                                                    <?php $healthProdType = $productTypeObj -> getAllProductTypes($hlthchld_row['industriesId']);
                                                    if(!empty($healthProdType)){?>
                                                    <ul class="sub-menu">
                                                     <?php foreach($healthProdType as $ptypeId => $ptype_row){?>
                                                        <li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hlthchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><span><?php echo $ptype_row['productType'];?></span></a></li>
                                                     <?php } ?>
                                                    </ul>
                                                      <?php } ?>
                                                      </li>
                                                <?php } ?>
                                            </ul><?php */?>
                                    <?php }?>
                                    </li>
                                    
									<li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=2" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 2) echo 'class="active"'; ?>><span>FOOD SERVICE</span></a>
                                    <?php $foodChild = $industryObj -> getAllSubIndustries(2,'fend');
		  							if(!empty($foodChild)){?>
                                            <?php /*?><ul class="sub-menu">
                                    <?php foreach($foodChild as $fdId => $fdchld_row){?>
                                                <li class="menu-item menu-item-has-children"> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $fdchld_row['industriesId']; ?>"><span><?php echo $fdchld_row['industries_name']; ?></span></a> 
                                                    <?php $foodProdType = $productTypeObj -> getAllProductTypes($fdchld_row['industriesId']);
                                                    if(!empty($foodProdType)){?>
                                                    <ul class="sub-menu">
                                                     <?php foreach($foodProdType as $ptypeId => $ptype_row){?>
                                                        <li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $fdchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><span><?php echo $ptype_row['productType'];?></span></a></li>
                                                     <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
                                    <?php } ?>
                                            </ul><?php */?>
                                    <?php }?>
                                    </li>
                                    
									<li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=3" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 3) echo 'class="active"'; ?>><span>WORK PLACE</span></a>
                                    <?php $workChild = $industryObj -> getAllSubIndustries(3,'fend');
		  							if(!empty($workChild)){?>
                                            <?php /*?><ul class="sub-menu">
                                    <?php foreach($workChild as $wrkId => $wrkchld_row){?>
                                                <li class="menu-item menu-item-has-children"> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $wrkchld_row['industriesId']; ?>"><span><?php echo $wrkchld_row['industries_name']; ?></span></a> 
                                                    <?php $workProdType = $productTypeObj -> getAllProductTypes($wrkchld_row['industriesId']);
                                                    if(!empty($workProdType)){?>
                                                    <ul class="sub-menu">
                                                     <?php foreach($workProdType as $ptypeId => $ptype_row){?>
                                                        <li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $wrkchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><span><?php echo $ptype_row['productType'];?></span></a></li>
                                                     <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
                                    <?php } ?>
                                            </ul><?php */?>
                                    <?php }?>
                                    </li>
                                    
                                    <li class="menu-item "><a href="<?php echo SITEURL; ?>products.php?indid=4" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 4) echo 'class="active"'; ?>><span>HOSPITALITY</span></a>
                                    <?php $hospitalChild = $industryObj -> getAllSubIndustries(4,'fend');
									if(!empty($hospitalChild)){?>
                                            <?php /*?><ul class="sub-menu">
                                    <?php foreach($hospitalChild as $hspId => $hspchld_row){?>
                                                <li class="menu-item menu-item-has-children"> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hspchld_row['industriesId']; ?>"><span><?php echo $hspchld_row['industries_name']; ?></span></a> 
                                                    <?php $hospitalProdType = $productTypeObj -> getAllProductTypes($hspchld_row['industriesId']);
                                                    if(!empty($hospitalProdType)){?>
                                                    <ul class="sub-menu">
                                                     <?php foreach($hospitalProdType as $ptypeId => $ptype_row){?>
                                                        <li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hspchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><span><?php echo $ptype_row['productType'];?></span></a></li>
                                                     <?php } ?>
                                                    </ul>
                                                    <?php } ?>
                                                </li>
                                    <?php } ?>
                                            </ul><?php */?>
                                    <?php }?>
                                    </li>
                                    
                                    <li class="menu-item "><a href="<?php echo SITEURL; ?>products.php?indid=5" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 5) echo 'class="active"'; ?>><span>TECHNOLOGY</span></a>
                                    <?php $technologyChild = $industryObj -> getAllSubIndustries(5,'fend');
		  							if(!empty($technologyChild)){?>
                                        <?php /*?><ul class="sub-menu">
                                <?php foreach($technologyChild as $techId => $techchld_row){?>
                                            <li class="menu-item menu-item-has-children"> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $techchld_row['industriesId']; ?>"><span><?php echo $techchld_row['industries_name']; ?></span></a> 
                                                <?php $technologyProdType = $productTypeObj -> getAllProductTypes($techchld_row['industriesId']);
                                                if(!empty($technologyProdType)){?>
                                                <ul class="sub-menu">
                                                 <?php foreach($technologyProdType as $ptypeId => $ptype_row){?>
                                                    <li class="menu-item"><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $techchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><span><?php echo $ptype_row['productType'];?></span></a></li>
                                                 <?php } ?>
                                                </ul>
                                                <?php } ?>
                                            </li>
                                <?php } ?>
                                        </ul><?php */?>
            						<?php }?>
                                    </li>
								</ul>
							</li>
							<li class="menu-item">
								<a href="<?php echo SITEURL ?>compare.php"><span>Compare</span></a>
							</li>
							<li class="menu-item">
								<a href="<?php echo SITEURL ?>about.php"><span>About</span></a>
							</li>
							<li class="menu-item">
								<a href="contact.php"><span>Contact Us</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>


<!--================ Mobile Menu ==================-->
<div class="sm-mobile-header sticky-nav">
			<div class="mobile-header">
				<div class="container">
					<div class="logo-wrapper">
						<a href="#">
							<img src="<?php echo SITEURL; ?>images/logo.jpg" alt="">
						</a>
					</div>
					<div class="menu-toggle-container">
						<a class="menu-toggle" href="#">
							<span class="bar bar1"></span>
							<span class="bar bar2"></span>
							<span class="bar bar3"></span>
						</a>
					</div>
				</div>
			</div>
			<div class="mobile-menu">
				<div id="mobile-menu-wrapper" class="mobile-menu-wrapper">
					<ul id="menu-main-menu-1" class="menu">
						<li class="menu-item">
							<a href="#">
								<div class="container">
									<span>Products</span>
									<span class="chevron"><i class="fa fa-fw fa-chevron-right"></i></span>
								</div>
							</a>
							<ul class="sub-menu">
								<li class="menu-item">
									<a href="#">
										<div class="container">
											<span class="sm-mbmnu-indent"></span>
											<span>Sub Menu 1</span>
											<span class="chevron"><i class="fa fa-fw fa-angle-right"></i></span>
										</div>
									</a>
								</li>
								<li class="menu-item">
									<a href="#">
										<div class="container">
											<span class="sm-mbmnu-indent"></span>
											<span>Sub Menu 2</span>
											<span class="chevron"><i class="fa fa-fw fa-angle-right"></i></span>
										</div>
									</a>
								</li>
								<li class="menu-item">
									<a href="#">
										<div class="container">
											<span class="sm-mbmnu-indent"></span>
											<span>Sub Menu 3</span>
											<span class="chevron"><i class="fa fa-fw fa-angle-right"></i></span>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-item">
							<a href="#">
								<div class="container">
									<span>Industries</span>
									<span class="chevron"><i class="fa fa-fw fa-chevron-right"></i></span>
								</div>
							</a>
							<ul class="sub-menu">
								<li class="menu-item">
									<a href="#">
										<div class="container">
											<span class="sm-mbmnu-indent"></span>
											<span>Sub Menu 1</span>
											<span class="chevron"><i class="fa fa-fw fa-angle-right"></i></span>
										</div>
									</a>
								</li>
								<li class="menu-item">
									<a href="#">
										<div class="container">
											<span class="sm-mbmnu-indent"></span>
											<span>Sub Menu 2</span>
											<span class="chevron"><i class="fa fa-fw fa-angle-right"></i></span>
										</div>
									</a>
								</li>
								<li class="menu-item">
									<a href="#">
										<div class="container">
											<span class="sm-mbmnu-indent"></span>
											<span>Sub Menu 3</span>
											<span class="chevron"><i class="fa fa-fw fa-angle-right"></i></span>
										</div>
									</a>
								</li>
							</ul>
						</li>
						<li class="menu-item">
							<a href="#">
								<div class="container">
									<span>Compare</span>
								</div>
							</a>
						</li>
						<li class="menu-item">
							<a href="#">
								<div class="container">
									<span>About</span>
								</div>
							</a>
						</li>
						<li class="menu-item">
							<a href="#">
								<div class="container">
									<span>Contact Us</span>
								</div>
							</a>
						</li>
					</ul>
				</div>
				<div class="search-field-area">
					<div class="search-field-wrapper">
						<form class="search-form" method="get" action="">
							<div class="search-input-wrapper">
								<input type="text" class="search" name="s" placeholder="Search..." />
							</div>
						</form>
						<a class="search-icon" href="#"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
		</div>