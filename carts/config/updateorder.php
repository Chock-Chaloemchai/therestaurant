<?php
session_start();


$formid = isset($_SESSION['formid']) ? $_SESSION['formid'] : "";
if ($formid != $_POST['formid']) {
echo "E00001!! SESSION ERROR RETRY AGAINT.";
} else {
unset($_SESSION['formid']);
if ($_POST) {
require '../../config/connect.php';
$order_fullname = ($_POST['order_fullname']);
$report_id = ($_POST['report_id']);
$meSql = "INSERT INTO orders (order_date, cust_id,report_id) VALUES (NOW(),'{$order_fullname}', '{$report_id}' ) ";
$meQeury = $conn->query($meSql); 

if ($meQeury) {
$order_id = $conn->insert_id;
for ($i = 0; $i < count($_POST['qty']); $i++) {
$order_detail_quantity = ($_POST['qty'][$i]);
$order_detail_price = ($_POST['product_price'][$i]);
$product_id = ($_POST['product_id'][$i]);
$lineSql = "INSERT INTO order_details (order_detail_quantity, order_detail_price, product_id, order_id) ";
$lineSql .= "VALUES (";
$lineSql .= "'{$order_detail_quantity}',";
$lineSql .= "'{$order_detail_price}',";
$lineSql .= "'{$product_id}',";
$lineSql .= "'{$order_id}'";
$lineSql .= ") ";
$conn->query($lineSql);

$meSql2 ="UPDATE tbltable SET 
            status_id = '2'
            WHERE name = '$order_fullname'";
$meQeury2 = $conn->query($meSql2);
}

}
//*** Update Condition ***//
if($meQeury)
{
	for ($i = 0; $i < count($_POST['qty']); $i++) {
		$strSQL = "UPDATE products SET ";
		$strSQL .="qty = qty-'".$_POST['qty'][$i]."' ";
        $strSQL .="WHERE id = '".$_POST['product_id'][$i]."' ";
    $query = mysqli_query($conn,$strSQL);
  }
  
  /*for ($i = 0; $i < count($_POST['qty']); $i++) {
		$strSQL = "UPDATE tblusers SET ";
		$strSQL .="userscoin = userscoin-'".$_POST['product_price'][$i]."'*'".$_POST['qty'][$i]."' ";
        $strSQL .="WHERE id = '".$_POST['order_fullname']."' ";
    $query = mysqli_query($conn,$strSQL);

       

  }*/

       
  

unset($_SESSION['cart']);
unset($_SESSION['qty']);


header('location:../category?a=order');
}else{
header('location:../category?a=order');

}
}
}
?>

