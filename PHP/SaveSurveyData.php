<?php
    include 'ConexionDB.php';

    $response = "";
    $conexion = new ConexionBD();
    $conexion->conectar();

    // Obtener la conexión
    $conn = $conexion->obtenerConexion();

    // Verificar si hay errores de conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Datos de post
    $boleta = $_POST["boleta"];
    $maxima = $_POST["maxima"] ?? 0;
    $materias = $_POST["materias"] ?? [];
    $actividades = $_POST["actividades"] ?? [];
    $horas = $_POST["horas"] ?? [];

    // Insertar materias
    for ($i = 0; $i < count($materias); $i++) {
        $sql = "INSERT INTO profconmaterias (boleta, immax, clavemat, numhrs) VALUES ('". $boleta ."', '". $maxima ."', '". $materias[$i] ."', 0)";
        $resultado = $conn->query($sql);
    }

    // Insertar actividades
    for ($j = 0; $j < count($actividades); $j++) {
        $sql = "INSERT INTO profconactividad (boleta, claveact, numhrs) VALUES ('". $boleta ."', '". $actividades[$j] ."', '". $horas[$j] ."')";
        $resultado = $conn->query($sql);
    }

    // Actualizar estado de la encuesta
    $sql = "UPDATE profesor SET estadoE = '1' WHERE profesor.boleta = '" . $boleta . "'";
    $resultado = $conn->query($sql);

    // Cerrar la conexión cuando hayas terminado
    $conexion->cerrarConexion();

    echo json_encode($boleta);
    echo json_encode($materias);
    echo json_encode($actividades);
    echo json_encode($horas);
?>
