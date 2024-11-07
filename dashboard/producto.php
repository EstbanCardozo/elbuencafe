<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
</head>
<body>
    <h2>Agregar Producto</h2>
    <form action="..\dashboard\ejemplo_guardar.php" method="POST" enctype="multipart/form-data">
        <label>Nombre del producto:</label><br>
        <input type="text" name="nombre" required><br><br>
        
        <label>Descripción:</label><br>
        <textarea name="descripcion" required></textarea><br><br>
        
        <label>Precio:</label><br>
        <input type="number" name="precio" step="0.01" required><br><br>
        
        <label>Stock:</label><br>
        <input type="number" name="stock" required><br><br>
        
        <label>Categoría(s):</label><br>
        <select name="categoria" multiple required>
            <option value="Bebidas Calientes">Bebidas Calientes</option>
            <option value="Bebidas Frías">Bebidas Frías</option>
            <option value="Postres y Repostería">Postres y Repostería</option>
            <option value="Snacks y Bocadillos">Snacks y Bocadillos</option>
            <option value="Productos Veganos y Sin Gluten">Productos Veganos y Sin Gluten</option>
            <option value="Ensaladas y Comidas Ligeras">Ensaladas y Comidas Ligeras</option>
            <option value="Bebidas Especiales">Bebidas Especiales</option>
        </select><br><br>
        
        <label>Imagen del producto:</label><br>
        <input type="file" name="imagen" accept="image/*" required><br><br>
        
        <button type="submit">Agregar Producto</button>
    </form>
</body>
</html>
