<?php
    if (empty($_POST["oculto"])||
    empty($_POST["txtNombres"])|| 
    empty($_POST["txtApPaterno"])|| 
    empty($_POST["txtApAMaterno"])|| 
    empty($_POST["txtFechaNacimiento"])||
    empty($_POST["txtCelular"])) {
                
        header('Location:  index.php?mensaje=falta');
        exit();
    
    }

    include_once 'model/conexion.php';
    $nombres = $_POST["txtNombres"];
    $ap_paterno = $_POST["txtApPaterno"];
    $ap_materno = $_POST["txtApMaterno"];
    $fecha_nacimiento = $_POST["txtFechaNacimento"];
    $celular = $_POST["txtCelular"];

    $ap_paterno = $bd->prepare("INSERT INTO persona(nombres,apellido_paterno,apellido_materno,fecha_nacimento, celular)
    VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombres, $ap_paterno, $ap_materno, $fecha_nacimiento, $celular]);
    
    if ($resultado == TRUE){
        header('Location:  index.php?mensaje=registrado');
    }else {
        header('Location:  index.php?mensaje=error');
        exit();
    }
?>
