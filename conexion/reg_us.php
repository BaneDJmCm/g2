<?php
session_start();
require 'conexion.php';
if(isset($_POST['Registrar_usuario'])){
        $nombre=$_POST["nombre"];
        $apellidos=$_POST["apellido"];
        $ci=$_POST["ci"];
        $fechanac=$_POST["fechanacimiento"];
        $empresa=$_POST["empresa"];
        $telefono=$_POST["telefono"];
        $email=$_POST["email"];
        $passw=$_POST["pass"];  
        
        // $query = "INSERT INTO usuarios(id_us, nombre_us, apellidos_us, ci_us, fechanacimiento_us, empresa_us, telefono_us, emil_us, pass_us, fechacreacion_us) VALUES (NULL, '$nombre', '$apellidos', '$ci', '$fechanac', '$empresa', '$telefono', '$email', '$passw', CURRENT_TIMESTAMP)";
        $resultado ="INSERT INTO usuarios(id_us, nombre_us, apellidos_us, ci_us, fechanacimiento_us, empresa_us, telefono_us, emil_us, pass_us, fechacreacion_us) VALUES (NULL, '$nombre', '$apellidos', '$ci', '$fechanac', '$empresa', '$telefono', '$email', '$passw', CURRENT_TIMESTAMP)";
        mysqli_query($conn, $resultado);
        if(!$resultado) {
            die("Query Failed.");
          }
          $_SESSION['mess'] = 'Usuario registrado puede ingresar al sistema.';
          $_SESSION['mess_type'] = 'success';
          header('Location: ../index.php');
        }


if(isset($_POST['Actualizar_usuario'])){
  
  mysqli_query($conn, $resultado);
  if(!$resultado) {
      die("Query Failed.");
    }
    $_SESSION['mess'] = 'Usuario registrado puede ingresar al sistema.';
    $_SESSION['mess_type'] = 'success';
    header('Location: ../index.php');
  }

?>