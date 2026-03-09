<?php

require_once 'Usuario.php';

class Alumno extends Usuario {
    private $matricula;

    public function __construct($nombre, $correo, $matricula) {
        // Llama al constructor de la clase padre (Usuario) para inicializar nombre y correo
        parent::__construct($nombre, $correo);
        $this->matricula = $matricula;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function getRol() {
        return "Alumno";
    }
}
?>
