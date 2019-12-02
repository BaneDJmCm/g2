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
     <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <script src="js/jquery-1.12.0.js"></script>
   <script src="js/bootstrap.js"></script>  
   <script>
      $(document).ready(function()
      {
         $("#mostrarmodal").modal("show");
      });
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organizador de proyectos</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark primary-color double-nav fixed-top navbar-toggleable-md scrolling-navbar">
            <a class="navbar-brand" href="menu.php">Organizador de Proyecto</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                <a class="navbar-brand btn btn-primary" href="menu.php">Proyectos</a>
                </li>
                <?php
                  $correo=$_SESSION['correo_us'];
                      $resultado = "SELECT * FROM usuarios where '$correo'= emil_us";
                      $result_proyectos = mysqli_query($conn, $resultado);    
          
                      while($row = mysqli_fetch_assoc($result_proyectos)) { ?>
                <li class="nav-item">
                <a class="nav-link" href="conexion/perfil.php?id=<?php echo $row['id_us']?>">Perfil</a>
                </li>
                <?php } ?>
                <li class="nav-item">
                  <a class="nav-link"><?php echo $correo; $ddd=$_GET['id']; ?></a>
                 </li>
                 <li class="nav-item">
                  <a class="nav-link" href="conexion/salir.php">Salir</a>
                 </li>
              </ul>
            </div>
          </nav>
    <br>
    <br>
    <br>
    <main>
    <?php
                  $resulta= "SELECT * FROM usuarios where '$correo'=emil_us";
                  $result_pro = mysqli_query($conn, $resulta);    
      
                  while($row = mysqli_fetch_assoc($result_pro)) { ?>
                  <p><?php  $ci_usob=$row['ci_us'];
                   ?></p>
         <?php } ?>
<div class="container-fluid mt-2">
    <div class="main-tabs-docs">
        <div class="row">
            <div class="col-sm-5 col-md-6">
            <div class="container">
              <div class="tab-content">
                <?php
                  
                  $query = "SELECT * FROM proyectos where '$ddd' = id_proyecto";
                  $result_proyecto = mysqli_query($conn, $query);    
                  while($a = mysqli_fetch_assoc($result_proyecto)) { ?>        
                            <h3 style="text-align: center"><?php echo $a['nombre_proyecto']; ?></h3>
                            <hr>
                            <h5>Descripcion</h5>
                            <p><?php echo $a['descripcion_proyecto']; ?></p>
                            <p style="font-style:oblique; text-align: center"><?php echo $a['encargado_proyecto']; ?></p>
                            <center><p> <strong>Inicio:</strong> <?php $fechainicial= $a['fechaini_proyecto']; echo $fechainicial; ?> - <strong>Finalizacion:</strong> <?php echo $a['fechafin_proyecto']; ?></p></center>
                            <?php 
                          } ?> 

                            <hr>
                            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                        
                            <li  class="nav-item"><h4 style="text-align: center">Tareas del proyecto</h4><hr></li>
                            
                            <li class="nav-item">
                              <a class="btn btn-primary"  data-toggle="modal" data-target="#AgregarTarea"><span>Agregar tarea</span></a>
                            </li>
                            </ul>
                            <br>

                <div class="table-wrapper-scroll-y my-custom-scrollbar">
                  <table class="table table-sm">
                    <thead class="thead-dark">
                        <tr>
                        <!-- <th scope="col">Add</th> -->
                        <th scope="col">Tarea</th>
                        <th scope="col">Tiempo</th>
                        <th scope="col">Recursos</th>
                        <th scope="col"  style="text-align:center;">Acciones</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                          $resultado = "SELECT * FROM tarea where '$ddd'= id_proyecto ORDER BY tarea.fechaini_tarea ASC";
                          $result_proyectos = mysqli_query($conn, $resultado);    

                          while($row = mysqli_fetch_assoc($result_proyectos)) { ?> 
                            <tr>
                            <td><?php echo $row['nombre_tarea']; ?></td>
                            <td><?php echo $row['duracion_tarea']; ?> días</td>
                            <td><?php echo $row['recurso_tarea']; ?></td>
                            <td  style="text-align:center;">
                                <div class="btn-group"> 
                                <a class="btn btn-danger" data-toggle="modal" data-target="#con<?php echo $row['id_tarea']; ?>"><i class="fa fa-times"></i></a>
                                    <!-- Button trigger modal-->
                                            <!--Modal: modalConfirmDelete-->
                                            <div class="modal fade" id="con<?php echo $row['id_tarea']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                                    <a href="conexion/borrar_tarea.php?id=<?php echo $row['id_tarea']?>"  class="btn  btn-outline-danger">Borrar</a>
                                                    <a type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancelar</a>
                                                  </div>
                                                </div>
                                                <!--/.Content-->
                                              </div>
                                            </div>
                                            <!--Modal: modalConfirmDelete-->
                                </div>
                                <a class="btn btn-warning" href="conexion/edit_tarea.php?id=<?php echo $row['id_tarea']?>"><i class="fa fa-pencil"></i></a>
                            </td> 
                            <?php } ?>                           
                        </tbody>
                    
                  </table>
                </div>
              </div>
            </div>
            </div>
