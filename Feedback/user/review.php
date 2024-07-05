<?php
require_once '../../config.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $rating = $_POST["rate"];
    $comment =  $_POST["comment"];
    $timestamp = date("Y-m-d ");
    $image = basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $image);

    $sql = "INSERT INTO `review` (`name`, `rating`, `comment`, `image`) VALUES ('$name', '$rating', '$comment', '$image')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $message = "Review submitted successfully!";
    } else {
        $message = "Error: " . mysqli_error($con);
    }

    header("Location: review.php");
    exit();
}

    $sql = "SELECT * FROM `review` ORDER BY `time` DESC";
    $result = mysqli_query($con, $sql);
    $totalReviews = mysqli_num_rows($result);

    if (!$result) {
        die("Error in SQL query: " . mysqli_error($con));
    }

    $starCounts = array(1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0);

$count_5 = 0;
$count_4 = 0;
$count_3 = 0;
$count_2 = 0;
$count_1 = 0;

$ratingsQuery = "SELECT rating FROM review";
$ratingsResult = mysqli_query($con, $ratingsQuery);

while ($row = mysqli_fetch_assoc($ratingsResult)) {
    switch ($row['rating']) {
        case 5:
            $count_5++;
            break;
        case 4:
            $count_4++;
            break;
        case 3:
            $count_3++;
            break;
        case 2:
            $count_2++;
            break;
        case 1:
            $count_1++;
            break;
    }
}

$total_reviews = $count_5 + $count_4 + $count_3 + $count_2 + $count_1;
$weighted_sum = ($count_5 * 5) + ($count_4 * 4) + ($count_3 * 3) + ($count_2 * 2) + ($count_1 * 1);

