<?php

require_once $_SERVER["DOCUMENT_ROOT"].'/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"].'/models/connect/conexion.php';

session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

header('Location: '.get_UrlBase ('index.php'));
?>

</body>
</html>     