<?php
echo $_GET['id'];
include_once "../connect/config.php";

$sql = "select * from orders  WHERE oid ='".$_GET['id']."'";
$results=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($results);


    $userMail = $row['email'];
                $sub = "Your Order in processing";
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
                            <p>Hello Sir,</p>
                            <p>Your order being ready! Your Oredr ID is'.$_GET['id'].'</p>
                            <p>Thank You For Choose us.</p>
                        </div>
                        <div class="footer">
                            <p>Contact us via WhatsApp for further details.</p>
                        </div>
                    </div>
                </body>
                </html>';

                $sql = "UPDATE orders SET stts = 'Processing' WHERE oid ='".$_GET['id']."'";
                $results=mysqli_query($conn,$sql);
                include ('../function/emailsend.php');
    header('location: ../manageOrder.php');

?>