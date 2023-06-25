<?php
	$servidorBD = "localhost";
	$usuarioBD = "root";
	$contrasenaBD = "";
	$nombreBD = "web";
	$conexion = mysqli_connect($servidorBD,$usuarioBD,$contrasenaBD,$nombreBD);
	mysqli_query($conexion, "SET NAMES 'utf8'"); //Esta instrucción permite guardar eñes y acentos en la BD ;)
	if($conexion){
		echo "<script>console.log('Conexión exitosa!!');</script>";
	}else{
        die("Problemas con la conexión con la base de datos: ".mysqli_connect_error());
    }
?>