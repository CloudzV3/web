<?php
    include "ConexionDB.php";

    $boleta = $_POST['boleta'];
    $password = $_POST['password'];

    $conexion = new ConexionBD();
    $conexion->conectar();

    $conn = $conexion->obtenerConexion();

    
    $sqlCheckLogin = "SELECT nombre,apPat,apMat,nomdepto,correo,estadoE,acceso,boleta FROM profesor WHERE boleta = '$boleta' AND contrasena = '$password'";
    $resCheckLogin = mysqli_query($conn, $sqlCheckLogin);
    $numFilasRes = mysqli_num_rows($resCheckLogin);
    $respAX = [];
    if($numFilasRes == 1){
        $infCheckLogin = mysqli_fetch_row($resCheckLogin);
        $respAX["cod"] = 1;
        $respAX["msj"] = "Hola! Bienvenido $infCheckLogin[0] $infCheckLogin[1].";
        $respAX["icono"] = "success";
        $respAX["boleta"] = $infCheckLogin[7];
        $respAX["nombre"] = $infCheckLogin[0];
        $respAX["apPat"] = $infCheckLogin[1];
        $respAX["apMat"] = $infCheckLogin[2];
        $respAX["depto"] = $infCheckLogin[3];
        $respAX["correo"] = $infCheckLogin[4];
        $respAX["estadoE"] = $infCheckLogin[5];
        $respAX["acceso"] = $infCheckLogin[6];
        $_SESSION["boleta"] = $boleta;
    }else{
        $respAX["cod"] = 0;
        $respAX["msj"] = "Error. Favor de intentarlo nuevamente.";
        $respAX["icono"] = "error";
    }

    echo json_encode($respAX);

    $conexion->cerrarConexion();
?>