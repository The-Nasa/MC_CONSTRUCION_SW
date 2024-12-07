<?php
function mostrarFormularioingreso($mensaje)
{
    if (empty($mensaje)) {
?>
        <div class="form-container">
            <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesIngresarUsuario.css'); ?>">
            <h2>INGRESAR USUARIO v2</h2>
            <p class="mensaje"><?php echo htmlspecialchars($mensaje); ?></p>

            <form action="/controllers/controladorIngresarUsuario.php" method="POST">
                <div class="form-group">
                    <label for="datusuario">Usuario</label>
                    <input type="text" name="datusuario" id="datusuario" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="datpassword">Password</label>
                    <input type="password" name="datpassword" id="datpassword" autocomplete="off" required>
                </div>

                <div class="form-group">
                    <label for="datperfil">Perfil</label>
                    <input type="text" name="datperfil" id="datperfil" autocomplete="off" required>
                </div>

                <button type="submit" class="submit-btn">Ingresar Usuario</button>
            </form>
        </div>
<?php
    } else {
        echo $mensaje;
    }
}
?>
