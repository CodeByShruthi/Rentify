<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database= 'sample';


$con = mysqli_connect($hostname,$username,$password,$database);

if ($con){
    echo "connection established";
}
else {
    die(mysqli_error($con));
}


?>