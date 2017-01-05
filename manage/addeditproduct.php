<?php include("../includes/common.php");
include("includes/header.php");
	$productObj  = new ProductClass();
	if(isset($_POST['mode'])&&($_POST['mode']=='insertupdate_product'))
	{
		$productId = '';
		if(isset($_POST['productId'])&&($_POST['productId']!=''))
		{
			$productId = $_POST['productId'];
		}
		$GLOBALS['err_msg'] = $productObj -> editProduct($productId);
	}
	if(isset($_REQUEST['productId'])&&($_REQUEST['productId']!=''))
	{
		$productId = $_REQUEST['productId'];
		$product_info = $productObj -> getProduct($productId);
		$form_title = "Edit Product";
		$pId = stripslashes($product_info['pId']);
		$pname = stripslashes($product_info['pname']);
		$sheet_size = stripslashes($product_info['sheet_size']);
		$items_per_each = stripslashes($product_info['items_per_each']);
		$each_per_ship_unit = stripslashes($product_info['each_per_ship_unit']);
		$each_dimension = $product_info['each_dimension'];
		$case_total_pcs = stripslashes($product_info['case_total_pcs']);
		$case_dimension = stripslashes($product_info['case_dimension']);
		$case_weight = stripslashes($product_info['case_weight']);
		$pallet_unit_quantity = stripslashes($product_info['pallet_unit_quantity']);
		$pallet_dimensions = stripslashes($product_info['pallet_dimensions']);
		$product_description = stripslashes($product_info['product_description']);
		$features_benefits = stripslashes($product_info['features_benefits']);
		$series_brochure = stripslashes($product_info['series_brochure']);
		$MSDS = stripslashes($product_info['MSDS']);
		$brands = stripslashes($product_info['brands']);
		$brands = explode(",",$brands);
		$category = stripslashes($product_info['category']);
		$category = explode(",",$category);	
		$featured_product = $product_info['featured_product'];	
		$related_products =	explode(',',$product_info['related_products']);
		$industry = stripslashes($product_info['industry']);	
		$industry = explode(",",$industry);	
		$prodtype = stripslashes($product_info['producttype']);	
		$prodtype = explode(",",$prodtype);		
		$imgloc =  stripslashes($product_info['product_image']);
		$barcodeimage =  stripslashes($product_info['barcodeimage']);
	}
	else
	{
		$form_title = "Add Product";
		$productId = "";		
		$pId = "";
		$pname = "";
		$sheet_size = "";
		$items_per_each = "";
		$each_per_ship_unit = "";
		$each_dimension = "";
		$case_total_pcs = "";
		$case_dimension = "";
		$case_weight = "";
		$pallet_unit_quantity = "";
		$pallet_dimensions = "";
		$product_description = "";
		$features_benefits = "";
		$series_brochure = "";
		$MSDS = "";
		$brands = "";
		$category = "";		
		$featured_product = 'N';
		$related_products =array();
		$industry = "";	
		$imgloc =  "";
		$barcodeimage = "";
	}

?>
<script language="javascript">

/***************************** START OF VALIDATION *************************************************/

		function chk_addSUPPLIER(frm)
		{
			if(frm.pId.value.search(/\S/)==-1)
			{
				alert("Please enter Product ID.");
				frm.pId.focus();
				return false;
			}	
			if(frm.pname.value.search(/\S/)==-1)
			{
				alert("Please enter Product Name.");
				frm.pname.focus();
				return false;
			}			
			frm.mode.value = 'insertupdate_product';
		}

/***************************** END OF VALIDATION *************************************************/
$(document).ready(function(){

});



function checklimit(pid){	
	var checkboxes = document.getElementsByName('related_products[]');
	var chk = 1;
	for (var i=1;i<checkboxes.length;i++)
	{
		if(checkboxes[i].checked==true)
			chk = chk+1;
	}
	
	if (document.getElementById('rel_'+pid).checked==true)
	{
		if(chk <= 4)			
			chk = chk+1;
		else{
			document.getElementById('rel_'+pid).checked=false;
			alert('max 4 item');
		}
	}
					
}



	</script>

