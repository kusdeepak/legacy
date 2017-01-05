<?php $size = 'N/A';
$items_per_each = '';
$each_per_ship_unit = '';
$each_dimension = '';
$case_total_pcs = '';
$case_dimension = '';
$case_weight = '';
$pallet_unit_quantity = '';
$pallet_dimensions = '';
$product_image = "";
$message_head = '';
$company = '';
$infoline1 = '';
$infoline2 = '';
$msgline1 = '';
$msgline2 = '';
$url = "";
if(isset($_SESSION['sheet_size']) && $_SESSION['sheet_size']!='')
{
	$size = $_SESSION['sheet_size'];
}
if(isset($_SESSION['items_per_each']) && $_SESSION['items_per_each']!='')
{
	$items_per_each = $_SESSION['items_per_each'];
}
if(isset($_SESSION['each_per_ship_unit']) && $_SESSION['each_per_ship_unit']!='')
{
	$each_per_ship_unit = $_SESSION['each_per_ship_unit'];
}
if(isset($_SESSION['each_dimension']) && $_SESSION['each_dimension']!='')
{
	$each_dimension = $_SESSION['each_dimension'];
}
if(isset($_SESSION['each_dimension']) && $_SESSION['each_dimension']!='')
{
	$each_dimension = $_SESSION['each_dimension'];
}
if(isset($_SESSION['case_total_pcs']) && $_SESSION['case_total_pcs']!='')
{
	$case_total_pcs = $_SESSION['case_total_pcs'];
}
if(isset($_SESSION['case_dimension']) && $_SESSION['case_dimension']!='')
{
	$case_dimension = $_SESSION['case_dimension'];
}
if(isset($_SESSION['case_weight']) && $_SESSION['case_weight']!='')
{
	$case_weight = $_SESSION['case_weight'];
}
if(isset($_SESSION['pallet_unit_quantity']) && $_SESSION['pallet_unit_quantity']!='')
{
	$pallet_unit_quantity = $_SESSION['pallet_unit_quantity'];
}
if(isset($_SESSION['pallet_dimensions']) && $_SESSION['pallet_dimensions']!='')
{
	$pallet_dimensions = $_SESSION['pallet_dimensions'];
}
if(isset($_SESSION['product_image']) && $_SESSION['product_image']!='')
{
	$product_image = $_SESSION['product_image'];
}else{
	$product_image = 'images/no-image.jpg';
}
if(isset($_SESSION['barcodeimage']) && $_SESSION['barcodeimage']!='')
{
	$barcodeimage = $_SESSION['barcodeimage'];
}else{
	$barcodeimage = 'images/barcodenoimage.png';
}
if(isset($_SESSION['url']) && $_SESSION['url']!='')
{
	$url = $_SESSION['url'];
}
if(isset($_SESSION['message_head']) && $_SESSION['message_head']!='')
{
	$message_head = $_SESSION['message_head'];
}
if(isset($_SESSION['company']) && $_SESSION['company']!='')
{
	$company = $_SESSION['company'];
}
if(isset($_SESSION['infoline1']) && $_SESSION['infoline1']!='')
{
	$infoline1 = $_SESSION['infoline1'];
}
if(isset($_SESSION['infoline2']) && $_SESSION['infoline2']!='')
{
	$infoline2 = $_SESSION['infoline2'];
}
if(isset($_SESSION['msgline1']) && $_SESSION['msgline1']!='')
{
	$msgline1 = $_SESSION['msgline1'];
}
if(isset($_SESSION['msgline2']) && $_SESSION['msgline2']!='')
{
	$msgline2 = $_SESSION['msgline2'];
}
if(isset($_SESSION['industries']) && $_SESSION['industries']!='')
{
	$industries = $_SESSION['industries'];
}
$temp = true;
?>
<style>
td {
	/*font-family:Arial, Helvetica, sans-serif;*/
	padding:5px;
}
</style>

<table width="190mm" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="width: 55mm; height: 3mm; text-align:left; font-size:30px; font-weight:bold;color:#000;"><img src="./pdf/everwipe_logo.jpg"  align="left" style="margin-top:20px; width:50mm; margin-left:-1.5mm;"  alt=""/></td>
    <td style="width: 135mm; height: 3mm; text-align:right;"><img src="./pdf/boder.jpg"  align="right" style="margin-top:22px; margin-right:-1mm;"  alt=""/></td>
  </tr>
