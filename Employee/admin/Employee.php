<?php
session_start();

if($_SESSION["type"]=="user")
{
	header('Location:../../home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE MANAGEMENT</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/Employee.css">
    
</head>
<style>
    body{
      font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
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
            .no-print {
            display: none;
        }
        } 
</style>

<body>
    
<?php
require_once '../../SideBar.php';
?>            

            <div class="content">
                <div class="top">

                    <div class="Topic">
                        <h1><b>Employee Management</b></h1>
                        </div>
                </div>

                <div class="title">
                    <h2 id="heading">Overview</h2>
                </div>

                    <div class="categories">
                        <div class="category">
                            <h3>Total Employees</h3>
                            <h5 id="total-employees"></h5>
                        </div>
                        
                        <div class="category">
                            <h3>Earnings</h3>
                            <h5 id="total-earnings"></h5>
                        </div>
                        
                        <div class="category">
                            <h3>Attendance</h3>
                            <h5>82%</h5>
                        </div>
                        
                    </div>

                    <div class="all-products">
                        <div class="title">
                            <h2>Employees</h2>
                        </div>

                        <div class="heading">
                            <a href="AddEmployee.php"> Add Employee </a>
                            
                        </div>

                        <div class="Emp-Table" id="pdfContent">
                            <table class="table table-hover table-striped ">
                            <tr class="table-dark">
                                    <th><a href="?sort=EmpID" style="text-decoration: none; color: inherit;">EmpID</a></th>
                                    <th><a href="?sort=Ename" style="text-decoration: none; color: inherit;">Name</a></th>
                                    <th><a href="?sort=Position" style="text-decoration: none; color: inherit;">Position</a></th>
                                    <th><a href="?sort=Email" style="text-decoration: none; color: inherit;">Email</a></th>
                                    <th><a href="?sort=PhoneNumber" style="text-decoration: none; color: inherit;">Phone-Number</a></th>
                                    <th><a href="?sort=Salary" style="text-decoration: none; color: inherit;">Salary</a></th>
                                    <th class="no-print" style="text-decoration: none; color: inherit;">Edit</th>
                                    <th class="no-print" style="text-decoration: none; color: inherit;">Delete</th>
                                </tr>
                                
                                <?php require_once '../handler/getEmployee.php'; ?>
                            </table>
                            
                        </div>
                        <button id="print" > Generate Report </button>

                        <div class="title">
                            <h2>Progress</h2>
                        </div>
                        
                        Monday
                        <div class="progress mb-4" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" >
                            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 90%">90</div>
                          </div>

                          Tuesday
                          <div class="progress mb-4" role="progressbar" aria-label="Success striped example" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped bg-success progress-bar-animated" style="width: 25%">25</div>
                          </div>

                          Wednesday
                          <div class="progress mb-4" role="progressbar" aria-label="Info striped example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" style="width: 50%">50</div>
                          </div>

                          Thursday
                          <div class="progress mb-4" role="progressbar" aria-label="Warning striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" style="width: 75%">75</div>
                          </div>

                          Friday
                          <div class="progress mb-4" role="progressbar" aria-label="Danger striped example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" style="width: 40%">40</div>
                          </div>

                    </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
        // Get the total employees and total earnings elements
        const totalEmployeesElement = document.getElementById('total-employees');
        const totalEarningsElement = document.getElementById('total-earnings');

        // Set the innerHTML with data attributes set by PHP
        totalEmployeesElement.innerHTML = totalEmployeesElement.dataset.count;
        totalEarningsElement.innerHTML = 'LKR ' + parseFloat(totalEarningsElement.dataset.total).toFixed(2);
    });

    const printBtn = document.getElementById('print');
    printBtn.addEventListener('click', function () {
        window.print();
    });
</script>
</body>
</html>