<?php
session_start();
require 'conexion.php';
if(isset($_POST['Registrar_proyecto'])){
        $nombre=$_POST["nombre_proyecto"];
        $descripcion=$_POST["descripcion_proyecto"];
        $encargado=$_POST["encargado_proyecto"];
        $fecha_ini=$_POST["fecha_ini"];
        $duracion=$_POST["duracion"];
        $fecha_fin=$_POST["fecha_fin"];
        $ci_us=$_POST["ci_uss"];  
        
        // $query = "INSERT INTO usuarios(id_us, nombre_us, descripcion_us, ci_us, fecha_iniimiento_us, fecha_fin_us, telefono_us, emil_us, pass_us, fechacreacion_us) VALUES (NULL, '$nombre', '$descripcion', '$ci', '$fecha_ini', '$fecha_fin', '$telefono', '$email', '$passw', CURRENT_TIMESTAMP)";
        $resultado =" INSERT INTO proyectos (id_proyecto, nombre_proyecto, descripcion_proyecto, encargado_proyecto, fechaini_proyecto, duracion_proyecto, fechafin_proyecto, ci_uss, fechacreacion_proyecto) VALUES (NULL, '$nombre', '$descripcion', '$encargado', '$fecha_ini', '$duracion', '$fecha_fin', '$ci_us', CURRENT_TIMESTAMP)";
        mysqli_query($conn, $resultado);
        if(!$resultado) {
            die("Query Failed.");
          }
          $_SESSION['mess'] = 'Proyecto registrado';
          $_SESSION['mess_type'] = 'success';
          header('Location: ../menu.php');
}
