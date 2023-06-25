<!DOCTYPE html>
<?php
    session_start();
    include "PHP/SetDB.php";

    $boleta = $_SESSION["boleta"];

    if(!isset($boleta)){
        header("location: login.php");
    } else {
        $sql = $conexion->query(" select * from profesor where boleta = '$boleta' ");

        $datos = $sql->fetch_object();
        $nombre = "";
        $depto = "";
        if($datos){
            $nombre = $datos->nombre;
            $depto = $datos->nomdepto;
            $boleta = $datos->boleta;
            $apellidoPaterno = $datos->apPat;
            $apellidoMaterno = $datos->apMat;
            $correo = $datos->correo;
            $boleta = $datos->boleta;
            $boleta = $datos->boleta;
            $nombreC = "$nombre $apellidoPaterno $apellidoMaterno";
        } else {
            
        }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuestas</title>
    <link rel="shortcut icon" href="ImgHS/shark.png">
    <link rel="stylesheet" href="CSS/styleH.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Materialize link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <!--boxicons CDN link-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<!--JUST VALIDATE link-->
<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>
<!--SweetAlert link-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <img class="escom" src="ImgHS/logoESCOMBlanco.ico">
                <!--<i class='bx bxl-codepen'></i>-->
                <div class="logo_name">3SC0M</div>
            </div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="user.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Usuario</span>
                </a>
                <span class="tooltip">Usuario</span>
            </li>
            <li>
                <a href="">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Tareas</span>
                </a>
                <span class="tooltip">Tareas</span>
            </li>
            <li>
                <a href="home.php">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Principal</span>
                </a>
                <span class="tooltip">Principal</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <img src="ImgHS/profile.jpg" alt="">
                    <div class="name_job">
                        <div class="name"><?php echo "$nombre"; ?></div>
                        <div class="job"><?php echo "$depto"; ?></div>
                    </div>
                </div>
                <a href="PHP/logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
            </div>
        </div> 
    </div>
    <main>
    <div class="form_container" >
        <div class="form_content">
            <div class="form_header">
                <h3>Encuesta Semestral 2023-2</h3>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input value=<?php echo "'$nombreC'" ;?> id="first_name2" type="text" class="validate" disabled>
                    <label class="active" for="first_name2">Nombre</label>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                      <input value=<?php echo "$boleta" ;?> id="first_name2" type="text" class="validate" disabled>
                      <label class="active" for="first_name2">Boleta</label>
                    </div>
                </div>
                <p>¿Desea impartir más que la carga máxima de materias?</p>
                <form action="#">
                    <p>
                        <input class="with-gap" name="group1" type="radio" id="simax"  />
                        <label for="simax">Si</label>
                        <input class="with-gap" name="group1" type="radio" id="nomax"  />
                        <label for="nomax">No</label>
                    </p>
                    <p>Materias:  (Debe elgir al menos 1 materia y máximo 4 materias)</p> 
                    <p>Ordenar por:</p>
                    <!-- Switch -->
                    <div class="switch">
                      <label>
                        <input type="checkbox">
                        <span class="lever"></span>
                        Academia
                      </label>
                        <label>
                          <input type="checkbox">
                          <span class="lever"></span>
                          Plan
                        </label>
                        <label>
                          <input type="checkbox">
                          <span class="lever"></span>
                          Programa
                        </label>
                        <label>
                          <input type="checkbox">
                          <span class="lever"></span>
                          Semestre
                        </label>
                    </div>
                    <p>
                        <input type="checkbox" id="cuadrito"  />
                        <label for="cuadrito">Materia</label>
                    </p>
                    <tr><th><p>Actividades de Descarga:</p></th></tr>
                    <input type="checkbox" id="101" checked="checked" />
                    <label for="101">Preparación de Clases </label>
                    <div class="hrs">
                        <label for="hrs">Número de Horas</label>
                        <input placeholder="HRS" id="hrs" type="number"  max="12" class="validate">
                    </div>
                    </p>
                    <p>
                        <input type="checkbox" id="103" checked="checked" />
                        <label for="103">Atención a Alumnos </label>
                        <p></p>
                        <input type="checkbox" id="104" />
                        <label for="104">Elaboración de Exámenes</label>
                        <p></p>

                    </p>
                    <center><input class="submit-btn" name = "submit-btn" type="submit"  value="ENVIAR"/></center>
                </form>
        </div>
    </div>
    </main>

    <script type="text/javascript">
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        
    </script>
</body>
</html>
<?php
    }
?>