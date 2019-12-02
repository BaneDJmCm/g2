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
      $row = mysqli_fetch_array($result);
      $nombret = $row['nombre_tarea'];
      $fit = $row['fechaini_tarea'];
      $duraciont = $row['duracion_tarea'];
      $fft = $row['fechafin_tarea'];
      $avancet = $row['avance_tarea'];
      $recursot = $row['recurso_tarea'];
      $id_pt = $row['id_proyecto'];
    }
  }

  if (isset($_POST['actualizar_tarea'])) {
    $id = $_GET['id'];
    $nombret = $_POST['nombre_edit'];
      $fit = $_POST['fechaini_edit'];
      $duraciont = $_POST['duracion_edit'];
      $fft = $_POST['fechafin_edit'];
      $avancet = $_POST['avance_edit'];
      $recursot = $_POST['recurso_edit'];
      $id_pt = $_POST['id_proedit'];

    $query = "UPDATE tarea set nombre_tarea = '$nombret', fechaini_tarea = '$fit', duracion_tarea = '$duraciont', fechafin_tarea = '$fft', avance_tarea = '$avancet', recurso_tarea ='$recursot', id_proyecto = '$id_pt' WHERE id_tarea=$id";
        mysqli_query($conn, $query);
        $_SESSION['mess'] = 'Datos de la tarea actualizados.';
        $_SESSION['mess_type'] = 'warning';
        echo '<script>window.history.go(1);</script>';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="../css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="../css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizador de proyectos</title>
</head>
<body class="fixed-sn black-skin">

        <!--Double navigation-->
        <header>
         

<nav class="navbar navbar-expand-lg navbar-dark bg-dark primary-color double-nav fixed-top navbar-toggleable-md scrolling-navbar">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">Organizador de Proyectos</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../menu.php">Proyectos</a>
        </li>
        <?php  $dd=$_SESSION['correo_us'];?>
        <?php
        $resultado = "SELECT * FROM usuarios where '$dd'= emil_us";
        $result_proyectos = mysqli_query($conn, $resultado);    

        while($row = mysqli_fetch_assoc($result_proyectos)) { ?>
        <li class="nav-item">
          <a class="nav-link" href="conexion/perfil.php?id=<?php echo $row['id_us']?>">Perfil</a>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link"><?php echo $_SESSION['correo_us'] ?></a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="salir.php">Salir</a>
        </li>
      </ul>
      </div>
    <!-- Links -->
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->
        </header>
        <!--/.Double navigation-->
<br>
<br>
<br>
<br>
        <!--Main layout-->
<main>
  <!-- Extended material form grid -->

<div class="container">
  <h1>Perfil de Tarea</h1>
  <hr>

  <?php if (isset($_SESSION['mess'])): ?>
            <div class="alert alert-<?php echo $_SESSION['mess_type'];?> alert-dismissible fade show" role="alert">
              <p><?php echo $_SESSION['mess'];?></p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            unset($_SESSION['mess']); 
            endif; 
          ?>
  <a type="button" class="btn  btn-primary waves-effect" href="../proyecto.php?id=<?php echo $id_pt?>">Regresar al proyecto</a>
  
<form action="edit_tarea.php?id=<?php echo $_GET['id']; ?>" method="POST">
  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="Nombre" name="nombre_edit" value="<?php echo $nombret;?>">
        <label for="Nombre">Nombre</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <!-- Grid row -->
  <!-- Grid row -->
  <div class="form-row">
    <!-- Grid column -->
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="date" class="form-control" id="fechaf"  name="fechaini_edit" value="<?php echo $fit;?>" readonly>
        <label for="fechaf">Fecha inicio</label>
      </div>
    </div>
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="duracion" name="duracion_edit" value="<?php echo $duraciont;?>" readonly>
        <label for="duracion">Duracion</label>
      </div>
    </div>
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="date" class="form-control" id="fechaf" name="fechafin_edit" value="<?php echo $fft;?>" readonly>
        <label for="fechaf">Fecha final</label>
      </div>
    </div>
    <!-- Grid column -->
  
  </div>
  <div class="form-row">
    <!-- Grid column -->
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="avnce"  name="avance_edit" value="<?php echo $avancet;?>" readonly>
        <label for="avnce">Avance</label>
      </div>
    </div>
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="recris"  name="recurso_edit" value="<?php echo $recursot;?>">
        <label for="recris">Recurso</label>
      </div>
    </div>
    <!-- Grid column -->
    <!-- Grid column -->
  
  </div>
  <!-- Grid row -->
  <!-- Grid row -->
  <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="ide" name="id_proedit" value="<?php echo $id_pt;?>" readonly>
        <label for="ide">Identificador</label>
      </div>
    </div>
    <!-- Grid column -->
  
  </div>
  <!-- Grid row -->
  <button class="btn btn-warning btn-md" name="actualizar_tarea">Actulizar</button>
  <a type="button" class="btn  btn-danger waves-effect" href="../proyecto.php?id=<?php echo $id_pt?>">Cancelar</a>
</form>
<!-- Extended material form grid -->
</div>
        </main>
        <!--/Main layout-->
    


       <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
      <script type="text/javascript" src="../js/popper.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/mdb.min.js"></script>
      <script type="text/javascript" src="../js/mdb.js"></script>
</body>
</html>

