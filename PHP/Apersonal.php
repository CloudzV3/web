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
    $search = $_GET['search'];
    $sql = "SELECT * FROM profesor WHERE nombre LIKE '"%. $search .%"' ";

    // Ejecutar la consulta y obtener el resultado
    $resultado = $conn->query($sql);
    $response = "Conectado correctamente";
    // Verificar si se obtuvieron resultados
    echo json_encode ($resultado)
 

   

    // Cerrar la conexión cuando hayas terminado
    $conn->cerrarConexion();
     
?>
