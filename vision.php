<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();	
	$siteInfo = $adminObj -> getAllSettings();
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $siteInfo['site_name']; ?>| Vision</title>
<?php include("includes/css.php"); ?>
</head>
<body>
<?php include("includes/header.php"); ?>
<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span>Vision</span></li>
				</ul>
			</div>			
			<h1 class="page-title">Vision</h1>
		</div>
</section>
<section class="content-area">
<div class="container">
 
  <div class="row">
  <div class="col-sm-12"> <img src="<?php echo SITEURL?>images/aboutus.jpg" alt="" width="100%" /></div>
    <div class="col-sm-2">
      <div class="vision-left">
        <div><img alt="Jason Slosberg, President" src="<?php echo SITEURL;?>images/jason-slosberg.jpg"></div>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="vision-middle">
        <h1>PRESIDENT'S MESSAGE </h1>
        <p> Legacy Converting started operations in 2004 with a simple goal: provide premium
          branded, innovative wiping products along with state-of-the-art contract manufacturing
          capabilities to customers at any purchasing level. Trained as a physician, I sought
          to bring the same attention to detail and exacting standards of excellence I encountered
          in surgical operating rooms to Legacy's manufacturing and distribution enterprises.
          With the help of a uniquely dedicated executive team, Legacy has succeeded in applying
          the type of rigorous quality control that helps differentiate it from competitors
          worldwide. We continually strive to deliver the highest level of Quality, Value,
          and Service to our customers and the industries they serve. Additionally, Legacy
          prides itself on its active stewardship of the environment through its Eco-Tech&trade;
          Designs, robust recycling initiatives, and novel approaches to manufacturing that
          eliminates or recycles waste without compromising on the quality of finished goods.
          eliminates or recycles waste without compromising on the quality of finis </p>
          <div class="vision-list">
        <ul class="list-group">
          <li class="list-group-item">Research and Development of new product lines that offer increased value to our customers and have a positive environmental impact by reducing the risk of disease,
            minimizing our carbon footprint or both.</li>
          <li class="list-group-item">Building a world class team of employees who take pride in delivering results and strive to exceed our customers' expectations. </li>
          <li class="list-group-item">Creating innovative products that offer cost-effective solutions in a competitive marketplace without compromising quality.</li>
          <li class="list-group-item">Fostering a creative and dynamic organization which is built upon constant self-assessment and determined process improvement. </li>
          <li class="list-group-item">Contributing to improving the lives of our employees, our business partners, and those touched by our products in both a regional and global context. </li>
        </ul>
        </div>
        <p>If your business is currently on the growing list of customers that Legacy proudly serves, 
          I thank you for letting us earn your business and for our continued growth.If you are considering working 
          with Legacy as a preferred vendor for a current product line or one under development, I welcome you to take a 
          tour of our facilities and discuss with us how our commitment to excellence can help your organization gain a 
          competitive advantage and build a profitable business relationship together. </p>
        <p style="padding-top: 15px"> Sincerely,<br>
          Jason Slosberg, M.D.<br>
          President<br>
          Legacy Converting, Inc.</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="vision-right">
        <h1>VISION & PHILOSOPHY</h1>
        <p>Legacy Converting strives to be the best disposable wiping manufacturer in the United States serving a global clientele. We tenaciously work to 
          exceed our customer's expectations by focusing on the following three criteria: </p>
          <div class="vision-list">
        <ul class="list-group">
          <li class="list-group-item"> World Class Customer Service</li>
          <li class="list-group-item"> Innovative, Value-Added Product lines that focus on Price, Quality, and Packaging.</li>
          <li class="list-group-item"> Flexibility in designing, manufacturing, and delivering products to meet the purchasing requirements of any customer, 
            regardless of customer size or order size.</li>
        </ul>
        </div>
        <p>With these tenets of success guiding our corporate philosophy and practice, 
          we set out to earn the respect, trust, and business of distributors in a methodical 
          and sustainable fashion. Our creed to offer the best products, at the best price, delivered 
          when promised, resonates with our growing list of clients and helps to fuel our continued passion for excellence. </p>
        <div class="text-img">Non-Profit Organizations we contribute to:</div>
        <div class="text-img"><img alt="" src="<?php echo SITEURL; ?>images/team.jpg"></div>
        <div class="text-img"><img alt="" src="<?php echo SITEURL; ?>images/collaborative.jpg"></div>
        <div class="text-img"><img alt="" src="<?php echo SITEURL; ?>images/montclair.jpg"></div>
        <div class="text-img"><img alt="" src="<?php echo SITEURL; ?>images/cumac.jpg"></div>
        <div class="text-img"><img alt="" src="<?php echo SITEURL; ?>images/njisj.jpg"></div>
        <div class="text-img">Organizations we are Members of:</div>
        <div class="text-img"><img alt="" src="<?php echo SITEURL; ?>images/nonwoven.jpg"></div>
        <div class="text-img"><img alt="" src="<?php echo SITEURL; ?>images/njssa.jpg"></div>
        <div class="text-img"><a href="#"><img alt="" src="<?php echo SITEURL; ?>images/black-seal-200-42-legacyconvertinginc-90141012_new.png"></a></div>
      </div>
    </div>
  </div>
</div>
</section>
<?php include("includes/footer.php"); ?>

</body>
</html>