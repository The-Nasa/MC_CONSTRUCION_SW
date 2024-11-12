<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page

if (isset($_SESSION["favcolor"])) {
    
echo "favorite color is ".$_SESSION["favcolor"] = "green";
echo "favorite animal is ".$_SESSION["favanimal"] = "cat";

} else 
{
    echo "NO EXISTEN VARIABLES";
    echo "<br>"
}

?>

<br>
PAGINA DE VER VARIABLES
</br>

<a href="http://127.0.0.1/sistema/vervariables.php">actualizar pagina </a>
<a href="http://127.0.0.1/sistema/borrarvariables.php">limpia la variables </a>

</body>
</html>
