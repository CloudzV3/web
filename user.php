
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
        } else {
            
        }
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="shortcut icon" href="ImgHS/shark.png">
    <link rel="stylesheet" href="CSS/styleH.css">
    <link rel="stylesheet" href="CSS/userstyle.css">
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
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Usuario</span>
                </a>
                <span class="tooltip">Usuario</span>
            </li>
            <li>
                <a href="encuestas.php">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Encuestas</span>
                </a>
                <span class="tooltip">Encuestas</span>
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
                        <div class="name"><?php echo "$nombre";  ?></div>
                        <div class="job"><?php echo "$depto";  ?></div>
                    </div>
                </div>
                <a href="PHP/logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
            </div>
        </div> 
    </div>
    <main>
        <div class="form_container">
            <form autocomplete="on">
            <div class="info_user">    
              <img src ="ImgHS/profile.jpg" alt="">
                    <div class="datos_userPadre">
                        <h2><?php echo "$nombre"; ?></h2>
                        <div class="BDSM">
                        <div class="datos_user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-circle-2"><path d="M18 20a6 6 0 0 0-12 0"/><circle cx="12" cy="10" r="4"/><circle cx="12" cy="12" r="10"/></svg>
                            <p class="parrafo"><input class="dato_userE" placeholder="Boleta" hidden disabled><?php echo "$boleta"; ?></p>
                        </div>
                        <div class="datos_user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            <p  class="parrafo"><input class="dato_userE" placeholder="Nombre" hidden><span id="nombre"><?php echo "$nombre"; ?></span><span id="apPat"><?php echo "$apellidoPaterno"; ?></span><span id="apMat"><?php echo "$apellidoMaterno"; ?></span></p>
                        </div>
                        <div class="datos_user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-building"><rect width="16" height="20" x="4" y="2" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>
                            <p  class="parrafo"><input class="dato_userE" placeholder="Departamento"  hidden><?php echo "$depto"; ?></p>
                        </div>
                        <div class="datos_user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-at-sign"><circle cx="12" cy="12" r="4"/><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-4 8"/></svg>
                            <p  class="parrafo"><input class="dato_userE" placeholder="Correo" hidden ><?php echo "$correo"; ?></p>
                        </div>
                        <div class="datos_user">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            <p  class="parrafo" type="password"><input class="dato_userE" placeholder="Correo" hidden  disabled>Contraseña</p>
                        </div>
                        <button class="edit-btn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-pencil"><line x1="18" x2="22" y1="2" y2="6"/><path d="M7.5 20.5 19 9l-4-4L3.5 16.5 2 22z"/></svg></button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </main>

    <script type="text/javascript">
        let btn = document.querySelector("#btn");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");
        let editbtn = document.querySelector(".edit-btn");
        let datoUserE = document.querySelector(".dato_userE");
        let parrafo = document.querySelector(".parrafo");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function(){
            sidebar.classList.toggle("active");
        }

        editbtn.onclick = function(){
            datoUserE.classList.toggle("hidden");
            parrafo.classList.toggle("hidden");
        }
        
    </script>
</body>
</html>
<?php
    }
?>