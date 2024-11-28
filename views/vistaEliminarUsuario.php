<?php
function mostrarFormularioEliminar($mensaje = '') {
    if ( !empty($mensaje)) {
        echo $mensaje;
     }else {
?>
<html lang="en">
<head>
    <title>Eliminar Datos</title>
    <link rel="stylesheet" href="../css/styleseliminardatos.css">
</head>
<body>
    <div class="container">
        <h2>ELIMINAR USUARIO</h2>
        <form action="/controllers/controladorEliminarUsuario.php" method="POST">
            <label for="datusuario">¿A QUIÉN DESEA ELIMINAR?:</label>
            <input type="text" name="datusuario" id="datusuario" required>
            <br>
            <button type="submit">Eliminar</button>
        </form>
    </div>
</body>
</html>
<?php
    }
}
?>
