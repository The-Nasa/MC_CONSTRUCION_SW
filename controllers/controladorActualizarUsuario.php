<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaActulizarUsuario.php';

$mensaje = '';
$modeloUsuario = new modeloUsuario();

// Manejo de GET: Cargar usuario para edición
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'editar' && isset($_GET['usuario'])) {
    $tmpdatusuario = $_GET['usuario'];

    if (!empty($tmpdatusuario)) {
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            $mensaje = "Usuario no encontrado.";
            mostrarFormularioBusqueda($mensaje);
        }
    } else {
        $mensaje = "No se ha proporcionado un nombre de usuario válido.";
        mostrarFormularioBusqueda($mensaje);
    }
}

// Manejo de POST: Actualizar usuario
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["custid"])) { // Actualizar usuario
        $tmpcustID = $_POST["custid"];
        $tmpdatusuario = $_POST["datusuario"];
        $tmpdatpassword = $_POST["datpassword"];
        $tmpdatperfil = $_POST["datperfil"];

        try {
            $modeloUsuario->actualizarUsuario($tmpcustID, $tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
            $mensaje = "Usuario actualizado con éxito.";
        } catch (PDOException $e) {
            $mensaje = "Error al actualizar el usuario: " . $e->getMessage();
        }

        mostrarFormularioEdicion($mensaje);
    } elseif (isset($_POST["buscarusuario"])) { // Buscar usuario para editar
        $tmpdatusuario = $_POST["buscarusuario"];
        $usuario = $modeloUsuario->obtenerUsuarioPorNombre($tmpdatusuario);

        if ($usuario) {
            mostrarFormularioEdicion($usuario);
        } else {
            mostrarFormularioBusqueda("Usuario no encontrado...");
        }
    }
} else {
    mostrarFormularioBusqueda();
}
?>
