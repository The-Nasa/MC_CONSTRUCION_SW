<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

class propiedadesProducto
{
    private $conexion;

    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    public function obtenerPropiedades()
    {
        $sql = 'SELECT * FROM propiedades';
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
