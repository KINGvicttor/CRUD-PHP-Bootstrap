<?php
require_once "connection.php";

$id = $_POST['id'];

if($conn->connect_error){
    die("Connection failed" . $conn->connect_error);
}

$sql = "DELETE FROM clientes WHERE id='$id'";

if($conn->query($sql) === TRUE){
    echo "<script>alert('Deletado com sucesso!');window.location.replace('database.php?pagina=1');</script>";
    die;
}else{
    echo "<script>alert('Falha ao deletar.');window.location.replace('database.php');</script>";
    die;
}

$conn->close();
?>