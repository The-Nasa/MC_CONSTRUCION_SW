<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

class modeloUsuario
{
    private $conexion;

    //al instarciar la clase debo tener la coneccion
    public function __construct()
    {
        // $this->conexion = new conexion();
        $this->conexion = Conexion::obtenerConexion();
        //return $this->conexion;
    }

    //debe hacer un metodo para haser un select
    public function obtenerUsuarios()
    {
        $query = $this->conexion->query("SELECT id, username, password, perfil FROM usuarios");

        // Statemenent
        //$stmt = $this->conexion->prepare($query);

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // debe hacer un metodo para haser un insert
    public function insertarUsuario($username, $password, $perfil)
    {
        //$query = $this->conexion->query("INSERT INTO usuarios(username, password, 
        //perfil) VALUES(:username, :password, :perfil)");

        $query = "INSERT INTO usuarios(username, password, perfil) 
              VALUES(:username, :password, :perfil)";

        // Statemenent o sentencia
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username, );
        $stmt->bindParam(':password', $password , );
        $stmt->bindParam(':perfil', $perfil,);

        return $stmt->execute();
    }
    // debe hacer un metodo para haser un delete
    //public function eliminarUsuario($username){ 
    //$query = "DELETE FROM usuarios WHERE username = :username";

    // Statemenent o sentencia
    //$stmt = $this->conexion->prepare($query);
    //$stmt->bindParam(':username', $username, );
    //return $stmt->execute();
 //}

   
    // debe hacer un metodo para haser un update

}
?>