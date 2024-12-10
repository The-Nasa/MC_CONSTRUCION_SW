<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

// todo lo relacionado con la base de datos
// un modelo por lo regular apunta a una tabla o una vista
class modeloRegistroventas
{
    private $conexion;

    //al instarciar la clase debo tener la coneccion
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    //debe hacer un metodo para haser un select
    public function obtenerRegistroventas()
    {
        $query = $this->conexion->query("SELECT id, username, password, perfil FROM usuarios");

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    
    }