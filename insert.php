<?php
require_once "connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$criptPassword = md5($password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

$sql = "INSERT INTO clientes (nome, email, senha) VALUES ('$name', '$email', '$criptPassword')";

if($conn->query($sql) === TRUE){
    echo "<script>alert('Cadastrado com sucesso!');window.location.replace('database.php?pagina=1');</script>";

}else{
    echo"<script>alert('Erro ao cadastrar');window.location.replace('register.php');</script>" . $conn->error;
}

$conn->close();
?>