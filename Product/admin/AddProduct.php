<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/Form.css">
    <style>
        .box {
            margin-top: 20px;
        }
    </style>
    <script>
        function validateForm() {
            var name = document.forms["productForm"]["txtName"].value;
            var description = document.forms["productForm"]["txtDescript"].value;
            var price = document.forms["productForm"]["txtPrice"].value;
            var quantity = document.forms["productForm"]["txtQuantity"].value;
            var imageFile = document.forms["productForm"]["imageFile"].value;
            var category = document.forms["productForm"]["lstCategory"].value;

            if (name == "" || description == "" || price == "" || quantity == "" || imageFile == "" || category == "") {
                alert("All fields must be filled out");
                return false;
            }

            if (price <= 0) {
                alert("Price must be a positive number");
                return false;
            }

            if (quantity <= 0) {
                alert("Quantity must be a positive number");
                return false;
            }

            var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
            if ($.inArray(imageFile.split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Only image files (jpeg, jpg, png, gif) are allowed");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<?php
require_once '../../SideBar.php';
?> 
    <div class="box">
    <form name="productForm" action="AddProduct.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <h3>Add Product</h3>
          <input type="text" class="field" name="txtName" placeholder="Product Name" required>
          <input type="text" class="field" name="txtDescript" placeholder="Description" required>
          <input type="number" class="field" name="txtPrice" placeholder="Price of Product" required>
          <input type="number" class="field" name="txtQuantity" placeholder="Quantity" required>
          <input type="file" class="field" name="imageFile" placeholder="Upload a Picture" required>
          <h4>Category</h4>  
          <select name="lstCategory" class="field">
            <option value="Wall Paint">Wall Paint</option>
            <option value="Stationary">Stationary</option>
            <option value="Poster Colors">Poster Colors</option>
            <option value="other">Other</option>
          </select><br>
          <label for="chkPublish" class="field">Publish the Product: 
            <input type="checkbox" name="chkPublish">
          </label><br>
        
        <p>
          <input class="btn" type="submit" name="btnSubmit" value="Add Product"/>
          <a class="btn" href="ProductsS.php">Back to Products</a>
        </p>

        <?php
	
	if (isset($_POST["btnSubmit"]))
	{
		$productname = $_POST["txtName"];
        $productDes = $_POST["txtDescript"];
		$price = $_POST["txtPrice"];
        $quantity = $_POST["txtQuantity"];
		$category = $_POST["lstCategory"];
		
		if(isset($_POST["chkPublish"]))
		{
			$status = 1;
		}
		else 
		{
			$status = 0;
		}
		
		$image = "../../Uploads/".basename($_FILES["imageFile"]["name"]);
		move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
	
	
        require_once '../../config.php';

      // Fetch the latest ProductID from the database
    $result = mysqli_query($con, "SELECT MAX(ProductID) as max_id FROM products");
    $row = mysqli_fetch_assoc($result);
    $latest_product_id = $row['max_id'];

    // Extract the numeric part from the ProductID
$numeric_part = substr($latest_product_id, 1); 
// Exclude the "P" prefix

// Convert the numeric part to an integer and add 1000 to it
$new_numeric_part = intval($numeric_part) + 1;

// Concatenate "P" with the incremented numeric part to generate the next ProductID

    
    // Check if there are any products in the database
    if ($latest_product_id == null) {
        // If no products added yet, set the ProductID to "P1000"
        $next_product_id = "P1000";
    } else {
        // Increment the latest ProductID by 1000 and prepend "P"
        $next_product_id = "P" . $new_numeric_part;
    }

	$sql = " INSERT INTO `products` (`ProductID`, `Pname`, `Description`, 
  `Price`, `Quantity`, `Image`, `Category`) 
  VALUES ('".$next_product_id."', '".$productname."', '".$productDes."', '".$price."', '".$quantity."', '".$image."', '".$category."');" ;
	
	if (mysqli_query($con,$sql))
	{
		echo "Product is uploaded successfully";
	}
	else
	{
		echo "Oops something went wrong" ;
	}
	
}
	?>
        </form>
    </div>
</body>
</html>