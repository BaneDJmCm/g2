<?php
session_start();
$sesion = $_SESSION['correo_us'];

if(!isset($sesion)){
    header("location: index.php");
}?>
<?php include("conexion/conexion.php");?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizador de proyectos</title>
</head>
<body class="fixed-sn black-skin">

        <!--Double navigation-->
        <header>
          <!-- Sidebar navigation -->
          <!--/. Sidebar navigation -->
          <!-- Navbar -->
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
              <a  class="btn btn-primary" class="collapsible-header waves-effect arrow-r" data-toggle="modal" data-target="#AgregarProyecto" style> Crear Proyeto</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link">Proyectos</a>
            </li>
            <?php  $dd=$_SESSION['correo_us'];?>
            <?php
            $resultado = "SELECT * FROM usuarios where '$dd'= emil_us";
            $result_proyectos = mysqli_query($conn, $resultado);    

            while($row = mysqli_fetch_assoc($result_proyectos)) { ?>
            <li class="nav-item">
              <a class="nav-link" href="conexion/perfil.php?id=<?php echo $row['id_us']?>" disabled="disabled">Perfil</a>
            </li>
            <?php } ?>
        <li class="nav-item">
          <a class="nav-link"><?php  $dd=$_SESSION['correo_us'];echo $dd; ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="conexion/salir.php">Salir</a>
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

<div class="container">
        <!--Main layout-->
        <main>
          

        <?php
                  $resultado = "SELECT * FROM usuarios where '$dd'=emil_us";
                  $result_proyectos = mysqli_query($conn, $resultado);    
      
                  while($row = mysqli_fetch_assoc($result_proyectos)) { ?>
                  <p><?php  $ci_usob=$row['ci_us'];
                   ?></p>
         <?php } ?> 
    
          <div class="container-fluid text-center">
             <h1>Proyectos</h1>
             <hr>
            <!--Card-->
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
            <div class=" my-4 pb-5">

                <div class="row projects">
                <?php
                  $resultado = "SELECT * FROM proyectos where '$ci_usob'= ci_uss ";
                  $result_proyectos = mysqli_query($conn, $resultado);    

                  while($row = mysqli_fetch_assoc($result_proyectos)) { ?>
                        <div class="col-sm-6 col-lg-4 item">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h4 class="name"><?php echo $row['nombre_proyecto']; ?></h4>
                                    <blockquote class="blockquote mb-0 card-body">
                                            <p style="font-size: 16px"><?php echo $row['descripcion_proyecto']; ?></p>
                                    </blockquote>
                                            <h6 style="font-size: 13px;"><strong>Inicio:</strong><?php echo $row['fechaini_proyecto']; ?>--<strong>Finalizacion</strong>:<?php echo $row['fechafin_proyecto']; ?></h6>
                                    <h6 style="font-size: 14px;"><strong>Encargado: </strong><?php echo $row['encargado_proyecto']; ?></h6>
                                    <a type="button" class="btn btn-primary waves-effect" href="proyecto.php?id=<?php echo $row['id_proyecto']?>" >Ingresar</a>
                                    <a type="button" class="btn btn-warning waves-effect" href="conexion/edit_proyect.php?id=<?php echo $row['id_proyecto']?>">Editar</a>
                                    <a class="btn btn-danger waves-effect" data-toggle="modal" data-target="#con<?php echo $row['id_proyecto']; ?>">Eliminar</a>
                                    <!-- Button trigger modal-->
                                            <!--Modal: modalConfirmDelete-->
                                            <div class="modal fade" id="con<?php echo $row['id_proyecto']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                              aria-hidden="true">
                                              <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
                                                <!--Content-->
                                                <div class="modal-content text-center">
                                                  <!--Header-->
                                                  <div class="modal-header d-flex justify-content-center">
                                                    <p class="heading">¿Esta seguro?</p>
                                                  </div>

                                                  <!--Body-->
                                                  <div class="modal-body">

                                                    <i class="fa fa-times fa-4x animated"  style="color: #ff3547"></i>

                                                  </div>

                                                  <!--Footer-->
                                                  <div class="modal-footer flex-center">
                                                    <a href="conexion/borrar_proyecto.php?id=<?php echo $row['id_proyecto']?>"  class="btn  btn-outline-danger">Borrar</a>
                                                    <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">Cancelar</a>
                                                  </div>
                                                </div>
                                                <!--/.Content-->
                                              </div>
                                            </div>
                                            <!--Modal: modalConfirmDelete-->
                                </div>
                            </div> 
                        </div>  
                        <?php } ?>  
            </div>
            <!--/.Card-->
          </div>

          <!-- Full Height Modal Right -->
<div class="modal fade" id="AgregarProyecto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Duracion del Proyecto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!--Body-->
      <div class="text-center mb-1">
      <form action="conexion/envproyecto.php" method="post">
        <div class="md-form ml-0 mr-0">
          <input type="date" id="Dateini" class="form-control form-control-sm validate ml-0" required name="fecha_ini">
          <label data-error="Datos incorrectos" data-success="Correcto" for="Dateini" class="ml-0">Fecha de inicio</label>
        </div>

        <div class="md-form ml-0 mr-0">
          <input type="number" id="duracion" class="form-control form-control-sm validate ml-0" required name="duracion">
          <label data-error="Datos incorrectos" data-success="Correcto" for="duracion" class="ml-0">Duracion del Proyecto(Este valor se cuenta como SEMANAS.)</label>
        </div>

      </div>
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" name="Enviar_proyecto">Enviar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->
    
        </main>
        <!--/Main layout-->
    </div>

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