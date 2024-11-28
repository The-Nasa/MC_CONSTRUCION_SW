<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaLogin.php';
//header('Location: ' . get_controllers('cotroladorLogin.php'));

require_once $_SERVER["DOCUMENT_ROOT"] . '/controllers/controladorLogin.php';
?>