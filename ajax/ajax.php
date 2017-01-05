<?php 
include '../includes/common.php';

if(isset($_REQUEST['mode'])&&$_REQUEST['mode']=='addtocompare'){	
	$prodObj = new ProductClass();
	$rs = $prodObj -> AddtoCompare($_REQUEST['productId']);	
	echo $rs;
}
?>