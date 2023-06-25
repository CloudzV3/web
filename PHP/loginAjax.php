<?php
require "SetDB.php";

$usuario =  $conexion->query("select nomdepto from profesor where boleta = 
'".$_POST['boleta']."' and contrasena = '".$_POST['password']."'");

if($usuario->num_rows == 1){
    $datos = $usuario->fetch_assoc();
    echo json_encode(array('error' => false, 'nomdepto' => $datos['nomdepto']));
} else {
    echo json_encode(array('error' => true));
}

$conexion->close();
?>