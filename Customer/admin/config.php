<?php
$con = mysqli_connect("localhost","root","","elesemes");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
