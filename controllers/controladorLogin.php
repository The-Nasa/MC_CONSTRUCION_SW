<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';

if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_controllers('controladorDashboard.php'));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $v_username = isset($_POST["txtusername"]) ? $_POST["txtusername"] : "";
    $v_password = isset($_POST["txtpassword"]) ? $_POST["txtpassword"] : "";

    // Crear una instancia del modelo para verificar el usuario
    $usuario = new modeloUsuario();
    $user = $usuario->verificarUsuario($v_username, $v_password);

    if ($user) {
        // Si el usuario y la contraseña son correctos
        $_SESSION["txtusername"] = $v_username;
        $_SESSION["txtpassword"] = $v_password;
        echo "Location: " . get_controllers('controladorDashboard.php');
        exit();
    } else {
        // Si las credenciales no son correctas
        http_response_code(400); // Respuesta 400 para error
        echo "Cr incorrectas";
        exit();
    }
}


// Si ya hay una sesión activa, redirigir al dashboard
include get_views_disk("vistaLogin.php");

//include $_SERVER["DOCUMENT_ROOT"] . '/views/vistaLogin.php';
?>
