<?php
session_start();
if (!isset($_SESSION["userName"])) {
    header('Location: login.php');
    exit();
}

require_once '../../config.php';

$userName = $_SESSION["userName"];

// Prepare and execute query to get user details
$sql = "SELECT * FROM customer WHERE cid = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $userName);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cName = $row['cName'];
    $cEmail = $row['cEmail'];
    $cNumber = $row['cNumber'];
    $cAddress = $row['cAddress'];
    $picPath = $row['pic'];
} else {
    echo "No user found!";
}
$current_page = basename($_SERVER['PHP_SELF']); // Gets the current file name


$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/profile.css" />
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="shortcut icon" href="../../uploads/logohome.jpeg" type="image/png">

    <title>Profile</title>
</head>
<body>
<?php
 require_once '../../header.php';
?>


    <div class="container">
        <div class="profile-card text-center">
            <div class="white-background"></div><!-- White background -->
            <div class="profile-info">
            <img class="profile-pic" src="Image/<?php echo $picPath; ?>">

                <br><br>
                <h2 class="hvr-underline-from-center">
                    <?php
                    // Displaying user's first name and last name
                    $nameParts = explode(" ", $cName);
                    echo $nameParts[0]; // First name
                    if (isset($nameParts[1])) {
                        echo "<span>" . $nameParts[1] . "</span>"; // Last name
                    }
                    ?>
                </h2>
                <div class="profile-details">
                    <table>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td><?php echo $cEmail; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Phone:</strong></td>
                            <td><?php echo $cNumber; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td><?php echo $cAddress; ?></td>
                        </tr>
                    </table>
                </div>     
                <div class="buttons">
                    <a href="resetpassword1.php"><button><i class="bi bi-key"></i>Password</button></a>
                    <a href="deleteAccount.php"><button1><i class="bi bi-trash"></i>Account</button1></a>
                    <a href="updateProfile.php"><button><i class="bi bi-pencil-square"></i>Profile</button></a>
                    
                </div>
            </div>
        </div>
    </div>

    <?php
 require_once '../../footer.php';
?>
</body>
</html>
