<?php
session_start();
require 'conexion.php';
$email = $_POST['correo_us'];
$password = $_POST['pass_us'];

$query = "SELECT COUNT(*) as contar FROM usuarios where emil_us = '$email' and pass_us = '$password'";
$bdconect = mysqli_query($conn,$query);
$parametros = mysqli_fetch_array($bdconect);
if($parametros['contar']>0){
   $_SESSION['correo_us'] = $email;
  header("location: ../menu.php");
}
else{
  $_SESSION['mess'] = "Usuario no registrado.";
  $_SESSION['mess_type'] = "danger";
  header('Location: ../index.php');
}
?>