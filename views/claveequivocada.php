<?php
    require_once $_SERVER["DOCUMENT_ROOT"].'/etc/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/stylesclaveequivocada.css">
</head>
<body>
    <div class="container">
        <h1>CLAVE EQUIVOCADA. VUELVA A INTENTAR</h1>
        <a href="<?php echo get_UrlBase ('index.php')?>">VOLVER AL LOGIN</a>
    </div>
</body>
</html>
