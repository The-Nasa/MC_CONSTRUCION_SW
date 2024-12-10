<?php
//  iniciar secion si aun no se ha iniciado
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';

// verificar si el usuario ya esta aunticado
if (isset($_SESSION['txtusuario'])) {
    // redirigir al dashboard
    header('Location: /views/vistaDashboard.php');
}

include $_SERVER['DOCUMENT_ROOT'] . '/views/vistaLogin.php';

//header("location:" .get_controllers('controladorLogin.php'));

