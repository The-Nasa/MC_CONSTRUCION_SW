<?php
function mostrarFormularioEliminar($mensaje = '') {
    if (!empty($mensaje)) {
        echo "<p class='mensaje'>{$mensaje}</p>";
    } else {
?>
        <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesEliminarUsuario.css'); ?>">
        <div class="containerdelete">
            <h1>ELIMINAR USUARIO</h1> 
            <form action="/controllers/controladorEliminarUsuario.php" method="POST">
                <label for="datusuario">¿A quién desea eliminar?</label>
                <input type="text" name="datusuario" id="datusuario" placeholder="Ingrese el nombre del usuario" required>
                <button type="submit">Eliminar Usuario</button>
            </form>
        </div>
<?php
    }
}
?>
