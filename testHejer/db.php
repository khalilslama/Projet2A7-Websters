<?php

$servername = "localhost";
$username = "root";
$password = "jerjer2511";
$db = "projetweb";

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>