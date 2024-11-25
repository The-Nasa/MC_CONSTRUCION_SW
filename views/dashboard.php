<?php
session_start(); 
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/controllers/viewcontroller.php';
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
        <button class="toggle-btn" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </button>
        <ul>
            <li><a href="?opcion=inicio"><i class="fas fa-home"></i> <span>Inicio</span></a></li>
            <li><a href="?opcion=ver"><i class="fas fa-eye"></i> <span>Ver</span></a></li>
            <li><a href="?opcion=ingresar"><i class="fas fa-user-plus"></i> <span>Ingresar</span></a></li>
            <li><a href="?opcion=modificar"><i class="fas fa-user-edit"></i> <span>Modificar</span></a></li>
            <li><a href="?opcion=eliminar"><i class="fas fa-user-times"></i> <span>Eliminar</span></a></li>
            <li><a ID="btnSalir" href="<?php echo get_controllers('logout.php') ?>"><i class="fas fa-sign-out-alt"></i> <span>Salir</span></a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    <div class="main-content">
        <header>
            <h1>Bienvenido, <?php echo $_SESSION["txtusername"]; ?></h1>

        </header>

        <section class="contenido-dinamico">
            <?php
            $opcion = $_GET["opcion"] ?? null;
            $viewController = new ViewController();
            echo $viewController->renderContent($opcion);
            ?>
        </section>
    </div>

    <script>
        function toggleMenu() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('collapsed');
        }
    </script>
</body>

</html>