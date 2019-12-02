<?php
session_start();
$sesion = $_SESSION['correo_us'];

if(!isset($sesion)){
    header("location: index.php");
}?>
<?php include("conexion/conexion.php");
$id_pro =$_SESSION['d'];
 $resultado = "SELECT * FROM proyectos where '$id_pro'= id_proyecto";
 $result_proyectos = mysqli_query($conn, $resultado);    

 while($row = mysqli_fetch_assoc($result_proyectos)) {
   $inicio=$row['fechaini_proyecto'];
   $fin=$row['fechafin_proyecto'];
 }
 if ($_SESSION['a'] < $inicio) {
        $_SESSION['mess'] = 'La fecha de inicio de la tarea no concuerda con las fechas del proyecto.';
        $_SESSION['mess_type'] = 'warning';
        echo '<script>window.history.go(-1);</script>';
 }
//  $date=date("Y-m-d");
//  $mod_date= strtotime($date."- 1 days");
//  if ($_SESSION['a'] < date("Y-m-d", $mod_date)) {
//   $_SESSION['mess'] = 'La creacion de la tarea no concuerda con la fecha de hoy.';
//   $_SESSION['mess_type'] = 'warning';
//   echo '<script>window.history.go(-1);</script>';
// }
 if ($_SESSION['a'] > $fin || $_SESSION['c'] > $fin){
        $_SESSION['mess'] = 'La fecha de finalizacion de la tarea no concuerda con las fechas del proyecto.';
        $_SESSION['mess_type'] = 'warning';
        echo '<script>window.history.go(-1);</script>';
 }
?>
<!DOCTYPE html>
<html lang="es">
<head>
     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizador de proyectos</title>
</head>
<body>

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
          <a class="nav-link" href="menu.php">Proyectos</a>
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
  <h1>Perfil de la Tarea</h1>
  <hr>
<form action="conexion/reg_tarea.php" method="post">
  <div class="row">
    <div class="col-md-4">
      <div class="md-form form-group">
          <input type="text" id="NomProyect" class="form-control form-control-sm validate ml-0" required name="nombre_tarea">
          <label data-error="Datos incorrectos" data-success="Correcto" for="NomProyect" class="ml-0">Nombre de la tarea</label>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="md-form form-group">
          <input type="text" id="Dateini" class="form-control form-control-sm ml-0" required name="fecha_ini" value="<?php echo $_SESSION['a']?>" readonly>
          <label data-error="Datos incorrectos" data-success="Correcto" for="Dateini" class="ml-0">Fecha de inicio</label>
      </div>
    </div>
    <div class="col-md-4">
      <div class="md-form form-group">
          <input type="text" id="duracion" class="form-control form-control-sm ml-0" required name="duracion_tarea" value="<?php echo $_SESSION['b']?>" readonly>
          <label data-error="Datos incorrectos" data-success="Correcto" for="duracion" class="ml-0">Duracion</label>
      </div>
    </div>
    <!-- Grid column -->
    <div class="col-md-4">
      <div class="md-form form-group">
          <input type="text" id="Datefin" class="form-control form-control-sm ml-0" required name="fecha_fin" value="<?php echo $_SESSION['c']?>" readonly>
          <label data-error="Datos incorrectos" data-success="Correcto" for="Datefin" class="ml-0">Fecha de finalización</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <div class="row">
    <div class="col-md-4">
        <div class="md-form ml-0 mr-0">
          <input type="text" id="Porcentaje" class="form-control form-control-sm validate ml-0" name="avance_tarea" value="0">
          <label data-error="Datos incorrectos" data-success="Correcto" for="Porcentaje" class="ml-0">Avance</label>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col-md-4">
        <div class="md-form ml-0 mr-0">
          <input type="text" id="Recurso" class="form-control form-control-sm validate ml-0"  name="recurso_tarea">
          <label data-error="Datos incorrectos" data-success="Correcto" for="Recurso" class="ml-0">Recurso</label>
        </div>
      </div>
  </div>
  
          <input type="text" id="asd" class="form-control form-control-sm ml-0"  name="id_pro" value="<?php echo $_SESSION['d'] ?>" readonly Style="visibility:hidden">

  <!-- Grid row -->
  <button type="submit" class="btn btn-primary" name="Registrar_tarea">Crear</button>
  <a type="button" class="btn  btn-danger waves-effect" href="proyecto.php?id=<?php echo $_SESSION['d']?>">Cancelar</a>
</form>
</div>
<!-- Extended material form grid -->
        </main>
        <!--/Main layout-->
    



  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>

    