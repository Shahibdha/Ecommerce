<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../../css/DashboardC.css">
    <link rel="shortcut icon" href="../../uploads/logohome.jpeg" type="image/png">
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<style>
    .quotes-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 20vh;
}

    .quotes {
    /* background: linear-gradient(135deg, #000c66,#0066ff,#000c66, #33ccff); */
    background: url('../../uploads/black.jpg') no-repeat center center; 
    background-size: cover; 
    color: #fff; 
    border: 2px solid darkblue;
    border-radius: 5px;
    padding: 20px;
    margin-bottom: 20px;
    width: 100%;
    min-height: 60px;
}

.quotes p {
    margin-bottom: 10px;
    font-size: 16px;
    line-height: 1.5;
}

.quotes p:last-child {
    margin-bottom: 0;
}

</style>
<body>
    <?php
 require_once '../../header.php';
?>

            <div class="content">

            <div class="quotes-container">
            <div class="quotes"></div></div>

                    <h2 id="heading">Categories</h2>

                    <div class="categories">
                        <div class="category">
                            <a href="ProductsU.php?Category=all"><h3>All Products</h3>
                            <img src="../../Image/pic.jpg" width="100%" height="50%" alt="">
                            </a>
                        </div>
                        
                        <div class="category">
                        <a href="ProductsU.php?Category=Wall Paint"><h3>Wall Paints</h3>
                        <img src="../../Image/pic.jpg" width="100%" height="50%" alt=""></a>
                        </div>
                        
                        <div class="category">
                        <a href="ProductsU.php?Category=Poster Colors"><h3>Poster Colors</h3>
                        <img src="../../Image/pic.jpg" width="100%" height="50%" alt=""></a>
                        </div>
                        
                        <div class="category">
                        <a href="ProductsU.php?Category=Stationary"><h3>Stationary</h3>
                            <img src="../../Image/pic.jpg" width="100%" height="50%" alt=""></a>
                        </div>
                    </div>
                    <br>
                    
                   
            </div>
            <?php
 require_once '../../footer.php';
?>

<script>
    $(document).ready(function() {
    var category = 'happiness'; // Change category if needed
    fetch('https://api.api-ninjas.com/v1/quotes?category=' + category, {
        headers: {
            'X-Api-Key': '7AHuCx+31k7zCtPsMYKmJg==VLk3sN73dL7pvwSA' // Replace with your actual API key
        }
    })
    .then(response => response.json())
    .then(result => {
        var quotesDiv = $('.quotes'); // Select the existing .quotes container
        result.forEach(function(quote) {
            var quoteParagraph = $('<p>').text(quote.quote);
            var authorParagraph = $('<p>').text('- ' + quote.author);
            quotesDiv.append(quoteParagraph, authorParagraph);
        });
    })
    .catch(error => {
        console.error('Error: ', error);
    });
});
</script>

</body>
</html>
