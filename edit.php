<?php
require_once "includes/header.html";
require_once "connection.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar dados</title>
</head>
<body>
    <?php

    if($conn->connect_error){
        die("Connection failed" . $conn->connect_error);
    }
    $id = $_GET['id'];
    $sql = "SELECT * FROM clientes WHERE id = $id";
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    
    ?>
    <div class="container">
        <form action="update.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="mb-3">
            <label for="exampleInputText" class="form-label">Nome</label>
            <input type="text" aria-label="First name" class="form-control" value="<?php echo $row['nome']; ?>" autocomplete="off" required name="name">   
            </div>  

            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['email'];?>" autocomplete="off" required name="email">
            </div>

            <button type="submit" class="btn btn-warning">Editar</button>

        </form>     
    </div> 

</body>
</html>