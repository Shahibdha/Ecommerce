<?php
require_once '../../config.php';

// Default sorting column and order
$sortColumn = isset($_GET['sort']) ? $_GET['sort'] : 'EmpID';
$sortOrder = isset($_GET['order']) ? $_GET['order'] : 'ASC';

// SQL query to fetch employees and calculate totals
$sql = "SELECT * FROM employee ORDER BY $sortColumn $sortOrder";
$result = mysqli_query($con, $sql);

// Initialize counters
$totalEmployees = 0;
$totalEarnings = 0;

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        // Increment total employees count
        $totalEmployees++;
        // Add the current employee's salary to the total earnings
        $totalEarnings += $row["Salary"];
?>
        <tr>
            <td><?php echo $row["EmpID"]; ?></td>
            <td><?php echo $row["Ename"]; ?></td>
            <td><?php echo $row["Position"]; ?></td>
            <td><?php echo $row["Email"]; ?></td>
            <td><?php echo $row["Phone Number"]; ?></td>
            <td>Rs.<?php echo $row["Salary"]; ?></td>
            <td class="no-print"><a href="EditEmployee.php?id=<?php echo $row["EmpID"]; ?>" class="btn btn-success"><i class='bx bx-edit'></i></a></td>
            <td class="no-print"><a href="../handler/DeleteEmp.php?id=<?php echo $row["EmpID"]; ?>" class="btn btn-danger"><i class='bx bxs-trash-alt'></i></a></td>
        </tr>
<?php
    }
} else {
    echo "<tr><td colspan='8'>No employees found</td></tr>";
}

mysqli_close($con); // Close the connection
?>

<!-- Store the totals in data attributes to use them in the HTML -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('total-employees').dataset.count = <?php echo $totalEmployees; ?>;
        document.getElementById('total-earnings').dataset.total = <?php echo $totalEarnings; ?>;
    });
</script>