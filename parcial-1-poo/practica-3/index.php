<?php

require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';

// Prueba 1: Creación de un usuario válido (Admin)
echo "<h3>Prueba 1: Creación de un usuario válido</h3>";
try {
    $adminValido = new Admin("Dr. José Alfonso Aguilar", "jaguilar@uas.edu.mx");
    echo "Usuario creado exitosamente.<br>";
    echo "Nombre: " . $adminValido->getNombre() . "<br>";
    echo "Correo: " . $adminValido->getCorreo() . "<br>";
    echo "Rol: " . $adminValido->getRol() . "<br>";
} catch (Exception $e) {
    echo "Error al crear el usuario: " . $e->getMessage() . "<br>";
}

echo "<hr>";

// Prueba 2: Creación de un usuario válido (Alumno)
echo "<h3>Prueba 2: Creación de un usuario válido</h3>";
try {
    $alumnoValido = new Alumno("Eduardo Montes de Oca", "emozp@hotmail.com", "012345678");
    echo "Usuario creado exitosamente.<br>";
    echo "Nombre: " . $alumnoValido->getNombre() . "<br>";
    echo "Correo: " . $alumnoValido->getCorreo() . "<br>";
    echo "Matrícula: " . $alumnoValido->getMatricula() . "<br>";
    echo "Rol: " . $alumnoValido->getRol() . "<br>";
} catch (Exception $e) {
    echo "Error al crear el usuario: " . $e->getMessage() . "<br>";
}

echo "<hr>";

// Prueba 3: Creación de un usuario con formato de correo inválido
echo "<h3>Prueba 3: Creación de un correo inválido (Falla a propósito)</h3>";
try {
    $usuarioInvalido = new Alumno("Juan Perez", "juanperez_correo", "9876543");
    
    echo "Usuario creado exitosamente.<br>";
    echo "Nombre: " . $usuarioInvalido->getNombre() . "<br>";
    echo "Correo: " . $usuarioInvalido->getCorreo() . "<br>";
    echo "Matrícula: " . $usuarioInvalido->getMatricula() . "<br>";
    echo "Rol: " . $usuarioInvalido->getRol() . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

?>
