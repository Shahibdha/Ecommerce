<?php
session_start();

// Check if ProductID is provided in the URL
if(isset($_GET['id'])) {
    $empID = $_GET["id"];

    require_once '../../config.php';

    //Sql Query using prepared statement
    $sql = "DELETE FROM `employee` WHERE `employee`.`EmpID` = ?";

    //Prepare the statement
    $stmt = mysqli_prepare($con, $sql);

    //Bind parameters
    mysqli_stmt_bind_param($stmt, "s", $empID);

    //Execute the query against the database
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../admin/Employee.php');
    } else {
        echo "Error: " . mysqli_error($con);
    }

    //Close statement
    mysqli_stmt_close($stmt);

    //Close connection
    mysqli_close($con);
}
?>
