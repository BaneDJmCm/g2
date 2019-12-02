<?php
session_start();
include("conexion.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "DELETE FROM tarea WHERE id_tarea = $id";
  $result = mysqli_query($conn, $consulta);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['mess'] = 'Tarea eliminada.';
  $_SESSION['mess_type'] = 'danger';
  echo '<script>window.history.go(-1);</script>';
}

?>
