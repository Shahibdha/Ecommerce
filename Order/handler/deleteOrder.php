<?php
echo $_GET['id'];
include_once "../connect/config.php";

$sql = "DELETE FROM orders WHERE oid ='".$_GET['id']."'";
$results=mysqli_query($conn,$sql);

if($results)
{
    header('location: ../manageOrder.php');
}
else{
    echo "Error";
    
}
?>