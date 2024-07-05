<?php
require_once '../../config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM `review` WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Error fetching data: " . mysqli_error($con);
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

if (isset($_POST['submit'])) {
    if (isset($_GET['id'])) {
        $idnew = $_GET['id'];
    }

    $name = $_POST['name'];
    $comment =  $_POST["comment"];
    $image = basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);

    $sql = "UPDATE `review` SET `name`='$name', `comment`='$comment', `image`='$image' WHERE id = $idnew";

    $result = mysqli_query($con, $sql);

    if (!$result) {
        echo "Error updating data: " . mysqli_error($con);
    } else {
        header('location:review.php?');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Update review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="../css/review.css">

    <link rel="shortcut icon" href="../../uploads/logohome.jpeg" type="image/png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
  	<div class="modal-dialog" role="document">
    	<div class="modal-content" >
	      	<div class="modal-header">
	        	<h5 class="modal-title">Edit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
              <form method="POST" action="" enctype="multipart/form-data">
	      	<div class="modal-body">
	        	<div class="form-group">
	        		<input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name'] ?>" required/>
	        	</div>
	        	<div class="form-group">
                    <textarea name="comment" id="comment" class="form-control"><?php echo $row['comment'] ?></textarea>
	        	</div>
                <div class="form-group">
                <label for="image">Select an image:</label>
                    <input type="file" name="image" id="image" accept="image/*" class="overlay" id="overlay" <?php echo $row['image']?>>
                </div>
	        	<div class="form-group text-center mt-4">
	        		<button type="submit" class="btn btn-primary" id="save_review" name="submit">Submit</button>
	        	</div>
	      	</div>
            </form>
    	</div>
  	</div>
</body>
</html>
