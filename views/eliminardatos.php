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
        echo $tmpdatusuarios. " ha sido eliminado";
    } catch (PDOException $e) {
        echo "no se pude eliminar: ";
        echo $e->getMessage();
    }
    exit(); //CORTA LA EJECUCION

}
?>

<h2>ELIMINAR USUARIO</h2>
<form action="" method="POST">
    <label for="">AQUIEN DESEA ELIMINAR:</label>
    <input type="text" name="datusuario" id="datususuario" required>
    <br>
    <button type="submit">Eliminar</button>
</form>