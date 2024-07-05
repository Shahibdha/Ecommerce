<?php
require_once '../../config.php';

$sql = "SELECT * FROM `review` ORDER BY `time` DESC";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($con));
}

header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=report.xls");

echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>';
echo '<div class="content">
        <h2 class="text-center">FEEDBACK MANAGEMENT</h2>
        <table class="table table-striped ">
          <thead class="table-dark">
            <tr>
              <th>Name</th>
              <th>Rating</th>
              <th>Time</th>
              <th>Comment</th>
            </tr>
          </thead>
          <tbody>';

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
          <tr>
            <td>' . $row['name'] . '</td>
            <td>' . $row['rating'] . '</td>
            <td>' . date("Y-m-d", strtotime($row['time'])) . '</td>
            <td class="comment-column" title="' . $row['comment'] . '">' . $row['comment'] . '</td>
            </tr>';
    }
}
echo '</tbody></table></div></body></html>';

mysqli_close($con);

