<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT EMPLOYEE</title>
    <link rel="stylesheet" href="../../css/Form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<style>
    .btn , h4
{
    color: #fff;
}
.box
{
  margin-top: 20px;
}
    /* CSS for sidebar */
    .sidebar {
     height: 100%;
     width: 250px;
     position: fixed;
     transition: all 0.3s ease;
     overflow: hidden;
   }
   .bgblue{
       /* background-color: #003B73; */
     /* background-color: #0074B7; */
     /* background-color: #2b2b2b; */
     /* background-color: #000c66; */
     background: linear-gradient(to bottom,#000c66,black);
   }

   .bgblueright{
      
     background: linear-gradient(to right,#000c66,black);
   }
   .btnblue{
       background: linear-gradient(to right, #000c66, black);
       color:#ffffff;
   }

   nav{
     position: fixed;
     z-index: 1;
   }
   
   .sidebar a {
     padding: 10px 15px;
     text-decoration: none;
     display: block;
     color: white;
   }
   .sidebar a:hover {
     /* background-color: #767575; */
     /* background-color: #003B73; */
     background-color: #0074B7;
     /* background-color: #000c66; */
   }
   
   /* .content {
     min-height: 100vh;
     margin-left: 250px; 
     padding: 20px;
     background-image: url('./img/bbg.jpeg');  
     background-size: cover;
     background-position: center;
   } */

   .search-bar {
     border-radius: 20px;
   }
   .search-bar input[type="text"] {
     border: none;
     border-radius: 20px;
     padding-left: 35px;
   }
   .search-bar input[type="text"]::placeholder {
     font-style: italic;
   }
   .search-icon {
     position: relative;
     top: 7px;
     left: 30px;
   }
   .tw{
       color:white;
   }
   .hover:hover{
       color:#0074B7;
   }
   .blue-table {
     background-color: rgba(0, 12, 102, 0.8);
     color: #fff;
   }
   </style>
<body>

<?php
    require_once '../../SideBar.php';

if (isset($_GET["id"])) {
    $EmpID = $_GET["id"];

    require_once '../../config.php';

    $sql = "SELECT * FROM `employee` WHERE `EmpID` = '$EmpID'";
    $result = mysqli_query($con, $sql);
    // multidimentional
    $row = mysqli_fetch_assoc($result);
	
	
	?>
    <div class="box">
    <form action = "../handler/EditEmployeeHandler.php?id=<?php echo $row["EmpID"]; ?>" method="post" enctype="multipart/form-data">
        <h3>Edit Employee</h3>
          <input type="text" class="field" name="txtTitle" placeholder="Employee Name" value="<?php echo $row["Ename"];?>">
          <input type="email" class="field" name="txtEmail" placeholder="Employee Name" value="<?php echo $row["Email"];?>">
          <input type="number" class="field" name="txtPNumber" placeholder="Price of Product" value="<?php echo $row["Phone Number"];?>">
          <input type="number" class="field" name="txtSalary" placeholder="Price of Product" value="<?php echo $row["Salary"];?>">
          <input type="file" class="field" name="imageFile" placeholder="Upload a Picture" value="<?php echo $row["Image"]; ?>">
          <?php $_SESSION["Image"] = $row["Image"]; ?>

          <h4>Position</h4> <select name="lstCategory" class="field">
            <option value="Manager" <?php if($row["Position"] == "Manager") echo "selected"; ?>>Manager</option>
            <option value="Salesman" <?php if($row["Position"] == "Salesman") echo "selected"; ?>>Salesman</option>
            <option value="Cashier" <?php if($row["Position"] == "Cashier") echo "selected"; ?>>Cashier</option>       
            <option value="Receptionist" <?php if($row["Position"] == "Receptionist") echo "selected"; ?>>Receptionist</option>
            <option value="Worker" <?php if($row["Position"] == "Worker") echo "selected"; ?>>Worker</option>
            <option value="Other" <?php if($row["Position"] == "Other") echo "selected"; ?>>Other</option>
            </select><br>

        <p>
          <input class="btn" type="submit" name="btnSubmit"value="Edit Employee"/>
          <a class="btn" href="Employee.php" >Back to Employees</a>
        </p>

    </form>
</div>
<?php 
	mysqli_close($con);
}
	?>
    
</body>
</html>