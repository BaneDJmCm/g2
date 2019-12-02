<?php include("conexion/conexion.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Organizador de proyectos</title>
   <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/index.css" rel="stylesheet">
</head>
<body class="fixed-sn black-skin">
<?php session_start();?>
  <div class="col-sm-6 col-lg-4 modal-dialog text-center">
  	<div class="col-sm-8 main-section">
  		<div class="modal-content">
  			<div class="col-12 user-img">
  				<img src="img/person.png">
  			</div>
  			<div class="col-12 form-input">
  				<form action="conexion/ingreso.php" method="post">
				  	<div class="md-form ml-0 mr-0">
          				<input type="email" id="correo" name="correo_us"  class="form-control form-control-sm validate ml-0">
          				<label data-error="Datos incorrectos" data-success="Correcto" for="correo" class="ml-0">Correo</label>
        			</div>
					<div class="md-form ml-0 mr-0">
          				<input type="password" id="contra" name="pass_us"  pattern="[A-Za-z0-9_-]{1,30}" class="form-control form-control-sm validate ml-0">
          				<label data-error="Datos incorrectos" data-success="Correcto" for="contra" class="ml-0">Contraseña</label>
        			</div>
  					<input type="submit" id="ingreso" class="btn btn-primary" value="Ingresar">
					 <p>¿Eres nuevo? <a style="color: #4285f4" data-toggle="modal" data-target="#Agregarusuario">Registrarse</a></p>
  				</form>
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
        </div>
  		</div>
  	</div>
  </div>



          <!-- Full Height Modal Right -->
<div class="modal fade" id="Agregarusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">

  <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
  <div class="modal-dialog modal-full" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title w-100" id="myModalLabel">Registro de Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="">
      <!--Body-->
      <div class="modal-body text-center mb-1">
      <form action="conexion/reg_us.php" method="post">
              <div class="md-form ml-0 mr-0">
                <input type="text" id="nombre" name="nombre"  required class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" for="nombre" class="ml-0">Nombres</label>
              </div>

              <div class="md-form ml-0 mr-0">
                <input type="text" id="apellido" name="apellido" class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" for="apellido" class="ml-0">Apellidos</label>
              </div>

              <div class="md-form ml-0 mr-0">
                <input type="number" id="ci" name="ci"  required class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" for="ci" class="ml-0">Cedula de indentidad</label>
              </div>

              <div class="md-form ml-0 mr-0">
                <input type="date" id="fechanacimiento" name="fechanacimiento"  required class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" for="fechanacimiento" class="ml-0">Fecha de nacimiento</label>
              </div>
              <div class="md-form">
  <input placeholder="Selected date" type="text" id="date-picker-example" class="form-control datepicker">
  <label for="date-picker-example">Try me...</label>
</div>
<script>// Data Picker Initialization
$('.datepicker').pickadate();</script>


              <div class="md-form ml-0 mr-0">
                <input type="text" id="empresa" name="empresa"  required class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" for="empresa" class="ml-0">Empresa</label>
              </div>  

              <div class="md-form ml-0 mr-0">
                <input type="number" id="telefono" name="telefono"  required class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" for="telefono" class="ml-0">Telefono</label>
              </div>

              <div class="md-form ml-0 mr-0">
                <input type="email" id="email" name="email" required class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" required for="email" class="ml-0">Email</label>
              </div>

              <div class="md-form ml-0 mr-0">
                <input type="password" id="pass" name="pass"  required class="form-control form-control-sm validate ml-0">
                <label data-error="Datos incorrectos" data-success="Correcto" for="pass" class="ml-0">Contraseña</label>
              </div>
              <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-primary" name="Registrar_usuario" value="Registrar">
              </div>
              
              </form>
      </div>
              
    </div>
  </div>
</div>
<!-- Full Height Modal Right -->

</body>

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>

</html>



