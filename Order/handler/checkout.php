<?php
session_start();
require_once '../../config.php';

$json = file_get_contents('php://input');
$cartItems = json_decode($json, true);

if (!empty($cartItems)) {
    $stmt = $con->prepare("INSERT INTO orderItems (product_id, Pname, total_price, oid) VALUES (?, ?, ?, ?)");

    foreach ($cartItems as $item) {
        $productId = $item['id']; 
        $pname = $item['name']; 
        $prodPrice = $item['price'];
        $totalPrice = (float) preg_replace('/[^0-9.]/', '', $prodPrice);

        $stmt->bind_param("ssds", $productId, $pname, $totalPrice, $_SESSION["sesOID"]);
        $stmt->execute();  
    }

    $stmt->close();
}

$sql = "SELECT * FROM `customer` WHERE cid=?";
$stmtCustomer = $con->prepare($sql);
$stmtCustomer->bind_param("s", $_SESSION["userName"]);
$stmtCustomer->execute();
$result = $stmtCustomer->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $address = $row["cAddress"];
    $name = $row["cName"];
    $email = $row["cEmail"];
    $phone = $row["cNumber"];

    $stmtOrder = $con->prepare("INSERT INTO orders (`oid`, `name`, `address`, `stts`, `email`, `tel`) VALUES (?, ?, ?, ?, ?, ?)");
    $status = "Pending";
    $stmtOrder->bind_param("ssssss", $_SESSION["sesOID"], $name, $address, $status, $email, $phone);
    $stmtOrder->execute();  

    $stmtOrder->close();
}

$stmtCustomer->close();
$con->close();
?>
