<aside class="col-xs-3">
<div class="conten_sidebar">
<div class="sidebar_box">
<div class="box_heading">
<script type="text/javascript" src="lib/jquery.ntm/js/jquery.ntm.js"></script>
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="lib/jquery.ntm/themes/default/css/theme.css" />
<script type="text/javascript">
	$(document).ready(function() {
		$('.demo').ntm();
	});
</script>
 <p>BY PRODUCTS</p>
 </div> 
<ul>
	<div class="tree-menu demo" id="tree-menu">
    	<?php $indInfo = $industryObj -> getAllIndustries();
			  if(!empty($indInfo)){
		?>
        		<ul>
                	<?php foreach($indInfo as $indId => $ind_row){?>
                    		<li <?php if((!isset($_REQUEST['ptid'])||(isset($_REQUEST['ptid'])&& $_REQUEST['ptid']=='')) &&(isset($_REQUEST['indid'])&& $_REQUEST['indid']==$ind_row['industriesId'])){echo 'class="selected"';}?>><a href="<?php echo SITEURL;?>products.php?indid=<?php echo $ind_row['industriesId']?>"><?php echo $ind_row['industries_name']; ?></a>
                            	<?php $subIndInfo = $industryObj -> getAllSubIndustries($ind_row['industriesId'],'fend');
		  							  if(!empty($subIndInfo)){?>
                                      	<ul>
                                        	<?php foreach($subIndInfo as $subindId => $subind_row){?>
                                            		<li <?php if((!isset($_REQUEST['ptid'])||(isset($_REQUEST['ptid'])&& $_REQUEST['ptid']=='')) &&(isset($_REQUEST['indid'])&& $_REQUEST['indid']==$subind_row['industriesId'])){echo 'class="selected"';}?>><a href="<?php echo SITEURL;?>products.php?indid=<?php echo $subind_row['industriesId']?>"><?php echo $subind_row['industries_name']; ?></a>
                                                    	<?php $pTypeInfo = $productTypeObj -> getAllProductTypes($subind_row['industriesId']);
															  if(!empty($pTypeInfo)){?>
                                                              		<ul>
                                                                    	<?php foreach($pTypeInfo as $prodtypeId => $prodtype_row){?>
                                                            <li <?php if((isset($_REQUEST['ptid'])&& $_REQUEST['ptid']==$prodtype_row['productTypeId']) &&(isset($_REQUEST['indid'])&& $_REQUEST['indid']==$subind_row['industriesId'])){echo 'class="selected"';}?>><a href="<?php echo SITEURL; ?>products.php?indid=<?php echo $subind_row['industriesId']; ?>&ptid=<?php echo $prodtype_row['productTypeId'];?>"><?php echo $prodtype_row['productType'];?></a></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                        <?php } ?>
                                                    </li>
                                            <?php } ?>
                                        </ul>
                                <?php } ?>
                            
                            </li>
                    <?php } ?>
                </ul>
        <?php
			  }
		?>
    </div> 
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