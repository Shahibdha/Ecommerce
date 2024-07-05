<?php
session_start();

if (isset($_POST["btnSubmit"])) {
    // Read the values user has given and assign them to the variables
    $empName = $_POST["txtTitle"];
    $position = $_POST["lstCategory"];
    $email = $_POST["txtEmail"];
    $pNumber = $_POST["txtPNumber"];
    $salary = $_POST["txtSalary"];
    $empID = $_GET["id"];

    if (!file_exists($_FILES['imageFile']['tmp_name']) || !is_uploaded_file($_FILES['imageFile']['tmp_name'])) {
        $image = $_SESSION["Image"];
    } else {
        $image = "../../Uploads/" . basename($_FILES["imageFile"]["name"]);
        move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
    }

    require_once '../../config.php';

    // Use prepared statement to avoid SQL syntax errors and handle escaping
    $sql = "UPDATE `employee` SET `Ename` = ?, `Position` = ?, `Email` = ?, `Phone Number` = ?, `Salary` = ?, `Image` = ? WHERE `employee`.`EmpID` = ?;";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "sssidss", $empName, $position, $email, $pNumber, $salary, $image, $empID);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../admin/Employee.php');
    } else {
        die("Error updating product: " . mysqli_error($con));
    }

    // Close the prepared statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
