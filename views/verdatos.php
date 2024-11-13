<?php

    session_start();
    if (!isset($_SESSION["txtusername"])) {
    header('Location: '.get_UrlBase ('index.php'));
    exit();
    
    }
    require_once $_SERVER["DOCUMENT_ROOT"].'/etc/config.php';
    require_once $_SERVER["DOCUMENT_ROOT"].'/models/connect/conexion.php';


    $conecxion = new conexion($host, $namedb, $userdb, $passwordb);

    $pdo = $conecxion->obtenerconexion();
    
    echo "hasta aqui todo bien";
    echo "<br>";
    //$query = $pdo->query("select id, username, password, perfil from usuarios");

    if (isset($pdo)){ echo "pdo esta bien";   
    }else{ echo "pdo no esta bien";}
    echo "<br>";
    echo $host;
    echo "<br>";
    echo $namedb;
    echo "<br>";
    echo $userdb;
    echo "<br>";
    echo $conecxion->contesta();
    //var_dump($conecxion)

?>
