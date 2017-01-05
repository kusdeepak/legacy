<?php $productTypeObj = new ProductTypesClass();?>
<link rel="stylesheet" href="<?php echo SITEURL; ?>css/jquery_popup.css" />
<link href="<?php echo SITEURL; ?>css/legacy.css" rel="stylesheet" type="text/css">
<script src="<?php echo SITEURL; ?>js/jquery_popup.js"></script>

<div id="contactdiv">
<form class="form popup_form" action="#" id="contact">
    <img src="<?php echo SITEURL; ?>images/button_cancel.png" class="img" id="cancel"/>	
    <h3>Request Sample</h3>
    <br/>
    <div id="response_message"></div>
    <form name="request" id="request" action="">
    <div class="request_frm">
        <div class="form_sec">
            <label>Category or Industry:</label>
            <input type="text" id="cat" class="from_input" readonly="readonly"/>
        </div>
        
        <div class="popup_form_content">
                <div class="form_sec">
                    <label>Product</label>
                    <input type="text" id="prod" class="from_input" readonly="readonly" />
                </div>
                
                <div class="form_sec">
                    <label>Contact Name: <span>*</span></label>
                    <input type="text" id="name" class="from_input" placeholder="Contact Name"/>
                </div>
                
                <div class="form_sec">
                    <label>Company Name: <span>*</span></label>
                    <input type="text" id="cname" class="from_input" placeholder="Company Name"/>
                </div>
                
                <div class="form_sec">
                    <label>Address: <span>*</span></label>
                    <input type="text" id="addr" class="from_input" placeholder="Address"/>
                </div>
            
                <div class="form_sec">
                    <label>Email: <span>*</span></label>
                    <input type="text" id="email" class="from_input" placeholder="Email"/>
                </div>
                
                <div class="form_sec">
                    <label>Phone No: <span>*</span></label>
                    <input type="text" id="contactno" class="from_input" placeholder="Phone No."/>
               </div>
               
               <div class="form_sec">
                    <input type="image" id="send" src="<?php echo SITEURL; ?>images/carsub_btn.png"/>
               </div> 
         </div>  
         </div>
     </form>
      
</form>
</div>

<div id="pdfdiv">
<form class="form popup_form pdf_frm" action="generatepdf.php" id="pdf">
    <img src="<?php echo SITEURL; ?>images/button_cancel.png" class="img" id="cancel"/>	
    <h3>Customize Brochure</h3>
    <br/>
  	<div class="pdf_frm_content">
    	<div class="frm_left">
        	<div class="container1">
                <div class="frm_number">
                    <p>1</p>
                </div>
                <div class="main_form">
                    <div class="frm_heading">
                        <p>Your Contact Information<span>(Max 150 Characters)</span></p>
                    </div>
                    <div class="frm">
                        <div class="frm_sec">
                            <input name="company" id="company" type="text" placeholder="Company Name" />
                        </div>
                        <div class="frm_sec">
                            <input name="infoline1" id="infoline1" type="text" placeholder="Contact Information - Line 1" />
                        </div>
                        <div class="frm_sec">
                            <input name="infoline2" id="infoline2" type="text" placeholder="Contact Information - Line 2" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="container2">
                <div class="frm_number">
                    <p>2</p>
                </div>
                <div class="main_form">
                    <div class="frm_heading">
                        <p>Your Contact Information<span>(Max 150 Characters)</span></p>
                    </div>
                    <div class="frm">
                        <div class="frm_sec">
                            <input name="message_head" id="message_head" type="text" placeholder="Message Heading" />
                        </div>
                        <div class="frm_sec">
                            <input name="msgline1" id="msgline1" type="text" placeholder="Message - Line 1" />
                        </div>
                        <div class="frm_sec">
                            <input name="msgline2" id="msgline2" type="text" placeholder="Message - Line 2" />
                        </div>
                    </div>
                </div>
                <div class="condition">
                	<p>"To create a generic, non-customized PDF simply leave the above fields blank and                      click button below."</p>
                </div>
                <div class="submit_pdf">
                	<input name="pid" type="hidden" value="" id="pid" />
                	<input type="image" src="<?php echo SITEURL; ?>images/popup_createpdf_btn.png" id="ctl00_ContentPlaceHolder1_WUCProduct_imgbtnCreatePDF" name="ctl00$ContentPlaceHolder1$WUCProduct$imgbtnCreatePDF">
                </div>
            </div>
            
        </div>
        <div class="frm_right">
        	<div class="Brochure_heading">
           	  <p>Sample Brochure</p>
            </div>
            <div class="Brochure_image">
       	    	<img src="<?php echo SITEURL; ?>images/sample_brochure.jpg" width="286" height="407" />
            </div>
        </div>
    </div>
    
