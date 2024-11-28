<?php
// controladorLogin.php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
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
        header('Location: ' . get_views('dashboard.php')); // Redirige al dashboard
        exit();
    } else {
        // Si las credenciales no son correctas
        header('Location: ' . get_views('claveequivocada.php')); // Redirige a error de clave
        exit();
    }
}

// Si ya hay una sesión activa, redirigir al dashboard
if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_views('dashboard.php'));
    exit();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaLogin.php';
?>
