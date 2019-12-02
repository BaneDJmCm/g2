<?php
session_start();
include("conexion.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "DELETE FROM proyectos WHERE id_proyecto = $id";
  $result = mysqli_query($conn, $consulta);
  if(!$result) {
    die("Query Failed.");
  }
  $_SESSION['mess'] = 'Proyecto eliminado';
  $_SESSION['mess_type'] = 'danger';
  header('Location: ../menu.php');
}

?>
