<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST">
            <div class="mb-3">
            <img src="img/user.png">
            </div>

            <div class="mb-3">
            <label for="exampleInputText" class="form-label">Usuário</label>
            <input type="text" aria-label="First name" class="form-control" autocomplete="off" placeholder="Usuário" required name="user">   
            </div>  

            <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" autocomplete="off" placeholder="Senha" required name="password">
            </div>
            
            <button type="submit" class="btn btn-success">Login</button>
        </form>     
    </div>  
</body>
</html>