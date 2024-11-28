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
    $tmpdatusuarios = $_POST["datusuario"];

    $conecxion = new conexion($host, $namedb, $userdb, $passwordb);
    $pdo = $conecxion->obtenerconexion();

    try {
        $sentencia = $pdo->prepare("DELETE FROM usuarios WHERE username = ?");
        $sentencia->execute([$tmpdatusuarios]);
        echo $tmpdatusuarios . " ha sido eliminado";
    } catch (PDOException $e) {
        echo "no se pude eliminar: ";
        echo $e->getMessage();
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Datos</title>
    <link rel="stylesheet" href="../css/styleseliminardatos.css">
</head>

<body>
    <div class="container">
        <h2>ELIMINAR USUARIO</h2>
        <form action="" method="POST">
            <label for="">AQUIEN DESEA ELIMINAR:</label>
            <input type="text" name="datusuario" id="datsuario" required>
            <br>
            <button type="submit">Eliminar</button>
        </form>

    </div>
</body>

</html>