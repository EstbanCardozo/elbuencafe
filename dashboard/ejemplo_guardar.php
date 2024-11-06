<?php
// Incluimos la conexión a la base de datos
require 'conexion.php';

// Verificamos si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Datos del producto
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $categoria = $_POST['categoria'];
    $carpeta_imagenes = 'imagenes/'; // Carpeta donde se guardarán las imágenes

    // Verificamos si el archivo de imagen fue cargado
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
        // Insertamos el producto en la base de datos
        $sql = "INSERT INTO productos (nombre, descripcion, precio, stock, categoria) VALUES (:nombre, :descripcion, :precio, :stock, :categoria)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':precio' => $precio,
            ':stock' => $stock,
            ':categoria' => $categoria,
        ]);

        // Obtenemos el ID del producto recién insertado
        $id_producto = $pdo->lastInsertId();

        // Generamos un nombre único para la imagen
        $numero_aleatorio = rand(100, 999);
        $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
        $nombre_imagen = $id_producto . '_' . $numero_aleatorio . '.' . $extension;

        // Ruta completa para guardar la imagen
        $ruta_imagen = $carpeta_imagenes . $nombre_imagen;

        // Movemos el archivo a la carpeta de imágenes
        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            // Actualizamos la base de datos para almacenar la ruta de la imagen
            $sql = "UPDATE productos SET imagen_url = :imagen_url WHERE id_producto = :id_producto";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':imagen_url' => $ruta_imagen,
                ':id_producto' => $id_producto,
            ]);

            echo "Producto agregado exitosamente.";
        } else {
            echo "Error al guardar la imagen.";
        }
    } else {
        echo "Error: No se cargó ninguna imagen o hubo un problema con el archivo.";
    }
}
?>
