<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phoneNumber = $_POST['phoneNumber'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPasswor'];
$function = $_POST['function'];

echo "Your name is". $name;
echo "<br>";
echo "Your email is". $email;
echo "<br>";
echo "Your Phone Number is". $phoneNumber;
echo "<br>";
echo "Your password is". $password;
echo "<br>";
echo "Your confirmation of Password is". $confirmPassword;
echo "<br>";
echo "Your function is". $function;

print_r($_POST);


?>