<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/models/modeloUsuario.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaIngresarUsuario.php';

$mensaje = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    $modeloUsuario = new modeloUsuario();

    try {
        $modeloUsuario->insertarUsuario($tmpdatusuario, $tmpdatpassword, $tmpdatperfil);
        $mensaje = "usuario ingresado con exito";
    } catch (PDOException $e) {
        $mensaje = "hubo un error: <br>" . $e->getMessage();
    }

    if ($mensaje == "usuario ingresado con exito") {
        //echo "<iframe src='" . get_controllers("controladorUsuario.php") . "'></iframe>";
        include $_SERVER['DOCUMENT_ROOT'] . '/controllers/controladorUsuario.php';
 }

}
mostrarFormularioIngreso($mensaje);
?>