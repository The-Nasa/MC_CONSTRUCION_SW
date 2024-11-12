<?php
session_start();
if (!isset($_SESSION["txtusername"])) {
    header("Location: http://127.0.0.1/sistema/index.php");
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/stylesdashboard.css">
</head>
<body>
    <header>
        <nav class="menu">
            <ul>
                <li><a href="?opcion=inicio"> inicio </a></li>
                <li><a href="?opcion=ver"> Ver </a></li>
                <li><a href="?opcion=ingresar"> ingresar </a></li>
                <li><a href="?opcion=modificar"> modificar </a></li>
                <li><a href="?opcion=eliminar"> Eliminar </a></li>
                <li><a href="http://127.0.0.1/sistema/logout.php">Salir</a></li>
            </ul>
        </nav>
    </header>      

    <div class="contenido">
        <?php
        if (isset($_GET["opcion"])) {
            $opcion = $_GET["opcion"];
            echo $opcion;
        }
        ?>
    </div>
    <a href="http://127.0.0.1/sistema/logout.php">salir del sistema</a>
    
</body>
</html>



