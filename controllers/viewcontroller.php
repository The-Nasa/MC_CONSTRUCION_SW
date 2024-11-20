<?php
class ViewController {
    public function renderContent($opcion) {
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

        }
    }

    private function inicio() {
        return "<h2>Inicio</h2><p>Esta es la página de inicio.</p>";
    }

    private function ver() {

        include $_SERVER['DOCUMENT_ROOT'] . '/views/verdatos.php';
        
    }

    private function ingresar() {
        include $_SERVER['DOCUMENT_ROOT'] . '/views/ingresardatos.php';

    }

    private function modificar() {
        include $_SERVER['DOCUMENT_ROOT'] . '/views/modificardatos.php';
      
    }

    private function eliminar() {
        include $_SERVER['DOCUMENT_ROOT'] . '/views/eliminardatos.php';
   
    }
}
?>