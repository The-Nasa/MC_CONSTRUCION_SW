<?php
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
?>
Se han borrado todas las las variables ...
<a href="http://127.0.0.1/MC_CONSTRUCION_SW/vervariables.php">ver las variables</a>
<a href="http://127.0.0.1/MC_CONSTRUCION_SW/test.php">ir a ver las variables </a>

</body>
</html>     