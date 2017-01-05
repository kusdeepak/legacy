<aside class="col-xs-3">
<div class="conten_sidebar">
<div class="sidebar_box">
<div class="box_heading">
 <p>BRANDS</p>
 </div>
		<?php $brandObj = new BrandClass();
			  $bInfo = $brandObj -> getAllBrand();
		?>
 			<ul>
			<?php foreach($bInfo as $bId => $brand_row){ ?>
            	<a href="<?php echo SITEURL;?>brandProducts.php?brandid=<?php echo $brand_row['brandId'] ?>" <?php if(isset($_REQUEST['brandid']) && ($_REQUEST['brandid'] == $brand_row['brandId'])) echo 'class="activesidebar"'; ?>><li><?php echo $brand_row['brand_name']; ?></li></a> 
            <?php } ?> 
          </ul>
</div>
<div class="sidebar_box">
			<div class="box_heading">
				<p>Search Products</p>
			</div>
			<form onsubmit="return chkFrm(this)" enctype="multipart/form-data" action="search.php" method="post" id="search" name="search">
   			<input type="hidden" name="mode">
				<div class="search_content">
                  <div class="search_section">
                        <p>Keyword</p>
                        <input type="text" class="keywrd" id="keyword" name="keyword">
                    </div>
        
                  <div class="search_section">
                        <p>Category</p>                        
						<?php echo $industryObj -> getRootIndustryDropDown();?>                   
                  </div>
        
                  <div class="search_section">
                        <p>Sub-Category</p>
                        <select id="subcat" name="subind" onchange="showProductType(this.value)"><option value="">Select Sub-Category</option></select>
                    </div>
        
                  <div class="search_section">
                        <p>Product-Type</p>                        
						<?php //echo $catObj -> getCategoryDropDown(); ?>    
                        <select id="prodtype" name="prodtype"><option value="">Select Product-Type</option></select>                
                  </div>
        <div class="search_section">
                    <input type="image" name="ctl00$ContentPlaceHolder1$imgbtnSubmit" id="ctl00_ContentPlaceHolder1_imgbtnSubmit" src="<?php echo SITEURL; ?>images/carsrch_btn.png" alt="submit">
                    </div>
				</div>
			</form>
		</div>
        
        
 <div class="sidebar_box">
       	  <div class="box_heading">
            	<p>what's new</p>
          </div>
            
            <ul class="ad_sidebar">
                	<li>
               	  		<?php echo str_replace("../",SITEURL,$siteInfo['what_new_box']);?>
                            	<a href="<?php echo SITEURL; ?>whatsNew.php"><span>More ></span></a>
                  	</li>
            </ul>
        </div>
 <div class="sidebar_box">
       	  <div class="box_heading">
            	<p>PRIVATE LABEL</p>
          </div>
            
            <ul class="ad_sidebar">
               <li class="sidebar_last">
               	  <img width="81" height="74" alt="" src="<?php echo SITEURL; ?>images/yourbrand_box.jpg">
                       <p>Let Legacy design a program that sells your company as much as it sells your product.</p>
                           <a href="<?php echo SITEURL; ?>privateLabel.php"><span>More &gt;</span></a>
               </li>
            </ul>
        </div>
        
 </div>
</aside>