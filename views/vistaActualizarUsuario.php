<?php
function mostrarFormularioBusqueda($mensaje = '') {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Usuario</title>
        <link rel="stylesheet" href="../css/stylesActualizarUsuario.css">
    </head>
    <body>
        <div class="container">
            <h2>Modificar Usuario</h2>
            <!-- Mostrar el mensaje si está definido -->
            <?php if (!empty($mensaje)): ?>
                <?php 
                // Determinar la clase del mensaje
                $messageClass = (stripos($mensaje, 'Error') !== false) ? 'error-message' : 'success-message';
                ?>
                <div class="<?= $messageClass ?>">
                    <?= htmlspecialchars($mensaje) ?>
                </div>
            <?php endif; ?>
            <form action="/controllers/controladorActualizarUsuario.php" method="POST">
                <label for="buscarusuario">¿Qué usuario desea modificar?</label>
                <input type="text" name="buscarusuario" id="buscarusuario" required>
                <button type="submit">Buscar Usuario</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}

function mostrarFormularioEdicion($usuario, $mensaje = '') {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actualizar Usuario</title>
        <link rel="stylesheet" href="../css/stylesActualizarUsuario.css">
    </head>
    <body>
        <div class="container">
            <h2>Modificar Usuario</h2>
            <!-- Mostrar el mensaje si está definido -->
            <?php if (!empty($mensaje)): ?>
                <?php 
                // Determinar la clase del mensaje
                $messageClass = (stripos($mensaje, 'Error') !== false) ? 'error-message' : 'success-message';
                ?>
                <div class="<?= $messageClass ?>">
                    <?= htmlspecialchars($mensaje) ?>
                </div>
            <?php endif; ?>
            <form action="/controllers/controladorActualizarUsuario.php" method="POST">
                <input type="hidden" name="custid" id="custid" value="<?= htmlspecialchars($usuario["id"]) ?>">
                <label for="datusuario">Usuario</label>
                <input type="text" name="datusuario" id="datusuario" value="<?= htmlspecialchars($usuario["username"]) ?>" required>
                <label for="datpassword">Contraseña</label>
                <input type="password" name="datpassword" id="datpassword" value="<?= htmlspecialchars($usuario["password"]) ?>" required>
                <label for="datperfil">Perfil</label>
                <input type="text" name="datperfil" id="datperfil" value="<?= htmlspecialchars($usuario["perfil"]) ?>" required>
                <button type="submit">Actualizar Usuario</button>
            </form>
        </div>
    </body>
    </html>
    <?php
}
?>
    