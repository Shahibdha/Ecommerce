<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
    <style>
        body{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    }
        .btn{
    position: relative;
    margin-left: 290px;
}
#pdfContent{
    margin-top: 20px;
    margin-left: 280px;
    width: 70%;
}

table{
      background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
    }

@media print {
            body * {
                visibility: hidden;
            }
            #pdfContent, #pdfContent * {
                visibility: visible;
            }
            #pdfContent {
                margin-left: 20px;
            }
            #pdfContent td, th{
                min-width: 150px;
            }

        }
    </style>
</head>
<body>
<?php
require_once '../../SideBar.php';
require_once '../../config.php';
?> 
<div class="Emp-Table" id="pdfContent">
    <h3>Product Report</h3>
                            <table class="table table-hover table-striped table-responsive">
                            <tr class="table-dark">
                                    <th><a href="?sort=ProductID" style="text-decoration: none; color: inherit;">Product ID</a></th>
                                    <th><a href="?sort=Ename" style="text-decoration: none; color: inherit;">Name</a></th>
                                    <th><a href="?sort=Position" style="text-decoration: none; color: inherit;">Description</a></th>
                                    <th><a href="?sort=Email" style="text-decoration: none; color: inherit;">Price</a></th>
                                    <th><a href="?sort=Salary" style="text-decoration: none; color: inherit;">Quantity</a></th>
                                    <th class="no-print" style="text-decoration: none; color: inherit;">Category</th>
                                </tr>
                                
                                <?php
                                $sql ="SELECT * FROM `products` ";
                                
                                $result = mysqli_query($con,$sql);
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>

<tr>
            <td><?php echo $row["ProductID"]; ?></td>
            <td><?php echo $row["Pname"]; ?></td>
            <td><?php echo $row["Description"]; ?></td>
            <td>Rs.<?php echo $row["Price"]; ?></td>
            <td><?php echo $row["Quantity"]; ?></td>
            <td><?php echo $row["Category"]; ?></td>
        </tr>
        <?php
    }
}
mysqli_close($con); // Close the connection
?>
                            </table></div>

<button type="button" id="print" class="btn btn-success" style="margin-left: 290px;">Print</button>

<script>
    const printBtn = document.getElementById('print');
    printBtn.addEventListener('click', function () {
        window.print();
    });
</script>
</body>
</html>