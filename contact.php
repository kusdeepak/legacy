<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();	
	$contactObj = new ContactClass();
	$siteInfo = $adminObj -> getAllSettings();
	
	$strresponse = '';
	
	if(isset($_REQUEST['mode']) && ($_REQUEST['mode']=='send_contact'))
	{
		$strresponse = $contactObj -> sendContactMail();
	}
?>
<!DOCTYPE html>
<html>
<head>

<title><?php echo $siteInfo['site_name']; ?> | Contact</title>

<?php include("includes/css.php"); ?>
<script type="text/javascript">
function chkcntFrm(frm)
{
	if(frm.name.value.search(/\S/)==-1)
	{
		alert("Please Enter Name");
		frm.name.focus();
		return false;
	}
	if(checkEmail(frm.email.value) == false)
	{
		alert("Please Enter Valid Email.");
		frm.email.focus();
		return false;
	}
	if(frm.ContactNo.value.search(/\S/)==-1)
	{
		alert("Please Enter Contact No.");
		frm.ContactNo.focus();
		return false;
	}
	frm.mode.value = 'send_contact';
}
function checkEmail(email) 
{
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(email)) 
	{
		return false;
	}
	else
		return true;
}
</script>	
</head>
<body>

<?php include("includes/header.php"); ?>
<section class="titlebar blog">
		<div class="container">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><span>Contact</span></li>
				</ul>
			</div>			
			<h1 class="page-title">Contact</h1>
		</div>
</section>    

<section class="content-area">
			<div class="container">
                <div class="row">
                	 		<?php if(isset($strresponse) && $strresponse == 'Failed to send mail.'){ ?>
                            <div class="alert alert-danger fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo $strresponse; ?></strong></div>
                        	<?php } elseif(isset($strresponse) && $strresponse != ''){ ?>
                            <div class="alert alert-success fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong><?php echo $strresponse; ?></strong></div>
                            <?php } ?>
                    <div class="col-sm-12">
                    	   	 
                                
                                    <div class="col-md-6">
                                        <div class="main_addess">
                                            <h3>Main Office & Manufacturing</h3>
                                            <p><?php echo $siteInfo['address1']; ?><!--<a href="http://maps.google.com/maps?f=d&source=s_q&hl=en&geocode=&q=3+Security+Dr.+Suite+301+Cranbury,+NJ+08512+&aq=&sll=41.090652,-73.917915&sspn=0.041918,0.090895&ie=UTF8&hq=&hnear=Security+Dr,+Cranbury,+Middlesex,+New+Jersey+08512&t=h&ll=40.325346,-74.502068&spn=0.022706,0.036478&z=14&iwloc=A&daddr=Security+Dr,+Cranbury,+NJ+08512" target="_blank">View Map</a>-->
                                            <a href="http://maps.google.com/?q=<?php echo strip_tags($siteInfo['address1']);?>" target="_blank">View Map</a>
                                            </p>
                                        </div>
                                        
                                        <div class="other_details">
                                            <p><span>Tel:</span> <?php echo $siteInfo['telephone']; ?><br>
                                            <span>Fax:</span> <?php echo $siteInfo['fax']; ?><br>
                                            <span>Email:</span> <a href="mailto:<?php echo $siteInfo['sales_email']; ?>"><?php echo $siteInfo['sales_email']; ?></a></p>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="main_addess">
                                            <h3>West Coast Distribution Center</h3>
                                            <p><?php echo strip_tags($siteInfo['address2']);?><!--<a href="http://maps.google.com/maps?f=d&source=s_q&hl=en&geocode=&q=1150+N.+Red+Gum+St.+Unit+D+Anaheim,+CA+9280&aq=&sll=41.090652,-73.917915&sspn=0.041918,0.090895&ie=UTF8&hq=&hnear=1150+N+Red+Gum+St,+Anaheim,+Orange,+California+92806&t=h&ll=33.858585,-117.863216&spn=0.024732,0.036478&z=14&iwloc=A&daddr=1150+N+Red+Gum+St,+Anaheim,+CA+92806" target="_blank">View Map</a>-->
                                            <a href="http://maps.google.com/?q=<?php echo strip_tags($siteInfo['address2']);?>" target="_blank">View Map</a>
                                            </p>
                                        </div>
                                    </div>
                               
                           
                    </div>
                </div>
                <div class="row">
                <div class="col-sm-12">
                            
					<div class="col-sm-6">
                    <form name="apply" id="apply" method="post" enctype="multipart/form-data" onSubmit="return chkcntFrm(this)">
                   <input type="hidden" name="mode">
                                
                        <div class="from_content">
                        <div class="from_heading">
                            <h2>Contact Form</h2>                            
                        </div>
                        <div class="main_from">
                            <div class="from_sec">
                                <span>Name</span>
                                <input type="text" id="name" name="name">
                            </div>
                            
                            <div class="from_sec">
                                <span>Company</span>
                                <input type="text" id="company" name="company">
                            </div>
                            
                            <div class="from_sec">
                                <span>Title</span>
                                <input type="text" id="title" name="title">
                            </div>
                            
                            <div class="from_sec">
                                <span>Email</span>
                                <input type="text" id="email" name="email">
                            </div>
                            
                            <div class="from_sec">
                                <span>Phone</span>
                                <input type="text" id="ContactNo" name="ContactNo">
                            </div>
                            
                            <div class="from_sec">
                                <span>Question</span>
                                <textarea id="question" name="question"></textarea>
                            </div>
                            
                          <div class="from_sec">
                                <span>How did you hear about us?</span>
                                <input type="text" id="hereabout" name="hereabout">
                            </div>
                            
                            <div class="from_sec">
                              <span>Do you want to be added in Legacy's mailing list for update and news?</span>
                              <br><input type="checkbox" value="yes" name="newsletter"><span class="ys"> Yes</span>
                            </div>
                            
                            <div class="from_submit">
                                <input type="image" style="height:35px;width:120px;border-width:0px;" alt="submit" src="images/carsub_btn.png" id="ctl00_ContentPlaceHolder1_imgbtnSubmit" name="ctl00$ContentPlaceHolder1$imgbtnSubmit">
                            </div>
                        </div>
                        
                    </div>
                    </form>					
					</div>
                    
                    <div class="col-sm-6">
                        
                        <p></p>    	
                        <div class="newslatter_section">
            <div class="newslatter">
                <div class="newslatter_heading">
                    <span>Sign up for our email list on</span>
                        <img src="images/cc_logo_trans_150x70.gif" width="150" height="70"  alt=""/> 
                </div>
                <ul>
                    <li>Get updates on latest Product launches.</li>
                    <li>Receive exclusive access to Blowout and Sale items.</li>
                    <li>Learn about our sales training videos and product demos.</li>
                </ul>
                <a href="http://visitor.r20.constantcontact.com/d.jsp?llr=usb7qefab&p=oi&m=1105032250964" target="_blank"><img src="<?php echo SITEURL; ?>images/click_here.jpg" width="126" height="34"  alt=""/></a>
                <div class="privacy_by">
                    <img src="<?php echo SITEURL; ?>images/safe_subscribe_logo.gif" alt=""/>
                 </div> 
            </div>	
        </div>					
					</div>	
                </div>
                </div>				
				</div>
                
			</div>
</section>
<?php include("includes/footer.php"); ?>

</body>
</html>