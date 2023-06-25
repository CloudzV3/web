<?php

    require 'SetDB.php';

    if(!empty($_POST["login-btn"])) {
        if(empty($_POST["boleta"]) and empty(($_POST["password"]))) {
            echo '<div class = "alert"> ¡Los campos están vacios! </div>';
        } else {
            $boleta = $_POST["boleta"];
            $contrasena = $_POST["password"];
            $sql = $conexion->query(" select * from profesor where boleta = '$boleta' and contrasena = '$contrasena' ");
            if($datos = $sql->fetch_object()) {
                $_SESSION['boleta'] = $boleta;
                if($datos->nomdepto == 'ADM'){
                    header("location:homeAdmin.php");
                } else {
                    header("location:home.php");
                }
            } else {
                echo '<div class = "alert"> ¡Las credenciales son inválidas! A tomar por culo pibe </div>';
            }
        }
    }

?>