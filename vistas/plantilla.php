<?php

$blog=ControladorBlog::ctrMostrarBlog();

// Pagina en visualización
$app_pagina ="";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title><?php  echo $blog["titulo"] ?></title>
    <!-- Descripción de la página -->
    <meta name="title" content="<?php  echo $blog["titulo"] ?>">
    <meta name="description" content="<?php  echo $blog["descripcion"] ?>" />
    <!-- Valores META para los ficheros PHP -->
    <meta charset="UTF-8" />
    <link rel="icon" href="<?php echo $blog['dominio'].$blog['icono'];?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Fuente Google -->
    <link href="https://fonts.googleapis.com/css?family=Kulim+Park&display=swap" rel="stylesheet" />
    <!-- Fuente FontAwesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <!-- LightBox -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css" integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ==" crossorigin="anonymous" />
    <!-- Mi Estilos -->
    <link rel="stylesheet" href="<?php echo $blog["dominio"];?>vistas/css/iconos.css" />
    <link rel="stylesheet" href="<?php echo $blog["dominio"];?>vistas/css/estilos.css" />
</head>
<body>

<?php 

	/*=============================================
	Navegar entre páginas
	=============================================*/

    $rutas = array();
    if (isset($_GET["pagina"])) {
        $rutas = explode("/", $_GET["pagina"]);

        // echo '<br><br><br><h1>PAGINA 1: '.$_GET["pagina"].'</h1>';
        // echo '<h1>RUTA: '.$rutas[0].'</h1>';

        /*=============================================
        Validar las rutas
        =============================================*/
        if ($rutas[0] == "inicio") {
            $app_pagina = "inicio";
            include "paginas/modulos/menu.php";
            include "paginas/modulos/slider.php";
            include "paginas/modulos/contenido-inicio.php";
        }elseif ($rutas[0] == "saldos") {
            $app_pagina = "saldos";
            include "paginas/modulos/menu.php";
            include "paginas/modulos/contenido-saldos.php";
        }elseif ($rutas[0] == "anteriores") {
            $app_pagina = "anteriores";
            include "paginas/modulos/menu.php";
            include "paginas/modulos/contenido-anteriores.php";
        }else{
            include "paginas/modulos/menu.php";
            include "paginas/modulos/contenido-404.php";
        }
    

    } else {
        
        // echo '<br><br><br><h1>NO NOS LLEGA NADA...</h1>';
        // echo '<h1>PAGINA 2: '.$_GET["pagina"].'</h1>';

        // Si nos nos llega nada, cargamos la página de inicio
        $app_pagina = "inicio";
        include "paginas/modulos/menu.php";
        include "paginas/modulos/slider.php";
        include "paginas/modulos/contenido-inicio.php";
    
    }

	/*=============================================
	Módulos fijos inferiores
	=============================================*/	

	include "paginas/modulos/footer.php";

?>

    <!-- Javascrips -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
    <!-- LightBox -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js" integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g==" crossorigin="anonymous"></script>
    <!-- Editor -->
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <!-- Mi código -->
    <script src="<?php echo $blog["dominio"];?>vistas/js/script.js"></script>
</body>
</html>