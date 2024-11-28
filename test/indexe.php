<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $v_username = "";
    $v_password = "";

    if (isset($_POST["txtusername"])) {
        $v_username = $_POST["txtusername"];
    }

    if (isset($_POST["txtpassword"])) {
        $v_password = $_POST["txtpassword"];
    }

    // Conexión con la base de datos
    $conecxion = new conexion($host, $namedb, $userdb, $passwordb);
    $conecxion->conectar();
    $pdo = $conecxion->obtenerconexion();

    // Preparar la consulta para obtener el usuario y la contraseña
    $stmt = $pdo->prepare("SELECT id, username, password, perfil FROM usuarios WHERE username = :username");
    $stmt->execute(['username' => $v_username]);
    $user = $stmt->fetch();

    // Verificamos si el usuario existe y si la contraseña es correcta
    if ($user && strcmp($v_username, $user['username']) === 0 && $v_password === $user['password']) {
        // Si el nombre de usuario y la contraseña son correctos
        $_SESSION["txtusername"] = $v_username;
        $_SESSION["txtpassword"] = $v_password;
        header('Location: ' . get_views('dashboard.php')); // Redirige al dashboard
    } else {
        // Si las credenciales no son correctas
        header('Location: ' . get_views('claveequivocada.php')); // Redirige a error de clave
    }
}

// Si ya hay una sesión activa, redirigir al dashboard
if (isset($_SESSION["txtusername"])) {
    header('Location: ' . get_views('dashboard.php'));
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/styles.css') ?>">
</head>

<body>


    <main class="login-container">
        <!-- Formulario de inicio de sesión -->
        <form class="login-form" action="" method="POST">

            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="txtusername" id="txtusername" placeholder="Username" class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="txtpassword" id="txtpassword" placeholder="Password" class="form-input" required>
            </div>

            <button class="btn btn-primary">Remenber me</button>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </main>
</body>

</html>