<div class="container">
  <div class="row">
    <div class="area-top clearfix">
      <div class="header">
        <h3 class="title"> <i class="icon-dashboard"></i> Product </h3>
        <h5> <span> <?php echo $form_title; ?> From Here </span> </h5>
      </div>
    </div>
  </div>
</div>
<div class="container padded">
  <div class="row"> 
    
    <!-- Breadcrumb line -->
    
    <div id="breadcrumbs">
      <div class="breadcrumb-button blue"> <span class="breadcrumb-label"><i class="icon-home"></i> Home</span> <span class="breadcrumb-arrow"><span></span></span> </div>
      <div class="breadcrumb-button"> <span class="breadcrumb-label"> <i class="icon-dashboard"></i> <?php echo $form_title; ?></span> <span class="breadcrumb-arrow"><span></span></span> </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="box">
    <div class="box-header"> <span class="title"><?php echo $form_title; ?> Form</span>
      <ul class="box-toolbar">
        <li> <i class="icon-refresh"></i> </li>
      </ul>
    </div>
    <?php if(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != '' && ($GLOBALS['err_msg'] == 'Failed to save information.' || $GLOBALS['err_msg'] == "Duplicate product id" )){ ?>
    <div class="alert alert-error" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>
    <?php }elseif(isset($GLOBALS['err_msg']) && $GLOBALS['err_msg'] != ''){ ?>
    <div class="alert alert-success" id="alertsuccess"><?php echo $GLOBALS['err_msg']; ?></div>
    <?php } ?>
    <div class="box-content">
      <form class="fill-up" id="UserAddForm" method="post" action="" accept-charset="utf-8" name="frm_addUSER" onSubmit="return chk_addSUPPLIER(this)" enctype="multipart/form-data">
        <div style="display:none;">
          <input type="hidden" name="_method" value="POST" />
          <input type="hidden" name="mode" value="">
          <input type="hidden" name="productId" value="<?php echo $productId; ?>" />
        </div>
        <div class="row">
          <div class="col-lg-6">
            <ul class="padded separate-sections">
              <li class="input">
                <label>Product Id:</label>
                <input name="pId" type="text" value="<?php echo $pId;?>" maxlength="255" id="pId" />
              </li>
              <li class="input">
                <label>Wiper sheet size:</label>
                <input name="sheet_size" type="text" value="<?php echo $sheet_size;?>" maxlength="255" id="sheet_size" />
              </li>
              <li class="input">
                <label>Each per Ship Unit:</label>
                <input name="each_per_ship_unit" type="text" value="<?php echo $each_per_ship_unit;?>" maxlength="255" id="each_per_ship_unit" />
              </li>
              <li class="input">
                <label>Case Total Pcs:</label>
                <input name="case_total_pcs" type="text" value="<?php echo $case_total_pcs;?>" maxlength="255" id="case_total_pcs" />
              </li>
              <li class="input">
                <label>Case Weight:</label>
                <input name="case_weight" type="text" value="<?php echo $case_weight;?>" maxlength="255" id="case_weight" />
              </li>
              <li class="input">
                <label>Pallet Dimensions:</label>
                <input name="pallet_dimensions" type="text" value='<?php echo $pallet_dimensions;?>' maxlength="255" id="pallet_dimensions" />
              </li>
              <li class="input">
                <label>Features & Benefits:</label>
                <textarea name="features_benefits" id="features_benefits"><?php echo $features_benefits; ?></textarea>
              </li>
              <li class="input">
                <label>MSDS:</label>
                <?php $msdsObj  = new MSDSClass();

						  echo $msdsObj -> getAllMSDSDropdown($MSDS);

					 ?>
              </li>
              <li class="input">
                <label>Upload Barcode for Sell Sheet : </label>
                <input type="file" name="barcodeimage" id="barcodeimage" />
                <span class="help-block note">Image dimension must be 126 X 62</span>
                <?php if($barcodeimage!=''){?>
                <img src="../uploads/Legacy/Product/Barcode/<?php echo $barcodeimage;?>" width="126" height="62" />
                <?php } ?>
              </li>
              <li class="input">
                <label>Category:</label>
                <br />
                <?php $categoryObj = new CategoryClass();

						  $rs = $categoryObj -> getAllCategory();

						  foreach($rs as $cId => $cat_row){

					?>
                <input style="width:20px;" type="checkbox" name="category[]" value="<?php echo $cat_row['categoryId'] ?>" id="<?php echo $cat_row['categoryId'] ?>" <?php if(is_array($category)&&(in_array($cat_row['categoryId'],$category))) echo 'checked="checked"'; ?> />
                <label><?php echo $cat_row['category_name'];?></label>
                &nbsp;&nbsp;
                <?php

						  }

					 ?>
              </li>
              <li class="input">
                <label>Featured Product:</label>
                <input type="radio" class="icheck" name="featured_product" value="Y" <?php if(isset($featured_product)&&($featured_product=='Y'))echo 'checked';?>/>
                &nbsp;Yes
                <input type="radio" class="icheck" name="featured_product" value="N" <?php if(isset($featured_product)&&($featured_product=='N'))echo 'checked';?>/>
                &nbsp;No</li>
                
               <li class="input">
                <label>Related Products:</label>
                <div id="related_products" style="height:200px;overflow-y:scroll;border:1px solid">
                <?php $allproducts = $productObj -> getAllProduct();
				       foreach($allproducts as $product){?>
                       <?php if($product['productId'] != $productId){?>
                <input id="<?php echo 'rel_'.$product['productId'];?>" onclick="checklimit(<?php echo $product['productId']?>)" type="checkbox" name="related_products[]" <?php if(in_array($product['productId'],$related_products)) echo 'checked';?> value="<?php echo $product['productId'];?>" style="width: 20px;"/><?php echo $product['pname'];?>
                
                	   <?php } ?>
                <?php } ?>
                </div>
               </li> 
                
              <li class="input">
                <label>Industry:</label>
                <br />
                <?php /*?><?php $industriesObj = new IndustriesClass();

						  echo $industriesObj -> getAllSubIndustriesMultipleDropdown($industry);						 

					 ?><?php */?>
                <?php $industriesObj = new IndustriesClass();

						   $results = $industriesObj -> getAllIndustries();

						   foreach($results as $industriesId => $industry_row)

						   {

					?>
                <input style="width:20px;" type="checkbox" name="industry[]" <?php if(is_array($industry)&&in_array($industry_row['industriesId'],$industry)){?>checked="checked"<?php }?> value="<?php echo $industry_row['industriesId'];?>" >
                <?php echo utf8_encode(stripslashes($industry_row['industries_name']));?><br />
                <?php	

								$resultssub = $industriesObj -> getAllSubIndustries($industry_row['industriesId']);   

								foreach($resultssub as $subcatId => $subcat_row)

								{

					?>
                <input style="width:20px;margin-left: 20px;" type="checkbox" name="industry[]" <?php if(is_array($industry)&&in_array($subcat_row['industriesId'],$industry)){?>checked="checked"<?php }?> value="<?php echo $subcat_row['industriesId'];?>" >
                <?php echo utf8_encode(stripslashes($subcat_row['industries_name']));?><br />
                <?php

								}

						   }

					 ?>
              </li>
              <li class="input">
                <label>Product Image : </label>
                <?php if($imgloc!=''){?>
                <img src="../uploads/Legacy/Product/<?php echo $imgloc;?>" width="150" height="100" />
                <?php } ?>
                <input type="file" name="product_image" id="product_image" />
              </li>
              </li>
            </ul>
          </div>
          <div class="col-lg-6">
            <ul class="padded separate-sections">
              <li class="input">
                <label>Product Name:</label>
                <input name="pname" type="text" value="<?php echo $pname;?>" maxlength="255" id="pname" />
              </li>
              <li class="input">
                <label>Items per Each:</label>
                <input type="text" name="items_per_each" id="items_per_each" value="<?php echo $items_per_each; ?>" />
              </li>
              <li class="input">
                <label>Each Dimension:</label>
                <input name="each_dimension" type="text" maxlength="255" id="each_dimension" value='<?php echo $each_dimension; ?>' />
              </li>
              <li class="input">
                <label>Case Dimension:</label>
                <input name="case_dimension" type="text" maxlength="255" id="case_dimension" value='<?php echo $case_dimension; ?>' />
              </li>
              <li class="input">
                <label>Pallet Unit Quantity:</label>
                <input name="pallet_unit_quantity" type="text" maxlength="255" id="pallet_unit_quantity" value="<?php echo $pallet_unit_quantity; ?>" />
              </li>
              <li class="input">
                <label>Product Description:</label>
                <textarea name="product_description" id="product_description"><?php echo $product_description; ?></textarea>
              </li>
              <li class="input">
                <label>Series Brochure:</label>
                <?php $brochureObj  = new BrochureClass();

						  echo $brochureObj -> getAllBrochureDropdown($series_brochure);

					 ?>
              </li>
              <li class="input">
                <label style="float:left">Brands:</label>
                <br />
                <?php $brandObj  = new BrandClass();

						  $rs = $brandObj -> getAllBrand();

						  foreach($rs as $bId => $brand_row){

					?>
                <div>
                  <input style="width:20px;" type="checkbox" name="brands[]" value="<?php echo $brand_row['brandId']?>" id="<?php echo $brand_row['brandId'] ?>" <?php if(is_array($brands)&&(in_array($brand_row['brandId'],$brands))) echo 'checked="checked"'; ?> />
                  <label><?php echo $brand_row['brand_name'];?></label>
                </div>
                <?php

						  }

					 ?>
              </li>
              <li class="input">
                <label>Product Type:</label>
                <br />
                <?php /*?><?php $industriesObj = new IndustriesClass();

						  echo $industriesObj -> getAllSubIndustriesMultipleDropdown($industry);						 

					 ?><?php */?>
                <?php $industriesObj = new IndustriesClass();

					 	   $prodTypeObj = new ProductTypesClass();

						   $results = $industriesObj -> getAllIndustries();

						   foreach($results as $industriesId => $industry_row)

						   {

					?>
                <b><i><?php echo utf8_encode(stripslashes($industry_row['industries_name']));?></i></b><br />
                <?php	

								$resultssub = $industriesObj -> getAllSubIndustries($industry_row['industriesId']);   

								foreach($resultssub as $subcatId => $subcat_row)

								{

					?>
                &nbsp;&nbsp;-><?php echo utf8_encode(stripslashes($subcat_row['industries_name']));?><br />
                <?php

									$resultssubptype = $prodTypeObj -> getAllProductTypes($subcat_row['industriesId']);

									foreach($resultssubptype as $subptypeId => $prodType_row)

									{

					?>
                &nbsp;&nbsp;
                <input style="width:20px;margin-left: 20px;" type="checkbox" name="prodtype[]" <?php if(is_array($prodtype)&&in_array($prodType_row['productTypeId'],$prodtype)){?>checked="checked"<?php }?> value="<?php echo $prodType_row['productTypeId'];?>" >
                <?php echo utf8_encode(stripslashes($prodType_row['productType']));?><br />
                <?php

									}

								}

						   }

					 ?>
              </li>
            </ul>
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-blue">Submit</button>
          <button type="button" class="btn btn-default" onclick="window.location='Products.php';">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include("includes/footer.php");?>