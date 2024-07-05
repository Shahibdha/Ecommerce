<?php
session_start();
if (!isset($_SESSION["userName"])) {
    header('Location: login.php');
    exit();
}

require_once '../../config.php';

$userName = $_SESSION["userName"];

// Prepare and execute query to delete user account
$sql_delete = "DELETE FROM customer WHERE cid = ?";
$stmt_delete = $con->prepare($sql_delete);
$stmt_delete->bind_param("s", $userName);

if ($stmt_delete->execute()) {
    // Account deleted successfully
    echo '<script>alert("Account deleted successfully");</script>';
    header('Location: login.php');
    exit();
} else {
    // Error occurred while deleting account
    echo '<script>alert("Error occurred while deleting account");</script>';
}

$stmt_delete->close();
$con->close();
?>
