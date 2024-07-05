<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">


    <title>Reset Password</title>

    <style>
        body {
            background-image: url('Image/9.jpg'); /* Add the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .form-gap {
            padding-top: 0px;
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
        top: 10px;
        left: 5px;
        max-width: 1350px;
        }
        .panel-body{
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


    </style>

</head>
<body>
    <nav class="navbar">
        <div class="containernav">
            <a href="#" class="navbar-brand"></a>
            <div> <img src="Image\Logo.jpg" style="width: 80px; margin-left: 0px;"></div>
            <ul class="navbar-nav">
                <a href="login.php" class="btn btn-secondary">
                    <i class="fa fa-arrow-circle-left fa-lg" style="font-size: 5.5rem;"></i>
                  </a>
            </ul>
        </div>
    </nav>
<div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"> <!-- Adjust the column width -->
                <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center">
                    <img class="forget-pic" src="Image/4.jpg">
                    <h2 class="text-center">Forgot Password?</h2>
                    <p>You can reset your password here.</p>
                    <div class="panel-body">
        
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="reset_password.php">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                        </div>
                        <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>

        
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
