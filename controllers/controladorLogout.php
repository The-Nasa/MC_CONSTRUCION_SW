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
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaLogout.php';
