<?php
$con=mysqli_connect("localhost","root","","bank_for_you");

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
date_default_timezone_set("Asia/Kolkata");

  

$hostname="http://localhost:8080/bank_for_you";

?>