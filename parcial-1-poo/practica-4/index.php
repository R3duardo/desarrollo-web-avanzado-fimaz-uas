<?php
require_once 'clases/Usuario.php';
require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';
require_once 'clases/invitado.php';

$usuarios = [];
$error_invalido = "";

// 1. Admin válido
try {
    $admin = new Admin("Dr. José Alfonso Aguilar", "jaguilar@uas.edu.mx");
    $usuarios[] = $admin;
} catch (Exception $e) {
    echo "Error crítico: " . $e->getMessage() . "<br>";
}

// 2. Alumno válido
try {
    $alumno = new Alumno("Eduardo Montes de Oca", "emozp@hotmail.com", "012345678");
    $usuarios[] = $alumno;
} catch (Exception $e) {
    echo "Error crítico: " . $e->getMessage() . "<br>";
}

// 3. Invitado válido
try {
    $invitado = new Invitado("Laura Gonzalez", "laura.g@empresa.com", "Tech Solutions S.A.");
    $usuarios[] = $invitado;
} catch (Exception $e) {
    echo "Error crítico: " . $e->getMessage() . "<br>";
}

// 4. Registro inválido para comprobar excepción
try {
    // Correo mal escrito sin @ ni dominio
    $invitadoFallo = new Invitado("Usuario Incorrecto", "correo-malo-sin-arroba", "Empresa Falsa");
    $usuarios[] = $invitadoFallo;
} catch (Exception $e) {
    $error_invalido = "¡Excepción capturada correctamente! " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4 - Sistema de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 800px; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; color: #333; }
        tr:nth-child(even) { background-color: #f9f9f9; }
    </style>
</head>
<body>

    <h2>Registro de Usuarios del Sistema</h2>

    <?php if (!empty($error_invalido)): ?>
        <div style="color: red;">
            <h4>Prueba de Creación de Usuario Inválido</h4>
            <p><?php echo $error_invalido; ?></p>
        </div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Matrícula</th>
                <th>Empresa</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usr): ?>
                <tr>
                    <td><?php echo $usr->getNombre(); ?></td>
                    <td><?php echo $usr->getCorreo(); ?></td>
                    <td><?php echo $usr->getRol(); ?></td>
                    <td><?php echo ($usr instanceof Alumno) ? $usr->getMatricula() : '—'; ?></td>
                    <td><?php echo ($usr instanceof Invitado) ? $usr->getEmpresa() : '—'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
