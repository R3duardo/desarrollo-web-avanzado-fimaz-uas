<?php

require_once 'Admin.php';

// Crear un objeto Admin
$admin1 = new Admin("Eduardo Montes de Oca Zatarain", "emozp@hotmail.com");

// Mostrar nombre, correo y rol utilizando los métodos correspondientes
echo "Nombre: " . $admin1->getNombre() . "<br>";
echo "Correo: " . $admin1->getCorreo() . "<br>";
echo "Rol: " . $admin1->getRol() . "<br>";

?>
