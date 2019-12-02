<?php
session_start();
$sesion = $_SESSION['correo_us'];

if(!isset($sesion)){
    header("location: ../index.php");
}
require 'conexion.php';
if  (isset($_GET['id'])) {
    $id = $_GET['id'];
    $consulta = "SELECT * FROM proyectos WHERE id_proyecto=$id";
    $result = mysqli_query($conn, $consulta);
    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $nombrep = $row['nombre_proyecto'];
      $descripcionp = $row['descripcion_proyecto'];
      $encargadop = $row['encargado_proyecto'];
      $fechainip = $row['fechaini_proyecto'];
      $duracion = $row['duracion_proyecto'];
      $fechafinp = $row['fechafin_proyecto'];
      $ci_uss = $row['ci_uss'];
    }
  }

  if (isset($_POST['actualizar_proyecto'])) {
    $id = $_GET['id'];
    $nombrep = $_POST['nombre_edit'];
    $descripcionp = $_POST['descripcion_edit'];
    $encargadop= $_POST['encargado_edit'];
    $fechainip = $_POST['fechaini_edit'];
    $duracion = $_POST['duracion_edit'];
    $fechafinp= $_POST['fechafin_edit'];
    $ci_uss = $_POST['ci_ussp'];

    $query = "UPDATE proyectos set nombre_proyecto = '$nombrep', descripcion_proyecto = '$descripcionp', encargado_proyecto = '$encargadop', fechaini_proyecto = '$fechainip',duracion_proyecto = '$duracion', fechafin_proyecto = '$fechafinp', ci_uss ='$ci_uss' WHERE id_proyecto=$id";
        mysqli_query($conn, $query);
        $_SESSION['mess'] = 'Datos del proyecto actualizados.';
        $_SESSION['mess_type'] = 'warning';
        header('Location: ../menu.php');
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
  <h1>Perfil de Proyecto</h1>
  <hr>
  
<form action="edit_proyect.php?id=<?php echo $_GET['id']; ?>" method="POST">
  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="Nombre" name="nombre_edit" value="<?php echo $nombrep;?>">
        <label for="Nombre">Nombre</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <!-- Grid row -->
  <div class="row">
<!-- Grid column -->
    <div class="col-md-4">
        <!-- Material input -->
        <div class="md-form form-group">
            <input type="text" class="form-control" id="apellido" name="descripcion_edit" value="<?php echo $descripcionp;?>">
            <label for="apellido">Descripcion</label>
        </div>
        </div>
        <!-- Grid column -->
    </div>
  <!-- Grid row -->
  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="ci" name="encargado_edit" value="<?php echo $encargadop;?>">
        <label for="ci">Encargado</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="fechanacimiento"  name="fechaini_edit" value="<?php echo $fechainip;?>" readonly>
        <label for="fechanacimiento">Fecha inicio</label>
      </div>
    </div>
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="duracion"  name="duracion_edit" value="<?php echo $duracion;?>" readonly>
        <label for="duracion">Duracion</label>
      </div>
    </div>
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="empresa" name="fechafin_edit" value="<?php echo $fechafinp;?>" readonly>
        <label for="empresa">Fecha final</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="ci_ussp" name="ci_ussp" value="<?php echo $ci_uss;?>" readonly>
        <label for="ci_ussp">Cil</label>
      </div>
    </div>
    <!-- Grid column -->
  
  </div>
  <!-- Grid row -->
  <button class="btn btn-warning btn-md" name="actualizar_proyecto">Actulizar</button>
  <a type="button" class="btn  btn-danger waves-effect" href="../menu.php">Cancelar</a>
</form>
</div>
<!-- Extended material form grid -->
        </main>
        <!--/Main layout-->
    


      <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
      <script type="text/javascript" src="../js/popper.min.js"></script>
      <script type="text/javascript" src="../js/bootstrap.min.js"></script>
      <script type="text/javascript" src="../js/mdb.min.js"></script>
      <script type="text/javascript" src="../js/mdb.js"></script>
</body>
</html>

