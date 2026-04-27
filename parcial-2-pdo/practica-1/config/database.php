<?php
namespace Config;
use \PDO;
use \PDOException;

class Database
{
    private $db = "tienda";
    private $pass = "200511";
    private $user = "root";
    private $host = "localhost";
    private $conn;

    public function __construct()
    {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->db;charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // echo "Conexión exitosa<br><br>";
        } catch (PDOException $e) {
            die("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
?>