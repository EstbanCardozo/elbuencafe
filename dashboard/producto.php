<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
</head>
<body>
    <h2>Agregar Producto</h2>
    <form action="dashboard\ejemplo_guardar.php" method="POST" enctype="multipart/form-data">
        <label>Nombre del producto:</label><br>
        <input type="text" name="nombre" required><br><br>
        
        <label>Descripción:</label><br>
        <textarea name="descripcion" required></textarea><br><br>
        
        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" required><br><br>
        
        <label>Stock:</label><br>
        <input type="number" name="stock" required><br><br>
        
        <label>Categoría:</label><br>
        <input type="text" name="categoria" required><br><br>
        
        <label>Imagen del producto:</label><br>
        <input type="file" name="imagen" accept="image/*" required><br><br>
        
        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
