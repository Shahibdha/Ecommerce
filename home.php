<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="shortcut icon" href="./uploads/logohome.jpeg" type="image/png">

  <style>
    body {
      font-family: Helvetica, sans-serif;
      margin: 0;
      padding: 0;
      background-size: cover;
    }

    .video-background {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .containers {
      max-width: 1200px;
      margin: 0 auto;
      margin-top: 20px;
      padding: 20px;
    }

    .cards {
    background: rgba(255, 255, 255, 0.5); /* Adjust the fourth value (0.5) for transparency */
    border-radius: 50px;
    overflow: hidden;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5); /* Adjust the fourth value for transparency */
    display: flex;
    height: 450px;
}
    .contents {
      padding: 20px;
      margin-left: 50px;
    }

    .contents h1, .contents h2 {
      margin-bottom: 10px;
      font-size: 50px;
    }

    .contents p {
      margin-bottom: 20px;
      width: 700px;
      color: black;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #3498db;
      color: #fff;
      text-decoration: none;
      border-radius: 100px;
      transition: background-color 0.3s;
    }

    .button:hover {
      background-color: #2980b9;
    }

    .cards img {
      width: 280px;
      height: 280px;
      border-radius: 50%;
      margin-right: 20px; 
      margin-left: 50px;
      margin-top: 85px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
    }

    .navbar{
      background-color: white !important;
    }

    @media (max-width: 768px) {
      .cards {
        flex-direction: row;
        text-align: left;
        height: 450px;
      }

      .contents {
        width: 600px;
        padding: 20px;
        margin-left: 20px;
      }

      .contents h1, .contents h2 {
        margin-top: -25px;
        font-size: 40px;
      }

      .contents p {
        max-width: 300px;
      }
      .cards img {
      width: 250px;
      height: 250px;
      margin-left: 10px;
      margin-top: 100px;
      }
    }

    /* Navbar */
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
            font-family: 'Poppins', sans-serif;
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
            <a class="navbar-brand" href="home.php">
                <img src="./uploads/logo.jpeg" style="width: 70px; margin-right: 5px;">
            </a>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto mr-md-3">
                    <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                    <li class="nav-item">
                        <a href="product/user/Shop.php" class="nav-link">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a href="Feedback/user/Review.php" class="nav-link">REVIEW</a>
                    </li>
                    <li class="nav-item">
                        <a href="feedback/user/contact.php" class="nav-link">Contact</a>
                    </li>                    
                    <li class="nav-item combined-icons">
                        <div class="user">
                            <a href="customer/customer/profile.php" class="nav-link">
                                <button>
                                    <i class="fa fa-user"></i>
                                </button>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item combined-icons">
                        <div class="logout">
                            <a href="customer/customer/logout.php">
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

<video class="video-background" autoplay muted loop>
    <source src="uploads/video.mp4" type="video/mp4">
  </video>

  <div class="containers">
    <div class="cards">
      <div class="contents">
        <h1>MACRON</h1>
        <p>Welcome to ColorCreations, your one-stop destination for premium quality paints on Eles Emes. We specialize in offering a diverse range of interior, exterior, and specialty paints that cater to both homeowners and professionals. Our commitment to quality, sustainability, and customer satisfaction sets us apart. Whether you're renovating your home, tackling a DIY project, or need supplies for a commercial space, ColorCreations provides the perfect solution with our custom color options and eco-friendly products. Experience the vibrant world of ColorCreations and let us help you bring your vision to life with every brushstroke.
        </p>
        <a href="product/user/Shop.php" class="button">Shop Now</a>
      </div>
      <img src="uploads/logo.jpeg" alt="Image description">
    </div>
  </div>
  <?php
require_once 'footer.php';
?> 
</body>
</html>

