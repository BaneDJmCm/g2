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

  if (isset($_POST['act'])) {
    $id = $_GET['id'];
    $nombret = $nombret;
      $fit = $fit;
      $duraciont = $duraciont;
      $fft = $fft;
      $avancet = $_POST['avance_edit'];
      $recursot = $recursot;
      $id_pt = $id_pt;

    $query = "UPDATE tarea set nombre_tarea = '$nombret', fechaini_tarea = '$fit', duracion_tarea = '$duraciont', fechafin_tarea = '$fft', avance_tarea = '$avancet', recurso_tarea ='$recursot', id_proyecto = '$id_pt' WHERE id_tarea=$id";
        mysqli_query($conn, $query);
        $_SESSION['mess'] = 'Avance actualizado.';
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
  <div class="form-row">
    <div class="col-md-4">
      <h1>Avance de la Tarea</h1>
    </div>
    <div class="col-md-4">
      <a type="button" class="btn  btn-primary waves-effect" href="../proyecto.php?id=<?php echo $id_pt?>">Regresar al proyecto</a>
    </div>
</div>
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
 
  

<form action="edit_proc.php?id=<?php echo $_GET['id']; ?>" method="POST">
  <!-- Grid row -->
  <div class="col-md-4">
    <h1><?php echo $nombret;?></h1>
    </div>
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="number" class="form-control" id="avanc" name="avance_edit" value="<?php echo $avancet;?>" min="0" max="100">
        <label data-error="Datos incorrectos" data-success="Correcto" for="avanc" class="ml-0" for="avance">Avance</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <table class="table table-borderless">
                <thead style=" text-decoration-style: double; ">
                  <tr>
                    <th scope="col" style="width: 105px">Fecha Inicio</th>
                    <th scope="col"></th>
                    <th scope="col">Avance de la Tarea</th>
                    <th scope="col"></th>
                    <th scope="col" style="width: 100px">Fecha Fin</th>
                  </tr>
                </thead>
                  <tbody>
                    <tr>
                      <td><?php echo $fit;?></td>
                      <td colspan="3"  style="padding-top: 20px">
                      <div class="progress" style="height: 20px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $row['avance_tarea']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $avancet;?>%; height: 20px"><?php echo $avancet;?>%</div>
                      </div>
                      </td>
                      <td><?php echo $fft;?></td>
                    </tr>
                  </tbody>
                </table>
  <!-- Grid row -->
  <button class="btn btn-warning btn-md" name="act">Actulizar</button>
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

