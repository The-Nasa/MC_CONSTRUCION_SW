<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';
class Conexion
{
    private $host;
    private $namedb;
    private $userdb;
    private $passwordb;
    private $charset;

    private static $pdo = null;

    public function __construct()
    {
        $this->host = DB_HOST;
        $this->namedb = DB_NAME;
        $this->userdb = DB_USER;
        $this->passwordb = DB_PASS;
        $this->charset = 'utf8';

        if (self::$pdo == null) { 
            $this->conectar();
        }
    }
    
    public function conectar()
    {
        $dns = "mysql:host=localhost;dbname={$this->namedb};charset={$this->charset}";
       //$dns = "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";
        try {
            self::$pdo = new PDO($dns, $this->userdb, $this->passwordb);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error al conectar a la base de datos: ' . $e->getMessage());
        }
    }

    public static function obtenerConexion()
    {
        if (self::$pdo == null) {
           new self; 
        }
            return self ::$pdo;
    } 
    public function contesta()
    {
        $dns = "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";
        return $dns;
    }
} 
?>
