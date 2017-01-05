<?php $adminObj = new AdminClass(); 
	  $sitesetting_info = $adminObj -> getAllSettings();	
?>
	<section class="call-to-action">
		<h2 class="cta-title">CONTACT <span class="primary-color">LEGACY CONVERTING</span> TODAY</h2>
		<a href="<?php echo SITEURL; ?>contact.php" class="cta-btn">Contact Us</a>
	</section>

	<footer class="footer">

		<div class="container">
			<div class="footer-top">
				<div class="row">
					<div class="social-links col-sm-6">
						<div class="social-dscr"><span class="primary-color">Connect</span> with Legacy</div>
						<a href="<?php echo $sitesetting_info['fburl'];?>"><i class="fa fa-facebook"></i></a>
						<a href="<?php echo $sitesetting_info['tweeturl']; ?>"><i class="fa fa-twitter"></i></a>
						<a href="<?php echo $sitesetting_info['linkedinurl']; ?>"><i class="fa fa-linkedin"></i></a>
					</div>
					<div class="subscribe-section col-sm-6">
						<span class="social-dscr"><span class="primary-color">Newsletter</span> Signup </span>
						<span class="subscribe-input">
							<input type="email" placeholder="Enter email address" name="email" id="newsletteremail" />
                            
						</span>
                       <span class="msg col-sm-12"></span>
					</div>
				</div>
			</div>

			<div class="footer-columns">
				<div class="row">
					<div class="col-sm-3">
						<div class="footer-nav-col">
							<h4 class="footer-column-title uppercase">Products</h4>
							<ul class="footer-nav">
                            	<?php foreach($catInfo as $cId => $cat_row){ ?>
                                <li><a href="<?php echo SITEURL;?>categoryProducts.php?cid=<?php echo $cat_row['categoryId'] ?>"><?php echo $cat_row['category_name']; ?></a></li>
                                  <?php } ?>								
								<li><a href="<?php echo SITEURL; ?>tableTop.php">Tabletop &amp; Guest Towels</a></li>
								<li><a href="<?php echo SITEURL; ?>privateLabel.php">Private Label Programs</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="footer-nav-col">
							<h4 class="footer-column-title uppercase">Industries</h4>
							<ul class="footer-nav">
								<li><a href="<?php echo SITEURL; ?>products.php?indid=1">Healthcare</a></li>
								<li><a href="<?php echo SITEURL; ?>products.php?indid=2">Food Service</a></li>
								<li><a href="<?php echo SITEURL; ?>products.php?indid=3">Workplace</a></li>
								<li><a href="<?php echo SITEURL; ?>products.php?indid=4">Hospitality</a></li>
								<li><a href="<?php echo SITEURL; ?>products.php?indid=5">Technology</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="footer-nav-col">
							<h4 class="footer-column-title uppercase">About</h4>
							<ul class="footer-nav">
								<li><a href="<?php echo SITEURL; ?>about.php">About Legacy</a></li>
								<li><a href="<?php echo SITEURL; ?>vision.php">Vision &amp; Philosophy</a></li>
                                <li><a href="<?php echo SITEURL; ?>blogs.php">Blogs</a></li>

								<li><a href="#">News</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 hidden-xs hidden-sm">
						<h4 class="footer-column-title">Main Office &amp; Manufacturing</h4>
						<p><?php echo $sitesetting_info['address1']; ?> <a href="http://maps.google.com/?q=<?php echo strip_tags($sitesetting_info['address1']);?>" target="_blank">View Map</a></p>
						<h4 class="footer-column-title">West Coast Distribution Center</h4>
						<p><?php echo $sitesetting_info['address2']; ?><br /> <a href="<?php echo SITEURL; ?>contact.php">Contact Us</a></p>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-columns-mobile container">
			<ul class="footer-nav-mobile">
				<li>
					<span>Products</span>
					<ul class="footer-nav">
						<?php foreach($catInfo as $cId => $cat_row){ ?>
                        <li><a href="<?php echo SITEURL;?>categoryProducts.php?cid=<?php echo $cat_row['categoryId'] ?>"><?php echo $cat_row['category_name']; ?></a></li>
                          <?php } ?>								
                        <li><a href="<?php echo SITEURL; ?>tableTop.php">Tabletop &amp; Guest Towels</a></li>
                        <li><a href="<?php echo SITEURL; ?>privateLabel.php">Private Label Programs</a></li>
					</ul>
				</li>
				<li>
					<span>Industries</span>
					<ul class="footer-nav">
						<li><a href="<?php echo SITEURL; ?>products.php?indid=1">Healthcare</a></li>
						<li><a href="<?php echo SITEURL; ?>products.php?indid=2">Food Service</a></li>
						<li><a href="<?php echo SITEURL; ?>products.php?indid=3">Workplace</a></li>
						<li><a href="<?php echo SITEURL; ?>products.php?indid=4">Hospitality</a></li>
						<li><a href="<?php echo SITEURL; ?>products.php?indid=5">Technology</a></li>
					</ul>
				</li>
				<li>
					<span>About</span>
					<ul class="footer-nav">
						<li><a href="<?php echo SITEURL; ?>about.php">About Legacy</a></li>
						<li><a href="<?php echo SITEURL; ?>vision.php">Vision &amp; Philosophy</a></li>
						<li><a href="#">News</a></li>
					</ul>
				</li>
			</ul>
		</div>

		<div class="footer-bottom">
			<div class="footer-logo">
				<a href="#"><img src="images/footer-logo.png" alt="Logo" data-at2x="images/logo@2x.png" /></a>
			</div>
			<div class="container">
				<div class="row">
					<div class="footer-bottom-left col-sm-6">
						<ul>
							<li class="copyright">&copy; <?php echo $sitesetting_info['copyright'];?></li>
							<li><a href="<?php echo SITEURL; ?>termsconditions.php">Terms &amp; Conditions</a></li>
						</ul>
					</div>
					<div class="footer-bottom-right col-sm-6">
						<img src="images/footer-bbb-rating.png" alt="" />
					</div>
				</div>
			</div>
		</div>
	</footer>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<script src="<?php echo SITEURL; ?>vendor/jquery/jquery-1.11.3.min.js"></script>
<script src="<?php echo SITEURL; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo SITEURL; ?>vendor/wow/dist/wow.min.js"></script>
<script src="<?php echo SITEURL; ?>vendor/prettyPhoto_3.1.6/js/jquery.prettyPhoto.js"></script>
<script src="<?php echo SITEURL; ?>vendor/Swiper-3.3.1/dist/js/swiper.min.js"></script>
<script src="<?php echo SITEURL; ?>js/script.js"></script>
<script src="<?php echo SITEURL; ?>js/mlightbox.js"></script>
<script src="<?php echo SITEURL; ?>js/jquery.bootstrap-growl.js"></script>

<script type="text/javascript">
$('#newsletteremail').keypress(function(e) {
  $('.msg').html('');
  if(e.which == 13){
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var newsemail = document.getElementById('newsletteremail').value;
	if(re.test(newsemail)){
		$.ajax({
			type: "POST",
			url: "<?php echo SITEURL; ?>ajax/newsletter.php",
			data: { email: newsemail}
			}).done(function( msg ) {
				if(msg != '')	
				{
					$('.msg').html(msg);
				}
			});
	}
	else
		$('.msg').html('Enter Proper Email Please.');
}
});

</script>