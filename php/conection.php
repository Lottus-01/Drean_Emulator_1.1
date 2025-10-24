<?php
//informations to conect a SGBD

$server = "localhost";
$user = "root";
$password = "admin";
$database = "db_sistema";

$conection = new mysqli($server, $user, $password, $database);

if($conection == true){
    echo "Conection sucefully"
}
else{
    echo "Conection Error"
}

?>