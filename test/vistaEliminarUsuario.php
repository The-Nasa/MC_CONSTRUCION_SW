<?php
function mostrarFormularioEliminar($mensaje) {
    if (empty($mensaje)) {
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
    } else {
        echo $mensaje;
    }
}
?>
