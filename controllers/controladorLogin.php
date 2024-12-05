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
        http_response_code(200); // Respuesta 200 OK (usuario validado)
        exit();
    } else {
        // Si las credenciales no son correctas
        // Verificamos si el usuario existe en la base de datos
        $usuarioExistente = $usuario->verificarExistenciaUsuario($v_username);

        if (!$usuarioExistente) {
            // Si el usuario no existe
            http_response_code(400); // Respuesta 400 para error
            exit();
        } else {
            // Si la contraseña es incorrecta
            http_response_code(401); // Respuesta 401 para error de autenticación
            exit();
        }
    }
}
// Si ya hay una sesión activa, redirigir al dashboard
include get_views_disk("vistaLogin.php");
?>