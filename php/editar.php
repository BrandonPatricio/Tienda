<?php
include '../config/connection.php'; // Conexión a la base de datos

// Verifica si se recibió un ID en la URL
if (!isset($_GET['id'])) {
    header("Location: ../index.php?mensaje=ID no válido");
    exit();
}

$id = $_GET['id'];

// Obtener los datos del producto
$query = "SELECT * FROM productos WHERE id = $id";
$result = mysqli_query($conn, $query);
$producto = mysqli_fetch_assoc($result);

if (!$producto) {
    header("Location: index.php?mensaje=Producto no encontrado");
    exit();
}

// Procesar el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $query = "UPDATE productos SET nombre='$nombre', precio='$precio', stock='$stock' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: index.php?mensaje=Producto actualizado correctamente");
        exit();
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Editar Producto</h2>

        <div class="card p-4 shadow mt-3">
            <form action="editar.php?id=<?= $id ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Nombre del Producto</label>
                    <input type="text" name="nombre" class="form-control" value="<?= $producto['nombre'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" name="precio" class="form-control" step="0.01" value="<?= $producto['precio'] ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number" name="stock" class="form-control" value="<?= $producto['stock'] ?>" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                    <a href="index.php" class="btn btn-secondary mt-2">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