<?php
$resultado = "SELECT * FROM tarea where '$ddd'= id_proyecto";
$result_proyectos = mysqli_query($conn, $resultado);    

while($row = mysqli_fetch_assoc($result_proyectos)) {
if ($row['fechafin_tarea'] < date("Y-m-d") && $row['avance_tarea'] == "100") {
                              
  $_SESSION['mess1'] = 'mostrarmodal';
  $_SESSION['mess2'] = '<strong>'.$row['nombre_tarea'].'</strong> esta finalizada';
  $_SESSION['mess3'] = '<strong>Puede continuar con la siguiente tarea.</strong>';
  $_SESSION['color'] = 'primary';
  $_SESSION['color1'] = '#4285f4';
  $_SESSION['ico'] = 'fa-check';
  // $_SESSION['messs1'] = 'Las tareas de color rojo terminaron su avance.';
  // $_SESSION['messs2'] = 'Las tareas de color amarrillo aun no empezaron.';
}
else if(($row['fechafin_tarea'] < date("Y-m-d") && $row['avance_tarea'] < "100")){
  $_SESSION['mess1'] = 'mostrarmodal';
  $_SESSION['mess2'] = '<strong>'.$row['nombre_tarea'].'</strong> no fue finalizada exitosamente.';
  $_SESSION['mess3'] = '<strong>Se sugiere terminar la otra tarea para poder continuar.</strong>';
  $_SESSION['color'] = 'danger';
  $_SESSION['color1'] = '#ff3547';
  $_SESSION['ico'] = 'fa-times';
}
}
?>


            <div class="col-sm-5 col-md-6">

             <div class="tab-content">
                <h3 style="text-align: center">Avance de las Tareas</h3>
                <?php if (isset($_SESSION['mess1'])): ?>
                <!-- Central Modal Warning Demo-->
                    <div class="modal fade top" id="<?php echo $_SESSION['mess1']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                      aria-hidden="true">
                      <div class="modal-dialog modal-notify modal-<?php echo $_SESSION['color']?> modal-bottom-top" role="document">
                      
                        <!--Content-->
                        <div class="modal-content">
                          <!--Header-->
                          <div class="modal-header">
                            <p class="heading animated">Mensaje</p>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" class="white-text">&times;</span>
                            </button>
                          </div>

                          <!--Body-->
                          <div class="modal-body">
                          <div class="row">
                                <div class="col-3">
                                  <p></p>
                                  <p class="text-center"><i class="fa <?php echo $_SESSION['ico']?> fa-5x animated rotateIn" style="color: <?php echo $_SESSION['color1']?>;"></i></p>
                                </div>
                                                         
                              <div class="col-9">
                                <p><?php echo $_SESSION['mess2']?></p>
                                <p><?php echo $_SESSION['mess3']?></p>
                              </div>
                            </div>
                          </div>

                          <!--Footer-->
                          <div class="modal-footer justify-content-center">
                            <a type="button" class="btn btn-outline-<?php echo $_SESSION['color']?> waves-effect" data-dismiss="modal">Cerrar Mensaje</a>
                          </div>
                        </div>
                        <!--/.Content-->
                      </div>
                    </div>
                    <!-- Central Modal Warning Demo-->
                    <?php
                  unset($_SESSION['mess1']); 
                  endif; 
                ?>

