<?php
session_start();

if (isset($_POST["btnSubmit"])) {
    // Read the values user has given and assign them to the variables
    $productname = $_POST["txtTitle"];
    $description = $_POST["txtDescription"];
    $price = $_POST["txtPrice"];
    $quantity = $_POST["txtQuantity"];
    $category = $_POST["lstCategory"];
    $productID = $_GET["id"];

    if (!file_exists($_FILES['imageFile']['tmp_name']) || !is_uploaded_file($_FILES['imageFile']['tmp_name'])) {
        $image = $_SESSION["Image"];
    } else {
        $image = "../../Uploads/" . basename($_FILES["imageFile"]["name"]);
        move_uploaded_file($_FILES["imageFile"]["tmp_name"], $image);
    }

    require_once '../../config.php';

    // Use prepared statement to avoid SQL syntax errors and handle escaping
    $sql = "UPDATE `products` SET `Pname` = ?, `Description` = ?, `Price` = ?, `Quantity` = ?, `Image` = ?, `Category` = ? WHERE `products`.`ProductID` = ?;";
    $stmt = mysqli_prepare($con, $sql);

    // Bind parameters to the prepared statement
    mysqli_stmt_bind_param($stmt, "ssdisss", $productname, $description, $price, $quantity, $image, $category, $productID);

    // Execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        header('Location: ../admin/ProductsS.php');
    } else {
        die("Error updating product: " . mysqli_error($con));
    }

    // Close the prepared statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
