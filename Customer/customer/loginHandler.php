<?php
session_start();

if(isset($_POST["btnSubmitL"])) {
    require_once '../../config.php';
    
    $username = $_POST["txtEmail"];
    $password = $_POST["txtPassword"]; 

    // Modify the SQL query to select cid based on cEmail
    $sql_cid = "SELECT `cid`, `type` FROM `customer` WHERE `cEmail` = '" . $username . "'";
    $result_cid = mysqli_query($con, $sql_cid);

    if (mysqli_num_rows($result_cid) > 0) {
        // Fetch the cid and type
        $row_cid = mysqli_fetch_assoc($result_cid);
        $cid = $row_cid['cid'];
        $user_type = $row_cid['type'];

        // Use cid as the username
        $username = $cid;

        // Check login credentials using cid instead of cEmail
        $sql_customer = "SELECT * FROM `customer` WHERE `cid` = '" . $cid . "' AND `cPassword` = '" . $password . "'";
        $results_customer = mysqli_query($con, $sql_customer);

        if (mysqli_num_rows($results_customer) > 0) {
            $_SESSION["userName"] = $username;
            $_SESSION["Password"] = $password;

            // Redirect based on user type
            if($user_type == 'user') {
                $_SESSION["type"]="user";
                header('Location: profile.php');
               
                exit();
            } else {
                $_SESSION["type"]="admin";
                header('Location: ../admin/Manageuser.php');
                exit();
            }
        } else {
            // Display alert message before redirecting
            echo '<script>alert("Invalid details. Please try again."); window.location.href = "login.php";</script>';
            exit();
        }
    } else {
        // Display alert message before redirecting
        echo '<script>alert("Invalid email. Please try again."); window.location.href = "login.php";</script>';
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}

?>
