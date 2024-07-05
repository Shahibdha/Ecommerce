<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD EMPLOYEE</title>
    <link rel="stylesheet" href="../../css/Form.css">
    <style>
      .btn, h4 {
        color: #fff;
      }
      .box {
        margin-top: 20px;
      }
    </style>
    <script>
        function validateForm() {
            var name = document.forms["employeeForm"]["txtEname"].value;
            var email = document.forms["employeeForm"]["txtEmail"].value;
            var phoneNumber = document.forms["employeeForm"]["txtPNumber"].value;
            var salary = document.forms["employeeForm"]["txtSalary"].value;
            var imageFile = document.forms["employeeForm"]["imageFile"].value;
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            var phonePattern = /^[0-9]{10}$/;
            var salaryPattern = /^[0-9]+$/;

            if (name == "" || email == "" || phoneNumber == "" || salary == "" || imageFile == "") {
                alert("All fields must be filled out");
                return false;
            }

            if (!emailPattern.test(email)) {
                alert("Please enter a valid email address");
                return false;
            }

            if (!phonePattern.test(phoneNumber)) {
                alert("Please enter a valid 10-digit phone number");
                return false;
            }

            if (!salaryPattern.test(salary) || salary <= 0) {
                alert("Please enter a valid positive number for salary");
                return false;
            }

            var fileExtension = ['jpeg', 'jpg', 'png', 'gif'];
            if ($.inArray(imageFile.split('.').pop().toLowerCase(), fileExtension) == -1) {
                alert("Only image files (jpeg, jpg, png, gif) are allowed");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>

<?php
require_once '../../SideBar.php';
?> 
    
    <div class="box">
    <form name="employeeForm" action="AddEmployee.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
        <h3>Add Employee</h3>
          <input type="text" class="field" name="txtEname" placeholder="Employee Name" required>
          <h4>Position</h4>
          <select name="lstPosition" class="field">
            <option value="Manager">Manager</option>
            <option value="Salesman">Salesman</option>
            <option value="Cashier">Cashier</option>       
            <option value="Receptionist">Receptionist</option>
            <option value="Worker">Worker</option>
            <option value="other">Other</option>
          </select><br>
          <input type="text" class="field" name="txtEmail" placeholder="Email" required>
          <input type="text" class="field" name="txtPNumber" placeholder="Phone Number" required>
          <input type="text" class="field" name="txtSalary" placeholder="Salary" required>
          <input type="file" class="field" name="imageFile" placeholder="Upload a Picture" required>
          
          <label for="chkPublish" class="field">Publish the Employee: 
            <input type="checkbox" name="chkPublish">
          </label><br>
            
        <p>
          <input class="btn" type="submit" name="btnSubmit" value="Add Employee"/>
          <a class="btn" href="Employee.php">Back to Employees</a>
        </p>

        <?php
	
	if (isset($_POST["btnSubmit"]))
	{
		$employname = $_POST["txtEname"];
    $position = $_POST["lstPosition"];
		$email = $_POST["txtEmail"];	
    $phonenumber = $_POST["txtPNumber"];
    $salary = $_POST["txtSalary"];
		
		if(isset($_POST["chkPublish"]))
		{
			$status = 1;
		}
		else 
		{
			$status = 0;
		}
		
		$image = "../../Uploads/".basename($_FILES["imageFile"]["name"]);
		move_uploaded_file($_FILES["imageFile"]["tmp_name"],$image);
	
	
    require_once '../../config.php';

       // Fetch the latest ProductID from the database
    $result = mysqli_query($con, "SELECT MAX(EmpID) as max_id FROM employee");
    $row = mysqli_fetch_assoc($result);
    $latest_emp_id = $row['max_id'];

    // Extract the numeric part from the ProductID
$numeric_part = substr($latest_emp_id, 1); 
// Exclude the "P" prefix

// Convert the numeric part to an integer and add 1000 to it
$new_numeric_part = intval($numeric_part) + 1;

// Concatenate "P" with the incremented numeric part to generate the next ProductID

    
    // Check if there are any products in the database
    if ($latest_emp_id == null) {
        // If no products added yet, set the ProductID to "P1000"
        $next_emp_id = "E1000";
    } else {
        // Increment the latest ProductID by 1000 and prepend "P"
        $next_emp_id = "E" . $new_numeric_part;
    }


	$sql = " INSERT INTO `employee` (`EmpID`, `Ename`, 
  `Position`, `Email`, `Phone Number`, `Salary`, `Image`) 
  VALUES ('".$next_emp_id."', '".$employname."', '".$position."', '".$email."' ,'".$phonenumber."',  
   '".$salary."', '".$image."');" ;
	
	if (mysqli_query($con,$sql))
	{
		echo "Employee is uploaded successfully";
	}
	else
	{
		echo "Oops something went wrong" ;
	}
	
}
	?>
        </form>
    </div>
</body>
</html>