<?php
$size = 'N/A';
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
?>
<style>
td
{
	font-family:Arial, Helvetica, sans-serif;
	padding:5px;
}
</style>

  <table align="right">
    	<tr>
        	<td style="width: 200mm; height: 3mm; text-align:right; font-size:19px; font-weight:900;color:#fff; background:#e33238;">Generation Ahead...</td>
        </tr>
   </table>
     <br>
   <table align="center" cellpadding="0" cellspacing="0">
    	 
    	<tr>
			<td><img src="./pdf/header_address.png"   alt=""/></td>
            <td ><img src="./pdf/logo.jpg" alt=""></td>
    	</tr>
    	
    </table>
     <br>
     <table align="center" style=" border-bottom: 1px solid #ccc;border-top: 1px solid #ccc;">
    	<tr>
        	<td style="width: 200mm; text-align:center; font-size:15px; font-weight:bold; color:#333;"><?php echo $message_head;?></td>
         
        </tr>
        <tr>
        	<td style="width: 200mm;text-align:center; font-size:15px;color:#333;"><?php echo $msgline1;?><br>
           <?php echo $msgline2;?>
            </td>
         
        </tr>
   </table>
   
    <br>
      <table align="left" style=" border-bottom: 1px solid #ccc;">
    	<tr>
        	<td style="width: 200mm; text-align:left; font-size:19px; font-weight:bold; color:#e33238;"> <?php echo $_SESSION['pname'];?></td>
         
        </tr>
        <tr>
        <td style="width: 200mm;text-align:left; font-size:14px;color:#333;"><?php echo $_SESSION['pdesc'];?></td>
         
        </tr>
   </table>
   
    <br>
       <table  align="left">
  <tr>
    <th scope="col">
    <table >
      <tr>
      <td>
      <?php if(isset($_SESSION['product_image']) && $_SESSION['product_image']!=''){ ?>
      	<img src="<?php echo $url; ?>uploads/Legacy/Product/<?php echo $product_image; ?>" width="350" height="200"  alt=""/>
      <?php }else{ ?>
      	<img src="<?php echo $url; ?><?php echo $product_image; ?>" width="350" height="200"  alt=""/>
      <?php }?>
      </td>
     </tr>
        <tr>
      <td style="text-align:left; font-size:12px;color:#333; width:100mm;"><p>Features & Benefits</p>
      
	  <p style="color: #333;margin: 0 0 0 2px;font-size:12px; font-weight:100;"><?php echo $_SESSION['pfeatures'];?></p>
      
	</td>
     </tr>
   </table>
    
    </th>
        <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
         <th scope="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th> 
         
    <th scope="col">
<table >
   <tr bgcolor="#666">
        	<td style="text-align:left; font-size:16px;color:#fff;border-bottom: 2px solid #ccc;font-weight:100;">Product Specifications</td>
            </tr>
             <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Wiper sheet size: <?php echo $size;?></td>
            </tr>
             <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Item per Each :<?php echo $items_per_each;?></td>
            </tr>
            <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Each per Ship Unit :<?php echo $each_per_ship_unit;?></td>
            </tr>
            <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Each Dimension :<?php echo $each_dimension;?></td>
            </tr>
            <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Case Total Pcs :<?php echo $case_total_pcs;?></td>
            </tr>
              <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Case Dimension :<?php echo $case_dimension;?></td>
            </tr>
              <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Case Weight :<?php echo $case_weight;?></td>
            </tr>
              <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Pallet Unit Quantity :<?php echo $pallet_unit_quantity;?></td>
            </tr>
            <tr bgcolor="#EAEAEA">
        	<td style="text-align:left; font-size:14px;color:#333;border-bottom: 2px solid #ccc;font-weight:100;">Pallet Dimensions :<?php echo $pallet_dimensions;?></td>
            </tr>
</table>
    
    </th>
  </tr>
</table>

    <br>
      <table align="left" style=" border-top: 1px solid #ccc;">
    	
        <tr>
        <td style="width: 200mm;text-align:left; font-size:14px;color:#333;">
        Distributed by:  <br><br>
		<b><?php echo $company;?></b>  <br /><br />
        <?php echo $infoline1;?>  <br /><br />
		<?php echo $infoline2;?>  <br /><br />
        </td>
         
        </tr>
   </table>
