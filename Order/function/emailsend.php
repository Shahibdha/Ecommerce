<?php
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->Username = 'elesemes93@gmail.com';
$mail->Password = 'wguiniwotbylbcmx';

$mail->setFrom('elesemes93@gmail.com');
$mail->isHTML(true); 
$mail->Subject = $sub;
$mail->Body = $body;
$mail->addAddress($userMail);

if ($mail->send()) {
    echo "<script>
    alert('Send Successfully');
    </script>";
} else {
    echo "<script>
    alert('Sending Failed');
    </script>";
}
?>
