<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "test1"; 

//  connection create phpmyadmine
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection obj
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
