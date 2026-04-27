<?php
namespace Controllers;
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/producto.php';

use Models\Producto;
use PDO;

class ProductoController
{
    private $db;

    public function __construct()
    {
        $database = new \Config\Database();
        $this->db = $database->getConnection();
    }

    public function crearProducto(Producto $producto)
    {
        $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio) VALUES (:nombre, :descripcion, :existencia, :precio)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia', $producto->getExistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getPrecio(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function listar()
    {
        $sql = "SELECT * FROM productos ORDER BY idProducto DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM productos WHERE idProducto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function actualizarProducto(Producto $producto)
    {
        $sql = "UPDATE productos Set nombre = :nombre, descripcion = :descripcion, existencia = :existencia, precio = :precio WHERE idProducto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $producto->getIdProducto(), PDO::PARAM_INT);
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':descripcion', $producto->getDescripcion());
        $stmt->bindValue(':existencia', $producto->getExistencia(), PDO::PARAM_INT);
        $stmt->bindValue(':precio', $producto->getPrecio(), PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function eliminarProducto($id)
    {
        $sql = "DELETE FROM productos Where idProducto = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function buscar($termino)
    {
        $sql = "SELECT * FROM productos WHERE nombre LIKE :termino OR descripcion LIKE :termino ORDER BY idProducto DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':termino', '%' . $termino . '%');
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>