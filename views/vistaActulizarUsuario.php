<?php

function mostrarFormularioBusqueda($mensaje = '')
{
    if ( !empty($mensaje)) {
        echo $mensaje;
    }
?>
<head>
    <link rel="stylesheet" href="../css/styleseliminardatos.css">
</head>
    <div class="container">
        <h2>Modificar Usuario</h2>
        <form action="/controllers/controladorActualizarUsuario.php" method="POST">
            <label for="buscarusuario">¿Qué usuario desea modificar?</label>
            <input type="text" name="buscarusuario" id="buscarusuario" required>
            <button type="submit">Buscar Usuario</button>
        </form>
    </div>
<?php
}

function mostrarFormularioEdicion($usuario, $mensaje = '')
{
?>
<head>
    <link rel="stylesheet" href="../css/styleseliminardatos.css">
</head>

    <div class="container">
        <h2>Modificar Usuario</h2>
        <form action="/controllers/controladorActualizarUsuario.php" method="POST">
            <input type="hidden" name="custid" id="custid" value="<?php echo $usuario["id"] ?>">
            <label for="datusuario">Usuario</label>
            <input type="text" name="datusuario" id="datusuario" value="<?php echo $usuario["username"] ?>" required>
            <label for="datpassword">Contraseña</label>
            <input type="password" name="datpassword" id="datpassword" value="<?php echo $usuario["password"] ?>" required>
            <label for="datperfil">Perfil</label>
            <input type="text" name="datperfil" id="datperfil" value="<?php echo $usuario["perfil"] ?>" required>

            <button type="submit">Actualizar Usuario</button>
        </form>
    </div>
<?php
}

?>