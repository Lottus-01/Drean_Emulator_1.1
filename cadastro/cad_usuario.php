<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$confirmarSenha = $_POST['confirmarSenha'];
$celular = $_POST['celular'];
$setor = $_POST['setor'];


include 'conexao.php';


$insert = "INSERT INTO tb_usuario(null, '$nome', '$email ', '$senha','$celular','$setor')";

$query = $conexao->query($insert);

if ($query == true) {
    echo "<script>alert('User craete sucefully'); window.href = '../login.html' </script>";
}


?>