</form>
</div>


<script type="text/jscript">
	function showSubIndustry(val)
	{
		//var campus = $("#location").val();
		$.ajax({
		   type: "POST",
		   data:{indid:val},
		   url: "<?php echo SITEURL; ?>ajaxstate.php",
		   success: function(msg)
		   {
			 $("select#subcat").html(msg);
	
		   }
		})
	}
	
	function showProductType(val)
	{
		//var campus = $("#location").val();
		$.ajax({
		   type: "POST",
		   data:{indid:val},
		   url: "<?php echo SITEURL; ?>ajaxprodtype.php",
		   success: function(msg)
		   {
			 $("select#prodtype").html(msg);
	
		   }
		})
	}
	  
function chkFrm(frm)
{
	if(frm.keyword.value.search(/\S/)==-1 && frm.industry.value.search(/\S/)==-1 && frm.prodtype.value.search(/\S/)==-1){
		alert("Please enter at least one search criteria");
		return false;
	}	
}
function chkhdFrm(frm)
{
	if(frm.keyword.value.search(/\S/)==-1)
	{
		alert("Please enter search keyword");
		frm.keyword.focus();
		return false;
	}
}
</script>
<section class="header-top">
<div class="container">
<div class="row">
<aside class="col-xs-3">
<div class="logo"><a href="<?php echo SITEURL; ?>"><img src="<?php echo SITEURL; ?>images/logo.jpg" alt=""></a></div>
</aside>
<aside class="col-xs-9">
<div class="pull-right hidden-sm hidden-xs">
<form onsubmit="return chkhdFrm(this)" class="navbar-form navbar-left" role="search" action="search.php" name="srchprod" method="post">
<div class="form-group">
<input class="form-control" type="text" placeholder="Search" name="keyword" />
<input type="hidden" name="industry" value="" />
<input type="hidden" name="subind" value="" />
<input type="hidden" name="prodtype" value="" />
</div> <button type="submit" class="btn btn-default src_btn">Go</button>
</form>
</div>
<div id="menu">
  <ul id="navigation-1">
    <li id="li_1"><a title="Home" href="<?php echo SITEURL; ?>">HOME</a></li>
    <li id="li_2"><a title="Products" href="#">PRODUCTS</a>
    <?php $catObj = new CategoryClass();
		  $catInfo = $catObj -> getAllCategory();
	?>
     <ul style="background-color: transparent;" class="navigation-2">
       <?php foreach($catInfo as $cId => $cat_row){ ?>
       <li><a href="<?php echo SITEURL;?>categoryProducts.php?cid=<?php echo $cat_row['categoryId'] ?>"><?php echo $cat_row['category_name']; ?></a> </li>
       <?php } ?>
       <li><a href="<?php echo SITEURL; ?>tableTop.php" id="ctl00_rptMenu_ctl02_HyperLink1">Tabletop &amp; Guest towels</a></li>
       <li><a href="<?php echo SITEURL; ?>privateLabel.php" id="ctl00_rptMenu_ctl03_HyperLink1">Private Label Programs</a> </li>
       <li><a href="<?php echo SITEURL; ?>whatsNew.php" id="ctl00_rptMenu_ctl05_HyperLink1">Whats new?</a></li>
   </ul>
  </li>
  <li id="li_3"><a title="About" href="<?php echo SITEURL; ?>about.php">ABOUT</a>
    <ul style="background-color: transparent;" class="navigation-2">
      <li><a title="About" href="<?php echo SITEURL; ?>about.php">About Legacy</a> </li>
      <li><a title="About" href="<?php echo SITEURL; ?>vision.php">Vision &amp; Philosophy</a> </li>
      <li class="liback"></li>
   </ul>
 </li>
 <li id="li_4"><a title="Contact" href="<?php echo SITEURL; ?>contact.php">CONTACT</a></li>
 <li id="li_5"><a title="Careers" href="<?php echo SITEURL; ?>career.php">CAREERS</a></li>
 <li id="li_6"><a title="What's New" href="<?php echo SITEURL; ?>whatsNew.php">WHAT'S NEW</a></li>
 </ul>
