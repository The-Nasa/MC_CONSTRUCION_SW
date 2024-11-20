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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos</title>
    <link rel="stylesheet" href="../css/stylesmodificardatos.css">
</head>

<body>

</body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmpdatusuarios = $_POST["datusuario"];

    $conecxion = new conexion($host, $namedb, $userdb, $passwordb);
    $pdo = $conecxion->obtenerconexion();
    if (isset($_POST["custid"])) {
        // Aplicar el update en la base de datos
        try {
            $sentencia = $pdo->prepare("UPDATE usuarios SET username = ?, password = ?, perfil = ? WHERE id = ?;");
            $sentencia->execute([$_POST["datusuario"], $_POST["datpassword"], $_POST["datperfil"], $_POST["custid"]]);
            echo '<div class="message success">' . $tmpdatusuarios . " modificación exitosa</div>";
        } catch (PDOException $e) {
            echo '<div class="message error">No se pudo modificar: ' . $e->getMessage() . '</div>';
        }
    } else {
        // Buscar usuario en la base de datos
        try {
            $query = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = ?");
            $query->execute([$tmpdatusuarios]);
            $fila = $query->fetch(PDO::FETCH_ASSOC);

            if ($fila) {
?>
                <div class="container">
                    <h2>Modificar Usuario</h2>
                    <form action="" method="POST">
                        <input type="hidden" name="custid" id="custid" value="<?php echo $fila["id"] ?>">
                        <label for="datusuario">Usuario</label>
                        <input type="text" name="datusuario" id="datusuario" value="<?php echo $fila["username"] ?>" required>
                        <label for="datpassword">Contraseña</label>
                        <input type="password" name="datpassword" id="datpassword" value="<?php echo $fila["password"] ?>" required>
                        <label for="datperfil">Perfil</label>
                        <input type="text" name="datperfil" id="datperfil" value="<?php echo $fila["perfil"] ?>" required>

                        <button type="submit">Actualizar Usuario</button>
                    </form>
                </div>
<?php
            } else {
                echo '<div class="message error">Usuario no encontrado.</div>';
            }
        } catch (PDOException $e) {
            echo '<div class="message error">Error al buscar usuario: ' . $e->getMessage() . '</div>';
        }
    }

    exit(); //CORTA LA EJECUCIÓN
}
?>

<div class="container">
    <h2>Modificar Usuario</h2>
    <form action="" method="POST">
        <label for="datusuario">¿Qué usuario desea modificar?</label>
        <input type="text" name="datusuario" id="datusuario" required>
        <button type="submit">Buscar Usuario</button>
    </form>
</div>
</body>

</html>