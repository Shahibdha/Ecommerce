<?php
// Establish a database connection
$conn = mysqli_connect("localhost", "root", "", "elesemes");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get customer ID and user type from the AJAX request
$cid = $_POST['cid'];
$userType = $_POST['userType'];

// Update the user type in the database
$sql = "UPDATE customer SET type = '$userType' WHERE cid = '$cid'";
if ($conn->query($sql) === TRUE) {
    echo "User type updated successfully";
} else {
    echo "Error updating user type: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