</div>

<div  class="mobile">
<nav id="nav">
 <ul id="navigation-1">
 <li>
     <form onsubmit="return chkhdFrm(this)" class="navbar-form navbar-left" role="search" action="search.php" name="srchprod" method="post">
     <div class="form-group">
     <input style="display: inline-block;" class="form-control" type="text" placeholder="Search" name="keyword" />
     <input type="hidden" name="industry" value="" />
     <input type="hidden" name="subind" value="" />
     <input type="hidden" name="prodtype" value="" />
     <button style="display: inline-block;" type="submit" class="btn btn-default src_btn hide">Go</button>
     </div>
     </form>
  </li>
    <li><a title="Home" href="<?php echo SITEURL; ?>">HOME</a></li>
    <li><a title="Products" href="#">PRODUCTS</a>
     <ul>
       <?php foreach($catInfo as $cId => $cat_row){ ?>
       <li><a href="<?php echo SITEURL;?>categoryProducts.php?cid=<?php echo $cat_row['categoryId'] ?>"><?php echo $cat_row['category_name']; ?></a> </li>
       <?php } ?>
       <li><a href="<?php echo SITEURL; ?>tableTop.php" id="ctl00_rptMenu_ctl02_HyperLink1">Tabletop &amp; Guest towels</a></li>
       <li><a href="<?php echo SITEURL; ?>privateLabel.php" id="ctl00_rptMenu_ctl03_HyperLink1">Private Label Programs</a> </li>
       <li><a href="<?php echo SITEURL; ?>whatsNew.php" id="ctl00_rptMenu_ctl05_HyperLink1">Whats new?</a></li>
   </ul>
  </li>
  <li><a title="About" href="<?php echo SITEURL; ?>about.php">ABOUT</a>
    <ul>
      <li><a title="About" href="<?php echo SITEURL; ?>about.php">About Legacy</a> </li>
      <li><a title="About" href="<?php echo SITEURL; ?>vision.php">Vision &amp; Philosophy</a> </li>
      
   </ul>
 </li>
 <li><a title="HEALTH CARE" href="<?php echo SITEURL; ?>products.php?indid=1">Health Care</a>
 	<?php $healthChild = $industryObj -> getAllSubIndustries(1,'fend');
		  		if(!empty($healthChild)){?>
					<ul>
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
            <?php }?>
 </li>
 <li><a title="FOOD SERVICE" href="<?php echo SITEURL; ?>products.php?indid=2">Food Service</a>
 	<?php $foodChild = $industryObj -> getAllSubIndustries(2,'fend');
		  		if(!empty($foodChild)){?>
          			<ul>
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
 <li><a title="WORK PLACE" href="<?php echo SITEURL; ?>products.php?indid=3">Work Place</a>
 	<?php $workChild = $industryObj -> getAllSubIndustries(3,'fend');
		  		if(!empty($workChild)){?>
          			<ul>
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
 <li><a title="HOSPITALITY" href="<?php echo SITEURL; ?>products.php?indid=4">Hospitality</a>
 	<?php $hospitalChild = $industryObj -> getAllSubIndustries(4,'fend');
		  		if(!empty($hospitalChild)){?>
          			<ul>
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
 <li><a title="TECHNOLOGY" href="<?php echo SITEURL; ?>products.php?indid=5">Technology</a>
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
            <?php }?></li>	
 </li>
 <li><a title="Contact" href="<?php echo SITEURL; ?>contact.php">CONTACT</a></li>
 <li><a title="Careers" href="<?php echo SITEURL; ?>career.php">CAREERS</a></li>
 <li><a title="What's New" href="<?php echo SITEURL; ?>whatsNew.php">WHAT'S NEW</a></li>
 </ul>
</nav>
</div>

</aside>
</div>
</div>
</section>