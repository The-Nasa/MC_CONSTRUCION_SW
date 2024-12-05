<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

// todo lo relacionado con la base de datos
// un modelo por lo regular apunta a una tabla o una vista
class modeloUsuario
{
    private $conexion;

    //al instarciar la clase debo tener la coneccion
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    //debe hacer un metodo para haser un select
    public function obtenerUsuarios()
    {
        $query = $this->conexion->query("SELECT id, username, password, perfil FROM usuarios");

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
    public function eliminarUsuarioPorNombre($username){ 
    $query = "DELETE FROM usuarios WHERE username = :username";

    //Statemenent o sentencia
    $stmt = $this->conexion->prepare($query);
    $stmt->bindParam(':username', $username, );
    return $stmt->execute();
 }   
    // debe hacer un metodo para haser un update
    public function actualizarUsuario($id, $username, $password, $perfil){
        $query = "UPDATE usuarios SET username = :username, password = :password, perfil = :perfil WHERE id = :id";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':perfil', $perfil);

        return $stmt->execute();

    }
    public function obtenerUsuarioPorNombre($username)
    {
        $query = ("SELECT id, username, password, perfil FROM usuarios  WHERE username = :username");

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':username', $username);

        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);// solo un registro
    }


    // parte del login
    public function verificarUsuario($username, $password) {
        $query ="SELECT id, username, password, perfil FROM usuarios WHERE username = :username";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        if ($user && strcmp($username, $user['username']) == 0 && $password == $user['password']) {
            return $user;
        }

        return false; // Si no se encuentra el usuario o las credenciales son incorrectas
    }
    
}
?>