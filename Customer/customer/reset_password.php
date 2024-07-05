<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format");window.location.href = "resetpassword.php";</script>';
        exit;
    }

    require_once '../../config.php';

    $emailCheckQuery = "SELECT * FROM customer WHERE cEmail = '$email'";
    $result = mysqli_query($con, $emailCheckQuery);

    if (mysqli_num_rows($result) > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Store the token in the database
        $timestamp = time();
        $insertQuery = "INSERT INTO password_reset (email, token, timestamp) VALUES ('$email', '$token', '$timestamp')";
        mysqli_query($con, $insertQuery);

        // Send email to user with the reset link
        $resetLink = "http://localhost/index/Devii/Devii/resetpasswordform.php?token=$token";
        $to = $email;
        $subject = "Password Reset";
        $message = "Click the following link to reset your password: $resetLink";
        $headers = "From: shanukadeva2000@gmail.com";
        mail($to, $subject, $message, $headers);

        echo '<script>alert("Password reset link sent to your email");window.location.href = "login.php";</script>';
    } else {
        echo '<script>alert("Email not found");window.location.href = "resetpassword.php";</script>';
    }

    mysqli_close($con);
}
?>
