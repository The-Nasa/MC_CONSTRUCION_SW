<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Sistema</title>
    <link rel="stylesheet" href="<?php echo get_UrlBase('css/stylesVistaDashboard.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <!-- Menú lateral -->
    <nav class="sidebar">
        <div class="logo">
            <h2>Mi Sistema</h2>
        </div>
        <ul>
            <li><a href="?opcion=inicio" class="active"><i class="fas fa-home"></i> Inicio</a></li>
            
            <!-- submenú para usuarios -->
            <li>
                <a href="#" class="menu-item">
                    <i class="fas fa-users"></i> Usuarios 
                    <i class="fas fa-chevron-down flecha"></i> <!-- Flecha -->
                </a>
                <ul class="submenu">
                    <li><a href="?opcion=ver"><i class="fas fa-eye"></i> Ver</a></li>
                    <li><a href="?opcion=ingresar"><i class="fas fa-user-plus"></i> Ingresar</a></li>
                    <li><a href="?opcion=modificar"><i class="fas fa-user-edit"></i> Modificar</a></li>
                    <li><a href="?opcion=eliminar"><i class="fas fa-user-times"></i> Eliminar</a></li>
                </ul>
            </li>

            <!-- submenú para productos -->
            <li>
                <a href="#" class="menu-item">
                    <i class="fas fa-boxes"></i> Productos 
                    <i class="fas fa-chevron-down flecha"></i> <!-- Flecha -->
                </a>
                <ul class="submenu">
                    <li><a href="?opcion=verProductos"><i class="fas fa-eye"></i> Ver</a></li>
                    <li><a href="?opcion=ingresarProducto"><i class="fas fa-user-plus"></i> Ingresar</a></li>
                    <li><a href="?opcion=modificarProducto"><i class="fas fa-user-edit"></i> Modificar</a></li>
                    <li><a href="?opcion=eliminarProducto"><i class="fas fa-user-times"></i> Eliminar</a></li>
                </ul>
            </li>

            <!-- submenú para ventas -->
            <li>
                <a href="#" class="menu-item">
                    <i class="fas fa-shopping-cart"></i> Ventas 
                    <i class="fas fa-chevron-down flecha"></i> <!-- Flecha -->
                </a>
                <ul class="submenu">
                    <li><a href="?opcion=verVentas"><i class="fas fa-eye"></i> Ver</a></li>
                    <li><a href="?opcion=ingresarVenta"><i class="fas fa-user-plus"></i> Ingresar</a></li>
                    <li><a href="?opcion=modificarVenta"><i class="fas fa-user-edit"></i> Modificar</a></li>
                    <li><a href="?opcion=eliminarVenta"><i class="fas fa-user-times"></i> Eliminar</a></li>
                </ul>
            </li>

            <!-- submenú para compras -->
            <li>
                <a href="#" class="menu-item">
                    <i class="fas fa-shopping-bag"></i> Compras 
                    <i class="fas fa-chevron-down flecha"></i> <!-- Flecha -->
                </a>
                <ul class="submenu">
                    <li><a href="?opcion=verCompras"><i class="fas fa-eye"></i> Ver</a></li>
                    <li><a href="?opcion=ingresarCompra"><i class="fas fa-user-plus"></i> Ingresar</a></li>
                    <li><a href="?opcion=modificarCompra"><i class="fas fa-user-edit"></i> Modificar</a></li>
                    <li><a href="?opcion=eliminarCompra"><i class="fas fa-user-times"></i> Eliminar</a></li>
                </ul>
            </li>

            <!-- submenú para reportes -->
            <li>
                <a href="#" class="menu-item">
                    <i class="fas fa-chart-bar"></i> Reportes 
                    <i class="fas fa-chevron-down flecha"></i> <!-- Flecha -->
                </a>
                <ul class="submenu">
                    <li><a href="?opcion=reporteVentas"><i class="fas fa-chart-line"></i> Reporte de Ventas</a></li>
                    <li><a href="?opcion=reporteCompras"><i class="fas fa-chart-line"></i> Reporte de Compras</a></li>
                </ul>
            </li>

            <li><a id="btnSalir" href="<?php echo get_controllers('controladorLogout.php') ?>"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
        </ul>

        <footer class="footer">
            <p> copyright &copy; <span id="copyright-year"></span> Mi Sistema - The Naza. Todos los derechos reservados.</p>
        </footer>
    </nav>

    <!-- Contenido dinámico -->
    <div class="main-content">
        <?php
        if (isset($contenido)) {
            echo $contenido;
        } else {
            echo "<h1>Bienvenido al Sistema</h1>";
        }
        ?>
    </div>
    <script src="<?php echo get_UrlBase('js/menuDashboard.js') ?>"></script>

</body>

</html>
