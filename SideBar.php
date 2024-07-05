<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
     /* CSS for sidebar */
     .sidebar {
      height: 120%;
      width: 250px;
      position: absolute;
      transition: all 0.3s ease;
      overflow: hidden;
    }
    .bgblue{
        /* background-color: #003B73; */
      /* background-color: #0074B7; */
      /* background-color: #2b2b2b; */
      /* background-color: #000c66; */
      background: linear-gradient(to bottom,#000c66,black);
    }

    .bgblueright{
      background: linear-gradient(to right,#000c66,black);
    }

    nav{
      position: fixed;
      z-index: 1;
    }
    
    .sidebar a {
      padding: 10px 15px;
      text-decoration: none;
      display: block;
      color: white;
    }
    .sidebar a:hover ,
    .sidevar .active {
      background-color: #0074B7;

    }
    
    /* .content {
      min-height: 100vh;
      margin-left: 250px; 
      padding: 20px;
      background-image: url('./img/bbg.jpeg');  
      background-size: cover;
      background-position: center;
    } */

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
</style>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bgblueright">
    <div class="container-fluid">
      
      
      <!-- Navbar brand -->
      <a class="navbar-brand tw d-flex align-items-center hover" href="#">
        <img src="../../uploads/logo.jpeg" alt="Logo" width="30" height="30" class="d-inline-block align-top me-3 text-white"><span class="tw">ELES EMES</span>
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
  <a href="../../customer/admin/ManageUser.php" class="<?php if($current_page == 'ManageUser.php') echo 'active'; ?>"><i class="fas fa-user me-3"></i>Manage User</a>
    <a href="../../product/admin/ProductsS.php" class="<?php if($current_page == 'ProductsS.php') echo 'active'; ?>"><i class="fas fa-shopping-cart me-3"></i>Manage Product</a>
    <a href="../../order/ManageOrder.php" class="<?php if($current_page == 'ManageOrder.php') echo 'active'; ?>"><i class="fas fa-gift me-3"></i> Manage Order</a>
    <a href="../../feedback/admin/Feedback.php" class="<?php if($current_page == 'Feedback.php') echo 'active'; ?>"><i class="fas fa-comments me-3"></i> Manage Feedback</a>
    <a href="../../employee/admin/Employee.php" class="<?php if($current_page == 'Employee.php') echo 'active'; ?>"><i class="fas fa-briefcase me-3"></i> Manage Employee</a>
    <a href="../../customer/customer/logout.php"><i class="fas fa-sign-out me-3"></i> Log Out</a>
  </div>
</body>
</html>