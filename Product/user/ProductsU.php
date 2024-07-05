<?php require_once '../handler/shareToSocial.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Products</title>
    <link rel="shortcut icon" href="../../uploads/logohome.jpeg" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/ProductsC.css">
    <link rel="stylesheet" href="../css/style.css">

    <!-- From header -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Review -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <!-- Visa : 4916217501611292 -->
</head>
<style>
        .navi {
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
            height: 400px;
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

        .products .top
{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.products .top .search
{
    position: relative;
}

.products .top .search input
{
    margin-left: 25%;
    background: rgb(191, 224, 230);
    padding: 10px 150px;
    border-radius: 6px;
    border-color: #000c66;
    font-weight: 600;
    padding-left: 18px;
    color: #000c66;
    width: 750px;
    height: 55px;
    font-size: 15px;
    margin-top: 30px;
    margin-bottom: 30px;
}

.products .top .search i
{
    position: absolute;
    right: -180px;
    top: 40%;
    color: #000c66;
    cursor: pointer;
}
.products .top .sorting{
    margin-right:80px;
}
.user , .logout{
    margin-top: 20px;
}
    </style>
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
                    <li class="nav-item"><a href="../../feedback/user/contact.php" class="nav-link">Contact</a></li>
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


    <section class="products" id="products">

        <div class="heading">
            <h2>Our popular products</h2>
        </div>

        <div class="top">

            <div class="search">
                <input type="text" id="searchInput" placeholder="Search Products">
                <i class='bx bxs-search' ></i>
            </div>

            <div class="sorting">
                Price
                <button id="sortAsc"><i class='bx bx-down-arrow-alt'></i></button>
                <button id="sortDesc"><i class='bx bx-up-arrow-alt'></i></button>
            </div>

        </div>

    <header class="header">
    <div class="container header__top">
      
      <div class="header__cart">
        <ul>
          <div class="header__submenu" id="submenu">
            <button class="header__cart-btn" id="toggle-cart-btn"><svg class="cart" width="24" height="24" viewBox="0 0 24 24">
             <path d="M17,18C15.89,18 15,18.89 15,20A2,2 0 0,0 17,22A2,2 0 0,0 19,20C19,18.89 18.1,18 17,18M1,2V4H3L6.6,11.59L5.24,14.04C5.09,14.32 5,14.65 5,15A2,2 0 0,0 7,17H19V15H7.42A0.25,0.25 0 0,1 7.17,14.75C7.17,14.7 7.18,14.66 7.2,14.63L8.1,13H15.55C16.3,13 16.96,12.58 17.3,11.97L20.88,5.5C20.95,5.34 21,5.17 21,5A1,1 0 0,0 20,4H5.21L4.27,2M7,18C5.89,18 5,18.89 5,20A2,2 0 0,0 7,22A2,2 0 0,0 9,20C9,18.89 8.1,18 7,18Z"></path>
              </svg> Your Cart</button>  

            <div id="shopping-cart" class="shopping-cart-container">
              <table id="cart-content">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody></tbody>
              </table>
              <p class="total-container" id="total-price"></p>
              <a href="#" id="checkout-btn" class="cart-btn">Checkout</a>
              <a href="#" id="clear-cart" class="cart-btn">Clear Cart</a>
            </div>
             </li>
            </ul>
         </div>
      </div>
    </div>
    </header>
  
      <div class="grid" id="grid">
  
        <div class="product-container" id="pContainer">
          
                    <?php
require_once '../../config.php';

$sql ="SELECT * FROM `products` ";

if(isset($_GET['Category'])) {
    // Sanitize the category parameter to prevent SQL injection
    $category = mysqli_real_escape_string($con, $_GET['Category']);

    // Adjust the SQL query based on the selected category
    if($category != 'all') {
        $sql = "SELECT * FROM `products` WHERE `Category` = '$category'";
    }
}

$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0)
{
  while($row = mysqli_fetch_assoc($result))
  {
	  	
?>           

         <div class="box" data-id="<?php echo $row["ProductID"]; ?>">
         <div class="card">
            <img src="<?php echo $row["Image"]; ?>" alt="" class="card__image">
            <div class="card__info">
                <h4 class="card__title"><?php echo $row["Pname"]; ?></h4>
                <p class="card__price">LKR <?php echo $row["Price"]; ?></p> <br>
                <div class="share-buttons">
                <a href="<?php echo generateFacebookShareUrl($row["Pname"], $row["ProductID"]); ?>" target="_blank"><i class='bx bxl-facebook-square'></i></a>
                <a href="<?php echo generateTwitterShareUrl($row["Pname"], $row["ProductID"]); ?>" target="_blank"><i class='bx bxl-twitter'></i></a>
                <a href="<?php echo generateWhatsAppMessageUrl($row["Pname"], $row["ProductID"]); ?>" target="_blank"><i class='bx bxl-whatsapp'></i></a>
                </div>
                <button class="card__btn add-to-cart" data-id="<?php echo $row["ProductID"]; ?>">Add to Cart</button>
            </div>
        </div>
        </div>
    <?php
  }
}
?>
          
        </div>
     </div>

     <?php
require_once '../../footer.php';
?> 
    </section>


    <script src="../js/Cart2.js"></script>
    <script src="../../Order/function/payment/script.js"></script>

    <script>
    const searchInput = document.getElementById('searchInput');

    function filterProducts() {
        const searchText = searchInput.value.toLowerCase();

        // Get all product cards
        const products = document.querySelectorAll('.box');

        products.forEach(product => {
            const title = product.querySelector('.card__title').innerText.toLowerCase();
            
            if (title.includes(searchText)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('keyup', filterProducts);


    //SORT
    document.getElementById('sortAsc').addEventListener('click', function() {
    sortProducts('asc');
});

document.getElementById('sortDesc').addEventListener('click', function() {
    sortProducts('desc');
});

function sortProducts(order) {
    var productsContainer = document.getElementById('pContainer');
    var products = Array.from(productsContainer.getElementsByClassName('box'));

    products.sort(function(a, b) {
        var priceA = parseFloat(a.querySelector('.card__price').textContent.split(' ')[1]);
        var priceB = parseFloat(b.querySelector('.card__price').textContent.split(' ')[1]);

        if (order === 'asc') {
            return priceA - priceB;
        } else {
            return priceB - priceA;
        }
    });

    productsContainer.innerHTML = ''; 
    products.forEach(function(product) {
        productsContainer.appendChild(product);
    });
}
</script>
</body>
</html>