</table>
<!--<table width="190mm" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="width: 55mm; height: 3mm; text-align:left; font-size:30px; font-weight:bold;color:#000;">&nbsp;</td>
    <td style="width: 135mm; height: 3mm; text-align:right;"><img src="./pdf/md-certified.jpg" style="margin-right:-1mm;"  align="right"  alt=""/></td>
  </tr>
</table>-->
<table width="190mm" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="width: 55mm; height: 3mm; text-align:left; font-size:30px; font-weight:bold;color:#000;">&nbsp;</td>
    <td style="width: 135mm; height: 3mm; text-align:right;"><img src="./pdf/blank.png" style="margin-right:-1mm;"  align="right"  alt=""/></td>
  </tr>
</table>

<table width="190mm" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td ><?php if(isset($_SESSION['product_image']) && $_SESSION['product_image']!=''){ 

					$filepath = getimagesize($url.'uploads/Legacy/Product/thumb/'.$product_image);

					if($filepath[0]>=500){ 

						$theight = round(($filepath[1]/$filepath[0])*500);

						if($theight < 380){

							$rtheight = 380 - $theight;

						}

					}

			?>
      <img src="<?php echo $url; ?>uploads/Legacy/Product/thumb/<?php echo $product_image; ?>" width="<?php echo ($filepath[0]>=500)?500:$filepath[0]; ?>" alt="" <?php if($filepath[0]>=500){ ?>style="margin-top:<?php echo round($rtheight/2);?>px; margin-bottom:<?php echo round($rtheight/2);?>px;"<?php } ?>/>
      <?php }else{ ?>
      <img src="<?php echo $url; ?><?php echo $product_image; ?>" width="350" height="288" style="margin-top:80px;margin-bottom:100px"  alt=""/>
      <?php }?></td>
  </tr>
</table>

<table width="190mm" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td style="width: 55mm; height: 3mm; text-align:left; font-size:30px; font-weight:bold;color:#000;">&nbsp;</td>
    <td style="width: 135mm; height: 3mm; text-align:right;"><img src="./pdf/blank.png" style="margin-right:-1mm;"  align="right"  alt=""/></td>
  </tr>
</table>

