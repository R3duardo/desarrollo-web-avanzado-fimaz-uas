<?php
require __DIR__ . '/config/database.php';
require __DIR__ . '/models/producto.php';
require __DIR__ . '/controllers/productoController.php';

use Models\Producto;
use Config\Database;
use Controllers\ProductoController;

// $producto1 = new Producto(1, "Laptop", "Laptop de alta gama", 10, 1500.00);

// echo "ID: " . $producto1->getIdProducto() . "<br>";
// echo "Nombre: " . $producto1->getNombre() . "<br>";
// echo "Descripción: " . $producto1->getDescripcion() . "<br>";
// echo "Existencia: " . $producto1->getExistencia() . "<br>";
// echo "Precio: $" . $producto1->getPrecio() . "<br>"; 

// $database = new Database();
// $database->getConnection();

$productoController = new ProductoController();

$mensaje = "";
$productoEditar = null;
$terminoBusqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';

if (isset($_GET['eliminar'])) {
    $idEliminar = $_GET['eliminar'];
    if ($productoController->eliminarProducto($idEliminar)) {
        $mensaje = "Producto eliminado correctamente.";
    } else {
        $mensaje = "Error al eliminar el producto.";
    }
}

if (isset($_GET["editar"])) {
    $idEditar = $_GET["editar"];
    $productoEditar = $productoController->obtenerPorId($idEditar);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = !empty($_POST["id"]) ? trim($_POST["id"]) : null;
    $nombre = !empty($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
    $descripcion = !empty($_POST["descripcion"]) ? trim($_POST["descripcion"]) : "";
    $existencia = !empty($_POST["existencia"]) ? trim($_POST["existencia"]) : 0;
    $precio = !empty($_POST["precio"]) ? trim($_POST["precio"]) : 0.00;

    $nuevoProducto = new Producto();
    $nuevoProducto->setIdProducto($id);
    $nuevoProducto->setNombre($nombre);
    $nuevoProducto->setDescripcion($descripcion);
    $nuevoProducto->setExistencia($existencia);
    $nuevoProducto->setPrecio($precio);

    if ($id) {
        if ($productoController->actualizarProducto($nuevoProducto)) {
            $mensaje = "Producto actualizado correctamente.";
        } else {
            $mensaje = "Error al actualizar el producto.";
        }
    } else {
        if ($productoController->crearProducto($nuevoProducto)) {
            $mensaje = "Producto creado correctamente.";
        } else {
            $mensaje = "Error al crear el producto.";
        }
    }
}

if ($terminoBusqueda !== '') {
    $productos = $productoController->buscar($terminoBusqueda);
} else {
    $productos = $productoController->listar();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">

        <h1 class="text-center mb-4">CRUD de Productos con PHP, PDO y POO</h1>

        <?php if (!empty($mensaje)): ?>
            <div class="alert alert-info">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <?php echo $productoEditar ? "Editar producto" : "Agregar producto"; ?>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $productoEditar['idProducto'] ?? ''; ?>">

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                value="<?php echo $productoEditar['nombre'] ?? ''; ?>" required>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" name="descripcion" class="form-control"
                                value="<?php echo $productoEditar['descripcion'] ?? ''; ?>" required>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label">Existencia</label>
                            <input type="number" name="existencia" class="form-control"
                                value="<?php echo $productoEditar['existencia'] ?? ''; ?>" required>
                        </div>

                        <div class="col-md-2 mb-3">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" name="precio" class="form-control"
                                value="<?php echo $productoEditar['precio'] ?? ''; ?>" required>
                        </div>

                        <div class="col-md-2 mb-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-success w-100">
                                <?php echo $productoEditar ? "Actualizar" : "Guardar"; ?>
                            </button>
                        </div>
                    </div>

                    <?php if ($productoEditar): ?>
                        <a href="index.php" class="btn btn-secondary">Cancelar edición</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header bg-dark text-white">
                Lista de productos
            </div>
            <div class="card-body">
                <form method="GET" action="" class="row g-2 mb-3">
                    <div class="col-md-10">
                        <input type="text" name="buscar" class="form-control"
                            placeholder="Buscar por nombre o descripción"
                            value="<?php echo htmlspecialchars($terminoBusqueda); ?>">
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                    <?php if ($terminoBusqueda !== ''): ?>
                        <div class="col-12">
                            <a href="index.php" class="btn btn-secondary btn-sm">Mostrar todos</a>
                        </div>
                    <?php endif; ?>
                </form>
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Existencia</th>
                            <th>Precio</th>
                            <th width="180">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($productos) > 0): ?>
                            <?php foreach ($productos as $producto): ?>
                                <tr>
                                    <td>
                                        <?php echo htmlspecialchars($producto['idProducto']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($producto['nombre']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($producto['descripcion']); ?>
                                    </td>
                                    <td>
                                        <?php echo htmlspecialchars($producto['existencia']); ?>
                                    </td>
                                    <td>$
                                        <?php echo number_format($producto['precio'], 2); ?>
                                    </td>
                                    <td>
                                        <a href="index.php?editar=<?php echo $producto['idProducto']; ?>"
                                            class="btn btn-warning btn-sm">
                                            Editar
                                        </a>
                                        <a href="index.php?eliminar=<?php echo $producto['idProducto']; ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Seguro que deseas eliminar este producto?');">
                                            Eliminar
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No hay productos registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>