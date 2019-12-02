<?php
session_start();
require 'conexion.php';
if(isset($_POST['Registrar_tarea'])){
        $nombre=$_POST["nombre_tarea"];
        $fechaini=$_POST["fecha_ini"];
        $duracion=$_POST["duracion_tarea"];
        $fecha_fin=$_POST["fecha_fin"];
        $avance=$_POST["avance_tarea"];
        $recurso=$_POST["recurso_tarea"];
        $id_pro=$_POST["id_pro"];  
        
        // $query = "INSERT INTO usuarios(id_us, nombre_us, descripcion_us, ci_us, fecha_iniimiento_us, fecha_fin_us, telefono_us, emil_us, pass_us, fechacreacion_us) VALUES (NULL, '$nombre', '$descripcion', '$ci', '$fecha_ini', '$fecha_fin', '$telefono', '$email', '$passw', CURRENT_TIMESTAMP)";
        $resultado =" INSERT INTO tarea (id_tarea, nombre_tarea, fechaini_tarea, duracion_tarea, fechafin_tarea, avance_tarea, recurso_tarea, fechacrea_tarea, id_proyecto) VALUES (NULL, '$nombre', '$fechaini', '$duracion', '$fecha_fin', '$avance', '$recurso', CURRENT_TIMESTAMP, $id_pro)";
        mysqli_query($conn, $resultado);
        if(!$resultado) {
            die("Query Failed.");
          }
          $_SESSION['mess'] = 'Tarea registrada.';
          $_SESSION['mess_type'] = 'success';
          echo '<script>window.history.go(-2);</script>';
}
