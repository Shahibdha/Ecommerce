<?php
require_once 'config.php';

// Fetching customer details from the database
$sql = "SELECT cName, cNumber, cEmail, cAddress, pic FROM customer";
$result = $con->query($sql);

// Check if the query executed successfully
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Generate CSV header
        $csv_content = "Name,Phone,Email,Address,Picture\n";

        // Fetching each customer's details
        while ($row = $result->fetch_assoc()) {
            // Escape special characters in values
            $name = htmlspecialchars($row["cName"]);
            $phone = htmlspecialchars($row["cNumber"]);
            $email = htmlspecialchars($row["cEmail"]);
            $address = htmlspecialchars($row["cAddress"]);
            $pic = htmlspecialchars($row["pic"]);

            // Append customer details to CSV content
            $csv_content .= "$name,$phone,$email,$address,$pic\n";
        }

        // Close database connection
        $con->close();

        // Output CSV file
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="customer_report.csv"');
        echo $csv_content;
        exit;
    } else {
        echo "No customers found";
    }
} else {
    echo "Error: " . $conn->error;
}

// Closing the database connection
$con->close();
?>