<hr>
                <div class="container">
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
                <div class="table-wrapper-scroll-yt my-custom-scrollbart">
                <table class="table table-borderless">
                <thead style=" text-decoration-style: double; ">
                  <tr style="text-align: center;">
                    <th class="th-sm" style="width: 40px"></th>
                    <th scope="col" style="width: 105px">Fecha Inicio</th>
                    <th scope="col">Avance</th>
                    <th scope="col">de la</th>
                    <th scope="col">Tarea</th>
                    <th scope="col">accion</th>
                    <th scope="col" style="width: 100px">Fecha Fin</th>
                  </tr>
                </thead>
                <?php
                          $resultado = "SELECT * FROM tarea where '$ddd'= id_proyecto ORDER BY tarea.fechafin_tarea ASC";
                          $result_proyectos = mysqli_query($conn, $resultado);    

                          while($row = mysqli_fetch_assoc($result_proyectos)) { ?> 
                  <tbody>
                    <tr>
                      <th><?php echo $row['nombre_tarea']; ?></th>
                      <td><?php echo $row['fechaini_tarea']; ?></td>
                      <td colspan="3" style="padding-top: 20px;">
                      <a href="conexion/edit_proc.php?id=<?php echo $row['id_tarea']?>" onclick="<?php
                      if ($row['fechafin_tarea'] < date("Y-m-d")) {
                        $_SESSION['mess4'] = 'return false';
                      }else if ($row['fechaini_tarea'] > date("Y-m-d")) {
                        $_SESSION['mess4'] = 'return false';
                      }
                      if (isset($_SESSION['mess4'])):
                         echo $_SESSION['mess4'];
                          unset($_SESSION['mess4']); 
                          endif;
                          ?>" ><div class="progress" style="height: 20px;">
                            <div class="progress-bar 
                            <?php
                            //cambio de color
                                  if ($row['fechafin_tarea'] < date("Y-m-d") ) {
                                    $_SESSION['mess6'] = 'bg-danger';
                                  }if($row['fechafin_tarea'] < date("Y-m-d") && $row['avance_tarea'] == "100"){
                                    $_SESSION['mess6'] = 'bg-success';
                                  }else if ($row['fechaini_tarea'] > date("Y-m-d")) {
                                    $_SESSION['mess6'] = 'bg-warning';
                                  }
                                  if (isset($_SESSION['mess6'])):
                                      echo $_SESSION['mess6'];
                                      unset($_SESSION['mess6']); 
                                  endif;
                              ?>
                             progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $row['avance_tarea']; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $row['avance_tarea']; ?>%; height: 20px"><?php echo $row['avance_tarea']; ?>%</div>
                      </div>
                      </a>
                      </td>
                      <td style="text-align: center; padding-top: 8px">
                          <a class="btn btn-outline <?php
                          //bloquear boton
                      // if ($row['fechafin_tarea'] < date("Y-m-d")) {
                      //   $_SESSION['mess5'] = 'btn-danger';
                      // }
                      if ($row['fechafin_tarea'] < date("Y-m-d") && $row['avance_tarea'] == "100") {
                        $_SESSION['mess5'] = 'btn-success';
                      }
                      else if ($row['fechaini_tarea'] > date("Y-m-d")) {
                        $_SESSION['mess5'] = 'btn-warning';
                      }
                      if (isset($_SESSION['mess5'])):
                         echo $_SESSION['mess5'];
                          unset($_SESSION['mess5']); 
                          endif;
                          ?> waves-effect" href="conexion/edit_proc.php?id=<?php echo $row['id_tarea']?>" onclick="<?php 
                          //bloquear barra
                          if (($row['fechafin_tarea'] < date("Y-m-d") && $row['avance_tarea'] == "100")){
                          //&& $row['avance_tarea'] == "100") {
                            $_SESSION['mess4'] = 'return false';
                          }else if ($row['fechaini_tarea'] > date("Y-m-d")) {
                            $_SESSION['mess4'] = 'return false';
                          }
                          if (isset($_SESSION['mess4'])):
                             echo $_SESSION['mess4']; 
                             unset($_SESSION['mess4']); 
                             endif;
                             ?>" ><i class="fa fa-pencil"></i></a>
                      </td>
                      <td><?php echo $row['fechafin_tarea'];?></td>
                    </tr>
                  </tbody>
                  <?php } ?>
                </table>
                </div>
                </div>
              </div>
            </div>





        </div>
    </div>
</div>     


</main>



<!-- Full Height Modal Right -->
<div class="modal fade right" id="AgregarTarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full modal-right" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Duracion de la Tarea</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="">
      <br>
      <p style="text-align: center;">Las tareas son organizadas por su fecha de inicio.</p>
      <hr>
      <!--Body-->
      <form action="conexion/envproyecto.php" method="post">
      <div class="modal-body text-center mb-1">

        <div class="md-form ml-0 mr-0">
          <input type="date" id="Dateini" class="form-control form-control-sm validate ml-0" required name="fecha_ini" required>
          <label data-error="Las fechas solo son validas desde enero del 2019" data-success="Correcto" for="Dateini" class="ml-0">Fecha de inicio</label>
        </div>

        <div class="md-form ml-0 mr-0">
          <input type="number" id="Duracion" class="form-control form-control-sm validate ml-0" required name="duracion_tarea" min="0" max="10000000000000000000000000" required>
          <label data-error="Los días no pueden ser negativos" data-success="Correcto" for="Duracion" class="ml-0">Duracion de la Tarea(Este valor se cuenta como DÍAS.)</label>
        </div>

          <input type="text" id="asd" class="form-control form-control-sm ml-0"  name="id_pro" value="<?php echo $ddd; ?>" readonly Style="visibility:hidden">

        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary" name="Enviar_tarea">Enviar</button>
      </div>
    </div>    
  </div>
  </form>
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

    