<br />
<table width="421mm" align="center" cellpadding="0" cellspacing="0" >
  <tr>
    <th width="225mm" scope="col" valign="top">
     <table>
        <tr>
          <td  valign="top" style="width: 90mm; text-align:left; font-size:20px;padding-bottom:5px; padding-top:0px; margin-top:0px; margin-left:-1.5mm; line-height:0px; margin-bottom:5px;padding-left:0; font-weight:bold; color:#000000; border-bottom:1px solid #808080;"><?php echo $_SESSION['pname'];?></td>
        </tr>
        <tr>
          <td style="width:95mm;text-align:left; padding-bottom:15px;margin-bottom:5px; padding-left:0; font-size:12px;color:#333; font-weight:normal;border-bottom:1px solid #808080;"><?php echo substr($_SESSION['pdesc'],0,320);?></td>
        </tr>
        <?php if(isset($_SESSION['pfeatures']) && $_SESSION['pfeatures'] != ''){ ?>
        <tr>
          <td style="width: 95mm;text-align:left; padding-bottom:5px;margin-bottom:5px; padding-left:0; font-size:12px;color:#333; font-weight:normal;border-bottom:1px solid #808080;"> Features & Benefits </td>
        </tr>
        <tr>
          <td style="width: 95mm;text-align:left; padding-bottom:10px;margin-bottom:5px; padding-left:0; font-size:12px;color:#333; font-weight:normal;border-bottom:1px solid #808080;"><?php echo substr($_SESSION['pfeatures'],0,400);?></td>
        </tr>
        <?php } ?>
        <tr>
          <td style="width: 95mm;text-align:center; padding-bottom:0px;margin-bottom:5px; margin-top:5px; padding-left:0; font-size:12px;color:#333; font-weight:normal;"><?php if(in_array("1",$industries)){ ?>
            <img src="./pdf/healthcare-big.jpg" alt="" style="margin-top:20px; margin-left:6px;"/>
            <?php }else{ ?>
            <!--<img src="./pdf/healthcare.jpg" alt="" style="margin-top:20px; margin-left:0;"/>-->
            <img src="./pdf/healthcare-big.jpg" alt="" style="margin-top:20px; margin-left:6px;"/>
            <?php } ?>
            <?php if(in_array("3",$industries)){ ?>
            <img src="./pdf/workpalce-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php }else{ ?>
            <!--<img src="./pdf/workpalce.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>-->
            <img src="./pdf/workpalce-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php } ?>
            <?php if(in_array("4",$industries)){ ?>
            <img src="./pdf/hospitality-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php }else{ ?>
            <!--<img src="./pdf/hospitality.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>-->
            <img src="./pdf/hospitality-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php } ?>
            <?php if(in_array("2",$industries)){ ?>
            <img src="./pdf/foodservices-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php }else{ ?>
            <!--<img src="./pdf/foodservices.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>-->
            <img src="./pdf/foodservices-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php } ?>
            <?php if(in_array("5",$industries)){ ?>
            <img src="./pdf/technology-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php }else{ ?>
            <!--<img src="./pdf/technology.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>-->
            <img src="./pdf/technology-big.jpg" style="margin-left:5px;margin-top:0px;" alt=""/>
            <?php } ?></td>
        </tr>
      </table>
    </th>
    <th  width="50mm"scope="col" style="border-right:3px solid #bebebe;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th   width="50mm" scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
    <th width="135mm" scope="col" valign="top"> <table >
        <tr>
          <td width="291" style="text-align:left; font-size:12px;color:#333; padding:0px 0px 6px;border-bottom: 1px solid #808080;font-weight:100;">PRODUCT SPECIFICATIONS</td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Wiper sheet size: <?php echo $size;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Item per Each : <?php echo $items_per_each;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Each per Ship Unit : <?php echo $each_per_ship_unit;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333;padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Each Dimension : <?php echo $each_dimension;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Case Total Pcs : <?php echo $case_total_pcs;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Case Dimension : <?php echo $case_dimension;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Case Weight : <?php echo $case_weight;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Pallet Unit Quantity : <?php echo $pallet_unit_quantity;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:6px 0px;border-bottom: 1px solid #808080;font-weight:100;">Pallet Dimensions : <?php echo $pallet_dimensions;?></td>
        </tr>
        <tr>
          <td  style="text-align:left; font-size:12px;color:#333; padding:30px 0px 0px;font-weight:100;"><?php if(isset($_SESSION['barcodeimage']) && $_SESSION['barcodeimage']!=''){ ?>
            <img src="<?php echo $url; ?>uploads/Legacy/Product/Barcode/<?php echo $barcodeimage; ?>"  alt="" width="126" height="62" />
            <?php }else{ ?>
            <img src="<?php echo $url; ?><?php echo $barcodeimage; ?>"  alt="" width="126" height="62" />
            <?php } ?></td>
        </tr>
      </table>
    </th>
  </tr>
</table>
<table  style="margin-top:42px; border-top:8px solid #000;" width="190mm" align="center" cellpadding="0" cellspacing="0" >
  <tr>

    <td  style="width: 100mm; height: 3mm; text-align:left; font-size:12px; font-weight:100;color:#000;"><p style="margin-left:-1.5mm; padding:0;">3 Security Drive,&nbsp;Suite 301  &nbsp;<img src="./pdf/boder_footer2.jpg"   alt=""/> &nbsp;Cranbury NJ 08512<br />
        800.521.4190 &nbsp;&nbsp; <img src="./pdf/boder_footer2.jpg"    alt=""/>&nbsp; 
        
        legacyconverting.com</p></td>
    <td  style="width: 90mm; height: 3mm; text-align:right;"><img src="./pdf/legacy.jpg" style="margin-top:15px; margin-right:-1mm;" align="right"  alt=""/> <img src="./pdf/boder_footer.jpg"   align="right"  alt=""/>&nbsp; &nbsp; &nbsp;</td>
  </tr>
</table>