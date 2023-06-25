<?php
    include 'ConexionDB.php';

    $response = "";
    $conexion = new ConexionBD();
    $conexion->conectar();

    // Obtener la conexión
    $conn = $conexion->obtenerConexion();

    // Realizar operaciones con la base de datos utilizando $conn

    // Verificar si hay errores de conexión
    if ($conn->connect_error) {
        $response = "Error de conexión";
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL
    $sql = "SELECT * FROM materia";

    // Ejecutar la consulta y obtener el resultado
    $resultado = $conn->query($sql);
    $response = "Conectado correctamente";
    // Verificar si se obtuvieron resultados
    if ($resultado->num_rows > 0) {
        // Recorrer los resultados y mostrar los datos
        while ($row = $resultado->fetch_assoc()) {
            echo "Clave: " . $row["clavemat"] . ", Nombre: " . $row["nombre"] . ", Semestre: " . $row["semestre"] . "<br>";
        }
    } else {
        echo "No se encontraron resultados.";
    }

    // Cerrar la conexión cuando hayas terminado
    $conexion->cerrarConexion();
    echo json_encode($response);
?>
