<?php
require_once 'dataBase/database.php';
$db = connectionDB();

$email    = 'hernanarica@gmail.com';
$password = 'asdf1234'; //Para proteger la password hay que hashearla

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO usuarios (email, password)
          VALUES ('$email','$passwordHash')";

$res = mysqli_query($db, $query);

if ($res) {
   echo "Todo OK";
} else {
   echo ":(";
}



