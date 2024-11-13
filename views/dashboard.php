<?php

    session_start();
    if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_UrlBase ('index.php'));
    exit();
    
    }
    require_once $_SERVER["DOCUMENT_ROOT"].'/etc/config.php';
    require_once $_SERVER["DOCUMENT_ROOT"].'/models/connect/conexion.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Veterinaria - Menú</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase ('css/stylesdashboard.css')?>">
</head>
<body>
    <!-- Menú de navegación -->
    <header>
        <nav class="navbar">
            <h1 class="logo">Veterinaria</h1>
            <ul class="menu">
                <li><a href="?opcion=inicio">Inicio</a></li>
                <li><a href="?opcion=servicios">Servicios</a></li>
                <li><a href="?opcion=citas">Citas</a></li>
                <li><a href="?opcion=productos">Productos</a></li>
                <li><a href="?opcion=contacto">Contacto</a></li>
                <li><a href="?opcion=sobre-nosotros">Sobre Nosotros</a></li>
                <li><a href="<?php echo get_controllers('logout.php') ?>">Salir</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido principal -->

    <section>
        <h2>BIENVENIDOS A NUESTRO SISTEMA</h2>
    </section>   

    
    <div class="contenido">
        <?php
        // Mostrar el contenido según la opción seleccionada en el menú
        if (isset($_GET["opcion"])) {
            $opcion = $_GET["opcion"];
            echo $opcion;
        }
        ?>
    </div>

    <!-- <a href="http://127.0.0.1/MC_CONSTRUCION_SW/logout.php">salir del sistema</a> -->

</body>
</html>