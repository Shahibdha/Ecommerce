<?php
session_start();

if($_SESSION["type"]=="user")
{
	header('Location:../home.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ORDER MANGEMENT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    .content{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    
    .sidebar {
      height: 120%;
      min-height: 100vh;
      width: 250px;
      transition: all 0.3s ease;
      overflow: hidden;
    }
    .bgblue{
      background: linear-gradient(to bottom, #000c66, black);
    }

    .bgblueright{
       
      background: linear-gradient(to right, #000c66, black);
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
      margin-top: -100vh;
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
    tr td a{
        text-decoration: none;
        color :black;
    }
    tr td a:hover{
        color:#0074B7;
    }
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
    table{
      background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
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
    <a href="../customer/admin/ManageUser.php"><i class="fas fa-user me-3"></i>Mange User</a>
    <a href="../product/admin/ProductsS.php"><i class="fas fa-shopping-cart me-3"></i>Mange Product</a>
    <a href="../order/ManageOrder.php"><i class="fas fa-gift me-3"></i> Mange Order</a>
    <a href="../feedback/admin/Feedback.php"><i class="fas fa-comments me-3"></i> Mange Feedback</a>
    <a href="../employee/admin/Employee.php"><i class="fas fa-briefcase me-3"></i> Mange Employee</a>
    <a href="../customer/customer/logout.php"><i class="fas fa-sign-out me-3"></i> Log Out</a>
  </div>

  <!-- Page content -->
  <div class="content">
    <div class="container">
    <h2 class="text-center">Order Management</h2>
    <button class="btn btn-primary mb-3" id="exportPDF" onclick="exportTableToExcel()">Export as Excel</button>
    <table class="table table-active" id="myTable">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Address</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="tableBody">
      <?php
						  	include_once "./connect/config.php";

							  $query = "SELECT * FROM orders"; 
						  
							  $result = mysqli_query($conn, $query);
							  if (mysqli_num_rows($result)>0) {
								while($row=mysqli_fetch_assoc($result)) {
								  ?>
        <tr>
          <td><?php echo $row['oid'];?></td>
          <td><?php echo $row['name'];?></td>
          
          <td><?php echo $row['address'];?></td>
          <td><?php echo $row['stts'];?></td>
          <td>
            <a href="./viewOrder.php?id=<?php echo $row['oid']; ?>"><i class="fas fa-eye me-1"></i></a>
            <a href="./handler/makeProsessHandler.php?id=<?php echo $row['oid']; ?>"><i class="fas fa-gift me-1"></i></a>
            <a href="./handler/makeShipedHandler.php?id=<?php echo $row['oid']; ?>"><i class="fas fa-truck me-1"></i></a>
            <a href="./editOrder.php?id=<?php echo $row['oid']; ?>"><i class="fas fa-edit me-1"></i></a>
            <a href="./handler/deleteOrder.php?id=<?php echo $row['oid']; ?>"><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        
          <?php
									}
								}
								?>
      </tbody>
    </table>
  </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

  <!-- Your custom JavaScript code -->
  <script src="./js/table2excel.js"></script>
  <script>
    $(document).ready(function() {
      $("#searchInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tableBody tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
      
    });

   

    function exportTableToExcel() {
   
    var table = document.querySelector("#myTable");

    var rows = table.rows;
    
    for (var i = 0; i < rows.length; i++) {
        var cells = rows[i].cells;
        
        cells[cells.length - 1].remove();
    }

    var table2excel = new Table2Excel();
    table2excel.export(table);

    location.reload();
}







  </script>
</body>
</html>