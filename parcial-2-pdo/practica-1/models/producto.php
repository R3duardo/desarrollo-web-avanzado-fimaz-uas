<?php
namespace Models;

class Producto {
    private $idProducto;
    private $nombre;
    private $descripcion;
    private $existencia;
    private $precio;

    public function __construct($idProducto = null, $nombre = "", $descripcion = "", $existencia = 0, $precio = 0.00) {
        $this->idProducto = $idProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getExistencia() {
        return $this->existencia;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setExistencia($existencia) {
        $this->existencia = $existencia;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}
?>