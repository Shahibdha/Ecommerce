<?php
session_start();

if($_SESSION["type"]=="user")
{
	header('Location:../../home.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCT MANAGEMENT</title>
    <link rel="shortcut icon" href="/Images/Title.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/ProductsS.css">
</head>
<style>
    body{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    
.heading a
{
    
    /* padding: 12px 28px ;
    background: #000c66 ; 
    border-radius: 40px;
    border-color: rgb(4, 13, 65) ;
    box-shadow: 0 0 10px rgb(4, 13, 65);
    font-size: 16px;
    color: #fff;
    letter-spacing: 1px;
    text-decoration: none;
    font-weight: 600;*/
    margin-left: 50px; 
}

.product-container .box .content
{
    width: 250px;
    height: fit-content;
    text-align: center;
    margin-left: -25px;
}

.products{
    position: relative;
    margin-left: 250px;
    padding-top: 20px;
}
</style>
<body>
<?php
require_once '../../SideBar.php';
?> 

    <section class="products" id="products">
        <div class="heading">
            <h2>Our products </h2>
            <a href="reportProduct.php" class="btn btn-primary"> Generate Report </a>
            <a href="AddProduct.php" class="btn btn-success"> Add Product </a>
        </div>

        <div class="product-container">
        
        <?php
require_once '../../config.php';
//sql querry
$sql ="SELECT * FROM `products` ";

//Execute the querry against the database
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
	  	
?>           
         <div class="box">
            <img src="<?php echo $row["Image"]; ?>" alt="" >
            <div class="content">
                <h3><?php echo $row["Pname"]; ?></h3>
                <span>LKR <?php echo $row["Price"]; ?></span> <br>
                <a href="EditProducts.php?id=<?php echo $row["ProductID"]; ?>">Edit</a>
                <a href="../handler/DeleteProduct.php?id=<?php echo $row["ProductID"]; ?>">Delete</a>
            </div>
        </div>
 
    <?php
  }
}
	mysqli_close($con);//close the connection
?>

</div>

</div>
</section>
</body>
</html>