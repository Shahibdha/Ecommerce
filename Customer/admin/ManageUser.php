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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage User</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    body{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    table{
      background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
    }
    
    .sidebar {
      height: 100%;
      width: 250px;
      position: fixed;
      top:55px; 
      left: 0; 
      z-index: 1000;
      transition: all 0.3s ease;
      overflow-y: auto;
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
      min-height: 100vh;
      margin-left: 250px; 
      padding: 20px;
      overflow-y: auto;
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
    
  </style>
</head>
<body>

  <?php
require_once '../../SideBar.php';
?> 

  <!-- Page content -->
  <div class="content">
    <h2 class="text-center">User Management</h2>
    <a href="generate_report.php" class="btn btn-primary">Generate Customer Report</a>
    <table class="table  table-striped">
      <thead class="table-dark" >
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>E-mail</th>
          <th>user Type</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="tableBody">
      <?php

require_once '../../config.php';

// Fetching customer details from the database
$sql = "SELECT * FROM customer";
$result = $con->query($sql);

// Check if the query executed successfully
if ($result) {
    // Check if there are rows returned
    if ($result->num_rows > 0) {
        // Display customer details in table rows
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["cName"] . "</td>";
            echo "<td>" . $row["cNumber"] . "</td>";
            echo "<td>" . $row["cEmail"] . "</td>";
            echo "<td>";
            echo "<select class='user-type-select'>";
            echo "<option value='user' " . ($row['type'] == 'user' ? 'selected' : '') . ">User</option>";
            echo "<option value='admin' " . ($row['type'] == 'admin' ? 'selected' : '') . ">Admin</option>";
            echo "</select>";
            echo "</td>";
            echo "<td><a href='#' class='delete-btn' data-cid='" . $row["cid"] . "'><i class='fas fa-trash-alt'></i></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No customers found</td></tr>";
    }
} else {
    echo "Error: " . $con->error;
}

// Closing the database connection
$con->close();
?>


      </tbody>
    </table>
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

    $(document).ready(function() {
      $(".delete-btn").click(function(e) {
          e.preventDefault();
          var cid = $(this).data("cid");

          // Make an AJAX request to deleteCustomer.php
          $.ajax({
              url: 'deleteCustomer.php',
              type: 'POST',
              data: { cid: cid },
              success: function(response) {
                  alert(response); // Show the response message
                  location.reload(); // Refresh the page
              },
              error: function(xhr, status, error) {
                  console.error(xhr.responseText);
              }
          });
      });
      // Event listener for change event of user-type-select dropdown
    $(".user-type-select").change(function() {
      var cid = $(this).closest("tr").find(".delete-btn").data("cid"); // Get customer ID
      var userType = $(this).val(); // Get selected user type

      // Make AJAX request to update user type in the database
      $.ajax({
        url: 'updateUserType.php', // PHP script to handle the update
        type: 'POST',
        data: { cid: cid, userType: userType }, // Send customer ID and user type
        success: function(response) {
          alert(response); // Show the response message
          // Optionally, you can update the UI to reflect the change without reloading the page
        },
        error: function(xhr, status, error) {
          console.error(xhr.responseText);
        }
      });
    });
    });
  </script>

</body>
</html>
