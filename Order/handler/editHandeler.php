
<?php
session_start();

if(isset($_POST["btnSub"]))
{
    $tel = $_POST["txtTel"];
    $address = $_POST["txtAddress"];
    $status = $_POST["status"];
    $oid=$_SESSION["oeid"];

    include_once "../connect/config.php";
   
    $sql = "UPDATE orders SET address='$address', stts='$status', tel='$tel' WHERE oid='$oid'";

    mysqli_query($conn, $sql);
    header('location: ../ManageOrder.php');
}
?>