<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit(); 
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaEliminarUsuario.php';

$mensaje = '';
$modeloUsuario = new modeloUsuario();

// Manejo de GET: Eliminar usuario
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['accion']) && $_GET['accion'] == 'eliminar' && isset($_GET['usuario'])) {
    $tmpdatusuario = $_GET['usuario'];

    if (!empty($tmpdatusuario)) {
        try {
            $modeloUsuario->eliminarUsuarioPorNombre($tmpdatusuario);
            $mensaje = "Usuario eliminado con éxito.";
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar el usuario: " . $e->getMessage();
        }
    } else {
        $mensaje = "No se ha proporcionado un nombre de usuario válido.";
    }

    mostrarFormularioEliminar($mensaje);
}

// Manejo de POST: Eliminar usuario
elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['datusuario'])) {
    $tmpdatusuario = $_POST['datusuario'];

    if (!empty($tmpdatusuario)) {
        try {
            $modeloUsuario->eliminarUsuarioPorNombre($tmpdatusuario);
            $mensaje = "Usuario eliminado con éxito.";
        } catch (PDOException $e) {
            $mensaje = "Error al eliminar el usuario: " . $e->getMessage();
        }
    } else {
        $mensaje = "No se ha proporcionado un nombre de usuario válido.";
    }

    mostrarFormularioEliminar($mensaje);
} else {
    mostrarFormularioEliminar();
}
?>
