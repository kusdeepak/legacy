<?php
include '../includes/common.php';
$productObj = new ProductClass();
//print_r($_REQUEST);
$response = $productObj->sendRequestMail();
echo $response ;

?>


