<?php
include '../config/connection.php'; // Conexión a la base de datos

// Verifica si se ha recibido un ID en la URL
if (!isset($_GET['id'])) {
    header("Location: /index.php?mensaje=ID no válido");
    exit();
}

$id = $_GET['id'];

// Eliminar el producto de la base de datos
$query = "DELETE FROM productos WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
    header("Location: /index.php?mensaje=Producto agregado correctamente");
    exit();
} else {
    echo "Error al eliminar el producto: " . mysqli_error($conn);
}
?>
