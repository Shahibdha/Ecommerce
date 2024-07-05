<?php
session_start();
$tot=0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Order</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
        body{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    
    /* CSS for sidebar */
    .sidebar {
      height: 120%;
      min-height: 100vh;
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
        position: relative;}
    h2 {
        color: #333;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
    }
    th, td {
        padding: 10px;
        vertical-align: middle;
        text-align: center;
    }
    
    .btn-back {
        margin-top: 20px;
    }
    .top-right {
        position: absolute;
        top: 105px;
        right: 20px;
    }
    .address-info p {
        margin-bottom: 5px;
    }
    
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bgblueright">
    <div class="container-fluid">
      
      
      <!-- Navbar brand -->
      <a class="navbar-brand tw d-flex align-items-center hover" href="#">
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
                <h2 class="text-center"><i class="fas fa-file-invoice"></i> Order Details</h2>
                <div class="top-right">
                    <div class="mb-3 address-info">
                        <h5>Address Information</h5>
                        <?php
                        include_once "./connect/config.php";
                        $query = "SELECT * FROM orders where `oid`='".$_GET['id']."'"; 
						  
							          $result = mysqli_query($conn, $query);
							      
								        $row=mysqli_fetch_assoc($result);
                        ?>
                        <p><i class="fas fa-map-marker-alt"></i> Address: <?php echo $row['address'];?></p>
                    </div>
                    <div class="mb-3">
                        <h5>Status</h5>
                        <p><?php echo $row['stts'];?></p>
                    </div>
                </div>
                <hr>
                <div class="mb-3">
                    <h5>Customer Information</h5>
                    <p><i class="fas fa-user"></i> Customer Name: <?php echo $row['name'];?></p>
                    <p><i class="fas fa-envelope"></i> Email: <?php echo $row['email'];?></p>
                    <p><i class="fas fa-phone"></i> TP: <?php echo $row['tel'];?></p>
                </div>
                <table class="table table-active mt-5">
                    <thead class="table-dark">
                        <tr>
                            <th>Item</th>
                            <th>Item Name</th>
                            <th>Unit Price</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
						  	

							  $query = "SELECT * FROM orderItems where `oid`='".$_GET['id']."'"; 
						  
							  $result = mysqli_query($conn, $query);
							  if (mysqli_num_rows($result)>0) {
								while($row=mysqli_fetch_assoc($result)) {
								  ?>
                        <tr>
                            <td><?php echo $row['product_id'];?></td>
                            <td><?php echo $row['Pname'];?></td>
                            <td><?php echo $row['total_price'];?></td>
                            <?php $tot=$tot+$row['total_price']; ?>
                        </tr>
                        <?php
                      }
                    }
                    ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="text-right"><strong>Total</strong></td>
                            <td ><strong>Rs.<?php echo $tot;?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <a href="./ManageOrder.php" class="btn btnblue hover"><i class="fas fa-arrow-left"></i> Back</a>
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
