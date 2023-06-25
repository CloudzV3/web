<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin HomeScreen</title>
    <link rel="shortcut icon" href="ImgHS/shark.png">
    <link rel="stylesheet" type="text/css" href="CSS/styleHA.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
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
                <a href="./admi.html">
                    <i class='bx bx-fingerprint'></i>
                    <span class="links_name">Usuario</span>
                </a>
                <span class="tooltip">Usuario</span>
            </li>
            <li>
                <a href="./Aencuesta.html">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Analiticos</span>
                </a>
                <span class="tooltip">Analiticos</span>
            </li>
            <li>
                <a href="./Apersonal.html">
                    <i class='bx bx-walk'></i>
                    <span class="links_name">Personal</span>
                </a>
                <span class="tooltip">Personal</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Ajustes</span>
                </a>
                <span class="tooltip">Ajustes</span>
            </li>
            <li>
                <a href="./HSAdmin.html">
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
                        <div class="name">John Doe</div>
                        <div class="job">Administrador</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
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