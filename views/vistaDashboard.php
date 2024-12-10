<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesVistaDashboard.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Menú lateral -->
    <nav class="sidebar">
        <div class="logo">
            <h2>Mi Sistema</h2>
        </div>
        <ul>
            <li><a href="?opcion=inicio" class="active"><i class="fas fa-home"></i> Inicio</a></li>
            <li><a href="?opcion=ver"><i class="fas fa-eye"></i> Ver</a></li>
            <li><a href="?opcion=ingresar"><i class="fas fa-user-plus"></i> Ingresar</a></li>
            <li><a href="?opcion=modificar"><i class="fas fa-user-edit"></i> Modificar</a></li>
            <li><a href="?opcion=eliminar"><i class="fas fa-user-times"></i> Eliminar</a></li>
            <li><a id="btnSalir" href="<?php echo get_controllers('controladorLogout.php') ?>"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
        </ul>
    </nav>

    <!-- Contenido dinámico -->
    <div class="main-content">
        <?php
        if (isset($contenido)) {
            echo $contenido;
        } else {
            echo "<h1>Bienvenido al Sistema</h1>";
        }
        ?>
    </div>
</body>

</html>
