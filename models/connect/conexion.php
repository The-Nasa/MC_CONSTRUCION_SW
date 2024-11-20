<?php

require_once $_SERVER["DOCUMENT_ROOT"] . '/etc/config.php';


class conexion
{

    private $host;
    private $namedb;
    private $userdb;
    private $passwordb;
    private $charset;
    private $pdo;

    public function __construct($host, $namedb, $userdb, $passwordb, $charset = 'utf8')
    {
        $this->host = $host;
        $this->namedb = $namedb;
        $this->userdb = $userdb;
        $this->passwordb = $passwordb;
        $this->charset = $charset;

        $this->conectar();
        
    }
    
    public function conectar()
    {
        $dns = "mysql:host=localhost;dbname={$this->namedb};charset={$this->charset}";
        
       //$dns = "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dns, $this->userdb, $this->passwordb);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Error al conectar a la base de datos: ' . $e->getMessage());
        }
    }

 

    public function obtenerconexion()
    {
        if ($this->pdo) {
            return $this->pdo;
        } 
    }

    public function contesta()
    {
        $dns = "mysql:host={$this->host};dbname={$this->namedb};charset={$this->charset}";
        return $dns;
    }
} 
