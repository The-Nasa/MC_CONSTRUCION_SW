<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Veterinaria</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <?php
    session_start();
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        //echo "<br>";
        //echo "SE EMBIARON LAS SIGUIENTES VARIABLES: ";
        //echo "<br>";
        //echo $_POST["txtusername"];
        //echo "<br>";
        //echo $_POST["txtpassword"];
        //echo "<br>";

        $v_username = "";
        $v_password = "";
        if (isset($_POST["txtusername"]) ) {
            $v_username = $_POST["txtusername"];
            
        }
        if (isset($_POST["txtpassword"]) ) {
            $v_password = $_POST["txtpassword"];
        }

        if (($v_username == "admin" && $v_password == "1234")) {
            $_SESSION["txtusername"] = $v_username;
            $_SESSION["txtpassword"]= $v_password;
            header("Location: dashboard.php");
           //echo "dashboard";
        }else {
            header("Location: claveequivocada.php");
            //echo "clave equivocada";
        }
    }

    //en caso de que el usuario no se haya logueado - precione directamente sobre la URL inicial
    //ya hay un usuario logueado, asi que le pongo en pantalla
    if (isset($_SESSION["txtusername"])) {
        header("Location: dashboard.php");


    }

    ?>
 

    <main class="login-container">
        <!-- Formulario de inicio de sesión -->
        <form class="login-form" action="" method="POST">

            <div class="form-group">
                <label for="username" class="form-label">Username</label>
                <input type="text" name = "txtusername" id = "txtusername" placeholder="Username"  class="form-input" required>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" name = "txtpassword" id = "txtpassword" placeholder="Password"  class="form-input" required>
            </div>

            <button type="submit" class="btn btn-primary">Remenber me</button>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </main>
</body>
</html>
