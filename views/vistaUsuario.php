<?php
function mostrarUsuarios($usuarios) {
?>
<div class="view-data">
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesVistaUsuario.css'); ?>">
    <h1>Lista de Usuarios del Sistema</h1>
    <table class="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Perfil</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['username']; ?></td>
                <td><?php echo $usuario['password']; ?></td>
                <td><?php echo $usuario['perfil']; ?></td>
                <td>
                    <a href="/controllers/controladorEliminarUsuario.php?accion=eliminar&usuario=<?php echo urlencode($usuario['username']); ?>" 
                       class="btn delete"><i class="fas fa-trash"></i> Eliminar</a>
                    <a href="/controllers/controladorActualizarUsuario.php?accion=editar&usuario=<?php echo urlencode($usuario['username']); ?>" 
                       class="btn edit"><i class="fas fa-edit"></i> Editar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php
}
?>
