<?php
session_start();
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/controllers/controladorvistas.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesdashboard.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Menú lateral -->
    <nav class="sidebar" id="sidebar">
        <ul>
            <li><a href="?opcion=inicio"><i class="fas fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="?opcion=ver"><i class="fas fa-eye"></i> <span>Ver</span></a></li>
            <li><a href="?opcion=ingresar"><i class="fas fa-user-plus"></i> <span>Ingresar</span></a></li>
            <li><a href="?opcion=modificar"><i class="fas fa-user-edit"></i> <span>Modificar</span></a></li>
            <li><a href="?opcion=eliminar"><i class="fas fa-user-times"></i> <span>Eliminar</span></a></li>
            <li><a ID="btnSalir" href="<?php echo get_controllers('logout.php') ?>"><i class="fas fa-sign-out-alt"></i> <span>Salir</span></a></li>
        </ul>
    </nav>
</body>

</html>