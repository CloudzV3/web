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
        } else {
            
        }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User HomeScreen</title>
    <link rel="shortcut icon" href="ImgHS/shark.png">
    <link rel="stylesheet" type="text/css" href="CSS/styleH.css">
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
                <a href="encuestas.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Tareas</span>
                </a>
                <span class="tooltip">Tareas</span>
            </li>
            <li>
                <a href="#">
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
                        <div class="name"><?php  echo "$nombre"; ?></div>
                        <div class="job"><?php  echo "$depto"; ?></div>
                    </div>
                </div>
                <a href = "PHP/logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
            </div>
        </div> 
    </div>
    <main >
        
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