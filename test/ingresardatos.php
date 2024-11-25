<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["txtusername"])) {
    header('Location: ' . get_UrlBase('index.php'));
    exit();
}

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

global $host, $namedb, $userdb, $passwordb;
$conecxion = new conexion($host, $namedb, $userdb, $passwordb);
$pdo = $conecxion->obtenerconexion();




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuario = $_POST["datusuario"];
    $tmpdatpassword = $_POST["datpassword"];
    $tmpdatperfil = $_POST["datperfil"];

    $conecxion = new conexion($host, $namedb, $userdb, $passwordb);
    $pdo = $conecxion->obtenerconexion();

    try {
        $sentencia = $pdo->prepare("INSERT INTO usuarios(username, password, perfil) VALUES (?,?,?)");
        $sentencia->execute([$tmpdatusuario, $tmpdatpassword, $tmpdatperfil]);
        echo "usuario ingresado con exito";
    } catch (PDOException $e) {
        echo "ubo un error: ";
        echo $e->getMessage();
    }
    exit(); //CORTA LA EJECUCION

}
//SE PUSO EN vistaingresarusuario.php
//todo
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Datos</title>
    <link rel="stylesheet" href="../css/stylesingresardatos.css">
</head>

<body>
    <div class="container">
        <h2>INGRESAER USUARIO</h2>
        <form action="" method="POST">
            <label for="datusuario">Usuario</label>
                <input type="text" name="datusuario" id="datusuario">
            <label for="datpassword">Password</label>
                <input type="password" name="datpassword" id="datpassword">
            <label for="datperfil">Perfil</label>
                <input type="text" name="datperfil" id="datperfil">

            <button type="submit">Ingresar Usuario</button>
        </form>
    </div>

</body>

</html>
