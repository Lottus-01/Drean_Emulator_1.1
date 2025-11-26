<?php
$email = $_POST['email'];
$senha = $_POST['password'];

include 'conexao.php';

$select = "SELECT * FROM tb_usuario WHERE nm_email = '$email'";

$query = $conexao->query($select);

$resultado =$query->fetch_assoc();

print_r($_POST);
print_r($resultado);

$email = $resultado['nm_email'];
$password = $resultado['nr_senha'];

?>