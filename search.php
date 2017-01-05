<?php
	include("includes/common.php");
	$adminObj = new AdminClass();
	$industryObj = new IndustriesClass();
	$catObj = new CategoryClass();
	$prodObj = new ProductClass();
	$brochureObj = new BrochureClass();
	$msdsObj = new MSDSClass();
	$siteInfo = $adminObj -> getAllSettings();
	
	$limit = RECORDPERPAGE;
	if(isset($_REQUEST['page']) && ($_REQUEST['page']))
	{
		$start= ($_REQUEST['page'] - 1) * $limit;
		$page = $_REQUEST['page'];
	}
	else
	{
		$start=0;
		$page = 1;
	}
	$keyword = '';
	if(isset($_REQUEST['keyword'])&&$_REQUEST['keyword']!='')
		$keyword = $_REQUEST['keyword'];
	$prodInfo = $prodObj -> getAllSearchProduct($start,$limit);
	
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lte IE 8]>
<script src="http://js.cwhcode.com/html5/"></script>
<![endif]-->
<!--[if lte IE 7]>
<script src="http://js.cwhcode.com/html5/"></script>
<![endif]-->
<title><?php echo $siteInfo['site_name']; ?> | Search</title>
<?php include("includes/css.php");?>
<script type="text/javascript">
function addtocompare(pid)
{
	if(pid>0){
		$.ajax({
			type: "POST",
			url: "<?php echo SITEURL; ?>ajax/ajax.php",
			data: { productId: pid,mode:'addtocompare'}
			}).done(function( msg ) {
				if(msg == 'This product added to comparelist.')	
				{
					setTimeout(function() {
                    $.bootstrapGrowl(msg, { type: 'success' });
               		}, 500);
				}
				else if(msg == 'This product removed from comparelist.'){
					setTimeout(function() {
                    $.bootstrapGrowl(msg, { type: 'warning' });
               		}, 500);					
				}
				else{
					setTimeout(function() {
                    $.bootstrapGrowl(msg, { type: 'info' });
               		}, 500);
				}
			});
	}	
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
					<li><span>Search</span></li>
				</ul>
			</div>			
			<h1 class="page-title">Search</h1>
		</div>
</section>  
<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input type="hidden" name="mode" value="">            
        <input type="hidden" name="page" value="">
        <input type="hidden" name="keyword" value="<?php echo $keyword;?>">
        
    </form>
<section class="content-area">
		<div class="container">
			<div class="row">
                <?php include("includes/sidebar.php"); ?> 
				<?php $pagination =  $prodObj -> getSearchPagination("frm_opts",$start,$page); ?>    			
				<div class="col-sm-8 col-md-9 content">
					<div class="content-top">
						<div class="row">
							<div class="col-md-7">								
                               <?php	echo $pagination;?>
							</div>
							<div class="col-md-5 listing-criteria">
								<div class="content-top-form">
									<span class="caption"><?php echo $prodObj -> countAllSearchProduct(); ?> products matching <?php if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']!=''){echo '"'.$_REQUEST['keyword'].'"';}?> found</span>									
								</div>
							</div>
						</div>
					</div>

					<div class="products-list">	
						<div class="row">
                        	<h3 class="col-sm-12">Search Results</h3> 
							<?php if(!empty($prodInfo)){
				 				  foreach($prodInfo as $pId => $prod_row){ 	 ?>
                                    <div class="product-item col-sm-6 col-md-4">
                                        <div class="product-inner">
                                            <div class="prod-img" style="background-image:url(<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>)">
                                                <img src="<?php echo SITEURL; ?>uploads/Legacy/Product/<?php echo $prod_row['product_image'] ?>" alt="product image" />
                                            </div>
                                            <div class="prod-info">
                                                <a href="<?php echo SITEURL.'singleproduct.php?productId='.$prod_row['productId']?>" class="prod-name uppercase"><?php echo $prod_row['pname'] ?></a>
                                            </div>
                                            <div class="prod-compare">
                                                <div class="inline-margin">
                                                    <div class="checkbox">
                                                        <label><input <?php if($prodObj->GetCompare($prod_row['productId']))echo 'checked';?> onClick="addtocompare(<?php echo $prod_row['productId']?>);" type="checkbox"> <span class="primary-color">Compare Product</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
								 }else{
							?>		<p class="col-sm-12">No result found. Try again with appropriate search parameter.</p>
							<?php } ?>							
						</div>
					
					</div>

					<?php	echo $pagination;?>

				</div>
			</div>
		</div>
	</section>
<?php include("includes/footer.php"); ?>