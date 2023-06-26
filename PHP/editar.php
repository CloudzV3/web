<?php
    session_start();
    include "ConexionDB.php";

    $boleta = $_POST['boleta'];

    $nombre = $_POST['nombre'];
    $primerApe = $_POST['apPat'];
    $segundoApe = $_POST['apMat'];
    $correo = $_POST['correo'];
    $depto = $_POST['departamento'];

    
    $conexion = new ConexionBD();
    $conexion->conectar();

    $conn = $conexion->obtenerConexion();

    $sqlUpdAlumno = "UPDATE profesor SET nombre = '$nombre', apPat = '$primerApe', apMat = '$segundoApe', correo = '$correo', nomdepto = '$depto', timestamp = NOW() WHERE boleta = '$boleta'";
    $resUpdAlumno = mysqli_query($conn, $sqlUpdAlumno);
    $filasAfectadasUpdAlumno = mysqli_affected_rows($conn);
    $respAX = [];
    if($filasAfectadasUpdAlumno >= 1){
        $respAX["cod"] = 1;
        $respAX["msj"] = "Gracias. Tu registro ha sido actualizado :)";
        $respAX["icono"] = "success";

        $consulta = mysqli_query($conn, "SELECT nombre,apPat,apMat,correo,nomdepto FROM profesor WHERE boleta = '$boleta'");
        $infCheckLogin = mysqli_fetch_row($consulta);

        $respAX["nombre"] = $infCheckLogin[0];
        $respAX["apPat"] = $infCheckLogin[1];
        $respAX["apMat"] = $infCheckLogin[2];
        $respAX["correo"] = $infCheckLogin[3];
        $respAX["depto"] = $infCheckLogin[4];
    }else{
        $respAX["cod"] = 0;
        $respAX["msj"] = "Error. Favor de intentarlo nuevamente";
        $respAX["icono"] = "error";
    }

    echo json_encode($respAX);

$conexion->cerrarConexion();
?>