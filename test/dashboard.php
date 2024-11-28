<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/controllers/controladorDashbard.php';

$controller = new controladorDashboard();
$controller->index();
?>