<?php
session_start();
$sesion = $_SESSION['correo_us'];

if(!isset($sesion)){
    header("location: ../index.php");
}?>

<?php
require 'conexion.php';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "SELECT * FROM usuarios WHERE id_us=$id";
  $result = mysqli_query($conn, $consulta);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
   
    $nombre=$row['nombre_us'];
    $apellidos=$row['apellidos_us'];
    $ci=$row['ci_us'];
    $fechanac=$row['fechanacimiento_us'];
    $empresa=$row['empresa_us'];
    $telefono=$row['telefono_us'];
    $email=$row['emil_us'];
    $passw=$row['pass_us']; 
  }
}

if (isset($_POST['actualizar_usuario'])) {
    $id = $_GET['id'];
    $nombre=$_POST['nombre_edit'];
    $apellidos=$_POST['apellido_edit'];
    $ci=$_POST['ci_edit'];
    $fechanac=$_POST['fechanacimiento_edit'];
    $empresa=$_POST['empresa_edit'];
    $telefono=$_POST['telefono_edit'];
    $email=$_POST['correo_edit'];
    $passw=$_POST['pass_edit']; 

  $query = "UPDATE usuarios SET nombre_us = '$nombre', apellidos_us = '$apellidos', ci_us = '$ci', fechanacimiento_us = '$fechanac', empresa_us = '$empresa', telefono_us = '$telefono', emil_us = '$email', pass_us = '$passw' WHERE id_us=$id";
  mysqli_query($conn, $query);
  $_SESSION['mess'] = 'Peril actualizado.';
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
          <!-- Sidebar navigation -->
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
        <li class="nav-item"><a class="nav-link">Perfil</a></li>
        <?php } ?>
        </li>
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
  <h1>Perfil de Usuario</h1>
  <hr>
  
<form action="perfil.php?id=<?php echo $_GET['id']; ?>" method="POST">
  <!-- Grid row -->
  <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="id_udd" name="nombre_edit" value="<?php echo $nombre;?>">
        <label for="id_udd">Nombre</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="apellido" name="apellido_edit" value="<?php echo $apellidos;?>">
        <label for="apellido">Apellidos</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->

  <!-- Grid row -->
  <div class="form-row">
    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="ci" name="ci_edit" value="<?php echo $ci;?>" readonly>
        <label for="ci">Cedula de identidad</label>
      </div>
    </div>
    <!-- Grid column -->

    <!-- Grid column -->
    <div class="col-md-4">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="fechanacimiento"  name="fechanacimiento_edit" value="<?php echo $fechanac;?>">
        <label for="fechanacimiento">Fecha de nacimiento</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <!-- Grid row -->
  <div class="row">
    <!-- Grid column -->
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="empresa" name="empresa_edit" value="<?php echo $empresa;?>">
        <label for="empresa">Empresa</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
    <!-- Grid column -->
  <div class="row">
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="telefono" name="telefono_edit" value="<?php echo $telefono;?>">
        <label for="telefono">Telefono</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
      <!-- Grid column -->
      <div class="row">
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="correo" name="correo_edit" value="<?php echo $email;?>"readonly>
        <label for="correo">Correo</label>
      </div>
    </div>
    <div class="col-md-6">
      <!-- Material input -->
      <div class="md-form form-group">
        <input type="text" class="form-control" id="pas_edit" name="pass_edit" value="<?php echo $passw;?>">
        <label for="pass_edit">contraseña</label>
      </div>
    </div>
    <!-- Grid column -->
  </div>
  <!-- Grid row -->
  <button class="btn btn-warning btn-md" name="actualizar_usuario">Actulizar</button>
  <a type="button" class="btn  btn-danger waves-effect" href="../menu.php">Cancelar</a>
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