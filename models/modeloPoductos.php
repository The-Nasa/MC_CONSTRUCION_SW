<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/models/connect/conexion.php';

// Todo lo relacionado con la base de datos
// Un modelo por lo regular apunta a una tabla o una vista
class modeloProducto
{
    private $conexion;

    // Al instanciar la clase debo tener la conexión
    public function __construct()
    {
        $this->conexion = Conexion::obtenerConexion();
    }

    // Método para obtener todos los productos
    public function obtenerProductos()
    {
        $query = $this->conexion->query("SELECT id, nombre, descripcion, precio, stock FROM productos");

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para insertar un producto
    public function insertarProducto($nombre, $descripcion, $precio, $stock)
    {
        $query = "INSERT INTO productos(nombre, descripcion, precio, stock) 
                  VALUES(:nombre, :descripcion, :precio, :stock)";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);

        return $stmt->execute();
    }

    // Método para eliminar un producto por nombre
    public function eliminarProductoPorNombre($nombre)
    {
        $query = "DELETE FROM productos WHERE nombre = :nombre";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        return $stmt->execute();
    }

    // Método para actualizar un producto
    public function actualizarProducto($id, $nombre, $descripcion, $precio, $stock)
    {
        $query = "UPDATE productos SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock WHERE id = :id";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);

        return $stmt->execute();
    }

    // Método para obtener un producto por nombre
    public function obtenerProductoPorNombre($nombre)
    {
        $query = "SELECT id, nombre, descripcion, precio, stock FROM productos WHERE nombre = :nombre";

        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Solo un registro
    }

    // Método para verificar si un producto existe
    public function verificarExistenciaProducto($nombre)
    {
        $query = "SELECT * FROM productos WHERE nombre = :nombre";
        $stmt = $this->conexion->prepare($query);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->execute();

        return $stmt->rowCount() > 0; // Si existe, devuelve true, sino false
    }
}
