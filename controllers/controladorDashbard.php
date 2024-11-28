<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/views/vistaDashboard.php';

class controladorDashbard {
    private $vista;

    public function __construct() {
        $this->vista = new vistaDashboard();
    }

    public function index() {
        if (!isset($_SESSION["txtusername"])) {
            header('Location: ' . get_UrlBase('index.php'));
            exit();
        }

        $opcion = $_GET["opcion"] ?? "inicio";
        $contenido = $this->renderContent($opcion);
        $this->vista->renderizar($contenido);
    }

    private function renderContent($opcion) {
        switch ($opcion) {
            case "inicio":
                return $this->inicio();
            case "ver":
                return $this->ver();
            case "ingresar":
                return $this->ingresar();
            case "modificar":
                return $this->modificar();
            case "eliminar":
                return $this->eliminar();
            default:
                return $this->inicio();
        }
    }

    private function inicio() {
        return "<h2>Inicio</h2><p>Esta es la página de inicio.</p>";
    }

    private function ver() {
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/controllers/controladorUsuario.php';
        return ob_get_clean();
    }

    private function ingresar() {
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/controllers/controladorIngresarUsuario.php';
        return ob_get_clean();
    }

    private function modificar() {
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/controllers/controladorActualizarUsuario.php';
        return ob_get_clean();
    }

    private function eliminar() {
        ob_start();
        include $_SERVER['DOCUMENT_ROOT'] . '/controllers/controladorEliminarUsuario.php';
        return ob_get_clean();
    }
}
?>