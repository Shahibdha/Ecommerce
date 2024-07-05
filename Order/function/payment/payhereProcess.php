<?php
session_start();


$needID="oid";
$tbl="orders";
include_once "../../connect/config.php";

include ('../genarateID.php');


 $sql="SELECT * FROM `customer` where cid='".$_SESSION["userName"]."'";
$result=mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);

$amount=$_SESSION["amount"];
$merchant_id=1225371;
$order_id="OID".$genID;
$_SESSION["sesOID"]=$order_id;
$currency ="LKR";
$merchant_secret="ODY3MjQ2NjIxNDI4MDQ5MjE4ODMyODY4NDYyNDk0MTUwMTkyMzU2";
$address=$row["cAddress"];
$name=$row["cName"];
$email = $row["cEmail"];
$phone= $row["cNumber"];

$hash = strtoupper(
    md5(
        $merchant_id . 
        $order_id . 
        number_format($amount, 2, '.', '') . 
        $currency .
        strtoupper(md5($merchant_secret)) 
    ) 
);

$array=[];
$array['merchant_id'] = $merchant_id;
$array['order_id'] = $order_id;
$array['amount'] = $amount;
$array['currency'] = $currency;

$array['address'] = $address;
$array['name'] = $name;
$array['email'] = $email;
$array['phone'] = $phone;

$array['hash'] = $hash;

$jsonObj = json_encode($array);

echo $jsonObj;
?>