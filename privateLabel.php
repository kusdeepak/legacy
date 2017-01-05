<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();	
	$siteInfo = $adminObj -> getAllSettings();	
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $siteInfo['site_name']; ?>| Private Label Programs</title>
<?php include("includes/css.php"); ?>
<style type="text/css">
.sildercat {
	float: left;
	text-align: center;
	vertical-align: middle;
	width: 100%;
 background:url(<?php echo SITEURL;
?>images/prod_Private.jpg) no-repeat;
	background-position:top center;
	background-size:100% 100% cover;
}
</style>
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="titlebar blog">
  <div class="container">
    <div class="breadcrumbs">
      <ul>
        <li><a href="#">Home</a></li>
        <li><span>Private Label Programs</span></li>
      </ul>
    </div>
    <h1 class="page-title">Private Label Programs</h1>
  </div>
</section>
<section class="content-area">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="sildercat">
          <div class="container">
            <div class="sideimg">
              <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="173"
                                height="260">
                <param name="movie" value="<?php echo SITEURL ?>images/Box.swf" />
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <param name="swfversion" value="6.0.65.0" />
                <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
                <param name="expressinstall" value="Scripts/expressInstall.swf" />
                <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. --> 
                <!--[if !IE]>-->
                <object type="application/x-shockwave-flash" data="<?php echo SITEURL ?>images/Box.swf"
                                    width="173" height="260">
                  <!--<![endif]-->
                  <param name="quality" value="high" />
                  <param name="wmode" value="transparent" />
                  <param name="swfversion" value="6.0.65.0" />
                  <param name="expressinstall" value="Scripts/expressInstall.swf" />
                  <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                  <div>
                    <h4> Content on this page requires a newer version of Adobe Flash Player.</h4>
                    <p> <a href="http://www.adobe.com/go/getflashplayer"> <img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif"
                                                    alt="Get Adobe Flash player" width="112" height="33" /></a></p>
                  </div>
                  <!--[if !IE]>-->
                </object>
                <!--<![endif]-->
              </object>
            </div>
          </div>
        </div>
      </div>
      <?php include("includes/sidebar.php"); ?>
      <article class="single-post post">
        <div class="col-sm-8">
          <h2 class="post-title">PRIVATE LABEL PROGRAMS</h2>         
          <div class="post-content">
            <h3 class="post-subtitle">Private Label Overview</h3>
            <p>Legacy Converting recognizes the need our customers have for quality products
              manufactured to the highest standards and the importance of superior packaging and branding in the marketplace. Our in house 
              product development team which consists of experts in the areas of Product Design, Engineering, and Sales help our clients 
              realize their maximum sales potential by developing products that bring added value to their customers. Although each private labeling program is 
              and customized to the needs of our clients, there is generally a three tiered option as illustrated below. </p>
            <div class="clearfix"></div>
            <h3 class="post-subtitle">Tier 1</h3>
            <p><img class="alignleft" src="<?php echo SITEURL;?>images/privatelable_img1.jpg" alt="">Our flexible converting lines are specifically developed for short runs and quick changeovers allowing our 
              customers an array of private labeling options. Our Tier 1 option offers small to mid-sized distributors the advantage of 
              branding and marketing their company with every package made without the excessive cost of large minimums, or 
              creating dies and expensive set up fees. Legacy incorporates state of the art, in-line printing capabilities to allow 
              our customers to add logos, graphics, and UPC codes to almost any product we offer with minimal lead times (usually less than 2 weeks).</p>
            <div class="clearfix"></div>
            <h3 class="post-subtitle">Tier 2</h3>
            <p><img class="alignleft" src="<?php echo SITEURL;?>images/privatelable_img2.jpg" alt="">Tier 2 projects incorporate taking existing products from Legacy's expansive line up and creating a fully customized, 
              branded package to fit with our clients objectives. From Retail level branding to Wholesale and Economy brands, clients can 
              utilize our in-house marketing and engineering team to develop designs, plates, etc for the packaging of their specific product. 
              Minimums are still considerably low and lead times are generally only 6-8 weeks for completion of first order. With our extensive 
              distribution capabilities on both coasts, Legacy offers full stocking capabilities for private label inventories and can usually ship 
              subsequent orders within 3-5 business days. </p>
            <div class="clearfix"></div>
            <h3 class="post-subtitle">Tier 3</h3>
            <p>Our most robust option gives clients access to nearly 40 years of expertise in the non-wovens and disposable wiper markets. 
              Legacy's senior staff work closely with our clients sales and management team to evaluate their existing customer base and the 
              current product offerings. We then apply Lean sales and distribution strategies to help our customers consolidate their product lines, 
              create a stronger branding initiative, and maximize profits and competitive advantage. From concept to production Legacy will design, 
              manufacture, and help bring to market a product line that delivers value to your customers. </p>
            <p>
            <ul class="list-inline">
              <li><img src="<?php echo SITEURL;?>images/PLB-img1.jpg" alt=""></li>
              <li class="aro"><img src="<?php echo SITEURL;?>images/PLB-arrow-img.jpg" alt=""></li>
              <li><img src="<?php echo SITEURL;?>images/PLB-img2.jpg" alt=""></li>
              <li class="aro"><img src="<?php echo SITEURL;?>images/PLB-arrow-img.jpg" alt=""></li>
              <li><img src="<?php echo SITEURL;?>images/PLB-img3.jpg" alt=""></li>
            </ul>
            </p>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>
<?php include("includes/footer.php"); ?>
</body>
</html>