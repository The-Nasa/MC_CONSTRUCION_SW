<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
header('Location: ' .get_controllers('controladorLogin.php'));
exit();
?>