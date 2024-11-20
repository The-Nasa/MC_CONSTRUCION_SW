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
$conecxion->conectar();
$pdo = $conecxion->obtenerconexion();

$query = $pdo->query("SELECT id, username, password, perfil FROM usuarios");

?>

<h2>LISTA DE USUARIOS DEL SISTEMA</h2>
<table border="1">
    <tr>
        <th>id</th> 
        <th>username</th>
        <th>password</th>
        <th>perfil</th>

    </tr>
    <?php
    while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {

    ?>
        <tr>
            <td> <?php echo $fila['id']; ?></td>
            <td><?php echo $fila['username']; ?></td>
            <td><?php echo $fila['password']; ?></td>
            <td><?php echo $fila['perfil']; ?></td>
        </tr>
    <?php
    }
    ?>
</table>