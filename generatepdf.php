<?php
include("includes/common.php");
$productObj = new ProductClass();
$indObj = new IndustriesClass();
$pid = '';
$company = '';
$message_head = '';
$msgline1 = '';
$msgline2 = '';
$infoline1 = '';
$infoline2 = '';
if(isset($_REQUEST['pid']) && $_REQUEST['pid']!='')
{
	$pid = $_REQUEST['pid'];
}

if(isset($_REQUEST['company']) && $_REQUEST['company']!='')
{
	$company = $_REQUEST['company'];
}
if(isset($_REQUEST['message_head']) && $_REQUEST['message_head']!='')
{
	$message_head = $_REQUEST['message_head'];
}
if(isset($_REQUEST['msgline1']) && $_REQUEST['msgline1']!='')
{
	$msgline1 = $_REQUEST['msgline1'];
}
if(isset($_REQUEST['msgline2']) && $_REQUEST['msgline2']!='')
{
	$msgline2 = $_REQUEST['msgline2'];
}
if(isset($_REQUEST['infoline1']) && $_REQUEST['infoline1']!='')
{
	$infoline1 = $_REQUEST['infoline1'];
}
if(isset($_REQUEST['infoline2']) && $_REQUEST['infoline2']!='')
{
	$infoline2 = $_REQUEST['infoline2'];
}
$productInfo = $productObj -> getProduct($pid);
session_destroy();
session_start();
$_SESSION['pname'] = $productInfo['pId'];
$_SESSION['pdesc'] = $productInfo['product_description'];
$_SESSION['pfeatures'] = $productInfo['features_benefits'];
$_SESSION['sheet_size'] = $productInfo['sheet_size'];
$_SESSION['items_per_each'] = $productInfo['items_per_each'];
$_SESSION['each_per_ship_unit'] = $productInfo['each_per_ship_unit'];
$_SESSION['each_dimension'] = $productInfo['each_dimension'];
$_SESSION['case_total_pcs'] = $productInfo['case_total_pcs'];
$_SESSION['case_dimension'] = $productInfo['case_dimension'];
$_SESSION['case_weight'] = $productInfo['case_weight'];
$_SESSION['pallet_unit_quantity'] = $productInfo['pallet_unit_quantity'];
$_SESSION['pallet_dimensions'] = $productInfo['pallet_dimensions'];
$_SESSION['product_image'] = $productInfo['product_image'];
$_SESSION['barcodeimage'] = $productInfo['barcodeimage'];

$industry = $productInfo['industry'];
$industry_array = explode(",",$industry);
$catIds = array();
foreach($industry_array as $row){	
		$catIds[] = $indObj->getParentId($row);
}
$_SESSION['industries'] = array_unique($catIds);
$_SESSION['url'] = SITEURL;
$_SESSION['company'] = $company;
$_SESSION['msgline1'] = $msgline1;
$_SESSION['msgline2'] = $msgline2;
$_SESSION['infoline1'] = $infoline1;
$_SESSION['infoline2'] = $infoline2;
$_SESSION['message_head'] = $message_head;
header('Location: '.SITEURL.'pdf/sellsheet/sellsheet.php');
?>