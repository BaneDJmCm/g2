<?php
session_start();
$sesion = $_SESSION['correo_us'];

if(!isset($sesion)){
    header("location: ../index.php");
}
require 'conexion.php';
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM tarea WHERE id_tarea=$id";
    $result = mysqli_query($conn, $consulta);
    if (mysqli_num_rows($result) == 1) {
      $avancet = $row['avance_tarea'];
    }
  }

  if (isset($_POST['actualizar_tarea'])) {
    $id = $_GET['id'];
      $avancet = $_POST['avance_edit'];

    $query = "UPDATE tarea set avance_tarea = '$avancet' WHERE id_tarea=$id";
        mysqli_query($conn, $query);
        $_SESSION['mess'] = 'Datos de la tarea actualizados.';
        $_SESSION['mess_type'] = 'warning';
        echo '<script>window.history.go(-1);</script>';
}
?>