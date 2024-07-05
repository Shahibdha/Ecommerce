<?php


$query = "SELECT `$needID` FROM `$tbl` ORDER BY `$needID` DESC LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    
    $genID = 1000;
} else {
   
    $row = mysqli_fetch_assoc($result);
    
   
    $existingMaxNumericID = intval(substr($row[$needID], 3)); //  "UIDXXXX" 
    
    
    $genID = $existingMaxNumericID + 1;
    
}

?>

