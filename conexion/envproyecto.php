<?php
    session_start();
    if(isset($_POST['Enviar_proyecto'])){
    $fecha = $_POST['fecha_ini'];
    $semanas = $_POST['duracion'];
    $act= strtotime($fecha.' +'.$semanas.' week');     
    $s= date("Y-m-d", $act);
    $_SESSION['a'] = $fecha;
    $_SESSION['b'] = $semanas;
    $_SESSION['c'] = $s;
    header('Location: ../regproyecto.php');
    } 
    if(isset($_POST['Enviar_tarea'])){
        $fecha = $_POST['fecha_ini'];
        $semanas = $_POST['duracion_tarea'];
        $id = $_POST['id_pro'];
        $act= strtotime($fecha.' +'.$semanas.' days');     
        $s= date("Y-m-d", $act);
        $_SESSION['a'] = $fecha;
        $_SESSION['b'] = $semanas;
        $_SESSION['c'] = $s;
        $_SESSION['d'] = $id;
        header('Location: ../regtarea.php');
        } 
?>