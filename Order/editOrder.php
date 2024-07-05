<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
        body{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    
    /* CSS for sidebar */
    .pf{
      position: fixed;
    }
    .sidebar {
      height: 120%;
      width: 250px;
      position: absolute;
      transition: all 0.3s ease;
    }
    .bgblue{
       
      background: linear-gradient(to bottom, #000c66, black);
    }

    .bgblueright{
       
      background: linear-gradient(to right, #000c66, black);
    }
    .btnblue{
        background: linear-gradient(to right, #000c66, black);
        color:#ffffff;
    }

    
    .sidebar a {
      padding: 10px 15px;
      text-decoration: none;
      display: block;
      color: white;
    }
    .sidebar a:hover {
      
      background-color: #0074B7;
     
    }
    
    .content {
      min-height: 100vh;
      margin-left: 250px; 
      padding: 20px; 
      background-size: cover;
      background-position: center;
    }
    

    .search-bar {
      border-radius: 20px;
    }
    .search-bar input[type="text"] {
      border: none;
      border-radius: 20px;
      padding-left: 35px;
    }
    .search-bar input[type="text"]::placeholder {
      font-style: italic;
    }
    .search-icon {
      position: relative;
      top: 7px;
      left: 30px;
    }
    .tw{
        color:white;
    }
    .hover:hover{
        color:#0074B7;
    }
    .blue-table {
      background-color: rgba(0, 12, 102, 0.8);
      color: #fff;
    }

    /* view order only */
      
    .container {
        background-color:rgba(255, 255, 255, 0.8);
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        
    }
    h2 {
        color: #333;
        margin-bottom: 20px;
        border-bottom: 1px solid #3a3a3a; 
        padding-bottom: 10px; 
    }
    
    
    
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bgblueright">
    <div class="container-fluid">
      
      
      <!-- Navbar brand -->
      <a class="navbar-brand tw d-flex align-items-center hover " href="#">
        <img src="./img/logo.jpeg" alt="Logo" width="30" height="30" class="d-inline-block align-top me-3"><span class="">ELES EMES</span>
      </a>
      <form class="d-flex search-bar">
        <div class="search-icon">
          <i class="fas fa-search"></i>
        </div>
        <input class="form-control me-2" type="text" id="searchInput" placeholder="Search" aria-label="Search">
      </form>
    </div>
  </nav>

  <!-- Sidebar -->
  <div class="sidebar bgblue">
  <a href="../customer/admin/ManageUser.php"><i class="fas fa-user me-3"></i>Mange User</a>
    <a href="../product/admin/ProductsS.php"><i class="fas fa-shopping-cart me-3"></i>Mange Product</a>
    <a href="../order/ManageOrder.php"><i class="fas fa-gift me-3"></i> Mange Order</a>
    <a href="../feedback/admin/Feedback.php"><i class="fas fa-comments me-3"></i> Mange Feedback</a>
    <a href="../employee/admin/Employee.php"><i class="fas fa-briefcase me-3"></i> Mange Employee</a>
    <a href="../customer/customer/logout.php"><i class="fas fa-sign-out me-3"></i> Log Out</a>
  </div>

  <!-- Page content -->
  <div class="content">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center"><i class="fas fa-edit"></i> Edit Order</h2></hr>
                <form action="./handler/editHandeler.php" method="post">
                    <div class="form-group">
                      <?php
		
	$_SESSION["oeid"]=$_GET["id"];
  include_once './connect/config.php';


		$sql="SELECT * FROM orders WHERE `oid`='".$_GET["id"]."'";


	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($result);
	
	
	?>
                        <label for="customerName">Contact Number:</label>
                        <input type="text" class="form-control" id="customerName" placeholder="0777xxxxxxx" value="0777123456" name="txtTel">
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter address" name="txtAddress" value="<?php echo $row["address"]?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option <?php if ($row["stts"] == "Pending") {echo "selected";} ?>>Pending</option>
                            <option <?php if ($row["stts"] == "Processing") {echo "selected";} ?>>Processing</option>
                            <option <?php if ($row["stts"] == "Shipped") {echo "selected";} ?>>Shipped</option>
                        </select>
                    </div>
                    <button type="submit" name="btnSub" class="mt-3 btn btnblue btn-save hover"><i class="fas fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
  </div>

  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
  
  <script>
   $(document).ready(function(){
      $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableBody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
      
    });
    </script>
</body>
</html>
