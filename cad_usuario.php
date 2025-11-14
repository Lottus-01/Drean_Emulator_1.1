<?php
$nome = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['password'];
$confirmarSenha = $_POST['confirmPasswor'];
$celular = $_POST['phoneNumber'];
$setor = $_POST['function'];


include 'conexao.php';


$insert = "INSERT INTO tb_usuario values(null, '$nome', '$email ', '$senha','$celular','$setor')";
echo $insert;

$query = $conexao->query($insert);


if ($query == true) {
    echo "<script>alert('User craete sucefully'); window.href = '../login.html' </script>";
}


?>
