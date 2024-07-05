<?php

session_start();

if($_SESSION["type"]=="user")
{
	header('Location:../../home.php');
}

require_once '../../config.php';

$sql = "SELECT * FROM `review` ORDER BY `time` DESC";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($con));
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FEEDBACK MANAGEMENT</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <style> 
  body{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
    .content {
      min-height: 100vh;
      margin-left: 250px; 
      padding: 20px;
      background-size: cover;
      background-position: center;
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
    table{
      background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
    }
    
  </style>
</head>
<body>
  
<?php
require_once '../../SideBar.php';
?> 

  <!-- Page content -->
  <div class="content">
    <h2 class="text-center">Feedback Management</h2>
    <table class="table table-striped ">
      <thead class="table-dark">
        <tr>
        <th>Name</th>
        <th>Rating</th>
        <th>Time</th>
        <th>Comment</th>
        <th>Actions</th>
        </tr>
      </thead>
      <tbody>
           <?php
           if (mysqli_num_rows($result) > 0) {
               while ($row = mysqli_fetch_assoc($result)) {
                   echo '
                   <tr>
                       <td>' . $row['name'] . '</td>
                       <td>' . generateStarRating($row['rating']) . '</td>
                       <td>' . date("Y-m-d", strtotime($row['time'])) . '</td>
                       <td class="comment-column" title="' . $row['comment'] . '">' . $row['comment'] . '</td>
                       <td><a href="../handler/deletereview.php?dltid=' . $row['id'] . '" class="delete-button"><i class="fas fa-trash-alt" style="color: black; font-size: 15px;"></i></a></td>
                       </tr>';
               }
           }
           ?>
           <br>
          <a href="reportfeedback.php" class="btn btn-primary">Export as Excel</a> <br><br>
       </tbody>

    </table>
  </div>
  
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

<?php
// Function to generate star rating HTML
function generateStarRating($rating)
{
    $output = '<div class="star-rating">';
    for ($i = 1; $i <= 5; $i++) {
        $output .= '<i class="bx ' . ($i <= $rating ? 'bxs-star text-warning' : 'bxs-star') . '"></i>';
    }
    $output .= '</div>';
    return $output;
}
?>