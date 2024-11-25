<?php
    function mostrarUsuarios($usuarios) {
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Datos</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesverdatos.css') ?>">
</head>
<body>
<div class="container">
        <h2>Lista de Usuarios del Sistema v2</h2>
        <table>
            <tr>
                <th>ID</th> 
                <th>Username</th>
                <th>Password</th>
                <th>Perfil</th>
            </tr>
            <?php
            // Ejecutar consulta y mostrar los datos
            foreach ($usuarios as $usuario) {
            ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['username']; ?></td>
                <td><?php echo $usuario['password']; ?></td>
                <td><?php echo $usuario['perfil']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
    }
?>