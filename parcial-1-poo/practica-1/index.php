<?php

require_once 'Usuario.php';

// Crear una instancia de la clase Usuario
$usuario1 = new Usuario("Eduardo Montes de Oca Zatarain", "emozp@hotmail.com");

// Mostrar los valores utilizando los métodos getters
echo "Nombre del usuario: " . $usuario1->getNombre() . "<br>";
echo "Correo del usuario: " . $usuario1->getCorreo() . "<br>";

?>
