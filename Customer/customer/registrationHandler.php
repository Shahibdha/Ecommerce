<?php 
if (isset($_POST["btnSubmit"])) {
    $name = $_POST["txtName"];
    $email = $_POST["txtEmail1"];
    $password = $_POST["txtPassword1"];
    $contactNumber = $_POST["txtTphone"];
    $address = $_POST["txtaddress"];
    $pic = "pic.png";
    $type= "user";

    require_once '../../config.php';

    // Check if email already exists
    $emailCheckQuery = "SELECT * FROM customer WHERE cEmail = '$email'";
    $emailCheckResult = mysqli_query($con, $emailCheckQuery);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        echo '<script>alert("Email already exists. Please choose a different email address.");window.location.href = "login.php";</script>';
    } else {
        // Generate new customer ID
        $sqlGetLastCustomerId = "SELECT cid FROM customer ORDER BY cid DESC LIMIT 1";
        $resultGetLastCustomerId = mysqli_query($con, $sqlGetLastCustomerId);

        if (mysqli_num_rows($resultGetLastCustomerId) > 0) {
            $row = mysqli_fetch_assoc($resultGetLastCustomerId);
            $lastCustomerID = $row['cid'];
            $numericPart = (int)substr($lastCustomerID, 1);
        } else {
            $numericPart = 9999; // Assuming no customerIDs exist yet
        }

        // Generate the next customerID
        $newNumericPart = $numericPart + 1;
        $newCustomerID = 'C' . str_pad($newNumericPart, 4, '0', STR_PAD_LEFT);

        // Insert new customer data into the database
        $sql = "INSERT INTO customer (cid, cName, cEmail, cNumber, cAddress, cPassword, pic, type)
                VALUES ('$newCustomerID', '$name', '$email', '$contactNumber', '$address', '$password', '$pic', '$type')";
         

        if (mysqli_query($con, $sql)) {
            // Redirect to login page after successful registration
            $userMail = $email;
            $sub = "Registration Successful";
            $body = '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Project Ready for Purchase</title>
                <style>
                    
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f5f5f5;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 20px;
                        background-color: #ffffff;
                        border-radius: 10px;
                        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
                    }
                    .header {
                        text-align: center;
                        padding: 20px 0;
                    }
                    .content {
                        padding: 20px 0;
                        text-align: left;
                    }
                    .project-info {
                        font-size: 20px;
                        font-weight: bold;
                        color: #007bff;
                        margin-top: 10px;
                    }
                    .footer {
                        text-align: center;
                        padding: 20px 0;
                        color: #777777;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="header">
                        <h1>LSMS</h1>
                    </div>
                    <div class="content">
                        <p>Hello '.$name.',</p>
                        <p>Congratulation You can Login Now!</p>
                        <p>Thank You For Choose us.</p>
                    </div>
                    <div class="footer">
                        <p>Contact us via WhatsApp for further details.</p>
                    </div>
                </div>
            </body>
            </html>';

            
    
            include ('../../Order/function/emailsend.php');
            echo '<script>alert("Data added successfully.");window.location.href = "login.php";</script>';
        } else {
            echo '<script>alert("Error adding data: ' . $con->error . '");window.location.href = "login.php";</script>';
        }
    }
} else {
    echo "Unsuccessful";
}
?>
