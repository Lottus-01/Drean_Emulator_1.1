<?php

$email = $_POST['email'];
$senha = $_POST['password'];

include 'conexao.php';

$select = "SELECT * FROM tb_usuario WHERE nm_email = '$email'";

$query = $conexao->query($select);

$resultado =$query->fetch_assoc();


$nm_email = $resultado['nm_email'];
$nr_password = $resultado['nr_senha'];

print_r($_POST);
echo "<br>",
print_r($resultado['nm_email']);
print_r($resultado['nr_senha']);

if ($email == $nm_email && $senha == $nr_password) {
    session_start();
    $_SESSION['id_usuario'] = $resultado ['id_usuario'];
    $_SESSION['nm_usuario'] = $resultado ['nm_usuario'];
    header('location: firstscrean.php');

}else {

    echo "<script> alert('Usuario ou senha invalida!'); history.back() </script>";

}

?>