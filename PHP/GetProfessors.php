<?php
include 'ConexionDB.php';

$response = "";
$conexion = new ConexionBD();
$conexion->conectar();

// Obtener la conexión
$conn = $conexion->obtenerConexion();

// Verificar si hay errores de conexión
if ($conn->connect_error) {
    $response = "Error de conexión";
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL
$sql = "SELECT * FROM profesor";

// Ejecutar la consulta y obtener el resultado
$resultado = $conn->query($sql);
// Verificar si se obtuveiron resultados
// Fetch data from the result set
$tableData = array();
while ($row = $resultado->fetch_assoc()) {
    $tableData[] = $row;
}
echo json_encode($tableData);
// Cerrar la conexión cuando hayas terminado
$conexion->cerrarConexion();
?>