<?php
session_start();
$update=false;
$nome="";
$email="";
$id= 0;
$mysqli = new mysqli('localhost', 'root', '', 'bdcrud') or die(mysqli_error($mysqli));


if(isset($_POST['save'])){
    $name = $_POST['nome'];
    $email = $_POST['email'];

    $mysqli->query("INSERT INTO usuario(nome, email) VALUES('$name', '$email')") or die($mysqli->error);

    $_SESSION['message'] = "Dado foi salvo!";
    $_SESSION['msg_type']= "success";

    header('location:index.php');

}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM usuario WHERE id=$id") or die($mysqli->error());


    $_SESSION['message'] = "Dado foi deletado!";
    $_SESSION['msg_type']= "danger";
    header('location:index.php');
}

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;

    $result = $mysqli->query("SELECT * FROM usuario WHERE id=$id") or die($mysqli->error());

    if(count($result)==1){
        $row = $result->fetch_array();
        $nome = $row['nome'];
        $email = $row['email'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $mysqli->query("UPDATE usuario SET nome='$nome', email='$email' WHERE id=$id") or die($mysqli->error);
    $_SESSION['message'] = "Dado foi atualizado";
    $_SESSION['msg_type'] = "warning";

    header('Location: index.php');
}