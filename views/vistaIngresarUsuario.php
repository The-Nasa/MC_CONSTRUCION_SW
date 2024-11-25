<?php
    function mostrarFormularioingreso($mensaje) {
        if (empty($mensaje)) {      
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Datos</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesingresardatos.css') ?>">

</head>

<body>
    <div class="container">
        <h2>INGRESAER USUARIO v2</h2>
            <p class="mensaje"><?php echo ($mensaje); ?></p>
      
        <form action="/controllers/controladorIngresarUsuario.php " method="POST">
            <label for="datusuario">Usuario</label>
                <input type="text" name="datusuario" id="datusuario">
            <label for="datpassword">Password</label>
                <input type="password" name="datpassword" id="datpassword">
            <label for="datperfil">Perfil</label>
                <input type="text" name="datperfil" id="datperfil">

            <button type="submit">Ingresar Usuario</button>
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