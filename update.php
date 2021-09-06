<?php
require_once "connection.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

$sql = "UPDATE clientes SET nome='$name', email='$email' WHERE id ='$id'";

if($conn->query($sql) === TRUE){
    echo"<script>alert('Editado com sucesso!');window.location.replace('database.php?pagina=1');</script>";
}else{
    echo"<script>alert('Falha ao editar.');window.location.replace('database.php?pagina=1');</script>";
}

$conn->close();
?>