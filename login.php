<!DOCTYPE html>
<?php
    
    session_start();
    if(isset($_SESSION['boleta'])){
        header("location:home.php");
        exit();
    }
?>

<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!--remixicons CDN link-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="shortcut icon" href="ImgHS/shark.png">
</head>

<body>
    <form id="login" method="post" action="">
    <div class="container">
        <div class="design">
            <div class="pill-1 rotate-45"></div>
            <div class="pill-2 rotate-45"></div>
            <div class="pill-3 rotate-45"></div>
            <div class="pill-4 rotate-45"></div>
        </div>
            <div class="login">
            <h3 class="title">Iniciar Sesión</h3>
                    <?php
                    include("PHP/validacion_login.php");
                    ?>
                <div class="text-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-square"><rect width="18" height="18" x="3" y="3" rx="2"/><circle cx="12" cy="10" r="3"/><path d="M7 21v-2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v2"/></svg>
                    <input id="boleta" type="text" placeholder="Boleta" name="boleta" required>
                </div>
                <div class="text-input">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lock"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    <input id="password" type="password" placeholder="Contraseña" spellcheck="false" name="password" required>
                    <!--<i class="ri-eye-line"></i>--><i class="ri-eye-off-line toggle"></i>
                </div>
                <input class="login-btn" name = "login-btn" type="submit"  value="INGRESAR"/>

            </div>
    </div>
    </form>
</body>

<script></script>

</html>