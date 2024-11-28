<?php
function mostrarLogin() {
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

                <button class="btn btn-primary">Remember me</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </main>
    </body>

    </html>
    <?php
}
mostrarLogin();
?>
