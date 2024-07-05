<?php
session_start();
if (!isset($_SESSION["userName"])) {
    header('Location: login.php');
    exit();
}

require_once '../../config.php';

// Fetch customer details including the profile picture path
$userName = $_SESSION["userName"];
$query = "SELECT * FROM customer WHERE cid = '$userName'";
$result = mysqli_query($con, $query);
if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['cName'];
    $email = $row['cEmail'];
    $phone = $row['cNumber'];
    $address = $row['cAddress'];
    $profilePic = $row['pic'];
}

// Check if the form is submitted and the update button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Retrieve form data
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    // Update customer details in the database
    $userName = $_SESSION["userName"];
    $query = "UPDATE customer SET cName='$name', cEmail='$email', cNumber='$phone', cAddress='$address' WHERE cid='$userName'";
    if (mysqli_query($con, $query)) {
        echo '<script>alert("Profile details updated successfully");window.location.href = "profile.php";</script>';
    } else {
        echo '<script>alert("Error updating profile details");window.location.href = "updateProfile.php";</script>';
    }
}

// Check if a new profile picture is uploaded
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['new_profile_picture']) && $_FILES['new_profile_picture']['error'] === UPLOAD_ERR_OK) {
    // Directory where the uploaded files will be saved
    $uploadDirectory = 'Image/';

    // Generate a unique filename for the uploaded file
    $filename = uniqid('profile_') . '.' . pathinfo($_FILES['new_profile_picture']['name'], PATHINFO_EXTENSION);

    // Move the uploaded file to the upload directory
    if (move_uploaded_file($_FILES['new_profile_picture']['tmp_name'], $uploadDirectory . $filename)) {
        // Update the profile picture filename in the database
        $query = "UPDATE customer SET pic='$filename' WHERE cid='$userName'";
        if (mysqli_query($con, $query)) {
            // Profile picture updated successfully
            $profilePic = $filename; // Update profile picture variable with new filename
        } else {
            // Error updating profile picture in the database
        }
    } else {
        // Error moving the uploaded file
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <title>Update Profile Details</title>
    <style>
        body {
            background-image: url('Image/8.jpg'); /* Add the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .form-gap {
            padding-top: 70px;
        }
        .forget-pic {
            max-width: 100%;
            height: 250px;
        }
        .panel {
            max-width: 500px; /* Adjust this value as needed */
            margin: 0 auto; /* Center the panel horizontally */
        }

        .navbar {
            background-color: #ffffff;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .containernav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-weight:bolder;
            color: #333;
        }

        .navbar-nav {
            list-style-type: none;
            margin: 10;
            display: flex;
            position: relative;
            margin-left: auto;
        }

        .nav-item {
            margin-right: 25px;
        
        }

        .nav-link {
            text-decoration: none;
            color: #000000;
            transition: color 0.3s ease;
            border: none;
            cursor: pointer;
        
        }
        #back-arrow {
            color: #003B73; /* Set the initial color to blue */
            transition: color 0.3s; /* Add a transition effect for smooth color change */
        }

        #back-arrow:hover {
            color: black; /* Change the color to black on hover */
        }

        .container {
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            animation: slide-up 1s ease-out;
            animation-fill-mode: forwards;
        }
        .profile-pic {
            border-radius: 100%;
            position: absolute;
            top: 100px;
            left: 0;
            right: 0;
            margin: auto;
            z-index: 1;
            width: 100px; /* Fixed width */
            height: 100px; /* Fixed height */
            object-fit: cover; /* Ensure the image covers the container */
            transition: all 0.4s;
        }
        .plus-mark {
            border-radius: 100%;
            position: absolute;
            top: 30px;
            left: 270px;
            right: 0;
            margin: auto;
            z-index: 1;
            max-width: 80px;
            transition: all 0.4s;

            display: inline-block;
            position: relative;
            width: 30px; /* Adjust width as needed */
            height: 30px; /* Adjust height as needed */
            background-color: #0074B7; /* Adjust background color */
            border-radius: 50%; /* Make it a circle */
            text-align: center;
            cursor: pointer;
        }

        .plus-mark i {
            font-size: 20px; /* Adjust font size as needed */
            color: white; /* Adjust color as needed */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .plus-mark input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 5px;
        }

       
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            box-shadow: 0px 0px 5px #ddd;
        }
        /* Style for submit button */
        .buttons {
            text-align: center; /* Center align the buttons */
        }
        .buttons button {
            background-color: #0074B7;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        .buttons button:hover {
            background-color: #003B73;
        }
        p {
            text-align: center; /* Center align the text */
            color: #003B73; /* Change text color to blue */
            font-weight: bold; /* Make text bold */
            font-size: 36px; /* Enlarge font size */
        }

        @keyframes slide-up {
            from {
                opacity: 0;
                transform: translate(0, 50px);
            }
            to {
                opacity: 1;
                transform: translate(0, 0);
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="containernav">
            <a href="#" class="navbar-brand"></a>
            <div> <img src="Image\Logo.jpg" style="width: 80px; margin-left: 0px;"></div>
            <ul class="navbar-nav">
                <a href="profile.php" class="btn btn-secondary">
                    <i id="back-arrow" class="fa fa-arrow-circle-left fa-lg" style="font-size: 3.5rem;"></i>
                  </a>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">

            <p>Update Profile Details</p>
            <img id="preview-image" class="profile-pic" src="Image/<?php echo $profilePic; ?>" alt="Profile Picture">
            <!-- Add a plus mark to allow users to upload a new picture -->
            <label for="new_profile_picture" class="plus-mark">
                <i class="bi bi-plus-lg"></i>
                <input type="file" id="new_profile_picture" name="new_profile_picture" style="display: none;" onchange="previewImage()">
            </label>
            <br><br>
            
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $name; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value="<?php echo $address; ?>">
            </div>

            <div class="form-group buttons"> <!-- Add class 'buttons' to group submit button -->
                <button type="submit" name="update">Done</button>
            </div>
        </form>
    </div>
    
    <script>
        // Add animation to button on hover
        var signUpBtn = document.querySelector('button[type="submit"]');
        signUpBtn.addEventListener('mouseenter', function() {
            this.style.animation = 'shake 0.5s ease';
        });
    
        signUpBtn.addEventListener('mouseleave', function() {
            this.style.animation = '';
        });
    
        // Add shake animation to input fields when they are invalid
        var form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            var nameInput = document.querySelector('input[name="name"]');
            var emailInput = document.querySelector('input[name="email"]');
            var passwordInput = document.querySelector('input[name="password"]');
    
            if (nameInput.value.trim() === '') {
                nameInput.style.animation = 'shake 0.5s ease';
                event.preventDefault();
            }
    
            if (emailInput.value.trim() === '') {
                emailInput.style.animation = 'shake 0.5s ease';
                event.preventDefault();
            }
    
            if (passwordInput.value.trim() === '') {
                passwordInput.style.animation = 'shake 0.5s ease';
                event.preventDefault();
            }
        });
        // Function to preview the selected image
    function previewImage() {
        const preview = document.getElementById('preview-image');
        const fileInput = document.getElementById('new_profile_picture');
        
        const file = fileInput.files[0];
        const reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        }

        if (file) {
            reader.readAsDataURL(file);
        } else {
            // If no file is selected, display the default image from the database
            preview.src = 'Image/<?php echo $profilePic; ?>';
        }
    }
    </script>
    
    <style>
        @keyframes shake {
            0% { transform: translateX(0); }
            20% { transform: translateX(-10px); }
            40% { transform: translateX(10px); }
            60% { transform: translateX(-10px); }
            80% { transform: translateX(10px); }
            100% { transform: translateX(0); }
        }
    </style>
</body>
</html>
