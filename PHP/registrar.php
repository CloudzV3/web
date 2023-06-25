<?php
    session_start();
    include "ConexionDb.php";

    $boleta = $_POST['boleta'];
    $nombre = $_POST['nombre'];
    $apPat = $_POST['apPat'];
    $apMat = $_POST['apMat'];
    $depto = $_POST['depto'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];
    $admin = $_SESSION['boleta'];

    $conexion = new ConexionBD();
    $conexion->conectar();

    $conn = $conexion->obtenerConexion();

    $sqlCheckAlumno = "SELECT * FROM profesor WHERE boleta = '$boleta'";
    $resCheckAlumno = mysqli_query($conn, $sqlCheckAlumno);
    $numFilasCheckAlumno = mysqli_num_rows($resCheckAlumno);

    $respAX = [];
    if($numFilasCheckAlumno >= 1){
        $respAX["cod"] = 2;
        $respAX["msj"] = "Error. Ya está registrado el número de boleta proporcionado. Favor de revisar sus datos.";
        $respAX["icono"] = "error";
    }else{
        $sqlInsRegistro = "INSERT INTO profesor (boleta,admin,nombre,apPat,apMat,correo,contrasena,nomdepto,estadoE,acceso,timestamp) VALUES('$boleta','$admin','$nombre','$apPat','$apMat','$correo','$password','$depto',0,1,NOW())";
        $resInsRegistro = mysqli_query($conn, $sqlInsRegistro);
        $filasAfectadasInsRegistro = mysqli_affected_rows($conn);
        if($filasAfectadasInsRegistro == 1){
            $respAX["cod"] = 1;
            $respAX["msj"] = "Gracias. El registro se realizó correctamente :)";
            $respAX["icono"] = "success";
        }else{
            $respAX["cod"] = 0;
            $respAX["msj"] = "Error(INS). Favor de intentarlo nuevamente.";
            $respAX["icono"] = "error";
        }
    }

    echo json_encode($respAX);

    $conexion->cerrarConexion();
?>