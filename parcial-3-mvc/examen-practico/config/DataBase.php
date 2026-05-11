<?php
// Eduardo Montes de Oca Zatarain

//Crear una clase para conexión a base de datos mediante PDO.

class Database{
    //Atributos de la clase Database
    private $host = "localhost";
    private $db = "proyecto";
    private $user = "root";
    private $password = "";

    public function __construct()
    {
        //Constructor...
    }

    //Método para conexión a la base de datos.
    public function connect(){
        try {
            $PDO = new PDO("mysql:host=".$this->host.";dbname=".$this->db,$this->user,
            $this->password);
            return $PDO;
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }
}

?>