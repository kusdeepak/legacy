<?php $productTypeObj = new ProductTypesClass();?>
<section class="icon_menu_mean">
    <div class="balck">
<div class="container">
<div class="in_imenu">
   <ul>
    <li class="in_ib1"><a title="HEALTH CARE" id="ctl00_aHealth" href="<?php echo SITEURL; ?>products.php?indid=1" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 1) echo 'class="active"'; ?> ><img src="<?php echo SITEURL; ?>images/inhealth_btn.jpg"></a>
    <?php $healthChild = $industryObj -> getAllSubIndustries(1,'fend');
		  		if(!empty($healthChild)){?>
					<ul class="sub-menu">
						<?php foreach($healthChild as $hcId => $hlthchld_row){?>
            						<li> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hlthchld_row['industriesId']; ?>"><?php echo $hlthchld_row['industries_name']; ?></a>
                                    <?php $healthProdType = $productTypeObj -> getAllProductTypes($hlthchld_row['industriesId']);
									if(!empty($healthProdType)){?>
									<ul>
									 <?php foreach($healthProdType as $ptypeId => $ptype_row){?>
										<li><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hlthchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><?php echo $ptype_row['productType'];?></a></li>
									 <?php } ?>
									</ul>
									<?php } ?>
                                    </li>
						<?php } ?>
            		</ul>
            <?php }?>		</li>
   <li class="in_ib2"><a title="FOOD SERVICE" id="ctl00_aFood" href="<?php echo SITEURL; ?>products.php?indid=2" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 2) echo 'class="active"'; ?>><img src="<?php echo SITEURL; ?>images/infood_btn.jpg"></a>
   <?php $foodChild = $industryObj -> getAllSubIndustries(2,'fend');
		  		if(!empty($foodChild)){?>
          			<ul class="sub-menu">
          	<?php foreach($foodChild as $fdId => $fdchld_row){?>
            			<li> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $fdchld_row['industriesId']; ?>"><?php echo $fdchld_row['industries_name']; ?></a> 
                        	<?php $foodProdType = $productTypeObj -> getAllProductTypes($fdchld_row['industriesId']);
							if(!empty($foodProdType)){?>
                            <ul>
                             <?php foreach($foodProdType as $ptypeId => $ptype_row){?>
                                <li><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $fdchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><?php echo $ptype_row['productType'];?></a></li>
                             <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
			<?php } ?>
            		</ul>
            <?php }?>
  </li>
  <li class="in_ib3"><a title="WORK PLACE" id="ctl00_aWork" href="<?php echo SITEURL; ?>products.php?indid=3" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 3) echo 'class="active"'; ?>><img src="<?php echo SITEURL; ?>images/inwork_btn.jpg"></a>
  <?php $workChild = $industryObj -> getAllSubIndustries(3,'fend');
		  		if(!empty($workChild)){?>
          			<ul class="sub-menu">
          	<?php foreach($workChild as $wrkId => $wrkchld_row){?>
            			<li> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $wrkchld_row['industriesId']; ?>"><?php echo $wrkchld_row['industries_name']; ?></a> 
                        	<?php $workProdType = $productTypeObj -> getAllProductTypes($wrkchld_row['industriesId']);
							if(!empty($workProdType)){?>
                            <ul>
                             <?php foreach($workProdType as $ptypeId => $ptype_row){?>
                                <li><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $wrkchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><?php echo $ptype_row['productType'];?></a></li>
                             <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
			<?php } ?>
            		</ul>
            <?php }?>
 </li>
 <li class="in_ib4"><a title="HOSPITALITY" id="ctl00_aHosp" href="<?php echo SITEURL; ?>products.php?indid=4" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 4) echo 'class="active"'; ?>><img src="<?php echo SITEURL; ?>images/inhosp_btn.jpg"> </a>
  <?php $hospitalChild = $industryObj -> getAllSubIndustries(4,'fend');
		  		if(!empty($hospitalChild)){?>
          			<ul class="sub-menu">
          	<?php foreach($hospitalChild as $hspId => $hspchld_row){?>
            			<li> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hspchld_row['industriesId']; ?>"><?php echo $hspchld_row['industries_name']; ?></a> 
                        	<?php $hospitalProdType = $productTypeObj -> getAllProductTypes($hspchld_row['industriesId']);
							if(!empty($hospitalProdType)){?>
                            <ul>
                             <?php foreach($hospitalProdType as $ptypeId => $ptype_row){?>
                                <li><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $hspchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><?php echo $ptype_row['productType'];?></a></li>
                             <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
			<?php } ?>
            		</ul>
            <?php }?>
 </li>
 <li class="in_ib5"><a title="TECHNOLOGY" id="ctl00_aTech" href="<?php echo SITEURL; ?>products.php?indid=5" <?php if(isset($_REQUEST['indid']) && $_REQUEST['indid'] == 5) echo 'class="active"'; ?>> <img src="<?php echo SITEURL; ?>images/intech_btn.jpg"></a>
	<?php $technologyChild = $industryObj -> getAllSubIndustries(5,'fend');
		  		if(!empty($technologyChild)){?>
          			<ul class="sub-menu">
          	<?php foreach($technologyChild as $techId => $techchld_row){?>
            			<li> <a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $techchld_row['industriesId']; ?>"><?php echo $techchld_row['industries_name']; ?></a> 
                        	<?php $technologyProdType = $productTypeObj -> getAllProductTypes($techchld_row['industriesId']);
							if(!empty($technologyProdType)){?>
                            <ul>
                             <?php foreach($technologyProdType as $ptypeId => $ptype_row){?>
                                <li><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $techchld_row['industriesId']; ?>&ptid=<?php echo $ptype_row['productTypeId'];?>"><?php echo $ptype_row['productType'];?></a></li>
                             <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
			<?php } ?>
            		</ul>
            <?php }?>
            
  </li>											
  </ul>
												
</div>
</div>
</div>
</section>