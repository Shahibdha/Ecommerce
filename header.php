<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="../../uploads/logohome.jpeg" type="image/png">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            z-index: 1000;
        }

        .ftco-navbar-light {
            background: #fff;
            z-index: 3;
            padding: 10px;
            border-radius: 5px;
        }

        .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
            font-size: 13px;
            padding: 1.2rem 20px;
            font-weight: 400;
            color: #333333;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 1;
        }

        .navi {
            width: 75%;
            padding-right: 15px;
            padding-left: 15px;
            margin-left: 150px;
            margin-top: 50px;
            z-index: 1000;
        }

        .navbar {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            background-color: transparent;
            transition: background-color 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-height: 60px;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .navbar-nav .nav-item {
            display: inline-block;
            margin-bottom: 10px;
        }

        .navbar-nav .nav-link {
            padding: 0 0.2rem;
        }

        .navbar-nav .nav-item:hover a.nav-link {
            color: blue;
            text-decoration: none;
        }

        .bx-log-in-circle,
        .fa-user {
            font-size: 23px;
            color: black;
        }

        .bx-log-in-circle:hover,
        .fa-user:hover {
            color: blue;
        }

        .navbar-nav .logout button,
        .navbar-nav .user button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        @media (max-width: 480px) {
            .bx-log-in-circle,
            .fa-user {
                color: white;
            }
        
            .navi{
                width: 80%;
                margin-left: 40px;
            }

            .nav-item{
                padding-inline: 0.2;
            }
            .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
                font-size: 10px;

            }
        }

        @media (max-width: 576px) {
            .bx-log-in-circle,
            .fa-user {
                color: white;
            }
        
            .navi{
                width: 80%;
                margin-left: 40px;
            }

            .nav-item{
                padding-inline: 0.2;
            }
        }

        @media (max-width: 991.98px) {
            .bx-log-in-circle,
            .fa-user {
                color: white;
            }
            .ftco-navbar-light .navbar-nav>.nav-item>.nav-link {
                padding: .9rem 0;
                color: rgba(255, 255, 255, 0.7);
            }

            .navbar-nav .nav-item {
                display: inline-block;
                margin-right: 15px;
                margin-bottom: 5px;
            }

            .ftco-navbar-light {
                background: #000;
                position: relative;
                top: 0;
                padding: 10px 15px;
            }
            .navi{
                width: 80%;
                margin-left: 45px;
            }
        }

        a {
            color: #007bff;
            text-decoration: none;
            background-color: transparent;
        }

        a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        a:not([href]):not([tabindex]) {
            color: inherit;
            text-decoration: none;
        }

        a:not([href]):not([tabindex]):hover,
        a:not([href]):not([tabindex]):focus {
            color: inherit;
            text-decoration: none;
        }

        a:not([href]):not([tabindex]):focus {
            outline: 0;
        }
    </style>
</head>

<body>
    <div class="navi">
        <nav class="navbar navbar-expand-lg ftco_navbar ftco-navbar-light" id="ftco-navbar">
            <a class="navbar-brand" href="../../home.php">
                <img src="../../uploads/logo.jpeg" style="width: 70px; margin-right: 5px;">
            </a>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto mr-md-3">
                    <li class="nav-item"><a href="../../home.php" class="nav-link">Home</a></li>
                    <li class="nav-item">
                        <a href="../../product/user/Shop.php" class="nav-link">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../Feedback/user/Review.php" class="nav-link">REVIEW</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../feedback/user/contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item combined-icons">
                        <div class="user">
                            <a href="../../customer/customer/profile.php" class="nav-link">
                                <button>
                                    <i class="fa fa-user"></i>
                                </button>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item combined-icons">
                        <div class="logout">
                            <a href="../../customer/customer/logout.php">
                                <button>
                                    <i class="bx bx-log-in-circle"></i>
                                </button>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>

</html>
