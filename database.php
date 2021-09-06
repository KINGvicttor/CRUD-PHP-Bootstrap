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
    <title>Base de dados</title>
    <link rel="stylesheet" href="css/database.css">
</head>
<body>
    <div class="container">
        <?php

        //checando conexão
        if($conn->connect_error){
            die("Connection failed" . $conn->connect_error);
        }

        //paginação 1
        $quantidade = 10;
        $paginaAtual = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
        $inicio = ($quantidade * $paginaAtual) - $quantidade;


        //select no banco de dados
        $sql = "SELECT id, nome, email FROM clientes ORDER BY id LIMIT $inicio, $quantidade";
        $result = $conn->query($sql);

        //checando se retornou algo e caso sim inserindo na tabela
        if($result->num_rows > 0){
            echo "<table class='table table-striped table-bordered table-hover'>
                    <thead>
                        <tr>
                        <th scope='col'>ID</th>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Email</th>
                        <th scope='col' colspan='2'><a class='add' href='register.php'><button type='button' class='btn btn-success'>Adicionar</button></a></th>
                        </tr>
                    </thead>";
            while($row = $result->fetch_assoc()){
                echo "<tbody>
                        <tr>
                        <th scope='row'>".$row['id']."</th>
                        <td>".$row['nome']."</td><td>".$row['email']."</td>
                        <td colspan='2'>
                        <a class='edit' href='edit.php?id=".$row['id']."'><button type='button' class='btn btn-warning'>Editar</button></a>
                        <a class='delete' onclick='return confirm(\"Deseja realmente deletar esse Registro?\")' href=''><form action='delete.php' method='POST'><input type='hidden' name='id' value='".$row['id']."' ></input><button type='submit' class='btn btn-danger'>Deletar</button></form></a>
                        </td>
                        </tr>
                    </tbody>";         
            }
        }else{
            echo "0 results";
        }
        ?> 

        <?php
        //paginação

        $limite = "SELECT id FROM clientes";
        $todos = $conn->query($limite);

        $tr = $todos->num_rows;
        $tp = $tr / $quantidade;

        $anterior = $paginaAtual - 1;
        $proximo = $paginaAtual + 1;
        ?>
        <tfoot>
            <tr>
            <th colspan='4'>
                <div class='btn-toolbar' role='toolbar' aria-label='Toolbar with button groups'>
                <div class='btn-group me-2' role='group' aria-label='First group'>

                    <?php 
                    if($anterior >= 1){
                        echo "<a class='pg' href='database.php?pagina=$anterior'><button type='button' class='btn btn-outline-dark'><</button></a>";
                    }else{
                        echo "<button type='button' class='btn btn-outline-dark' disabled><</button>";
                    } 
                    ?>

                    <?php 
                    if($anterior >= 1){
                        echo "<a class='pg' href='database.php?pagina=$anterior'><button type='button' class='btn btn-outline-dark'>$anterior</button></a>";
                    }else{
                        echo "<button type='button' class='btn btn-outline-dark disabled'></button>";
                    }
                    ?>

                    <button type='button' class='btn btn-outline-dark'><?php echo $paginaAtual;?></button>

                    <?php 
                    if($proximo > $paginaAtual){
                        echo "<a class='pg' href='database.php?pagina=$proximo'><button type='button' class='btn btn-outline-dark'>$proximo</button></a>";
                    }else{
                        echo "<button type='button' class='btn btn-outline-dark disabled'></button>";
                    }                    
                    ?>

                    <?php 
                    if($proximo > $paginaAtual){
                        echo "<a class='pg' href='database.php?pagina=$proximo'><button type='button' class='btn btn-outline-dark'>></button></a>";
                    }else{
                        echo "<button type='button' class='btn btn-outline-dark' disabled>></button>";
                    } 
                    ?>

                </div>
            </th>
            </tr>
        </tfoot>

        <?php echo "</table>";?>
    </div>
</body>
</html>