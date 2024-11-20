<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

session_start();

// Eliminar las variables de sesión y destruir la sesión
session_unset();
session_destroy();

// Redirigir después de 3 segundos
header("Refresh: 3; url=" . get_UrlBase('index.php'));

// Cargar la vista del logout
//require_once $_SERVER["DOCUMENT_ROOT"] . '/views/logoutview.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saliendo del sistema</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/styleslogout.css'); ?>">

</head>

<body>
    <div class="logout-container">
        <h1>SALIENDO DEL SISTEMA</h1>
        <p>XD</p>
        <svg class="spinner" width="100" height="100" viewBox="0 0 50 50">
            <circle cx="25" cy="25" r="20"></circle>
        </svg>
        <!--- <div class="loading-spinner"></div> ---->

    </div>
</body>

</html>