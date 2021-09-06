<?php 
require_once "connection.php";

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

$sql = "SELECT * FROM admins WHERE usuario = '".$_POST['user']."' ";
$sql2 = "SELECT * FROM admins WHERE senha = '".$_POST['password']."' ";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if($result->num_rows and $result2->num_rows > 0){
    echo"<script>alert('Bem-Vindo!');window.location.replace('database.php?pagina=1');</script>";
    die;
}else{
    echo"<script>alert('Acesso negado.');window.location.replace('index.php');</script>";
    die;
}

$conn->close();
?>