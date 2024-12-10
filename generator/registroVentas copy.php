<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/connect/conexion.php';

// TODO LO RELACIONADO A LA BASE DE DATOS, DEBE DE ESTAR EN EL MODELO
// UN MODELO POR LO REGULAR APUNTA A UNA TABLA O UNA VISTA
class modeloregistroVentas
{

    private $conexion;

    // al instanciar la clase debo obtener la conexion 
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    // debe hacer un metodo para hacer select
    public function obtenerregistroVentas()
    {
        $query = $this->conexion->query('select id,'.
                                        'username'.
                                        'from registroVentas');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}
