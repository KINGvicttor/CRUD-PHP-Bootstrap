<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projeto1";

//create connection

$conn = new mysqli($servername, $username, $password, $dbname);

//check connection

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}
?>