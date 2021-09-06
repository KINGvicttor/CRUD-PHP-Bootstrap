<?php 
require_once "includes/header.html";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>  
    <div class="container">
        <form action="insert.php" method="POST">
            <div class="mb-3">
            <label for="exampleInputText" class="form-label">Nome</label>
            <input type="text" aria-label="First name" class="form-control" placeholder="Nome" autocomplete="off" required name="name">   
            </div>  

            <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="exemplo@exemplo.com" autocomplete="off" required name="email">
            </div>

            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" autocomplete="off" required name="password">
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>     
    </div>             
</body>
</html>