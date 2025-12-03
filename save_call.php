<?php
$fk_type = $_POST['type'];
$fk_category = $_POST['category'];
$fk_urgency = $_POST['urgency'];
$nm_title = $_POST['title'];
$nm_description = $_POST['description'];

include 'conexao.php';

$insert = "INSERT INTO tb_call values(null, '$fk_type', '$fk_category', '$fk_urgency','$nm_title','$nm_description')";
echo $insert;

$query = $conexao->query($insert);


if ($query == true) {
    header('location: firstscrean.php');
    echo "<script> alert('Call registred!'); window.location.href = 'login.html'; </script>";
}


?>