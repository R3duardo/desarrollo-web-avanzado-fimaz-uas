<?php
require_once 'Usuario.php';
require_once 'Admin.php';
require_once 'Alumno.php';

$usuarios = [];
$errores = [];

// 1 Admin válido
try {
    $admin = new Admin("Juan Pérez", "juan.admin@ejemplo.com");
    $usuarios[] = $admin;
} catch (Exception $e) {
    $errores[] = "Error al crear Admin: " . $e->getMessage();
}

// 1 Alumno válido
try {
    $alumno = new Alumno("María Gómez", "maria.gomez@ejemplo.com", "A01020304");
    $usuarios[] = $alumno;
} catch (Exception $e) {
    $errores[] = "Error al crear Alumno: " . $e->getMessage();
}

// 1 Usuario/Alumno con correo inválido para probar la excepción
try {
    $alumnoInvalido = new Alumno("Pedro Díaz", "correo_invalido.com", "A01020305");
    $usuarios[] = $alumnoInvalido;
} catch (Exception $e) {
    $errores[] = "Excepción controlada (Pedro Díaz): " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Práctico - Tabla de Usuarios</title>
    <!-- Incluimos el archivo CSS externo solicitado -->
    <link rel="stylesheet" href="style.css">
    <!-- Fuente moderna opcional desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="page-wrapper">
        <h1 class="page-title">Sistema de Usuarios</h1>

        <?php if (!empty($errores)): ?>
        <div class="alert-container">
            <h2 class="alert-title">Excepciones Capturadas</h2>
            <div class="alert-content">
                <?php foreach ($errores as $error): ?>
                    <div class="alert-msg">
                        <span class="alert-icon">⚠</span> <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <!-- La "tabla" simple hecha con CSS Grid -->
        <div class="grid-table-container">
            <div class="grid-table">
                <!-- Encabezado de la "tabla" -->
                <div class="grid-table-header">
                    <div class="grid-cell">Nombre</div>
                    <div class="grid-cell">Correo</div>
                    <div class="grid-cell">Rol</div>
                    <div class="grid-cell">Matrícula</div>
                </div>
                
                <!-- Cuerpo de la "tabla" -->
                <div class="grid-table-body">
                    <?php foreach ($usuarios as $usr): ?>
                    <div class="grid-table-row">
                        <div class="grid-cell"><?php echo htmlspecialchars($usr->getNombre()); ?></div>
                        <div class="grid-cell"><?php echo htmlspecialchars($usr->getCorreo()); ?></div>
                        <div class="grid-cell">
                            <span class="badge <?php echo ($usr instanceof Admin) ? 'badge-admin' : 'badge-alumno'; ?>">
                                <?php 
                                    if (method_exists($usr, 'getRol')) {
                                        echo htmlspecialchars($usr->getRol());
                                    } else {
                                        echo "Usuario";
                                    }
                                ?>
                            </span>
                        </div>
                        <div class="grid-cell text-muted">
                            <?php 
                                if ($usr instanceof Alumno) {
                                    echo htmlspecialchars($usr->getMatricula());
                                } else {
                                    echo "N/A";
                                }
                            ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
