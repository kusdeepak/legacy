<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();	
	$siteInfo = $adminObj -> getAllSettings();	
?>
<!DOCTYPE html>
<html>
<head>

<title><?php echo $siteInfo['site_name']; ?> | Tabletop Products</title>
<?php include("includes/css.php"); ?>

</head>
<body>

<?php include("includes/header.php"); ?>
<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span>Tabletop Products</span></li>
				</ul>
			</div>			
			<h1 class="page-title">Tabletop Products</h1>
		</div>
</section>

<section class="content-area">
<div class="container">	
			<div class="row">                  
				<?php include("includes/sidebar.php"); ?> 
                               
				<div class="col-sm-8 post"> 
                    
						<div class="col-sm-12">
						<h2 class="post-title">TABLETOP &amp; GUEST TOWELS</h2>
                        </div>
						<div class="post-image col-sm-12">
							<img src="<?php echo SITEURL?>images/prod_Tabletop.jpg" alt="" />
						</div>												                       
						                      
                             <div class="col-sm-12 table-top-b">                                             
                            <p>Legacy manufactures single use napkins and guest towels that range from economical to the finest linen and silk alternative towels available. By utilizing the newest technologies in non-woven materials, Legacy has successfully introduced our superior disposable towels into the finest dining environments regularly off-limits to the disposable market. Our in house design team and state of the art flexographic printing equipment ensure that all customized towels and napkins are printed to our clients exacting standards of excellence. <br><br>
    Available in 3 materials and a myriad of folding and printing options. 
    </p> 
    <img alt="" src="<?php echo SITEURL; ?>uploads/Legacy/Image/TT-img3.jpg">
    </div>
							
                    <div class="col-sm-12 table-top-m">     
                 
                    <ul class="list-group">
                        <li class="list-group-item"> "Economical" Airlaid </li>
                        <li class="list-group-item"> "Cloth-Like" Airlaid </li>
                        <li class="list-group-item"> "Silk-infused" Non-Woven </li>
                    </ul>   
                    <img alt="" src="<?php echo SITEURL; ?>uploads/Legacy/Image/TT-img1.jpg">
                 
                     </div>
                         <div class="table-top-b col-sm-12">                   
                       <p>NEW! *Ask about our proprietary line of Dispersible Guest Towels that are Septic Safe and specifically designed for bathrooms to eliminate the risk of clogged toilets. (Available in both Printed and Non-Printed formats.)</p>
                       <img alt="" src="<?php echo SITEURL; ?>uploads/Legacy/Image/TT-img2.jpg">
                        </div>
                       
					
                        
					
 
  
                </div>
                
                <!---================-->
                
				
			</div>
		</div>
</section>
<?php include("includes/footer.php"); ?>



</body>
</html>
