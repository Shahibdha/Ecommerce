<?php
// Establishing a database connection
$conn = mysqli_connect("localhost", "root", "", "elesemes");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the customer ID is provided
if (isset($_POST['cid'])) {
    $cid = $_POST['cid'];

    // Prepare and execute the SQL DELETE query
    $sql = "DELETE FROM customer WHERE cid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $cid);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        echo "Customer deleted successfully";
    } else {
        echo "Failed to delete customer";
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Customer ID not provided";
}
?>