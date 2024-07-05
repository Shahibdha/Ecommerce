<?php 
require_once '../../config.php';

if(isset($_GET['dltid'])){
    $id = $_GET['dltid'];

    // Display confirmation dialog using JavaScript
    echo "<script>
            var confirmDelete = confirm('Are you sure you want to delete this review?');
            if(confirmDelete){
                window.location.href = 'deletereview.php?confirmed=true&dltid=$id';
            } else {
                window.location.href = 'table.php';
            }
          </script>";
}

if(isset($_GET['confirmed']) && $_GET['confirmed'] == 'true'){
    $id = $_GET['dltid'];

    $sql = "DELETE FROM `review` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if($result){
        header('location:../admin/Feedback.php');
    } else{
        die(mysqli_error($con));
    }
}
?>
