<?php
//Crear una clase para conexión a base de datos mediante PDO.

class Database{
    //Atributos de la clase Database
    private $host = "localhost";
    private $db = "proyecto";
    private $user = "demo";
    private $password = "123";

    public function __construct()
    {
        //Constructor...
    }

    //Método para conexión a la base de datos.
    public function connect(){
        try {
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,
            $this->password);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

?>