$avg_rating = round($weighted_sum / $total_reviews);
// Calculate percentages for each rating
$percentage_5 = ($count_5 / $total_reviews) * 100;
$percentage_4 = ($count_4 / $total_reviews) * 100;
$percentage_3 = ($count_3 / $total_reviews) * 100;
$percentage_2 = ($count_2 / $total_reviews) * 100;
$percentage_1 = ($count_1 / $total_reviews) * 100;

    
mysqli_close($con);
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>review</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="../../uploads/logohome.jpeg" type="image/png">


    <link rel="stylesheet" href="../css/review.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
    require_once '../../header.php';
    ?>
    <div class="containers" style="max-width: 80%; margin: 0 auto;">
    	<h1 class="mt-5 mb-5"></h1>
    	<div class="card">
    		<div class="card-header">Sample Product</div>
    		<div class="card-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-4">
    						<b><span id="average_rating"><?php echo $avg_rating; ?> / 5</span> </b>
    					</h1>
    					<div class="mb-3">
                        <div class="mb-3">
                             <?php
                                for ($i = 1; $i <= 5; $i++) {
                                    $star_class = ($i <= $avg_rating) ? "fa fa-star" : "far fa-star";
                                    echo '<i class="' . $star_class . '"></i>';
                                }
                            ?>
                        </div>
                        </div>
                        <h3><span id="total_review"><?php echo $totalReviews; ?></span> Review(s)</h3>
    				</div>
    				<div class="col-sm-4">
    					<p>
                            <div class="progress-label-left"><b>5</b> <i class="bx bxs-star text-primary"></i></div>

                            <div class="progress-label-right">(<span id="total_five_star_review"><?php echo $count_5;?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0" id="five_star_progress" style="width: <?php echo $percentage_5; ?>%;"></div>
                            </div>
                        </p>
    					<p>
                            <div class="progress-label-left"><b>4</b> <i class="bx bxs-star text-primary"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_four_star_review"><?php echo $count_4; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress" style="width: <?php echo $percentage_4; ?>%;"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>3</b> <i class="bx bxs-star text-primary"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_three_star_review"><?php echo $count_3; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress" style="width: <?php echo $percentage_3; ?>%;"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>2</b> <i class="bx bxs-star text-primary"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_two_star_review"><?php echo $count_2; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress" style="width: <?php echo $percentage_2; ?>%;"></div>
                            </div>               
                        </p>
    					<p>
                            <div class="progress-label-left"><b>1</b> <i class="bx bxs-star text-primary"></i></div>
                            
                            <div class="progress-label-right">(<span id="total_one_star_review"><?php echo $count_1; ?></span>)</div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress" style="width: <?php echo $percentage_1; ?>%;"></div>
                            </div>               
                        </p>
    				</div>
    				<div class="col-sm-4 text-center">
    					<h3 class="mt-4 mb-3">Write Review Here</h3>
    					<button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="mt-5" id="review_content"></div>
    </div>
</body>
</html>

<div id="review_modal" class="modal" tabindex="-1" role="dialog">
  	<div class="modal-dialog" role="document">
    	<div class="modal-content" >
	      	<div class="modal-header">
	        	<h5 class="modal-title">Submit Review</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
              <form method="POST" action="" enctype="multipart/form-data">
	      	<div class="modal-body">
                <div class="star-widget">
                    <input type="radio" name="rate" id="rate-5" value="5" style="display: none;" required>
                    <label for="rate-5" class="bx bxs-star" style="font-size: 24px"></label>
                    <input type="radio" name="rate" id="rate-4" value="4" style="display: none;">
                    <label for="rate-4" class="bx bxs-star" style="font-size: 24px"></label>
                    <input type="radio" name="rate" id="rate-3" value="3" style="display: none;">
                    <label for="rate-3" class="bx bxs-star" style="font-size: 24px"></label>
                    <input type="radio" name="rate" id="rate-2" value="2" style="display: none;">
                    <label for="rate-2" class="bx bxs-star" style="font-size: 24px"></label>
                    <input type="radio" name="rate" id="rate-1" value="1" style="display: none;"> 
                    <label for="rate-1" class="bx bxs-star" style="font-size: 24px"></label>
                </div>
	        	<div class="form-group">
	        		<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required/>
	        	</div>
	        	<div class="form-group">
	        		<textarea name="comment" id="comment" class="form-control" placeholder="Type Review Here"></textarea>
	        	</div>
                <div class="form-group">
                <label for="image">Select an image:</label>
                    <input type="file" name="image" id="image" accept="image/*" class="overlay" id="overlay">
                </div>
	        	<div class="form-group text-center mt-4">
	        		<button type="submit" class="btn btn-primary" id="save_review" name="submit">Submit</button>
	        	</div>                             
	      	</div>
            </form>
    	</div>
        </div>
</div>

<!-- comments -->
<h2 class="heading">Customer <span>Reviews</span></h2>
<?php
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <section class="main">
        <div class="comment-box">
        <div class="profile">
            <div class="profile">
                <i class="bx bxs-user-circle" style="font-size: 40px;"></i>
            </div>
            <div class="name">
                <strong>' . $row['name'] . '</strong>
                ' . generateStarRating($row['rating']) . '
            </div>
        </div>

        <div class="timestamp">
            <small>' . date("Y-m-d", strtotime($row['time'])) . '</small>
        </div>

        <div class="comment">
            <p>' . $row['comment'] . '</p>
        </div>';

        if (!empty($row['image'])) {
            echo '
            <div class="profile-img">
            <img src="' . $row['image'] . '" onclick="previewImage(\'' . $row['image'] . '\')">
            </div>';
        }
        echo '

        <button class="update-button"style="background-color: lightblue; font-size: 12px; padding: 3px; position:absolute; bottom: 0; right: 0; margin:10px; border-radius: 05px; text-decoration: none;">
        <a href="updatereview.php?id=' . $row['id'] . '">Update</a></button>
        </div>
</section>';
    }
}
function generateStarRating($rating) {
    $output = '<div class="star-rating">';
    for ($i = 1; $i <= 5; $i++) {
        $output .= '<i class="bx ' . ($i <= $rating ? 'bxs-star text-primary' : 'bxs-star') . '"></i>';
    }
    $output .= '</div>';
    return $output;
}
?>              

<!-- image preview -->
<div class="image-preview" id="imagePreview">
  <img src="" alt="Preview Image" id="previewImage">
</div>


<!-- submit review -->
<script>
$(document).ready(function(){
    $('#add_review').click(function(){
        $('#review_modal').modal('show');
    });
});
</script>

<!-- <script>
updateStarCounts();
function updateStarCounts() {
    <?php
        foreach ($starCounts as $rating => $count) {
            echo "$('#total_" . $rating . "_star_review').text($count);\n";
        }
    ?>
</script> -->

<script>
    var message = "<?php echo $message; ?>";
    alert(message);
</script>

<script>
    function previewImage(imagePath) {
        document.getElementById('previewImage').src = imagePath;
        document.getElementById('imagePreview').style.display = 'flex';
    }
    
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const overlay = document.getElementById('imagePreview');
    const image = document.getElementById('previewImage');

    image.addEventListener('click', (e) => {
        e.stopPropagation(); // Prevent the click event from bubbling up to the overlay
    });

    overlay.addEventListener('click', () => {
        overlay.style.display = 'none';
    });

    // Optionally, you can show the overlay when the image is clicked
    image.addEventListener('click', () => {
        overlay.style.display = 'flex';
    });
});
</script>
<?php 
    require_once '../../footer.php';
    ?>