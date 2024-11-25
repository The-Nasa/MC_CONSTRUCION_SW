<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaEliminarUsuario.php';

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
}

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];

    $modeloUsuario = new modeloUsuario();
    try {
        $mensaje = $tmpdatusuario . " ha sido eliminado";
    } catch (PDOException $e) {
        $mensaje = "no se pude eliminar: <br>" . $e->getMessage();
    }
    //exit(); //CORTA LA EJECUCION

}

mostrarFormularioEliminar($mensaje);
