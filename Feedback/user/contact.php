<?php
require "../vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $msg = "";

    if(empty($name)||empty($email)||empty($subject)||empty($message)){
        header("Location: contact.php?error");
    }
    $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        $mail->Username = "shahibdhahilmy@gmail.com";
        $mail->Password = "ofnh ocfw hnzt kczr";
    
        $mail->setFrom($email, $name); 
        $mail->addAddress("shahibdhahilmy@gmail.com");
        $mail->addReplyTo($email);
    
        $mail->Subject = $subject;
        $mail->Body = $message;
    
        $mail->send();

        header("Location: ../handler/sent.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <title>Contact Form</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../../uploads/logohome.jpeg" type="image/png">

    <style>
        body {
			background-image: linear-gradient(120deg, rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.1),rgba(0, 0, 0, 0.2),rgba(0, 0, 0, 0.3));
            background-size: cover;
            margin: 0;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
        }
		.containersss{
			margin-bottom: 100px;
            margin-top: 100px;
		}
  
        .dbox .icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin: 0 auto;
            margin-bottom: 20px; 
        }
      
        .contactForm .btn {
            width: 100%; 
        }
        
        .contcactss{
            background-color: #f4f4f4;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 1000px;
            background-color: white;
        }
		
		@media (max-width: 768px) {
            .containersss {
                padding: 150px;
                margin-top: -200px;
            }
        }

        .navbar{
            max-height: 70px !important;
        }

        .navbar-nav .nav-item {
            margin-top: 10px;
        }

        .bx-log-in-circle,
        .fa-user {
            margin-top: 15px;
        }
    </style>
</head>
<body>
<?php
 require_once '../../header.php';
?>
    <section class="ftco-section">
        <div class="containersss">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-12">
                    <div class="wrapper">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 mb-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="dbox w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center" style="background-color: blue; border-color: black">
                                                <span class="fa fa-map-marker"></span>
                                            </div>
                                            <div class="text">
                                                <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dbox w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center" style="background-color: lightblue; border-color: black">
                                                <span class="fa fa-phone"></span>
                                            </div>
                                            <div class="text">
                                                <p> 1235 2355 98</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="dbox w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center" style="background-color: blue; border-color: black">
                                                <span class="fa fa-paper-plane"></span>
                                            </div>
                                            <div class="text">
                                                <p>info@yoursite.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="contact-wrap">
                                    <h3 class="mb-4 text-center" style="color:black;">Get in touch with us</h3>
                                    <div id="form-message-warning" class="mb-4 w-100 text-center"></div> 
                                    <form method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        <?php 
                                        if(isset($_GET['error'])){
                                            $msg = "please fill in the blanks";
                                            echo '<div class="alert alert-danger">'.$msg.'</div>';
                                        } 
                                        if(isset($_GET['success'])){
                                            $msg = "your message has been sent";
                                            echo '<div class="alert alert-success">'.$msg.'</div>';
                                        } 
                                        ?>
                                        <div class="contacts" style=" background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border: 2px solid darkblue;">
                                            <div class="rowss" style="padding-top:30px; padding-bottom:10px;">
                                                <div class="col-md-12" >
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Name" style="color: black; background-color: #EEEEEE;">
                                                    </div>
                                                </div>
                                                <div class="col-md-12"> 
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" style="color: black; background-color: #EEEEEE;">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" style="color: black; background-color: #EEEEEE;">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea name="message" class="form-control" id="message" cols="30" rows="8" placeholder="Message" style="color: black; background-color: #EEEEEE;"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group" >
                                                        <input type="submit" name="submit" value="Send Message" class="btn btn-primary" style="color: white; background-color: darkblue !important; border-color: lightblue !important;">
                                                        <div class="submitting"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
 require_once '../../footer.php';
?>
