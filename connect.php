<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'rentify_db';


$con = mysqli_connect($hostname, $username, $password, $database);
if (!$con) {
    // Display an alert with the connection error message
    echo "<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>";
    // Terminate the script
    die();
}

?>
