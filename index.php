<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- área do bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!--<link rel="stylesheet" href="js/materialize.min.css">-->
    <style>
    reeed{
        background-color:red;
    }
    
    </style>

    <title>Document</title>
</head>
<body>



    <?php require_once 'process.php';
    ?>
    
    <!-- para mostrar mensagem de erro-->
    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert alert-<?=$_SESSION['msg_type']?>"> 
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>
    <?php endif;?>


    <?php
    $mysqli = new mysqli('localhost', 'root', '', 'bdcrud') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM usuario") or die($mysql->error);
    
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
            
                <thead>
                    <tr>
                        <th>Name: </th>
                        <th>Email: </th>
                        <th colspan="2"> Ação:</th>
                    </tr>
                    </thead>
        <?php
        
        while($row = $result->fetch_assoc()):?>
                <tr>
                    <td> <?php echo $row['nome']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['id'];?>" class="btn btn-primary">Editar </a> 
                   
                        <a href="process.php?delete=<?php echo $row['id'];?>" class=" btn btn-danger">Deletar </a>
                    </td>
                </tr>
                <?php  endwhile;?>
            </table>
            </div>
        </div>    
        
        
    <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="form-group">
                <label>Name: </label>
                <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>" placeholder="Insira seu nome" requiered>
            </div>
            <label>Email: </label>
            <div class="form-group">
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" placeholder="example@example.com" requiered>
            </div>
            <div class="form-group">
               <?php if($update==true): ?>
                    <button type="submit" name="update" class="btn btn-info">Atualizar</button>
                <?php else: ?>
                    <button type="submit" name="save" class="btn btn-info">Enviar</button>
                <?php endif; ?>
            </div>
        </form>
    </div>

    <!--<script type="text/javascript" src="js/materialize.min.js"></script>-->
    
</body>
</html>